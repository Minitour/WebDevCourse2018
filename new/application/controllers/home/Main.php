<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller{


    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model('User');
        $this->load->model('Movie');
        $this->load->model('Review');
        $this->load->model('Comment');
    }

    public function start_session() {
        session_start();
        if(!isset($_SESSION['username'])){
            $this->load->view("pages/login");
            return;
        }
    }

    public function pre_load() {
        start_session();
        $this->load->view("template/nav_bar");
    }

    public function index_view() {
        pre_load();
        $this->load->view("pages/index");

        after_load();
    }

    public function review_view() {
        pre_load();
        after_load();
    }

    public function cart_view() {
        pre_load();
        $this->load->view("pages/cart");
        after_load();
    }

    public function profile_view() {
        pre_load();
        $this->load->view("pages/profile");
        after_load();
    }

    public function login_view() {
        start_session();
        $this->load->view("pages/login");
    }

    public function after_load() {
        $this->load->view("template/footer");
    }



}