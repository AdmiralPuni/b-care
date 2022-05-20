<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_donor extends CI_Controller {
    //load sensors model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('request_donor_model');
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

    public function get_simple_blood(){
        $data = $this->request_donor_model->get_blood_display();
        echo json_encode(array('status' => 'success', 'data' => $data), JSON_PRETTY_PRINT);
    }

    public function get_simple_plasma(){
        $data = $this->request_donor_model->get_plasma_display();
        echo json_encode(array('status' => 'success', 'data' => $data), JSON_PRETTY_PRINT);
    }

    public function get_simple_blood_range(){
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');
        $data = $this->request_donor_model->get_blood_display_range($start_date, $end_date);
        echo json_encode(array('status' => 'success', 'data' => $data), JSON_PRETTY_PRINT);
    }

    public function get_simple_plasma_range(){
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');
        $data = $this->request_donor_model->get_plasma_display_range($start_date, $end_date);
        echo json_encode(array('status' => 'success', 'data' => $data), JSON_PRETTY_PRINT);
    }

    //get all blood request items
    public function get_blood()
    {
        $data = $this->request_donor_model->get_blood();
        echo json_encode(array('status' => 'success', 'data' => $data), JSON_PRETTY_PRINT);
    }

    //get all plasma request items
    public function get_plasma()
    {
        $data = $this->request_donor_model->get_plasma();
        echo json_encode(array('status' => 'success', 'data' => $data), JSON_PRETTY_PRINT);
    }

    public function get_both_single(){
        $user_id = $this->input->post('user_id');
        $data = $this->request_donor_model->get_both_single($user_id);
        echo json_encode(array('status' => 'success', 'data' => $data), JSON_PRETTY_PRINT);
    }

    public function new_donor()
    {
        $data = array(
            'user_id' => $this->input->post('user_id'),
            'type' => $this->input->post('type'),
            'form_answers' => $this->input->post('form_answers'),
            'donor_date' => $this->input->post('donor_date'),
            'req' => $this->input->post('req')
        );

        //check for empty fields
        foreach (array_keys($data) as $key) {
            if(empty($data[$key])){
                echo json_encode(array('status' => 'error', 'message' => 'Please fill all fields', 'data' => $data), JSON_PRETTY_PRINT);
                die();
            }
        }

        $this->request_donor_model->insert_request_donor($data);
        echo json_encode(array('status' => 'success', 'message' => 'Request item added', 'data' => $data), JSON_PRETTY_PRINT);
    }



}
