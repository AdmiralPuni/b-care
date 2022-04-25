<?php
defined('BASEPATH') or exit('No direct script access allowed');

class stock_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table = 'stock';
    }

    public function update_stock($data)
    {
        //convert type to upper case
        $data['type'] = strtoupper($data['type']);

        //update the stock according to blood type
        $this->db->where('type', $data['type']);
        $this->db->where('blood_type', $data['blood_type']);

        //set the amount
        $this->db->set('amount', $data['amount']);

        //update the stock
        $this->db->update($this->table);
    }

    public function get_all_stock($type){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('type', $type);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_stock($type, $blood_type){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('type', $type);
        $this->db->where('blood_type', $blood_type);
        $query = $this->db->get();
        return $query->result_array();
    }

    
}

?>