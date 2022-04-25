<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blood extends CI_Controller {
    //load patient model
    public function __construct()
    {
        parent::__construct();

    }
    
	public function index()
	{
		$this->load->view('Blood');
	}
}
