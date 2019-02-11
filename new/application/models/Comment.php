<?php

class Comment {

    public $comment_id;
    public $review_id;
    public $comment;
    public $name;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    /*
        this function will return specific comment for a review of a movie

        given params:
            @param review_id - the review id in the db
            @param comment - the comment id in the db
        
        will return:
            $comment<Comment> - the comment requested in form <Comment>
    */
    public function get_comment($review_id, $comment) {
        return $this->db->get_where('comments', array('review_id' => $review_id, 'comment_id' => $comment));
    }

    /*
        this function will return all comments for a review of a movie

        given params:
            @param review_id - the review id in the db
        
        will return:
            $comments<Array<Comment>> - array of comments in form <Comment>
    */
    public function get_comments($review_id) {
        return $this->db->get_where('comments', array('review_id' => $review_id));
    }


    /*
        this function will add a comment for a review

        given params:
            @param post_comment - the comment we want to add
        
        will return:
            comment_id - if the comment has been added to the review
    */  
    public function add_comment($post_comment) {
        $this->review_id = $post_comment['movie'];
        $this->$comment = $post_comment['profile_img'];
        $this->$name = $post_comment['title'];

        $returned_comment_id = $this->db->insert('comments', $this);
        $this->comment_id = $returned_comment_id;
    }


    /*
        this function will remove comment from a review

        given params:
            @param review_id - the review id in the db
            @param comment_id - the comment id in the db
        
        will return:
            True/False - is the comment has been deleted from the review
    */  
    public function remove_comment($review_id, $comment_id) {
        // deleting the comments for that review
        $this->db->delete('comments', array('review_id' => $review_id, 'comment_id' => $comment_id));
    }




}

?>