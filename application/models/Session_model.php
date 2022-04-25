<?php
defined('BASEPATH') or exit('No direct script access allowed');

class session_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        //set table name
        $this->table = 'session';
        $this->load->database();
    }

    function current_time_iso(){
        return date('Y-m-d H:i:s');
    }

    public function get_selected_user()
    {
        //get current session id
        $identifier = $this->session->userdata('identifier');
        //get selected_user_id from session table
        $this->db->select('selected_user_id');
        $this->db->where('identifier', $identifier);
        $query = $this->db->get($this->table);
        $result = $query->row();
        //print the result
        return $result->selected_user_id;
    }

    public function latest_session(){
        //get latest session id
        $this->db->select('selected_user_id');
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get($this->table);
        $result = $query->row();
        return $result->selected_user_id;
    }

    public function insert_session($data){
        $this->load->database();
        //delete all previous session where identifier is is not null
        $this->db->where('identifier IS NOT NULL');
        $this->db->delete($this->table);
        //insert data to session table
        $this->db->insert($this->table, $data);
    }

    public function check($identifier){
        $this->db->select('identifier');
        $this->db->where('identifier', $identifier);
        //where expiry is greater than current time
        $this->db->where('expiry >', $this->current_time_iso());
        $query = $this->db->get($this->table);
        $result = $query->row();
        if(empty($result)){
            return false;
        }
        return true;
    }

    public function burn($identifier){
        $this->db->where('identifier', $identifier);
        $this->db->delete($this->table);
    }
}

?>