<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller{


    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('user_model');
        $this->load->model('movie_model');
        $this->load->model('review_model');
        $this->load->model('comment_model');
        $this->load->model('cart_model');
        $this->load->model('category_model');
        $this->load->model('tag_model');
 
    }


    public function index() {
        // session_start();
        
        // if(!isset($_SESSION['username'])){
        //     $this->load->view("pages/login");
        //     return;
        // }

        //$data['username'] = $_SESSION['username'];
        $this->load->view("pages/index");
    }

    public function review_view() {
    }

    public function cart_view() {
        $this->load->view("pages/cart");
    }

    public function profile_view() {
        $this->load->view("pages/profile");
    }

    public function login_view() {
        if (session_status() == PHP_SESSION_ACTIVE) {
            session_destroy();
        }
        $this->load->view("pages/login");
    }

    public function after_load() {
        $this->load->view("template/footer");
    }
}