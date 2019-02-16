<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Helper_functions extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    
    public function post_success_of_fail($success) {
        $response = array();
        if ($success == True) {
            $response['message'] = 'success';
            http_response_code(200);
        } else {
            $response['message'] = 'fail';
            http_response_code(400);
        }
        echo (json_encode($response));
    }

    
}
