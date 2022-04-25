<?php
defined('BASEPATH') or exit('No direct script access allowed');

class profile_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table = 'v_user_profile';
    }

    public function insert_donor($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function get_donors()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function get_donors_simple(){
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function get_single_donor($id)
    {
        $query = $this->db->get_where($this->table, array('user_id' => $id));
        return $query->row();
    }

    public function get_single_donor_simple($id)
    {
        $query = $this->db->get_where($this->table, array('user_id' => $id));
        return $query->row();
    }

    public function update_donor($id, $data)
    {
        $this->db->where('user_id', $id);
        $this->db->update('profile', $data);
    }
}

?>