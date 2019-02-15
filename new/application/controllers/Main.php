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
        $this->load->model('comment_model');
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

    public function profile_view() {
        $user = $this->user_model->get_user_by_username($_SESSION['username']);
        $user_id = $user->ID;
        $query = $this->review_model->get_all_reviews($user_id);
        $reviews = $query->result();
        if (sizeof($reviews) > 0) {
            $data['reviews'] = $reviews;
            $this->load->view("pages/profile", $data);
        } else {
            show_404();
        }

    }

    public function comment_view($movie_id) {
        $values = $this->comment_model->get_comments_for_movie($movie_id);
        $result = $values->result();
        if (sizeof($result) > 0) {
            $data['comments'] = $result;
            $this->load->view("pages/review", $data);
        } else {
            show_404();
        }
        
    }

    public function login_view() {
        $this->load->view("pages/login");
    }

    public function redirectIfNeeded() {
        if (!isset($_SESSION['username'])) {
            header('Location: /new/index.php/login');
            die();
        }
    }
}