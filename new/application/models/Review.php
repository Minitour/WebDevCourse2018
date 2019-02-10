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
    public function get_review($movie, $review_id) {
        return $this->db->get_where('reviews', array('movie' => $movie, 'review_id' => $review_id));
    }


    /*
        this function will return all reviews for a movie

        given params:
            @param review_id - the review id in the db
        
        will return:
            $reviews<Array<Review>> - array of reviews requested in form <Review>
    */    
    public function get_reviews($movie) {
        return $this->db->get_where('reviews', array('movie' => $movie));
    }


    /*
        this function will add review for a movie

        given params:
            @param post_review - the review we want to add
        
        will return:
            review_id - if the review has been added to the movie
    */  
    public function add_review($post_review) {
        $this->movie = $post_review['movie'];
        $this->$profile_img = $post_review['profile_img'];
        $this->$title = $post_review['title'];
        $this->$name = $post_review['name'];
        $this->$review = $post_review['name'];
        $this->$score = $post_review['score'];

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
    public function remove_review($movie, $review_id) {
        // deleting the comments for that review
        $this->db->delete('comments', array('review_id' => $review_id));
        
        // deleting the review
        $this->db->delete('reviews', array('movie' => $movie, 'review_id' => $review_id));
    }



}

?>