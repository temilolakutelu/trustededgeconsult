<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model {

    public $table = 'admin';

    function __construct() {
        parent::__construct();
    }

    // login functioo
    function login($email, $password) {
        $this->db->from($this->table);
        $this->db->where('username', $email);
        $this->db->limit(1);

        $query = $this->db->get();
        if($query){
            if ($query->num_rows() == 1) {
                $vData = $query->row();
                if(password_verify($password, $vData->password)){
                    return $vData;
                }
                else{
                    return false;
                }
            } else {
                return false;
            }
        }
        else {
            return false;
        }
    }
    
    function checkMail($email){
        $this->db->from($this->table);
        $this->db->where('username', $email);
        $this->db->limit(1);

        $query = $this->db->get();
        
        if($query){
            if ($query->num_rows() == 1) {
                return true;
            } else {
                return false;
            }
        }
        else {
            return false;
        }
    }
    
    function reset_user($email, $data){
        $this->db->where('username', $email);
        $query = $this->db->update($this->table, $data);
        return $query;
    }

}
