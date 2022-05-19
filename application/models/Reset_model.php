<?php
defined('BASEPATH') or exit('No direct script access allowed');

class reset_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table = 'password_reset';
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function delete_by_token($token)
    {
        $this->db->where('token', $token);
        $this->db->delete($this->table);
    }

    public function delete($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete($this->table);
    }

    public function user_id_by_token($token)
    {
        $this->db->where('token', $token);
        $query = $this->db->get($this->table);
        $result = $query->row();
        return $result->user_id;
    }
}

?>