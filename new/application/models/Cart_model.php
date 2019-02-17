<?php

class Cart_model extends CI_Model{

    public $user_id;
    public $items;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*
        this function will get all items from cart for specific user

        given params:
            #param user_id - the user we want to get the items from
        
        will return:
            $items<Array> - an array of items
    */
    public function get_items($user_id) {
        $sql = "(SELECT * FROM cart INNER JOIN movies ON movie.id = cart.movie_id WHERE cart.user_id = ?)";
        $offset = ($page-1) * 20;
        $rows = $this->db->query($sql, array($user_id))->result_array();
        $data = array();
        foreach($rows as $row){
            $item = array(
                'movie_id' => $row['movie_id'],
                'name' => $row['name'],
                'cover' => $row['cover'],
                'plot' => $row['plot']
            );
            array_push($data,$item);
        }
        return $data;
    }


    /*
        this function will add the item to a user's cart

        given params:
            @param user_id - the user we want to add the item to
            @param item_id - the item id we want to add to cart
        
        will return:
            True/False - if the item has been added to cart
    */
    public function insert_item($user_id, $movie_id) {
        $data = array(
            "movie_id" => $movie_id,
            "user_id" => $user_id
        );
        $this->db->insert('cart', $data);
        return True;
    }


    /*
        this function will remove the item from a user's cart

        given params:
            @param user_id - the user we want to remove the item from
            @param item_id - the item id we want to remove from cart
        
        will return:
            True/False - if the item has been removed from cart
    */
    public function remove_item($user_id, $item_id) {
        $data = array(
            "movie_id" => $movie_id,
            "user_id" => $user_id
        );
        $this->db->delete('cart', $data);
        return True;
    }


}

?>