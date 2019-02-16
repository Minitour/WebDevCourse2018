<?php

class Review_model extends CI_Model{

    public $movie_id;
    public $user_id;
    public $username;
    public $profile_picture;
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
    public function get_reviews_movie($movie,$page) {
        // SELECT * FROM reviews JOIN 
        // SELECT * FROM reviews WHERE movie_id = ? LIMIT 20 OFFSET X
        $sql = "(SELECT * FROM reviews INNER JOIN users ON users.id = reviews.user_id WHERE reviews.movie_id = ? LIMIT 20 OFFSET ?)";
        $offset = ($page-1) * 20;
        return $this->db->query($sql, array($movie,$offset));
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

    public function user_has_review($user_id, $movie_id) {
        $res = $this->db->query('(SELECT * FROM reviews WHERE user_id = ? AND movie_id = ?)', array($user_id,$movie_id))->result();
        return sizeof($res) != 0;
    }

    public function get_review($movie_id, $user_id) {
        return $this->db->query('(SELECT * FROM reviews INNER JOIN users ON users.id = reviews.user_id WHERE user_id = ? AND movie_id = ?)', array($user_id,$movie_id));
    }


    /*
        this function will add review for a movie

        given params:
            @param post_review - the review we want to add
        
        will return:
            review_id - if the review has been added to the movie
    */  
    public function add_review($movie_id,$user_id,$comment, $star_rating) {
        $data = array(
            "movie_id" => $movie_id,
            "user_id" => $user_id,
            "comment" => $comment,
            "star_rating" => $star_rating
        );
        try {
            $this->db->insert('reviews', $data);
            return True;
        }catch (Exception $e){
            return false;
        }
        
        
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