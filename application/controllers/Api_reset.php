<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_reset extends CI_Controller
{
    //load sensors model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('session_model');
        $this->load->model('email_model');
        $this->load->model('api_model');
        $this->load->model('reset_model');
    }

    public function send_password_reset_email($email, $id, $verification_code)
    {
        $this->load->library('email');
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://mail.b-caremadiun.org';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'noreply@b-caremadiun.org';
        $config['smtp_pass'] = '=~-+hg=p,WLt';
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = true;
        $config['newline'] = "\r\n";
        $this->email->initialize($config);

        $this->email->from('noreply@b-caremadiun.org', 'B-Care Madiun');
        $this->email->to($email);
        $this->email->subject('Verify your email address');
        $this->email->message('<p>Follow the link to reset your password.</p>
        <p><a href="https://b-caremadiun.org/verification/reset?code=' . $verification_code . '">https://b-caremadiun.org/verification/reset?code=' . $verification_code . '</a></p>');
        $this->email->send();
    }

    public function reset_password()
    {
        $email = $this->input->post('email');
        //get secret from header
        $secret = $this->input->get_request_header('secret', true);
        //verify secret, if location is verify_email, then ignore secret
        if (!$this->api_model->verify_secret($secret) && $this->uri->segment(2) != 'verify') {
            echo json_encode(array('status' => 'error', 'message' => 'Invalid secret'));
            exit();
        }

        
        $id = $this->user_model->id_by_email($email);

        //if id is not found
        if (!$id) {
            echo json_encode(array('status' => 'error', 'message' => 'Email not found', 'email' => $email));
            exit();
        }

        $verification_code = hash('sha256', mt_rand(10000, 99999));
        $this->reset_model->insert(array('user_id' => $id, 'token' => $verification_code));
        //$this->send_password_reset_email($email, $id, $verification_code);

        echo json_encode(array('status' => 'success', 'message' => 'Password reset email sent', 'code' => $verification_code));
    }

    public function change_password()
    {
        $code = $this->input->post('code');
        $password = $this->input->post('password');

        $id = $this->reset_model->user_id_by_token($code);

        if ($id) {
            $password = password_hash($password, PASSWORD_BCRYPT);
            $this->user_model->update_password($id, $password);
            $this->reset_model->delete_by_token($code);
            echo json_encode(array('status' => 'success', 'message' => 'Password changed'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Invalid code'));
        }
    }

    public function reset()
    {
        $this->load->view('reset_password');
    }
}
