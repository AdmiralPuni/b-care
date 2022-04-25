<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class email extends CI_Controller {
    //load sensors model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('api_model');
        /*
        //get secret from header
        $secret = $this->input->get_request_header('secret', TRUE);
        //verify secret
        if (!$this->api_model->verify_secret($secret))
        {
            echo json_encode(array('status' => 'error', 'message' => 'Invalid secret'));
            exit();
        }
        */

        $this->load->library('email');
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://mail.b-caremadiun.org';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'noreply@b-caremadiun.org';
        $config['smtp_pass'] = 'SteveBallmer';
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n";
        $this->email->initialize($config);
    }

    function send_verification_email($email, $verification_code)
    {
        $this->email->from('noreply@b-caremadiun.org', 'B-Caremadiun');
        $this->email->to($email);
        $this->email->subject('Verify your email address');
        $this->email->message('<p>Thank you for signing up! Please click the link below to verify your email address.</p>
        <p><a href="http://b-caremadiun.org/verify_email/' . $verification_code . '">http://b-caremadiun.org/verify_email/' . $verification_code . '</a></p>');
        $this->email->send();

        //echo $this->email->print_debugger();

    }

    public function test_email()
    {
        $this->send_verification_email('admiralpuni@protonmail.com', '12345');

    }
    

}
