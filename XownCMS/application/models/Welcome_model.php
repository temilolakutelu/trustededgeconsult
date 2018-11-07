<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome_model extends CI_Model {

    public $table = 'tb_admin_login';
    public $id = 'adminID';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }
    
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // login functioo
    function login($email, $password) {
        $this->db->from($this->table);
        $this->db->where('email', $email);
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
        $this->db->where('email', $email);
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
        $this->db->where('email', $email);
        $query = $this->db->update($this->table, $data);
        return $query;
    }
    
    //Number of users
    function no_user(){
       return $this->db->count_all_results('tb_visit_stat');
    }
    
    function today_user(){
        //$date = new DateTime("now");
       // $curr_date = $date->format('Y-m-d ');
        $this->db->where('DATE(visitingDate)', date('Y-m-d'));
         return $this->db->count_all_results('tb_visit_stat');
    }
    
     function all_country(){
      
         $this->db->distinct();
        $this->db->select('clientCountry');
         return $this->db->get('tb_visit_stat');
    }
    
     // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    
    }
    
    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}
