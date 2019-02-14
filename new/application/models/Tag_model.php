<?php

class Tag_model extends CI_Model{

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
    public function add_tag($value) {
        $this->name = $value['name'];

        $this->tag_id = $this->db->insert('tag', $this);

        return True;
    }


    /*
        this function will get all tags for specific movie

        given params:
            @param movie - the movie we want to get the tags from
        
        will return:
            $tags<Array<Tag>> - an array of tags for the movie
    */
    public function get_tags($movie) {
        $query = '(SELECT * FROM tag LEFT JOIN tag_movie ON tag.id = tag_movie.tag_id AND tag_movie.movie_id = '. $movie .')';
        $result = $this->db->query($query);
        return $result;
        //$this->db->get_where('tag_movie', array('movie_id' => $movie));

    }


}

?>