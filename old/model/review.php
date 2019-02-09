<?php
    require_once('codable.php');
    
    class Review extends Codable {
        var $id; // comment id
        var $title; // string
        var $comment; // string
        var $number_of_stars; // int
        var $user_id; // the id of the user.
        var $movie_id; // the id of the movie
    }
?>