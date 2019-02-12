<?php

class Movie_model extends CI_Model{

    public $id;
    public $name;
    public $ratings;
    public $released;
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
        
        will return:
            $movies<Array<Movie>> - all movies in form <Movie>
    */ 
    public function get_movies($tags, $categories) {
        return $this->db->get('movies');
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
        $this->released = $post_movie['released'];
        $this->cover = $post_movie['cover'];
        $this->actors = $post_movie['actors'];

        $this->$id = $this->db->insert('movies', $this);
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
    }


    /*
        this function will update the movie

        given params:
            @param movie - the movie with his attributes we want to edit

        will return:
            True/False - if the movie has been updated
    */
    public function update($movie) {}





}

?>