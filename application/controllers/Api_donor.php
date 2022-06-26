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

    public function mailservice(){
        $secret = $this->input->get_request_header('secret_mailservice', TRUE);
        //verify secret
        if ($secret != 'd506c9b266a3af81164dc6fe8fd94813'){
            echo json_encode(array('status' => 'error', 'message' => 'Invalid secret'));
            exit();
        }

        echo json_encode(array('status' => 'success', 'message' => 'Valid secret', 'data' => $this->request_donor_model->mailservice_list()));
    }

    public function get_single(){
        $id = $this->input->get('id');
        echo json_encode(array('status' => 'success', 'message' => 'Valid secret', 'data' => $this->request_donor_model->get_single($id)));
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

    public function switch_status(){
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $this->request_donor_model->switch_status($id, $status);
        echo json_encode(array('status' => 'success', 'message' => 'Status changed'), JSON_PRETTY_PRINT);
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
            //ignore req
            if ($key == 'req' || $key == 'form_answers') {
                continue;
            }
            if(empty($data[$key])){
                echo json_encode(array('status' => 'error', 'message' => 'Please fill all fields', 'data' => $data), JSON_PRETTY_PRINT);
                die();
            }
        }

        //if type is plasma upload req
        if ($data['type'] == 'PLASMA') {
            $config['upload_path'] = './uploads/req/';
            //file type is pdf
            $config['allowed_types'] = 'pdf';
            //replace filename with random string
            $config['file_name'] = bin2hex(random_bytes(16));

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('req')) {
                $error = array('error' => $this->upload->display_errors());
                echo json_encode(array('status' => 'error', 'message' => 'Please upload a file', 'data' => $error), JSON_PRETTY_PRINT);
                die();
            } else {
                $data['req'] = $this->upload->data('file_name');
            }
        }

        $this->request_donor_model->insert_request_donor($data);
        echo json_encode(array('status' => 'success', 'message' => 'Request item added', 'data' => $data), JSON_PRETTY_PRINT);
    }
}
