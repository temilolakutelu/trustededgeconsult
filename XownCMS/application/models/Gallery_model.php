<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery_model extends CI_Model
{
  
    public $table = 'tb_gallery';
    public $id = 'gallery_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
    
     // get all
    function get_all()
    {
        $this->db->select('tb_gallery.*,  tb_gallery_category.name');
        $this->db->join('tb_gallery_category', 'tb_gallery_category.id = tb_gallery.gal_category');
        $this->db->order_by('tb_gallery.gallery_id', 'DESC');
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