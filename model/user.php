<?php
    require_once('codable.php');
/*
  "username": "Admin",
      "first_name": "Admin",
      "last_name": "Admin",
      "phone": "12333333",
      "email": "something@wmail.com",
      "birthday": "12/3/16",
      "password": "Admin",
      "reviews": [
        {"0": {
          "movie": "Yes Man",
          "title": "Review for Yes Man",
          "commenter": "Monica",
          "comment": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i",
          "number_of_stars": "1"
        }},
        {"1": {
          "movie": "Year One",
          "title": "Review for The Singer number 2",
          "commenter": "Monica",
          "comment": "quis nostrud exercitation ullamco laboris nisi ut aliqu",
          "number_of_stars": "2"
        }}
      ]
    },
 */
    class User extends Codable{
        var $id;
        var $username; //string
        var $first_name; //string
        var $last_name; //string
        var $phone; // string
        var $email; //string
        var $birthday; // string or date
        var $password; // string
        var $reviews; // array
    }
?>