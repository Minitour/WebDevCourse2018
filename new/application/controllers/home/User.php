<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }
        
    /*
    this function will load the login page
    */
    public function index() {
        $this->load->view("pages/login");
    }

    /*
        this function will return the reviews for a given page

        given params:
            @param id - the id of the user
            @param page - the id of the page
        
        will return:
            $reviews - the reviews requested
    */
    public function get_reviews() {}
    

    /*
        this function will the followers

        given params:
            @param id - the id of the user
            @param page - the id of the page
        
        will return:
            $followers - the followers requested
    */
    public function get_followers() {}
    
    /*
        this function will return the user's following pages 

        given param:
            @param id - the id of the user
            @param page - the id of the page

        will return:
            $following - the following pages requested
    */
    public function get_following_pages() {}

    /*
        this function will follow specific user

        given params:
            @param id - the id of the user
        
        will return:
            True/False
    */
    public function follow() {}
}
