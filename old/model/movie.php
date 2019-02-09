<?php
    require_once('codable.php');
    
    class Movie extends Codable{
        var $id; // unique identifier
        var $name; // string
        var $ratings; // int
        var $released; // int or string
        var $genre; // string
        var $plot; // string
        var $actors; // string (should be array)
        var $cover; // string (link to image)
        var $info; // string
    }
?>