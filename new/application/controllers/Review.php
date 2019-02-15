<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('review_model');
        $this->load->model('helper_functions');
    }
        

    /*
        this function will get specific review from db

        given params:
            @param review_id - the review id in db

        will return:
            $review<Review> - the review we requested

    */
    public function get_reviews_for_user($user_id) {
        $query = $this->review_model->get_all_reviews($user_id);
        $rows = $query->result();
        $data1 = array();
        foreach($rows as $row) {
            $data1['movie_id'] = $row['movie_id'];
            $data1['user_id'] = $row['user_id'];
            $data1['comment'] = $row['comment'];
            $data1['star_rating'] = $row['star_rating'];
            $data1['created_at'] = $row['created_at'];
        }
        echo(json_encode($data1));
    }


    /*
        this function will get all reviews from db

        will return:
            $reviews<Array<Review>> - the review we requested

    */
    public function get_reviews_for_movie($movie,$page) {
        $query = $this->review_model->get_reviews_movie($movie,$page);
        $rows = $query->result();
        $data = array();
        $counter = 0;
        foreach($rows as $row) {
            $temp_data = array();
            $temp_data['movie_id'] = $row['movie_id'];
            $temp_data['user_id'] = $row['user_id'];
            $temp_data['comment'] = $row['comment'];
            $temp_data['star_rating'] = $row['star_rating'];
            $temp_data['created_at'] = $row['created_at'];
            $temp_data['username'] = $row['username'];
            $temp_data['profile_picture'] = $row['profile_picture'];
            $data[$counter] = $temp_data;
            $counter += 1;
        }
        echo(json_encode($data));
    }


    /*
        this function will add review to db

        given params:
            POST['review'] - the review we want to add, this param will be in form <Review>

        will return:
            success/fail - if the review has been added
    */
    public function add_review() {
        $posted_review = $_POST['review'];
        $ret = $this->review_model->add_review($posted_review);
        $this->helper_functions->post_success_of_fail($ret);
    }

    /*
        this function will remove review from db

        given params:
            @param review_id - the review id in db

        will return:
            True/False - if the review has been deleted

    */
    public function remove_review() {
        $movie_id = $_POST['movie_id'];
        $user_id = $_POST['user_id'];
        $ret = $this->review_model->remove_review($movie_id, $user_id);
        $this->helper_functions->post_success_of_fail($ret);
    }
}
