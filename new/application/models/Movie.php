<?php

class Movie {

    public $name;
    public $img;
    public $score;
    public $info;
    public $url;
    public $released;
    public $genre;
    public $actors;

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
    public function get_movie() {
        return $this->db->get_where('movies', array('name' => $_POST['name']));
    }


    /*
        this function will get all movies
        
        will return:
            $movies<Array<Movie>> - all movies in form <Movie>
    */ 
    public function get_movies() {
        return $this->db->get('movies');
    }


    /*
        this function will add movie to db

        given params:
            @param post_movie - the movie we want to add
        
        will return:
            True/False - is the movie has been added successfuly
    */  
    public function add_movie() {
        $this->$img = $_POST['img'];
        $this->$info = $_POST['info'];
        $this->$name = $_POST['name'];
        $this->$url = $_POST['url'];
        $this->$score = $_POST['score'];
        $this->$released = $_POST['released'];
        $this->$genre = $_POST['genre'];
        $this->$actors = $_POST['actors'];

        $this->db->insert('movies', $this);
    }

    /*
        this function will remove movie

        given params:
            @param movie - the movie we want to remove
        
        will return:
            True/False - is the movie has been removed successfuly
    */ 
    public function remove_movie() {
        // get all reviews for this movie
        $reviews = $this->db->get_where('reviews', array('movie' => $_POST['movie']));

        // for each review in this specific movie
        // we will remove the comments from each review
        // remove the review from the movie
        foreach ($reviews as $review) {
            // deleting the comments for the review
            $this->db->delete('comments', array('review_id' => $review->review_id));
        
            // deleting the review
            $this->db->delete('reviews', array('movie' => $_POST['movie'], 'review_id' => $review->review_id));
        }

        // removing the movie from db
        $this->db->delete('movies', array('name' => $_POST['movie']));
    }






}

?>