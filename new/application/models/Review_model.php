<?php

class Review_model extends CI_Model{

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
        this function will return all reviews for a movie

        given params:
            @param review_id - the review id in the db
        
        will return:
            $reviews<Array<Review>> - array of reviews requested in form <Review>
    */    
    public function get_reviews_movie($movie) {
        return $this->db->get_where('reviews', array('movie_id' => $movie));
    }

    /*
        this function will return all reviews for a user

        given params:
            @param user - the user id in the db
        
        will return:
            $reviews<Array<Review>> - array of reviews requested in form <Review>
    */  
    public function get_all_reviews($user) {
        return $this->db->get_where('reviews', array('user_id' => $user));
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

        $this->db->insert('reviews', $this);
        return True;
    }


    /*
        this function will remove review from a movie

        given params:
            @param movie - the movie id in the db
            @param review_id - the review id in the db
        
        will return:
            True/False - is the review has been deleted from the movie
    */  
    public function remove_review($movie_id, $user_id) {
        // deleting the comments for that review
        $this->db->delete('comments', array('reviewer_id' => $user_id, 'movie_id' => $movie_id));
        
        // deleting the review
        $this->db->delete('reviews', array('movie_id' => $movie_id, 'user_id' => $user_id));

        return True;
    }



}

?>