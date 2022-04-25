<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_stock extends CI_Controller {
    //load sensors model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('stock_model');
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

    public function get_blood(){
        $data = $this->stock_model->get_all_stock('BLOOD');
        echo json_encode(array('status' => 'success', 'data' => $data), JSON_PRETTY_PRINT);
    }

    public function update_blood(){
        $data = array(
            'type' => 'BLOOD',
            'blood_type' => $this->input->post('blood_type'),
            'amount' => $this->input->post('amount')
        );

        //check for empty fields
        foreach (array_keys($data) as $key) {
            //ignore amount
            if ($key == 'amount') {
                continue;
            }
            if(empty($data[$key])){
                echo json_encode(array('status' => 'error', 'message' => 'Please fill all fields', 'data' => $data), JSON_PRETTY_PRINT);
                die();
            }
        }

        //update the stock according to blood type
        $this->stock_model->update_stock($data);
        echo json_encode(array('status' => 'success', 'data' => $data), JSON_PRETTY_PRINT);
    }
}
