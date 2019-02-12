<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Comment_model');
    }
        

    /*
        this function will get range of 5 comments of a review from db

        given params:
            @param review_id - the review id in db

        will return:
            $comments<Array<Comment>> - array of 5 comments for a review

    */
    public function get_comments() {
        $number_of_comments = 5;


        // SELECT TOP 5 FROM Comments
    }


    /*
        this function will get all comments for a review from db

        given params:
            @param review_id - the review id in db
        
        will return:
            $comments<Array<Comment>> - array of all comment for a review

    */
    public function get_all_comments() {}

    /*
        this function will add comment to a review to db

        given params:
            @param review_id - the review id in db
            @param data - the data of the comment
        
        will return:
            True/False - if the comment has been added
    */
    public function add_comment() {}

    /*
        this function will remove review from db
        
        given params:
            @param review_id - the review id in db
        
        will return:
            True/False - if the comment has been removed
    */
    public function remove_comment() {}
}
