<?php
    require_once('auth.php');
    require_once(__DIR__ .'/../model/user.php');
    require_once(__DIR__ .'/../model/session.php');
    
    class SessionManager {
        const SESSION_TOKEN_KEY = "SESSION_TOKEN";
        const USER_ID_KEY = "USER_ID"; 
        
        var $auth;
        
        function __construct($auth_controller) {
            $this->auth = $auth_controller;
        }

        public function currentUser(){
            if (isset($_COOKIE[self::USER_ID_KEY]) && isset($_COOKIE[self::SESSION_TOKEN_KEY])) {
                //proceed to login

                $user_id = (int) $_COOKIE[self::USER_ID_KEY];
                $session_token = $_COOKIE[self::SESSION_TOKEN_KEY];

                $sessionObject = new Session();
                $sessionObject->user_id = $user_id;
                $sessionObject->session_token = $session_token;

                $user = $this->auth->check_session($sessionObject);
                return $user;
            } else {
                return null;
            }    
        }

        public function createSession($session){
            $current_time = time();
            setcookie(self::SESSION_TOKEN_KEY, $session->session_token, $current_time + (86400 * 30), "/");
            setcookie(self::USER_ID_KEY, $session->user_id, $current_time + (86400 * 30), "/");
        }

        public function clearSession() {
            setcookie(self::SESSION_TOKEN_KEY, null, 1, "/");
            setcookie(self::USER_ID_KEY, null, 1, "/");
        }
    }
?>