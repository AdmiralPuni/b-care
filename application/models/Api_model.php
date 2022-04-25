<?php
defined('BASEPATH') or exit('No direct script access allowed');

class api_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table = 'api';
    }

    public function verify_secret($secret)
    {
        $this->db->where('secret', $secret);
        $query = $this->db->get('api');
        //if secret is found, return true
        if ($query->num_rows() > 0)
        {
            return true;
        }
        //if secret is not found, return false
        else
        {
            return false;
        }
    }
}

?>