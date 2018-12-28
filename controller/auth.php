<?php
    //import user model
    require_once(__DIR__ .'/../model/user.php');
    require_once(__DIR__ .'/../model/session.php');

    //import database
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
            $user =  new User($usrObj);

            // create session
            $new_session = new Session;
            $new_session->object_id = $this->gen_uuid();
            $new_session->session_token = $this->gen_uuid();
            $new_session->user_id = $user->id;

            $this->$db->insert('sessions',$new_session);

            return array('user'=> $user, 'session'=> $new_session);
        }

        function gen_uuid() {
            return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                // 32 bits for "time_low"
                mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        
                // 16 bits for "time_mid"
                mt_rand( 0, 0xffff ),
        
                // 16 bits for "time_hi_and_version",
                // four most significant bits holds version number 4
                mt_rand( 0, 0x0fff ) | 0x4000,
        
                // 16 bits, 8 bits for "clk_seq_hi_res",
                // 8 bits for "clk_seq_low",
                // two most significant bits holds zero and one for variant DCE1.1
                mt_rand( 0, 0x3fff ) | 0x8000,
        
                // 48 bits for "node"
                mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
            );
        }
    }
?>