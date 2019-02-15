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


    public function index() {
        $this->redirectIfNeeded();
        // session_start();
        
        // if(!isset($_SESSION['username'])){
        //     $this->load->view("pages/login");
        //     return;
        // }

        $data['username'] = $_SESSION['username'];
        $this->load->view("pages/index",$data);
    }

    public function review_view($movie_id) {

        // fetch movie details
        $query = $this->movie_model->get_movie_details($movie_id);
        $res = $query->result();

        
        if (sizeof($res) > 0) {
            $data['movie'] = $res[0];
            $data['username'] = 'testname';
            // load movie view
            $this->load->view("pages/movie",$data);
        }else {
            // page not found
            show_404();
        }
    }

    public function cart_view() {
        $this->load->view("pages/cart");
    }

    public function profile_view() {
        // $user = $this->user_model->get_user_by_username($_SESSION['username']);
        // $user_id = $user->ID;
        $user_id = '2';
        $query = $this->review_model->get_all_reviews($user_id);
        $reviews = $query->result();
        $data['reviews'] = $reviews;
        $this->load->view("pages/profile", $data);
    }

    public function login_view() {
        $this->load->view("pages/login");
    }

    public function after_load() {
        $this->load->view("template/footer");
    }

    public function redirectIfNeeded() {
        echo json_encode($_SESSION);
        // if (session_id() == '' || !isset($_SESSION)) {
        //     header('Location: /new/index.php/login');
        //     die();
        // }
    }
}