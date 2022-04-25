<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert_user($data)
    {
        $this->db->insert('user', $data);
    }

    public function get_users()
    {
        //where level is 10
        $this->db->where('level', 10);
        $query = $this->db->get('user');
        return $query->result();
    }

    //get user by email
    public function get_user_by_email($email)
    {
        $this->db->where('email', $email);
        //where level is 10
        $this->db->where('level', 0);
        $query = $this->db->get('user');
        return $query->row();
    }

    //get single user by id
    public function get_user_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('user');
        return $query->row();
    }

    public function get_normal_user($email)
    {
        $this->db->where('email', $email);
        //where level is 10
        $this->db->where('level', 10);
        $query = $this->db->get('user');
        return $query->row();
    }

    public function id_by_email($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        $result = $query->row();
        return $result->id;
    }

    public function email_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('user');
        $result = $query->row();
        return $result->email;
    }

    //check if email exist
    public function email_exist($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        if($query->num_rows() > 0)
        {
            return true;
        }
        return false;
    }

    //update name
    public function update_name($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
}

?>