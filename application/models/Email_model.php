<?php
defined('BASEPATH') or exit('No direct script access allowed');

class email_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        //set table name
        $this->table = 'email_verification';
        $this->load->database();
    }

    function current_time_iso(){
        return date('Y-m-d H:i:s');
    }

    function insert_verification($data){
        $this->db->insert($this->table, $data);
    }

    function get_user_verification($id){
        $this->db->select('*');
        $this->db->where('user_id', $id);
        $query = $this->db->get($this->table);
        $result = $query->result();
        return $result;
    }

    //get user verification but only return the verification status
    function get_user_verification_status($id){
        $this->db->select('*');
        $this->db->where('user_id', $id);
        $this->db->where('verified', 1);
        $query = $this->db->get($this->table);
        $result = $query->result();

        //if there is no result, return false
        if(empty($result)){
            return false;
        }
        else{
            //if verification status is 1, return true
            if ($result[0]->verified == 1) {
                return true;
            }
            else{
                return false;
            }
        }
    }

    function update_last_sent($id){
        $this->db->set('last_send', $this->current_time_iso());
        $this->db->where('user_id', $id);
        $this->db->update($this->table);
    }

    function finish_verification($temp_code){
        $this->db->set('verified', 1);
        $this->db->where('temp_code', $temp_code);
        $this->db->update($this->table);
        //set code to null
        $this->db->set('temp_code', null);
        $this->db->where('temp_code', $temp_code);
        $this->db->update($this->table);
    }

    //if last send time is more than more than 1 minute return true
    function is_time_to_send($id){
        $this->db->select('last_send');
        $this->db->where('user_id', $id);
        $query = $this->db->get($this->table);
        $result = $query->row();
        $last_sent = $result->last_send;
        $current_time = $this->current_time_iso();
        $diff = strtotime($current_time) - strtotime($last_sent);
        if($diff > 60){
            return true;
        }
        return false;
    }
}

?>