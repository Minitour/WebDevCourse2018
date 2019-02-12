<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
        

    /*
        this function will get specific review from db

        given params:
            @param review_id - the review id in db

        will return:
            $review<Review> - the review we requested

    */
    public function get_review() {}


    /*
        this function will get all reviews from db

        will return:
            $reviews<Array<Review>> - the review we requested

    */
    public function get_reviews() {}

    /*
        this function will add review to db

        given params:
            @param review - the review we want to add, this param will be in form <Review>

        will return:
            True/False - if the review has been added
    */
    public function add_review() {}

    /*
        this function will remove review from db

        given params:
            @param review_id - the review id in db

        will return:
            True/False - if the review has been deleted

    */
    public function remove_review() {}
}
