<?php

class Category_model extends CI_Model{

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
    public function add_category($value) {
        $this->category_id = $value['category_id'];
        $this->category_name = $value['category_name'];

        $this->db->insert('category', $this);

        return True;
    }


    /*
        this function will add the category to a movie

        given params:
            @param movie - the movie we want to add the category to
        
        will return:
            True/False - if the category has been added to the movie
    */
    public function add_category_to_movie($movie_id, $category_id) {
        $this->db->insert('movie_category', array('movie_id' => $movie_id, 'category_id' => $category_id));
        return True;
    }


    /*
        thid function will return all categories for specific movie

        given params:
            @param movie - the movie we want to get the categories from
        
        will return:
            $categories - of specific movie
    */
    public function get_categories($movie) {
        return $this->db->get_where('movie_category', array('movie_id' => $movie));
    }

    


}

?>