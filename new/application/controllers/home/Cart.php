<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('cart_model');
        $this->load->model('helper_functions');
    }
        


    /*
        this function will get all items from cart for specific user

        given params:
            #param user_id - the user we want to get the items from
        
        will return:
            $items<Array> - an array of items
    */
    public function get_items($user_id) {
        $query = $this->cart_model->get_items($user_id);
        //$rows = $query->result();
        //$data = array();
        // foreach($rows as $row) {
        //     $temp_data = array();
        //     $data.push($temp_data);
        // }
        echo($query);
    }


    /*
        this function will add the item to a user's cart

        given params:
            @param user_id - the user we want to add the item to
            @param item_id - the item id we want to add to cart
        
        will return:
            True/False - if the item has been added to cart
    */
    public function insert_item() {
        $user_id = $_POST['user_id'];
        $item_id = $_POST['item_id'];
        $ret = $this->cart_model->insert_item($user_id, $item_id);
        $this->helper_functions->post_success_of_fail($ret);
    }

    /*
        this function will remove the item from a user's cart

        given params:
            @param user_id - the user we want to remove the item from
            @param item_id - the item id we want to remove from cart
        
        will return:
            True/False - if the item has been removed from cart
    */
    public function remove_item() {
        $user_id = $_POST['user_id'];
        $item_id = $_POST['item_id'];
        $ret = $this->cart_model->remove_item($user_id, $item_id);
        $this->helper_functions->post_success_of_fail($ret);
    }

}
