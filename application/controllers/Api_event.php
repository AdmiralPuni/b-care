<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_event extends CI_Controller {
    //load sensors model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('event_model');
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

    function get_active_event(){
        $query = $this->event_model->get_active_event();
        echo json_encode(array('status' => 'success', 'data' => $query), JSON_PRETTY_PRINT);
    }

    function get_all_events(){
        $query = $this->event_model->get_all_events();
        echo json_encode(array('status' => 'success', 'data' => $query), JSON_PRETTY_PRINT);
    }

    function change_active(){
        $id = $this->input->post('id');
        $active = $this->input->post('active');
        $this->event_model->change_active_event($id, $active);
        echo json_encode(array('status' => 'success', 'message' => 'Event ' . $id . ' is now ' . $active));
    }

    function delete_event(){
        $id = $this->input->post('id');
        $this->event_model->delete($id);
        echo json_encode(array('status' => 'success', 'message' => 'Event ' . $id . ' deleted'));
    }

    function insert_event(){
        $data = array(
            'name' => $this->input->post('name'),
            'date_time' => $this->input->post('date_time'),
            'location' => $this->input->post('location'),
            'image' => $this->input->post('image'),
            'active' => '1'
        );

        //check for empty fields
        foreach (array_keys($data) as $key) {
            //ignore image
            if($key == 'image'){
                continue;
            }
            if(empty($data[$key])){
                echo json_encode(array('status' => 'error', 'message' => 'Please fill all fields', 'data' => $data), JSON_PRETTY_PRINT);
                die();
            }
        }

        //upload image to res/uploads/events/
        $config['upload_path'] = './uploads/events/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image'))
        {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode(array('status' => 'error', 'message' => $error['error']));
            die();
        }
        else
        {
            $data['image'] = $this->upload->data('file_name');
            //insert data to session table
            $this->event_model->insert_event($data);
            echo json_encode(array('status' => 'success', 'data' => $data), JSON_PRETTY_PRINT);
        }
    }

}
