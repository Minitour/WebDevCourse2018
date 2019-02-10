<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){}
        
    /*
    this function will load the login page
    */
    public function index() {
        $this->load->view("pages/login");
    }

    /*
        this function will authenticate the user and his password against the db

        @param username - the user's username
        @param password - the user's password

    */
    public function login() {}


    /*
        this function will register a new user if he does not exists

        @param first_name - first name of user
        @param last_name - last name of user
        @param email - email
        @param phone - phone
        @param birthday - birthday of user
        @param password - password the user choose
        
    */
    public function register_user() {}
}
