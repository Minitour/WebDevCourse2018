<?php

class Comment {

    public $review_id;
    public $comment;
    public $name;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($name) {
        return $this->db->get_where('name', array('name' => $name));
    }





}

?>