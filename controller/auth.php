<?php
    //import user model
    require_once(__DIR__ .'/../model/user.php');
    require_once('database.php');

    class Auth {
        var $db;

        function __construct(){
            $this->db = new Database();
        }

        /**
         * login function
         */
        public function login($username, $password){
            
            // select the first user that has a certain username and password.
            $query = function($entry) use ($username,$password){
                $usr = new User($entry);

                //TODO: add hash function check.
                return ($usr->username == $username && $usr->password == $password);
            };

            // get the user object
            $usrObj = $this->db->findOne('users', $query);

            // if findOne returned null then return null.
            if($usrObj == NULL) { return NULL; }

            // cast to our data model.
            return new User($usrObj);
        }
    }
?>