<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('user');
    }
        
    /*
    this function will load the login page
    */
    public function index() {
        $this->load->view("pages/login");
    }

    /*
        this function will authenticate the user and his password against the db

        given params:
            @param username - the user's username
            @param password - the user's password
        
        will return:
            True/False - if the user has been authenticated 

    */
    public function login() {
        header('Content-Type: application/json');

        if (!isset($_POST['username'])) {
            return FALSE;
        }

        if (!isset($_POST['password'])) {
            return FALSE;
        }

        
        $username = $_POST['username'];
        $password = $_POST['password'];

        // fetch account
        $account = $this->user->get_user_by_username($username);

        if($account == FALSE) {
            // could not find account
            http_response_code(500);
            $response = array();
            echo $response; 
            return;
        } 

        // validate password

        // generate session

        $response = array("id"=>$account["id"] ,"session_token"=> "some token"); 

        echo json_encode($response);
    }


    /*
        this function will register a new user if he does not exists
        
        given params:
            @param first_name - first name of user
            @param last_name - last name of user
            @param email - email
            @param phone - phone
            @param birthday - birthday of user
            @param password - password the user choose
        
        will return:
            True/False - is the user has been registered
    */
    public function register_user() {}


    /*
        this function will delete specific user

        given params:
            @param id - the username or email of the user

        will return:
            True/False - if the user has been deleted
    */
    public function delete_user() {}

    
    /*
        this function will logout the user

        given params:
            @param username - the user's username
        
        will return:
            True/False - if the user has been loged out 

    */
    public function logout() {}

    
}
