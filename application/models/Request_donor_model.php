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

    public function switch_status($id, $status){
        $this->db->set('status', $status);
        $this->db->where('id', $id);
        $this->db->update($this->table);
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

    public function get_single($id){
        $this->db->select('*');
        $this->db->from('v_donor');
        $this->db->where('id', $id);
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

    public function get_blood_display_range($start_date, $end_date){
        $this->db->select('*');
        $this->db->from('v_donor');
        $this->db->where('type', 'BLOOD');
        $this->db->where('created >=', $start_date);
        $this->db->where('created <=', $end_date);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_plasma_display(){
        $this->db->select('*');
        $this->db->from('v_donor');
        $this->db->where('type', 'PLASMA');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_plasma_display_range($start_date, $end_date){
        $this->db->select('*');
        $this->db->from('v_donor');
        $this->db->where('type', 'PLASMA');
        $this->db->where('created >=', $start_date);
        $this->db->where('created <=', $end_date);
        $query = $this->db->get();
        return $query->result();
    }

    public function mailservice_list(){
        $this->db->select('*,email');
        $this->db->from('v_donor');
        #distinct to get only one row per user
        $this->db->distinct('user_id');
        #sort by donor_date
        $this->db->order_by('donor_date', 'DESC');
        #get user email from profile table
        $this->db->join('user', 'user.id = v_donor.user_id');


        $query = $this->db->get();
        return $query->result();
    }
}

?>