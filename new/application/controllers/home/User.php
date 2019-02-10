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
        this function will authenticate the user and his password against the db

        given params:
            @param username - the user's username
            @param password - the user's password
        
        will return:
            True/False - if the user has been authenticated 

    */
    public function login() {
        session_start();
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user_query = $this->User->get_by_username_password($username, $password);
        $username_counter = $user_query->num_rows();

        $row = "";
        if($username_counter == 1)
            $row = $user_query->row_array();

        if ($row == "") {
            $data = array(
                "success" => 'fail'
            );
        } else {
            $data = array(
                "success" => 'success',
                "username" => $row['username'],
                "password" => $password,
                "first_name" => $row['first_name'],
                "last_name" => $row['last_name'],
                "phone" => $row['phone'],
                "birthday" => $row['birthday'],
                "email" =>$row['email']
            );
        }

        echo(json_encode($data));
        return;
            
        
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
}
