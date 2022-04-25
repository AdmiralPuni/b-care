<?php
defined('BASEPATH') or exit('No direct script access allowed');

class request_donor_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table = 'request_donor';
    }

    public function insert_request_donor($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function get_request_donors()
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

    public function get_both_single($user_id){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('user_id', $user_id);
        //order by created
        $this->db->order_by('created', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_blood_display(){
        $this->db->select('*');
        $this->db->from('v_donor');
        $this->db->where('type', 'BLOOD');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_plasma_display(){
        $this->db->select('id, name, donor_date, req, status');
        $this->db->from('v_front_donor');
        $this->db->where('type', 'PLASMA');
        $query = $this->db->get();
        return $query->result();
    }
}

?>