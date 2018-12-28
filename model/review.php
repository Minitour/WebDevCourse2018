<?php
    require_once('codable.php');
    /*
    "title": "Awesome!",
            "commenter": "Amy",
            "comment": "BEST MOVIE EVER",
            "number_of_stars": "5"
    */

    class Review extends Codable {
        var $id; // comment id
        var $title; // string
        var $comment; // string
        var $number_of_stars; // int
        var $user_id; // the id of the user.
        var $movie_id; // the id of the movie
    }
?>