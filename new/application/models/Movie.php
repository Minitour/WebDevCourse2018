<?php

class Movie {

    public $name;
    public $img;
    public $stars;
    public $info;
    public $url;
    public $released;
    public $genre;
    public $actors;

    public function get($name) {
        return $this->db->get_where('name', array('name' => $name));
    }





}

?>