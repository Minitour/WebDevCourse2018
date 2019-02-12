<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movie extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('Movie');
    }
        

    /*
        this function will a specific movie from db

        given params:
            @param movie - the movie id in db

        will return:
            $movie<Movie> - the movie we wanted in form of <Movie>

    */
    public function get_movie($movie) {
        
        var_dump($movie);
        $query = $this->Movie->get_movie_details($movie);
        echo $query;
        
    }


    /*
        this function will get all movies from db
        
        will return:
            $movies<Array<Movie>> - array of all movies in form <Movie>

    */
    public function get_movies() {}

    /*
        this function will add movie to db

        given params:
            @param data - the movie we want to add
        
        will return:
            True/False - if the movie has been added
    */
    public function add_movie() {}

    /*
        this function will remove movie from db
        
        given params:
            @param movie - the movie id in db
        
        will return:
            True/False - if the movie and all his reviews and comments has been removed
    */
    public function remove_movie() {}

    
    /*
        this function will add the specific movie to cart

        given params:
            @param id - the id of the movie
        
        will return:
            True/False - if the movie has been successfuly added to the user's cart
    */
    public function add_to_cart($id) {}
}
