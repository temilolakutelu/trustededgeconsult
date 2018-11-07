<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class video_model extends CI_Model
{
  
    public $table = 'tb_youtube';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
    
     // get all
    function get_all()
    {
        return $this->db->get($this->table)->result();
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
         return $this->db->insert_id();
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