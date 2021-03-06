<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
                $this->load->model('movie_model');
        }

        public function index()
        {
            // if(!isset($_SESSION['role']) || $_SESSION['role'] != '0') {
            //     show_404();
            //     die();
            // }
            $this->load->view('pages/movie_import', array('error' => ' ' ));
        }

        public function do_upload_json()
        {
                // check if session is valid
                // if(!isset($_SESSION['role']) || $_SESSION['role'] != '0') {
                //     show_404();
                //     die();
                // }

                // configure upload settings
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = '*';
                $config['file_name'] = '_tmp.json';
                $config['overwrite'] = TRUE;

                // load lib
                $this->load->library('upload', $config);
                
                if (!$this->upload->do_upload('userfile'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('pages/upload_form', $error);
                        
                }
                else
                {
                    // file uploaded

                    // convert to json
                    $file_path = $this->upload->data()->full_path;
                    $string = file_get_contents($file_path);
                    $movie_data = json_decode($string,TRUE);

                    // counter setup
                    $counter = 0;
                    $failure = 0;

                    // insert to database
                    foreach($movie_data as $movie) {
                        try{
                            $result = $this->movie_model->insert_from_tmdb($movie['id'],$movie['title'],$movie['poster_path'],$movie['backdrop_path'],$movie['overview'],$movie['release_date']);
                            if ($result) {
                                $counter += 1;
                            }else {
                                $failure += 1;
                            } 
                        }catch (Exception $e) {
                            $failure += 1;
                        }
                    }

                    // load view
                    $data = array("imported"=>$counter, "failed"=>$failure);
                    $this->load->view('pages/upload_success', $data);
                }
        }
}
?>