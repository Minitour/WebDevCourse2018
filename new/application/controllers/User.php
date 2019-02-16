<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('review_model');
        $this->load->model('user_model');
        $this->load->model('helper_functions');
    }
        
    /*
    this function will load the login page
    */
    public function index() {
        $this->load->view("pages/login");
    }

    public function get_user($id) {
        $query = $this->user_model->get_user($id);
        $rows = $query->result();
        $data = array();
        foreach($rows as $row) {
            $data['id'] = $row['id'];
            $data['username'] = $row['username'];
            $data['password'] = $row['password'];
            $data['email'] = $row['email'];
            $data['first_name'] = $row['first_name'];
            $data['last_name'] = $row['last_name'];
            $data['phone'] = $row['phone'];
            $data['birthday'] = $row['birthday'];
            $data['profile_picture'] = $row['profile_picture'];
            $data['role_id'] = $row['role_id'];
        }
        echo(json_encode($data));
    }


    /*
        this function will update the user in db

        will return:
            True/False - if the user has benn updated
    */
    public function update_user() {
        $user = $_POST['user'];
        $user['id'] = $_SESSION['id'];
        $ret = $this->user_model->update_user($user);
        $this->helper_functions->post_success_of_fail($ret);
    }

    /*
        this function will return all reviews for a user

        given params:
            @param user - the user id in the db
        
        will return:
            $reviews<Array<Review>> - array of reviews requested in form <Review>
    */ 
    public function get_reviews($user) {
        $query = $this->review_model->get_all_reviews($user);
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
            $data[$counter] = $temp_data;
            $counter += 1;
        }
        echo(json_encode($data));
    }
    

    /*
        this function will the followers

        given params:
            @param id - the id of the user
            @param page - the id of the page
        
        will return:
            $followers - the followers requested
    */
    public function get_followers($user) {
        $query = $this->user_model->get_followers($user);
        $rows = $query->result();
        $data = array();
        $counter = 0;
        foreach($rows as $row) {
            $temp_data = array();
            $temp_data['id'] = $row['id'];
            $temp_data['username'] = $row['username'];
            $temp_data['password'] = $row['password'];
            $temp_data['email'] = $row['email'];
            $temp_data['first_name'] = $row['first_name'];
            $temp_data['last_name'] = $row['last_name'];
            $temp_data['phone'] = $row['phone'];
            $temp_data['birthday'] = $row['birthday'];
            $temp_data['profile_picture'] = $row['profile_picture'];
            $temp_data['role_id'] = $row['role_id'];
            $data[$counter] = $temp_data;
            $counter += 1;
        }
        echo(json_encode($data));
    }
    
    /*
        this function will return the user's following pages 

        given param:
            @param id - the id of the user
            @param page - the id of the page

        will return:
            $following - the following pages requested
    */
    public function get_following_pages($user) {
        $query = $this->user_model->get_following($user);
        $rows = $query->result();
        $data = array();
        $counter = 0;
        foreach($rows as $row) {
            $temp_data = array();
            $temp_data['id'] = $row['id'];
            $temp_data['username'] = $row['username'];
            $temp_data['password'] = $row['password'];
            $temp_data['email'] = $row['email'];
            $temp_data['first_name'] = $row['first_name'];
            $temp_data['last_name'] = $row['last_name'];
            $temp_data['phone'] = $row['phone'];
            $temp_data['birthday'] = $row['birthday'];
            $temp_data['profile_picture'] = $row['profile_picture'];
            $temp_data['role_id'] = $row['role_id'];
            $data[$counter] = $temp_data;
            $counter += 1;
        }
        echo(json_encode($data));
    }

    /*
        this function will follow specific user

        given params:
            @param id - the id of the user
        
        will return:
            True/False
    */
    public function follow() {
        
    }
}
