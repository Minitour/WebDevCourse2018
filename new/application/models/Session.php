<?php

class Session extends CI_Model{

    public $session_id;
    public $user_id;
    public $session_token;
    public $created_at;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*
        this function will get the session for specific user

        given params:
            @param user_id - the user id
            @param session - the session id
        
        will return:
            $session<Session> - the session details
    */
    public function get_session($user_id, $session) {}


    /*
        this function will add a session to db

        given params:
            @param session - the session we want to add
        
        will return:
            True/False - if the session has been successfuly added
    */
    public function insert($session) {}

    
    /*
        this function will delete the session from the user

        given params:
            @param session - the session we want to remove
            @param user_id - the user we want to remove the session from
        
        will return:
            True/False - if the session has been successfuly removed from the user
    */
    public function delete($session, $user_id) {}


}

?>