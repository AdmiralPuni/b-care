<?php
defined('BASEPATH') or exit('No direct script access allowed');

class event_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        //set table name
        $this->table = 'event';
        $this->load->database();
    }

    function current_time_iso(){
        return date('Y-m-d H:i:s');
    }

    function insert_event($data){
        $this->db->insert($this->table, $data);
    }

    function get_all_events(){
        $this->db->select('*');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get($this->table);
        $result = $query->result();
        return $result;
    }

    function get_active_event(){
        $this->db->select('*');
        $this->db->where('active', '1');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get($this->table);
        $result = $query->result();
        return $result;
    }

    function change_active_event($id, $active){
        $this->db->set('active', $active);
        $this->db->where('id', $id);
        $this->db->update($this->table);
    }
}

?>