<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News_image_model extends CI_Model
{
  
    public $table = 'tb_news_image';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
    
     // get all
    function get_all()
    {
        $this->db->select('tb_news_image.*,  tb_news.name');
        $this->db->join('tb_news', 'tb_news.newsID = tb_news_image.newsID');
         return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    
     // get data by id
    function get_by_newsID($id)
    {
        $this->db->where('newsID', $id);
        return $this->db->get($this->table)->result();
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