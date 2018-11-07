<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register_model extends CI_Model
{
    // public $table = 'tb_training_category';
    // public $id = 'category_id';
    public $table = 'tb_registered';
    public $id = 'register_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

   
    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }


    // function get_all2()
    // {
    //     $this->db->select("tb_registered.*, tb_training_category.name");
    //     $this->db->join('tb_training_category', 'tb_registered.category_id = tb_training_category.category_id');
    //     $query = $this->db->get($this->table2);
    //     return $query->result();

    // }
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
/* End of file Blood_group_model.php */
/* Location: ./application/models/Blood_group_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-01 14:53:53 */
/* http://harviacode.com */