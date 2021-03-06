<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->model('user_model');
        $this->load->model('helper_functions');
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

        function error($message){
            http_response_code(500);
            $response = array('message' => $message);
            echo json_encode($response);
            header('Location: /new/index.php/login?messageError=' . $message);
            die();
        }

        if (!isset($_POST['email-login'])) {
            error('Username not specified!');
        }

        if (!isset($_POST['password-login'])) {
            error('Password not specified!');
        }

        
        $username = $_POST['email-login'];
        $password = $_POST['password-login'];

        // fetch account
        $account = $this->user_model->get_user_by_username($username);

        if($account == FALSE) {
            // could not find account
            error('No such username!');
        } 

        // validate password
        if($account['password'] != $password) {
            error('Password does not match!');
        }

        // generate session
        session_start();
        $_SESSION['id'] = $account['id'];
        $_SESSION['username'] = $account['username'];
        $_SESSION['profile_picture'] = $account['profile_picture'];
        $_SESSION['role'] = $account['role'];
        $response = array("message" => 'Success', "code" => 200); 
        http_response_code(200);
        header('Location: /new');
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
    public function register_user() {
        header('Content-Type: application/json');
        
        $username = $_POST['username'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email-register'];
        $phone = $_POST['phone-register'];
        $birthday_date = $_POST['birthday_date'];
        $password = $_POST['password'];

        $ret = $this->user_model->insert_user($username, $first_name, $last_name, $email, $phone, $birthday_date, $password);
        if ($ret == FALSE) {
            $this->helper_functions->post_success_of_fail(FALSE);
            die();
        }

        $account = $this->user_model->get_user_by_username($username);
        // generate session
        session_start();
        $_SESSION['id'] = $account['id'];
        $_SESSION['username'] = $account['username'];
        $_SESSION['profile_picture'] = $account['profile_picture'];
        $_SESSION['role'] = $account['role'];
        $response = array("message" => 'Success', "code" => 200); 
        http_response_code(200);
        header('Location: /new');
        echo json_encode($response);
    }


    /*
        this function will delete specific user

        given params:
            @param id - the username or email of the user

        will return:
            True/False - if the user has been deleted
    */
    public function delete_user() {
        $user = $_POST['user_id'];
        $ret = $this->user_model->delete($user);
        $this->helper_functions->post_success_of_fail($ret);
    }

    public function do_upload() {
        header('Content-Type: application/json');
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = '*';
        $config['file_name'] = 'profile_' . $_SESSION['id'];
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);

        if (!file_exists('./uploads/')) {
            mkdir('./uploads/', 0777, true);
        }

        if ( ! $this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            http_response_code(400);
            echo json_encode(array('message' => 'error'));
        }
        else
        {
            $data = $this->upload->data();
            $url = base_url('uploads/' . $data['file_name']);
            $this->user_model->update_picture($_SESSION['id'],$url);
            $_SESSION['profile_picture'] = $url;
            http_response_code(200);
            header('Location: /new/index.php/myprofile');
            echo json_encode(array('message' => $data));
        }
    }

    
    /*
        this function will logout the user

        given params:
            @param username - the user's username
        
        will return:
            True/False - if the user has been loged out 

    */
    public function logout() {}

    
}
