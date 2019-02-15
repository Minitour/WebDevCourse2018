<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('category_model');
        $this->load->model('helper_functions');
    }
        

    /*
        this function will add a category to db

        will return:
            True/False - if the category has been added

    */
    public function add_category() {
        $category = $_POST['category'];
        $ret = $this->category_model->add_category($category);
        $this->helper_functions->post_success_of_fail($ret);
        
    }


    /*
        this function will add the category to the movie
        
        will return:
            True/False - if the category has been added to the movie

    */
    public function add_category_to_movie() {
        $movie_id = $_POST['movie_id'];
        $category_id = $_POST['category_id'];
        $ret = $this->category_model->add_category_to_movie($movie_id, $category_id);
        $this->helper_functions->post_success_of_fail($ret);
    }

    /*
        this function will get all categories for a movie

        given params:
            @param movie - the movie 
        
        will return:
            $categories - the categories for the movie
    */
    public function get_categories($movie) {
        $query = $this->category_model->get_categories($movie);
        $rows = $query->result();
        $data = array();
        $counter = 0;
        foreach($rows as $row) {
            $temp_data = array();
            $temp_data['category_id'] = $row['category_id'];
            $temp_data['category_name'] = $row['category_name'];
            $data[$counter] = $temp_data;
            $counter += 1;
        }
        echo(json_encode($data));
    }

}
