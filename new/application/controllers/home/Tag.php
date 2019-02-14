<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('tag_model');
        $this->load->model('helper_functions');
    }
        

    /*
        this function will add a tag to db

        will return:
            True/False - if the tag has been added

    */
    public function add_tag() {
        $tag = $_POST['tag'];
        $ret = $this->tag_model->add_tag($tag);
        $this->helper_functions->post_success_of_fail($ret);
        
    }


    /*
        this function will get all tags for specific movie

        given params:
            @param movie - the movie we want to get the tags from
        
        will return:
            $tags<Array<Tag>> - an array of tags for the movie
    */
    public function get_tags($movie) {
        $ret = $this->tag_model->get_tags($movie);
        $this->helper_functions->post_success_of_fail($ret);
    }

}
