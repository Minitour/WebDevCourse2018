<?php

class Category extends CI_Model{

    public $category_id;
    public $category_name;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*
        this function will add category to db

        given params:
            #param value - the new category to add
        
        will return:
            True/False - if the category has been added
    */
    public function add_category($value) {}


    /*
        this function will add the category to a movie

        given params:
            @param movie - the movie we want to add the category to
        
        will return:
            True/False - if the category has been added to the movie
    */
    public function add_category_to_movie($movie) {}


}

?>