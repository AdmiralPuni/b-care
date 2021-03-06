<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
        $this->load->library('email');

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://mail.b-caremadiun.org';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'noreply@b-caremadiun.org';
        $config['smtp_pass'] = 'COPPERANDHOLD1234';
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = true;
        $config['newline'] = "\r\n";
        $this->email->initialize($config);
    }

    public function send_password_reset_email($email, $id, $verification_code)
    {
        $this->email->from('noreply@b-caremadiun.org', 'B-Care Madiun');
        $this->email->to($email);
        $this->email->subject('Verify your email address');
        $this->email->message('<p>Follow the link to reset your password.</p>
        <p><a href="https://b-caremadiun.org/verification/reset?code=' . $verification_code . '">https://b-caremadiun.org/verification/reset?code=' . $verification_code . '</a></p>');
        $this->email->send();
    }

    public function reset_password()
    {

        $input_email = $this->input->post('email');

        $id = $this->user_model->id_by_email($input_email);

        //if id is not found
        if (!$id) {
            echo json_encode(array('status' => 'error', 'message' => 'Email not found', 'email' => $input_email));
            die();
        }

        $verification_code = hash('sha256', mt_rand(10000, 99999));
        $this->reset_model->insert(array('user_id' => $id, 'token' => $verification_code));
        $this->send_password_reset_email($input_email, $id, $verification_code);

        $reponse_data = array(
            'message' => 'Email sent',
            'email' => $input_email
        );

        echo json_encode(array('status' => 'success', 'message' => 'Password reset email sent', 'code' => $verification_code, 'email' => $input_email), JSON_PRETTY_PRINT);
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
