<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Review_model');
        $this->load->model('Helper_functions');
    }
        

    /*
        this function will get specific review from db

        given params:
            @param review_id - the review id in db

        will return:
            $review<Review> - the review we requested

    */
    public function get_review($movie, $user_id) {
        var_dump($movie);
        var_dump($user_id);
        $query = $this->review_model->get_review($movie, $user_id);
        $rows = $query->result();
        $data = araay();
        foreach($rows as $row) {
            $data['movie_id'];
            $data['user_id'];
            $data['comment'];
            $data['star_rating'];
            $data['created_at'];
        }
        echo(json_encode($data));
    }


    /*
        this function will get all reviews from db

        will return:
            $reviews<Array<Review>> - the review we requested

    */
    public function get_reviews($movie) {
        $query = $this->review_model->get_reviews($movie);
        $rows = $query->result();
        $data = araay();
        foreach($rows as $row) {
            $data['movie_id'];
            $data['user_id'];
            $data['comment'];
            $data['star_rating'];
            $data['created_at'];
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
        $data = array();
        $data['movie_id'] = $posted_review['movie_id'];
        $data['user_id'] = $posted_review['user_id'];
        $data['comment'] = $posted_review['comment'];
        $data['star_rating'] = $posted_review['star_rating'];
        $data['created_at'] = $posted_review['created_at'];

        $ret = $this->review_model->add_review($data);
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
