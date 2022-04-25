<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_request extends CI_Controller {
    //load sensors model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('request_item_model');
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
        $data = $this->request_item_model->get_blood_display();
        echo json_encode(array('status' => 'success', 'data' => $data), JSON_PRETTY_PRINT);
    }

    public function get_simple_plasma(){
        $data = $this->request_item_model->get_plasma_display();
        echo json_encode(array('status' => 'success', 'data' => $data), JSON_PRETTY_PRINT);
    }

    //get all plasma request items
    public function get_plasma()
    {
        $query = $this->request_item_model->get_plasma();
        echo json_encode(array('status' => 'success', 'data' => $query), JSON_PRETTY_PRINT);
    }

    //get all blood request items
    public function get_blood()
    {
        $query = $this->request_item_model->get_blood();
        echo json_encode(array('status' => 'success', 'data' => $query), JSON_PRETTY_PRINT);
    }

    public function new_request_item()
    {
        $data = array(
            'type' => $this->input->post('type'),
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'blood_type' => $this->input->post('blood_type'),
            'reason' => $this->input->post('reason'),
        );

        //check for empty fields
        foreach (array_keys($data) as $key) {
            if(empty($data[$key])){
                echo json_encode(array('status' => 'error', 'message' => 'Please fill all fields', 'data' => $data), JSON_PRETTY_PRINT);
                die();
            }
        }

        $this->request_item_model->insert_request_item($data);
        echo json_encode(array('status' => 'success', 'message' => 'Request item added', 'data' => $data), JSON_PRETTY_PRINT);
    }

    
}
