<?php
defined('BASEPATH') or exit('No direct script access allowed');

class request_item_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table = 'request_item';
    }

    public function insert_request_item($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function get_request_items()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function get_plasma(){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('type', 'PLASMA');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_blood(){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('type', 'BLOOD');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_blood_display(){
        $this->db->select('name, address, phone, blood_type, reason, created');
        $this->db->from($this->table);
        $this->db->where('type', 'BLOOD');
        $query = $this->db->get();
        return $query->result();
    }


    public function get_plasma_display(){
        $this->db->select('name, address, phone, blood_type, reason, created');
        $this->db->from($this->table);
        $this->db->where('type', 'PLASMA');
        $query = $this->db->get();
        return $query->result();
    }
}

?>