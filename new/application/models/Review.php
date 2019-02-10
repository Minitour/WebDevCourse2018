<?php

class Review {

    public $movie;
    public $review_id;
    public $profile_img;
    public $title;
    public $name;
    public $review;
    public $score;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    /*
        this function will return specific review for a movie

        given params:
            @param movie - the movie id in the db
            @param review_id - the review id in the db
        
        will return:
            $review<Review> - the review requested in form <Review>
    */
    public function get_review() {
        return $this->db->get_where('reviews', array('movie' => $_POST['movie'], 'review_id' => $_POST['review_id']));
    }


    /*
        this function will return all reviews for a movie

        given params:
            @param review_id - the review id in the db
        
        will return:
            $reviews<Array<Review>> - array of reviews requested in form <Review>
    */    
    public function get_reviews() {
        return $this->db->get_where('reviews', array('movie' => $_POST['movie']));
    }


    /*
        this function will add review for a movie
        
        will return:
            review_id - if the review has been added to the movie
    */  
    public function add_review() {
        $this->movie = $_POST['movie'];
        $this->$profile_img = $_POST['profile_img'];
        $this->$title = $_POST['title'];
        $this->$name = $_POST['name'];
        $this->$review = $_POST['name'];
        $this->$score = $_POST['score'];

        $review_id_return = $this->db->insert('reviews', $this);
        $this->review_id = $review_id_return;
    }


    /*
        this function will remove review from a movie

        given params:
            @param movie - the movie id in the db
            @param review_id - the review id in the db
        
        will return:
            True/False - is the review has been deleted from the movie
    */  
    public function remove_review() {
        // deleting the comments for that review
        $this->db->delete('comments', array('review_id' => $_POST['review_id']));
        
        // deleting the review
        $this->db->delete('reviews', array('movie' => $_POST['movie'], 'review_id' => $_POST['review_id']));
    }



}

?>