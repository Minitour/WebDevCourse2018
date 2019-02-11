<?php

class Review extends CI_Model{

    public $movie_id;
    public $user_id;
    public $comment;
    public $star_rating;
    public $created_at;

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
        $this->movie_id = $post_review['movie_id'];
        $this->user_id = $post_review['user_id'];
        $this->comment = $post_review['comment'];
        $this->star_rating = $post_review['star_rating'];
        $this->created_at = $post_review['created_at'];

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