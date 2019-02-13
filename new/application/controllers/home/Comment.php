<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Comment_model');
        $this->load->model('Helper_functions');
    }
        

    /*
        this function will get range of 5 comments of a review from db

        given params:
            @param review_id - the review id in db

        will return:
            $comment<Comment> - the comment for a review

    */
    public function get_comments_for_movie($reviewer_id, $movie_id) {
        $query = $this->comment_model->get_comments_for_movie($reviewer_id, $movie_id);
        $rows = $query->result();
        $data = array();
        foreach($rows as $row) {
            $temp_data = array();
            $temp_data['movie_id'] = $row['movie_id'];
            $temp_data['reviewer_id'] = $row['reviewer_id'];
            $temp_data['time'] = $row['time'];
            $temp_data['comment'] = $row['comment'];
            $temp_data['user_id'] = $row['user_id'];
            $data.push($temp_data);
        }

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
        $query = $this->comment_model->get_all_comments_for_reviewer($reviewer_id);
        $rows = $query->result();
        $data = array();
        foreach($rows as $row) {
            $temp_data = array();
            $temp_data['movie_id'] = $row['movie_id'];
            $temp_data['reviewer_id'] = $row['reviewer_id'];
            $temp_data['time'] = $row['time'];
            $temp_data['comment'] = $row['comment'];
            $temp_data['user_id'] = $row['user_id'];
            $data.push($temp_data);
        }

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
        $data = array();
        $data['reviewer_id'] = $_POST['reviewer_id'];
        $data['movie_id'] = $_POST['movie_id'];
        $data['comment'] = $_POST['comment'];
        $data['user_id'] = $_POST['user_id'];

        $ret = $this->comment_model->add_comment($data);
        
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
    public function remove_comment($reviewer_id, $movie_id, $time) {
        $reviewer_id = $_POST['reviewer_id'];
        $movie_id = $_POST['movie_id'];
        $time = $_POST['time'];

        $ret = $this->comment_model->remove_comment($reviewer_id, $movie_id, $time);
        $this->helper_functions->post_success_of_fail($ret);
    }
}
