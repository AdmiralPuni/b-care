<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    //load sensors model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('session_model');

        //redirect helper
        $this->load->helper('url');
    }

    public function index(){
        //if session exists redirect to dashboard
        if($this->session->userdata('identifier') != null){
            if($this->session_model->check($this->session->userdata('identifier'))){
                header('Location: dashboard');
                die();
            }
        }
        //load auth html
        $this->load->view('auth');
    }

    public function logout(){
        $this->session_model->burn($this->session->userdata('identifier'));
        //burn session
        $this->session->sess_destroy();
        //unset session
        $this->session->unset_userdata('identifier');
        //call index
        redirect('auth');
    }

}

?>
