<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class subCategory_model extends CI_Model
{
    
  function add_subcategory($data)
    {
    $this->db->insert('sub_category', $data);      
    }
    
############# Checks if sub category exist #############
      
  function exist_subcategory($name, $id)
    {
    $this->db->where('sub_name', $name); // Produces: WHERE name = 'Joe'
         $this->db->where('category_id', $id);
    $query=$this->db->get('sub_category');
         $query->result_array();
        return $query->result_array(); 
    }

#############Get all sub Categories #############
    function get_subcategory()
    {
         $this->db->select('sub_category.sub_id, sub_category.sub_name, categories.category_name');
        $this->db->from('sub_category');
        $this->db->join('categories', 'sub_category.category_id = categories.category_id');
        $query = $this->db->get(); 
          $query->result_array();
        return $query->result_array();
  }
    
    #############Get a category #############
    function edit_subcategory($id)
    {
        $this->db->where('sub_id', $id);
   $query=$this->db->get('sub_category');
         $query->result_array();
        return $query->result_array(); 
    }

############# Update category #############
     function update_subcategory($id, $data)
    {
       $this->db->where('sub_id', $id);
        $this->db->update('sub_category', $data);
    }
 
############ Delete category #############
  function delete_subcategory($id, $data)
    {   
    $this->db->where('sub_id', $id);
    $this->db->delete('sub_category');
    }
    
}