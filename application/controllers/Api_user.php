<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_user extends CI_Controller
{
    //load sensors model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('session_model');
        $this->load->model('email_model');
        $this->load->model('api_model');

        //get whole location from url
        $this->location = $this->uri->segment(1) . '/' . $this->uri->segment(2);

        //if location is reset ignore secret key
        if ($this->location != 'verification/reset') {
            //get secret from header
            $secret = $this->input->get_request_header('secret', true);
            //verify secret, if location is verify_email, then ignore secret
            if (!$this->api_model->verify_secret($secret) && $this->uri->segment(2) != 'verify') {
                echo json_encode(array('status' => 'error', 'message' => 'Invalid secret'));
                exit();
            }

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
    }

    public function send_verification_email($email, $id, $verification_code)
    {

        $this->email->from('noreply@b-caremadiun.org', 'B-Care Madiun');
        $this->email->to($email);
        $this->email->subject('Verify your email address');
        $this->email->message('<p>Thank you for signing up! Please click the link below to verify your email address.</p>
        <p><a href="https://b-caremadiun.org/verification/verify?code=' . $verification_code . '">https://b-caremadiun.org/verification/verify?code=' . $verification_code . '</a></p>');
        $this->email->send();
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
        //delete previous reset request
        $this->reset_model->delete($id);
        $this->reset_model->insert(array('user_id' => $id, 'token' => $verification_code));
        $this->send_password_reset_email($input_email, $id, $verification_code);

        echo json_encode(array('status' => 'success', 'message' => 'Password reset email sent', 'code' => $verification_code, 'email' => $input_email), JSON_PRETTY_PRINT);
    }

    public function change_password()
    {
        $code = $this->input->post('code');
        $password = $this->input->post('password');

        $id = $this->email_model->user_id_from_code($code);

        if ($id) {
            $password = password_hash($password, PASSWORD_BCRYPT);
            $this->user_model->update_password($id, $password);
            $this->email_model->delete_from_code($code);
            echo json_encode(array('status' => 'success', 'message' => 'Password changed'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Invalid code'));
        }
    }

    public function reset()
    {
        $this->load->view('reset_password');
    }

    //register new user
    public function register()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level'),
        );

        foreach (array_keys($data) as $key) {
            if (empty($data[$key])) {
                echo json_encode(array('status' => 'error', 'message' => 'Please fill all fields', 'data' => $data));
                die();
            }
        }

        //if email exist return error
        if ($this->user_model->email_exist($data['email'])) {
            echo json_encode(array('status' => 'error', 'message' => 'Email already exist'));
            die();
        }

        //encrypt password with bcrypt
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        $this->user_model->insert_user($data);

        if ($data['level'] == '10') {
            $verification_code = hash('sha256', mt_rand(10000, 99999));

            $id = $this->user_model->id_by_email($data['email']);
            //insert verification
            $this->email_model->insert_verification(array('user_id' => $id, 'temp_code' => $verification_code));
            $this->send_verification_email($data['email'], $id, $verification_code);
        }

        echo json_encode(array('status' => 'success', 'id' => $this->user_model->id_by_email($data['email'])));
    }

    public function verify_email()
    {
        $temp_code = $this->input->get('code');
        $this->email_model->finish_verification($temp_code);

        echo "Email verified, please return to the app";
    }

    public function resend_email()
    {
        $id = $this->input->post('user_id');

        //if id is empty return error
        if (empty($id)) {
            echo json_encode(array('status' => 'error', 'message' => 'User id is empty'));
            die();
        }

        $email = $this->user_model->email_by_id($id);
        $verification_code = hash('sha256', mt_rand(10000, 99999));

        if ($this->email_model->get_user_verification_status($id) == "1") {
            //already verified
            echo json_encode(array('status' => 'error', 'message' => 'Email already verified'));
        } else {

            if ($this->email_model->is_time_to_send($id)) {
                $this->send_verification_email($email, $id, $verification_code);
                $this->email_model->update_temp_code($id, $verification_code)
                echo json_encode(array('status' => 'success', 'message' => 'Email sent'));
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Waiting...'));
            }
        }
    }

    public function verification_status()
    {
        $id = $this->input->post('user_id');

        //if id is empty return error
        if (empty($id)) {
            echo json_encode(array('status' => 'error', 'message' => 'User id is empty'));
            die();
        }

        $status = $this->email_model->get_user_verification($id);

        echo json_encode(array('status' => 'success', 'data' => $status));
    }

    //verify user
    public function verify_admin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->user_model->get_user_by_email($email);

        //if user not found
        if (empty($user)) {
            echo json_encode(array('status' => 'error', 'message' => 'User not found'));
            die();
        }

        //if password is wrong
        if (!password_verify($password, $user->password)) {
            echo json_encode(array('status' => 'error', 'message' => 'Wrong password or email'));
            die();
        }

        //generate random identifier
        $identifier = md5(uniqid(rand(), true));
        //insert identifier to session table
        $data = array(
            'user_id' => $user->id,
            'identifier' => $identifier,
            'expiry' => date('Y-m-d H:i:s', time() + 60 * 60 * 24 * 30),
        );
        $this->session_model->insert_session($data);
        //set session
        $this->session->set_userdata('identifier', $identifier);

        //return success
        echo json_encode(array('status' => 'success', 'identifier' => $identifier, 'id' => $user->id));
    }

    //verify user
    public function verify()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->user_model->get_normal_user($email);

        //if user not found
        if (empty($user)) {
            echo json_encode(array('status' => 'error', 'message' => 'User not found'));
            die();
        }

        //if password is wrong
        if (!password_verify($password, $user->password)) {
            echo json_encode(array('status' => 'error', 'message' => 'Wrong password or email'));
            die();
        }

        //check for verification status
        $verification = $this->email_model->get_user_verification_status($user->id);

        if ($verification == false) {
            echo json_encode(array('status' => 'error', 'message' => 'User not verified'));
            die();
        }

        //generate random identifier
        $identifier = md5(uniqid(rand(), true));
        //insert identifier to session table
        $data = array(
            'user_id' => $user->id,
            'identifier' => $identifier,
            'expiry' => date('Y-m-d H:i:s', time() + 60 * 60 * 24 * 30),
        );
        $this->session_model->insert_session($data);
        //set session
        $this->session->set_userdata('identifier', $identifier);

        //return success
        echo json_encode(array('status' => 'success', 'identifier' => $identifier, 'id' => $user->id));
    }
}
