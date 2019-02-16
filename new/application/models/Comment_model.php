<?php

class Comment_model extends CI_Model{

    public $movie_id;
    public $reviewer_id;
    public $time;
    public $comment;
    public $user_id;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    /*
        this function will return specific comment for a review of a movie

        given params:
            @param reviewer_id - the reviewer id in the db
            @param movie_id - the movie id in the db
        
        will return:
            $comment<Comment> - the comment requested in form <Comment>
    */
    public function get_comments_for_review($movie_id,$user_id,$page) {
        $sql = "(SELECT * FROM comments INNER JOIN users ON users.id = comments.reviewer_id WHERE comments.movie_id = ? LIMIT 20 OFFSET ?)";
        $offset = ($page-1) * 20;
        return $this->db->query($sql, array($movie,$offset));
    }

    /*
        this function will return all comments for a review of a movie

        given params:
            @param reviewer_id - the reviewer id in the db
        
        will return:
            $comments<Array<Comment>> - array of comments in form <Comment>
    */
    public function get_all_comments_for_reviewer($reviewer_id) {
        return $this->db->get_where('comments', array('reviewer_id' => $reviewer_id));
    }


    /*
        this function will add a comment for a review

        given params:
            @param post_comment - the comment we want to add
        
        will return:
            comment_id - if the comment has been added to the review
    */  
    public function add_comment($post_comment) {
        $this->reviewer_id = $post_comment['reviewer_id'];
        $this->movie_id = $post_comment['movie_id'];
        $this->time = $post_comment['time'];
        $this->comment = $post_comment['comment'];
        $this->user_id = $post_comment['user_id'];

        $this->db->insert('comments', $this);
        return True;
    }


    /*
        this function will remove comment from a review

        given params:
            @param review_id - the review id in the db
            @param comment_id - the comment id in the db
            @param time - the timestamp of the comment
        
        will return:
            True/False - is the comment has been deleted from the review
    */  
    public function remove_comment($reviewer_id, $movie_id, $time) {
        // deleting the comments for that review
        $this->db->delete('comments', array('reviewer_id' => $reviewer_id, 'movie_id' => $movie_id, 'time' => $time));
        return True;
    }




}

?>