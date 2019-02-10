<?php

class User extends CI_Model
{
    public $username;
    public $password;
    public $email;
    public $first_name;
    public $last_name;
    public $phone;
    public $birthday;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    /*
        thid function will get specific user from db

        given params:
            @param id - the id of the user
        
        will return:
            $user - the user from the db
    */
    public function get($id){
        return $this->db->get_where('users', array('username' => $id));
    }


    /*
        this function will get the user by his username

        given params:
            @param username - the username of the user
        
        will return:
            $user - the user from the db
    */
    public function getByUsername($username){
        return $this->db->get_where('users', array('username' => $username));
    }


    /*
        this function will get the user by his username and password

        given params:
            @param username - the username of the user
            @param password - the password of the user
        
        will return:
            $user - the user from the db
    */
    public function getByUsernamePass($username, $password){
        return $this->db->get_where('users', array('username' => $username, 'password' => $password));
    }


    /*
        this function will get all users from db
        
        will return:
            $users<Array> - the users from the db
    */
    public function get_users()
    {
        $query = $this->db->get('users');
        return $query;
    }


    /*
        this function will add the user to the db

        given params:
            @param first_name - first name of user
            @param last_name - last name of user
            @param email - email
            @param phone - phone
            @param birthday - birthday of user
            @param username - the username of the user
            @param password - password the user choose

        will return:
            True/False - if the user has been added
    */
    public function add_user($user)
    {
        //TODO: add checks here
        $this->username = $user['username'];
        $this->password = $user['password'];
        $this->email = $user['email'];
        $this->first_name = $user['first_name'];
        $this->last_name = $user['last_name'];
        $this->phone = $user['phone'];
        $this->birthday = $user['birthday'];

        $this->db->insert('users', $this);

        return True;
    }


    /*
        this function will update the users new parameters

        given params:
        $user that has the following attributes:
            @param first_name - first name of user
            @param last_name - last name of user
            @param email - email
            @param phone - phone
            @param birthday - birthday of user
            @param username - the username of the user
            @param password - password the user choose

        will return:
            True/False - if the users details has been updated
    */
    public function update_details($user)
    {
        //TODO: add checks here
        $this->username = $user['username'];
        $this->password = $user['password'];
        $this->email = $user['email'];
        $this->first_name = $user['first_name'];
        $this->last_name = $user['last_name'];
        $this->phone = $user['phone'];
        $this->birthday = $user['birthday'];

        $this->db->update('users', $this, array('username' => $this->username));

        return True;
    }


    /*
        this function will delete the user

        given params:
            @param id - can be the username or email of the user

        will return:
            True/False - if the user has been deleted from db
    */
    public function delete($id){
        $this->db->delete('users', array('username' => $id));

        return True;
    }

}
