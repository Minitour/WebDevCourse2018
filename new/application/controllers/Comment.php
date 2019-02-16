<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('comments_model');
        $this->load->model('helper_functions');
    }
        

    /*
        this function will get range of 5 comments of a review from db

        given params:
            @param review_id - the review id in db

        will return:
            $comment<Comment> - the comment for a review

    */
    public function get_comments_for_review($movie_id,$user_id,$page) {
        header('Content-Type: application/json');
        $query = $this->comments_model->get_comments_for_review($movie_id,$user_id,$page);
        
        $data = $this->get_results_from_query($query);

        echo (json_encode($data));
    }


    /*
        this function will get all comments for a review from db

        given params:
            @param review_id - the review id in db
        
        will return:
            $comments<Array<Comment>> - array of all comment for a review

    */
    public function get_all_comments($reviewer_id) {
        $query = $this->comments_model->get_all_comments_for_reviewer($reviewer_id);

        $data = $this->get_results_from_query($query);

        echo (json_encode($data));
    }

    /*
        this function will add comment to a review to db

        given params:
            @param review_id - the review id in db
            @param data - the data of the comment
        
        will return:
            True/False - if the comment has been added
    */
    public function add_comment() {
        header('Content-Type: application/json');
        // $data = $this->get_row_as_array($_POST['comment']);

        $movie_id = $_POST['movie_id'];
        $reviewer_id = $_POST['reviewer_id'];
        $comment = $_POST['comment'];
        $user_id = $_SESSION['id'];

        $ret = $this->comments_model->add_comment($movie_id,$reviewer_id,$comment,$user_id);
        
        // post fail or success
        $this->helper_functions->post_success_of_fail($ret);
    }

    /*
        this function will remove review from db
        
        given params:
            @param review_id - the review id in db
        
        will return:
            True/False - if the comment has been removed
    */
    public function remove_comment() {
        header('Content-Type: application/json');
        $reviewer_id = $_POST['reviewer_id'];
        $movie_id = $_POST['movie_id'];
        $time = $_POST['time'];

        $ret = $this->comments_model->remove_comment($reviewer_id, $movie_id, $time);
        $this->helper_functions->post_success_of_fail($ret);
    }

    /*
        helper function to extract the data from query

        given params:
            $query - the query we want to extract from

        will return:
            $data - array of records
    */
    public function get_results_from_query($query) {
        $rows = $query->result();
        $data = array();
        $counter = 0;
        foreach($rows as $row) {
            $data[$counter] = $this->get_row_as_array($row);
            $counter += 1;
        }
        return $data;
    }


    /*
        this function will return an object as an array

        given params:
            $row - the object we want to convert

        will return:
            $data - array of the object
    */
    public function get_row_as_array($row) {
        $temp_data = array();
        $temp_data['movie_id'] = $row['movie_id'];
        $temp_data['reviewer_id'] = $row['reviewer_id'];
        $temp_data['time'] = $row['time'];
        $temp_data['comment'] = $row['comment'];
        $temp_data['user_id'] = $row['user_id'];

        return $temp_data;
    }
}
