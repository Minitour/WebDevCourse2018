<?php
    require_once('codable.php');

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
        var $role_id;
        var $profile_picture;

        /**
         * admins have a role id of 1.
         */
        public function isAdmin() {
          return $this->role_id == 1;
        } 
    }
?>