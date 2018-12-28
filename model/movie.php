<?php
    require_once('codable.php');
    /*
    { "name": "Final Score (2018)",
    "ratings": 2,
    "released": "2018",
    "genre": "Action",
    "plot": "After deadly terrorists abduct his niece at a soccer match, an ex-soldier with lethal fighting skills wages a one-man war to save her and prevent mass destruction.",
    "actors": "Aaron McCusker, Dave Bautista, Pierce Brosnan.",
    "cover" : "./web_dev_pictures/action/final_score.jpg",
    "info" : "Final Score is a movie starring Aaron McCusker, Dave Bautista, and Pierce Brosnan. After deadly terrorists abduct his niece at a soccer match..."
    }
    */
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