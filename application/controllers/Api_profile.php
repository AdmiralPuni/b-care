<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_profile extends CI_Controller {
    //load sensors model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('profile_model');
        $this->load->model('user_model');
        $this->load->model('api_model');

        //get secret from header
        $secret = $this->input->get_request_header('secret', TRUE);
        //verify secret
        if (!$this->api_model->verify_secret($secret))
        {
            echo json_encode(array('status' => 'error', 'message' => 'Invalid secret'));
            exit();
        }
    }

    //get all request items
    public function get_donors()
    {
        $data = $this->profile_model->get_donors();
        echo json_encode(array('status' => 'success', 'data' => $data), JSON_PRETTY_PRINT);
    }

    public function get_simple_donors(){
        $data = $this->profile_model->get_donors_simple();
        echo json_encode(array('status' => 'success', 'data' => $data), JSON_PRETTY_PRINT);
    }

    //get single request item
    public function get_single_donor()
    {
        $user_id = $this->input->post('user_id');
        $data = $this->profile_model->get_single_donor($user_id);
        echo json_encode(array('status' => 'success', 'data' => $data), JSON_PRETTY_PRINT);
    }

    public function get_single_donor_simple()
    {
        $id = $this->input->get('id');
        $data = $this->profile_model->get_single_donor_simple($id);
        echo json_encode(array('status' => 'success', 'data' => $data), JSON_PRETTY_PRINT);
    }

    public function new_donor()
    {
        $data = array(
            'user_id' => $this->input->post('user_id'),
            'blood_type' => $this->input->post('blood_type'),
            'nik' => $this->input->post('nik'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'alamat' => $this->input->post('alamat'),
            'domisili' => $this->input->post('domisili'),
            'no_hp' => $this->input->post('no_hp'),
            'no_kartu' => $this->input->post('no_kartu')
        );

        $user_data = $this->user_model->get_user_by_id($data['user_id']);

        //get first letter of each word in name
        $name = explode(' ', $user_data->name);
        $concat_name = '';
        foreach ($name as $n) {
            $concat_name .= $n[0];
        }
        //set to upper case
        $concat_name = strtoupper($concat_name);
        //generate no_kartu
        $card_end_number = $data['user_id'];
        //add zero if number is less than 10000
        if (strlen($card_end_number) < 4) {
            $card_end_number = str_pad($card_end_number, 4, '0', STR_PAD_LEFT);
        }
        $data['no_kartu'] = "3577DG" . $concat_name . $card_end_number;

        //check for empty fields
        foreach (array_keys($data) as $key) {
            if(empty($data[$key])){
                echo json_encode(array('status' => 'error', 'message' => 'Please fill all fields', 'data' => $data), JSON_PRETTY_PRINT);
                die();
            }
        }

        $this->profile_model->insert_donor($data);

        echo json_encode(array('status' => 'success', 'message' => 'Successfully added donor', 'data' => $data), JSON_PRETTY_PRINT);
    }

    public function update_donor()
    {
        $id = $this->input->post('user_id');
        $data = array(
            'blood_type' => $this->input->post('blood_type'),
            'nik' => $this->input->post('nik'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'alamat' => $this->input->post('alamat'),
            'domisili' => $this->input->post('domisili'),
            'no_hp' => $this->input->post('no_hp')
        );
        
        $userdata = array(
            'name' => $this->input->post('name'),
        );

        //check for empty fields
        foreach (array_keys($data) as $key) {
            if(empty($data[$key])){
                echo json_encode(array('status' => 'error', 'message' => 'Please fill all fields', 'data' => $data), JSON_PRETTY_PRINT);
                die();
            }
        }

        //check userdata
        foreach (array_keys($userdata) as $key) {
            if(empty($userdata[$key]) || $userdata[$key] == 'null' || $userdata[$key] == 'undefined' || $userdata[$key] == ''){
                echo json_encode(array('status' => 'error', 'message' => 'Please fill all fields', 'data' => $userdata), JSON_PRETTY_PRINT);
                die();
            }
        }

        $name = explode(' ', $userdata->name);
        $concat_name = '';
        foreach ($name as $n) {
            $concat_name .= $n[0];
        }
        //set to upper case
        $concat_name = strtoupper($concat_name);
        //generate no_kartu
        $card_end_number = $id;
        //add zero if number is less than 10000
        if (strlen($card_end_number) < 4) {
            $card_end_number = str_pad($card_end_number, 4, '0', STR_PAD_LEFT);
        }
        $data['no_kartu'] = "3577DG" . $concat_name . $card_end_number;
        
        $this->user_model->update_name($id, $userdata);
        $this->profile_model->update_donor($id, $data);

        echo json_encode(array('status' => 'success', 'message' => 'Successfully updated donor', 'data' => $data), JSON_PRETTY_PRINT);
    }
}
