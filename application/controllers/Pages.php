<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('session_model');

        //if identifier in session doesnt exist goto auth
        if ($this->session->userdata('identifier') == null) {
            header('Location: auth');
            die();
        } else {
            if (!$this->session_model->check($this->session->userdata('identifier'))) {
                header('Location: auth');
                die();
            }
        }
    }

    public function dashboard()
    {
        $this->load->view('dashboard');
    }

    public function blood()
    {
        $this->load->view('blood');
    }

    public function plasma()
    {
        $this->load->view('plasma');
    }

    public function profiles()
    {
        $this->load->view('profiles');
    }

    public function stock()
    {
        $this->load->view('stock');
    }

    public function events()
    {
        $this->load->view('events2');
    }

    public function docs()
    {
        $this->load->view('docs');
    }

    public function reports()
    {
        $this->load->view('reports');
    }
}
