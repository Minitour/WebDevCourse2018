<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movie extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('movie_model');
        $this->load->model('Cart_model');
    }
        

    /*
        this function will a specific movie from db

        given params:
            @param movie - the movie id in db

        will return:
            $movie<Movie> - the movie we wanted in form of <Movie>

    */
    public function get_movie($movie) {
        
        $query = $this->movie_model->get_movie_details($movie);
        $rows = $query->result();
        $data = array();
        foreach($rows as $row){
            $data['name'] = $row->name;
            $data['ratings'] = $row->ratings;
            $data['release_date'] = $row->release_date;
            $data['plot'] = $row->plot;
            $data['actors'] = $row->actors;
            $data['cover'] = $row->cover;
            $data['info'] = $row->info;
        }
        echo(json_encode($data));
        
    }


    /*
        this function will get all movies from db
        
        will return:
            $movies<Array<Movie>> - array of all movies in form <Movie>

    */
    public function get_movies() {
        // $tags = $_POST['tags'];
        // $categories = $_POST['categories'];

        // for testing
        $tags = array();
        $categories = array();

        $query = $this->movie_model->get_movies($tags, $categories);
        $rows = $query->result();
        $counter = 0;
        $data = array();
        foreach($rows as $row){
            $temp_data = array();
            $temp_data['id'] = $row->id;
            $temp_data['name'] = $row->name;
            $temp_data['ratings'] = $row->ratings;
            $temp_data['release_date'] = $row->release_date;
            $temp_data['plot'] = $row->plot;
            $temp_data['actors'] = $row->actors;
            $temp_data['cover'] = $row->cover;
            $temp_data['info'] = $row->info;
            $data[$counter] = $temp_data;
            $counter += 1;

        }
        echo(json_encode($data));

    }

    /*
        this function will add movie to db

        given params:
            @param data - the movie we want to add
        
        will return:
            True/False - if the movie has been added
    */
    public function add_movie() {
        $posted_movie = $_POST['movie'];

        $ret = $this->movie_model->insert($posted_movie);
        $this->helper_functions->post_success_of_fail($ret);
    }

    /*
        this function will remove movie from db
        
        given params:
            @param movie - the movie id in db
        
        will return:
            True/False - if the movie and all his reviews and comments has been removed
    */
    public function remove_movie() {
        $movie_id = $_POST['movie_id'];
        $ret = $this->movie_model->remove_movie($movie_id);
        $this->helper_functions->post_success_of_fail($ret);

    }

    
    /*
        this function will add the specific movie to cart

        given params:
            @param id - the id of the movie
        
        will return:
            True/False - if the movie has been successfuly added to the user's cart
    */
    public function add_to_cart() {
        $user_id = $_POST['user_id'];
        $movie_id = $_POST['movie_id'];
        $ret = $this->cart_model->inser_item($user_id, $movie_id);
        $this->helper_functions->post_success_of_fail($ret);

    }

    public function update() {
        $posted_movie = $_POST['movie'];
        $ret = $this->movie_model->update($posted_movie);
        $this->helper_functions->post_success_of_fail($ret);
    }
}
