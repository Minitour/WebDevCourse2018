<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Helper_functions extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }
    
    public function post_success_of_fail($success) {
        $response = array();
        if ($success == True) {
            $response['success'] = 'success';
        } else {
            $response['success'] = 'fail';
        }
        echo (json_encode($response));
    }

    
}
