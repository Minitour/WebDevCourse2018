<?php

class Tag extends CI_Model{

    public $tag_id;
    public $name;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*
        this function will add tag to db

        given params:
            #param value - the new tag to add
        
        will return:
            True/False - if the tag has been added
    */
    public function add_tag($value) {}


    /*
        this function will get all tags for specific movie

        given params:
            @param movie - the movie we want to get the tags from
        
        will return:
            $tags<Array<Tag>> - an array of tags for the movie
    */
    public function get_tags($movie) {}


}

?>