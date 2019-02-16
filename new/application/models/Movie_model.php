<?php

class Movie_model extends CI_Model{

    public $id;
    public $name;
    public $ratings;
    public $release_date;
    public $plot;
    public $actors;
    public $cover;
    public $info;


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    /*
        this function will get specific movie

        given params:
            @param name - the movie we want to get
        
        will return:
            $movie - the movie requested in form <Movie>
    */  
    public function get_movie_details($movie_id) {
        return $this->db->get_where('movies', array('id' => $movie_id));
    }


    /*
        this function will get all movies

        SELECT * FROM MOVIES WHERE (
            movies.id IN (
                SELECT tag_movie.movie_id FROM tag_movie INNER JOIN tag ON tag_movie.tag_id = tag.id 
                WHERE tag.value IN (%)
            )
            
            OR

            movies.id IN (
                SELECT movie_category.movie_id FROM movie_category 
                WHERE category.id IN (%)
            )
        ) LIMIT 20 OFFSET ?

    */ 
    public function get_movies($page, $tags, $categories) {
       
        $query_string = "( SELECT * FROM movies WHERE ";

        $offset = ($page-1) * 20;

        $params = array();
        foreach($tags as $tag){
            array_push($params,$tag);
        }

        foreach($categories as $category) {
            array_push($params,$category);
        }

        array_push($params,$offset);

        $tags_query = $this->tags_clause();
        $categories_query = $this->categories_clause();

        if ($tags_query == '0' && $categories_query == '0') {
            $query_string .= '1';
        }
        else {
            $query_string .= $tags_query; // n parameters
            $query_string .= ' OR ';
            $query_string .= $categories_query; // m parameters
        }
        $query_string .= ' ) LIMIT 20 OFFSET ?'; // 1 parameter

        $query = $this->db->query($query_string, $params);

        return $query;
    }


    /*
        this function will add movie to db

        given params:
            @param post_movie - the movie we want to add
        
        will return:
            True/False - is the movie has been added successfuly
    */  
    public function insert($post_movie) {
        $this->info = $post_movie['info'];
        $this->name = $post_movie['name'];
        $this->ratings = $post_movie['ratings'];
        $this->plot = $post_movie['plot'];
        $this->release_date = $post_movie['release_date'];
        $this->cover = $post_movie['cover'];
        $this->actors = $post_movie['actors'];

        $this->$id = $this->db->insert('movies', $this);
        return True;
    }

    public function insert_from_tmdb($id,$title,$poster_path,$backdrop_path,$overview,$release_date){
        $data = array(
            "info" => $overview,
            "name" => $title,
            "ratings" => 5,
            "plot" => $overview,
            "release_date" => date('Y-m-d',strtotime($release_date)),
            "cover" => $poster_path,
            "mdb_id" => $id
        );

        $this->$id = $this->db->insert('movies', $data);
        return True;
    }

    /*
        this function will remove movie

        given params:
            @param movie - the movie we want to remove
        
        will return:
            True/False - is the movie has been removed successfuly
    */ 
    public function remove_movie($movie) {
        // get all reviews for this movie
        $reviews = $this->db->get_where('reviews', array('movie_id' => $movie));

        // for each review in this specific movie
        // we will remove the comments from each review
        // remove the review from the movie
        foreach ($reviews as $review) {
            // deleting the comments for the review
            $this->db->delete('comments', array('movie_id' => $movie, 'user_id' => $review->user_id));
        }

        // deleting the reviews
        $this->db->delete('reviews', array('movie' => $movie));

        // removing the movie from db
        $this->db->delete('movies', array('name' => $movie));

        return True;
    }


    /*
        this function will update the movie

        given params:
            @param movie - the movie with his attributes we want to edit

        will return:
            True/False - if the movie has been updated
    */
    public function update($post_movie) {
        $this->info = $post_movie['info'];
        $this->name = $post_movie['name'];
        $this->ratings = $post_movie['ratings'];
        $this->plot = $post_movie['plot'];
        $this->release_date = $post_movie['release_date'];
        $this->cover = $post_movie['cover'];
        $this->actors = $post_movie['actors'];

        $this->db->update('movies', $this);

        return True;
        
    }

    public function get_array_to_string($values) {
        $string_to_convert = "";
        $values_number = count($values);
        $counter = 0;
        foreach($values as $value) {
            if ($counter - 1 == $values_number){
                $string_to_convert += '"'.$value.'"';
            }else {
                $string_to_convert += '"'.$value.'",';
            }
            $counter += 1;
        }

        return $string_to_convert;
    }

    public function tags_clause($values) {
        if (count($values) == 0) {
            return '0';
        }
        $clause = implode(',', array_fill(0, count($values), '?'));
        $template = 'movies.id IN (SELECT tag_movie.movie_id FROM tag_movie INNER JOIN tag ON tag_movie.tag_id = tag.id WHERE tag.value IN (' . $clause . '))';
        return $template;
    }

    public function categories_clause($values) {
        if (count($values) == 0) {
            return '0';
        }
        $clause = implode(',', array_fill(0, count($values), '?'));
        $template = 'movies.id IN (SELECT movie_category.movie_id FROM movie_category WHERE category.id IN ('. $clause . '))';
        return $template;
    }



}

?>