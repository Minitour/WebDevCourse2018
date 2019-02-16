<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller{


    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('session');
        $this->load->model('user_model');
        $this->load->model('movie_model');
        $this->load->model('review_model');
        $this->load->model('comments_model');
        $this->load->model('cart_model');
        $this->load->model('category_model');
        $this->load->model('tag_model');
    }

    /**
     * Loads the home page.
     */
    public function index() {
        $this->redirectIfNeeded();

        $data['username'] = $_SESSION['username'];
        $this->load->view("pages/index",$data);
    }

    /**
     * Loads a page with information about a specifc movie.
     */
    public function review_view($movie_id) {
        $this->redirectIfNeeded();

        // fetch movie details
        $query = $this->movie_model->get_movie_details($movie_id);
        $res = $query->result();

        
        if (sizeof($res) > 0) {
            $data['did_comment'] = $this->review_model->user_has_review($_SESSION['id'],$movie_id);
            $data['movie_data'] = $res[0];
            $data['username'] = $_SESSION['username'];
            
            // load movie view
            $this->load->view("pages/movie",$data);
        }else {
            // page not found
            show_404();
        }
    }

    /**
     * Loads the user's cart.
     */
    public function cart_view() {
        $this->load->view("pages/cart");
    }


    public function profile_view_self() {
        $this->redirectIfNeeded();
        $user = $this->user_model->get_user_by_username($_SESSION['username']);
        $data['usr'] = $user;
        
        $query = $this->review_model->get_all_reviews($_SESSION['id']);
        $rows = $query->result_array();
        $result = array();
        foreach($rows as $row) {
            $data1 = array(
                "username" => $row['username'],
                "created_at" => $row['created_at'],
                "comment" => $row['comment'],
                "star_rating" => $row['star_rating'],
                "user_id" => $row['user_id'],
                "profile_picture" => $row['profile_picture'],
                "movie_id" => $row['movie_id'],
                "name" => $row['name']
            );

            array_push($result, $data1);
        }
        $data['reviews'] = $result;
        $this->load->view("pages/profile", $data);
    }

    public function profile_view($user_id) {
        
    }

    public function login_view() {
        $this->load->view("pages/login");
    }

    /**
     * show comments view.
     */
    public function comments_view($movie_id, $user_id){
        $query = $this->review_model->get_review($movie_id, $user_id);
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $data['username'] = $_SESSION['username'];
            $data['review_data'] = array(
                "username" => $row['username'],
                "created_at" => $row['created_at'],
                "comment" => $row['comment'],
                "star_rating" => $row['star_rating'],
                "user_id" => $row['user_id'],
                "profile_picture" => $row['profile_picture'],
                "movie_id" => $row['movie_id'],
                "name" => $row['name']
            );

            $this->load->view("pages/review", $data);
        }else {
            show_404();
        }
    }

    public function redirectIfNeeded() {
        if (!isset($_SESSION['id'])) {
            header('Location: /new/index.php/login');
            die();
        }
    }
}