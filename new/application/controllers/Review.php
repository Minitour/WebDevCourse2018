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
        header('Content-Type: application/json');
        $query = $this->review_model->get_all_reviews($user_id);
        $rows = $query->result_array();
        $result = array();
        foreach($rows as $row) {
            $data1 = array();
            $data1['movie_id'] = $row['movie_id'];
            $data1['user_id'] = $row['user_id'];
            $data1['comment'] = $row['comment'];
            $data1['star_rating'] = $row['star_rating'];
            $data1['created_at'] = $row['created_at'];

            array_push($result, $data1);
        }
        echo(json_encode($result));
    }


    /*
        this function will get all reviews from db

        will return:
            $reviews<Array<Review>> - the review we requested

    */
    public function get_reviews_for_movie($movie,$page) {
        header('Content-Type: application/json');
        $query = $this->review_model->get_reviews_movie($movie,$page);
        $rows = $query->result_array();
        $data = array();
        foreach($rows as $row) {
            $temp_data = array();
            $temp_data['movie_id'] = $row['movie_id'];
            $temp_data['user_id'] = $row['user_id'];
            $temp_data['comment'] = $row['comment'];
            $temp_data['star_rating'] = $row['star_rating'];
            $temp_data['created_at'] = $row['created_at'];
            $temp_data['username'] = $row['username'];
            $temp_data['profile_picture'] = $row['profile_picture'];
            array_push($data,$temp_data);
        }
        echo json_encode($data);
    }


    /*
        this function will add review to db

        given params:
            POST['review'] - the review we want to add, this param will be in form <Review>

        will return:
            success/fail - if the review has been added
    */
    public function add_review() {
        header('Content-Type: application/json');
        $movie_id = $_POST['movie_id'];
        $posted_review = $_POST['comment'];
        $star_rating = $_POST['star_rating'];
        $user_id = $_SESSION['id'];


        $ret = $this->review_model->add_review($movie_id, $user_id, $posted_review, $star_rating);
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
        header('Content-Type: application/json');
        $movie_id = $_POST['movie_id'];
        $user_id = $_SESSION['id'];
        $ret = $this->review_model->remove_review($movie_id, $user_id);
        $this->helper_functions->post_success_of_fail($ret);
    }
}
