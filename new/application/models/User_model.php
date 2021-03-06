<?php

class User_model extends CI_Model
{
    public $id;
    public $username;
    public $password;
    public $email;
    public $first_name;
    public $last_name;
    public $phone;
    public $birthdate;
    public $profile_picture;
    public $role_id;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    /*
        thid function will get user by id from db

        given params:
            @param id - the id of the user
        
        will return:
            $user - the user from the db
    */
    public function get_user($id){
        return $this->db->get_where('users', array('id' => $id));
    }


    /*
        this function will get user by username from db

        given params:
            @param username - the username of the user
        
        will return:
            $users<Array> - the users from the db
    */
    public function get_user_by_username($username)
    {
        $query = $this->db->get_where('users', array('username' => $username));
            
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row;
    
        }else {
            return False;
        }
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
    public function insert_user($username, $first_name, $last_name, $email, $phone, $birthday_date, $password){
        //TODO: add checks here
        $data = array(
            'username' => $username,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone' => $phone,
            'birthdate' => date("Y-m-d",strtotime($birthday_date)),
            'password' => $password //TODO hash password.
        );

        $this->id = $this->db->insert('users', $data);
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
    public function update_user($user)
    {
        //TODO: add checks here
        $data = array(
            'username' => $user['username'],
            'password' => $user['password'],
            'email' => $user['email'],
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'phone' => $user['phone'],
            'birthdate' => date('Y-m-d',strtotime($user['birthday'])),
            'profile_picture' => $user['profile_picture']
        );

        $this->db->update('users', $data, array('id' => $user['id']));

        return true;
    }

    public function update_picture($user_id, $path_to_pic) {
        $this->db->update('users',
                            array('profile_picture' => $path_to_pic),
                            array('id' => $user_id)
        );
        return true;
    }


    /*
        this function will delete the user

        given params:
            @param id - id of the user in the db

        will return:
            True/False - if the user has been deleted from db
    */
    public function delete($id){
        $this->db->delete('users', array('id' => $id));

        return True;
    }


    /*
        this function will get all followers for specific user

        given params:
            @param user_id - the user id we want to get the followers
        
        will return:
            $followers<Array<User>> - an array of followers
    */
    public function get_followers($user_id) {}


    /*
        this function will get all following for specific user

        given params:
            @param user_id - the user id we want to get the following
        
        will return:
            $followers<Array<User>> - an array of following
    */
    public function get_following($user_id) {}

    public function follow() {}
}
