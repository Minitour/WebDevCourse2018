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
            if(!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 0) {
                show_404();
                die();
            }
            $this->load->view('movie_import', array('error' => ' ' ));
        }

        public function do_upload_json()
        {
                // check if session is valid
                if(!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 0) {
                    show_404();
                    die();
                }

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'json';
                $config['file_name'] = '_tmp.json';
                $config['overwrite'] = TRUE;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload_json('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('upload_form', $error);
                        
                }
                else
                {
                        $file_path = $this->upload->data(0)->full_path;
                        $string = file_get_contents($file_path);
                        $movie_data = json_decode($string,TRUE);
                        $counter = 0;
                        $failure = 0;
                        foreach($movie_data as $movie) {
                            try{
                                $this->movie_model->insert_from_tmdb($movie['id'],$movie['title'],$movie['poster_path'],$movie['backdrop_path'],$movie['overview'],$movie['release_date']);
                                $counter += 1;
                            }catch (Exception $e) {
                                $failure += 1;
                            }
                        }

                        $data = array("imported"=>$conter, "failed"=>$failure);
                        $this->load->view('upload_success', $data);
                }
        }
}
?>