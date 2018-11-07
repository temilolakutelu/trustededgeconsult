<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['Pages_model','Category_model','Audit_model']);
        $this->load->library('form_validation');
	$this->load->library('datatables');
    }

    public function index()
    {
      $page_data = $this->Pages_model->get_all();
        $category_data = $this->Category_model->get_all();
      $data = array(
        'title' => 'Pages',
        'page_data' => $page_data,
          'category_data' => $category_data,
      );
        $this->template->load('admin', 'page/list', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Blood_group_model->json();
    }

   

    public function create()
    {
         $category_data = $this->Category_model->get_all();
        $data = array(
            'button' => 'Create',
            'title' => 'Add new Web Page',
            'action' => site_url('pages/create_action'),
             'category_data' => $category_data,
	);
        $this->template->load('admin', 'page/form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            
            $cont=$this->input->post('content');
            $data= array(
                 'pageMetaData' => $this->input->post('meta_data', TRUE),
		          'pageTitle' => $this->input->post('name',TRUE),
                'pageName' => $this->input->post('name',TRUE),
                'categoryID' => $this->input->post('category_id',TRUE),
                 'shortURL' => $this->input->post('reference',TRUE),
                 'pageContent' => htmlentities($cont),
	    );
            $this->Pages_model->insert($data);
            // $task='Added '. $this->input->post('name',TRUE).' to Blood Group';
            $task='Added '.$this->input->post('name').' to webpage table'; 
            $this->audit($task);
            $this->session->set_flashdata('message', 'New webpage created successfully');
            redirect(site_url('page'));
        }
    }

    public function update($id)
    {
        $row = $this->Pages_model->get_by_id($id);
         $category_data = $this->Category_model->get_all();
        if ($row) {
            $data = array(
                'button' => 'Update',
                'title' => 'Update Page',
                'action' => site_url('pages/update_action'),
        'id' => set_value('id', $row->pageID),
        'name' => set_value('name',  $row->pageTitle),
                 'reference' => set_value('web_reference',  $row->shortURL),
            'content'=>set_value('content', html_entity_decode($row->pageContent)),
            'meta_data'=>set_value('meta_data', $row->pageMetaData),
            'category_data'=> $category_data,
                'page_id'=>$row->categoryID,
		);
            $this->template->load('admin', 'page/edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('page'));
        }
    }

    public function update_action()
    {
         $cont=$this->input->post('content');
            $data= array(
                 'pageMetaData' => $this->input->post('meta_data', TRUE),
		          'pageTitle' => $this->input->post('name',TRUE),
                'pageName' => $this->input->post('name',TRUE),
                'categoryID' => $this->input->post('category_id',TRUE),
                 'shortURL' => $this->input->post('reference',TRUE),
                 'pageContent' => htmlentities($cont),
	    );
            $this->Pages_model->update($this->input->post('id', TRUE), $data);
            // $task='Updated '. $this->input->post('name',TRUE).' on Blood Group';
           // $this->audit($task);
         $task='Updated '.$this->input->post('name').' page on webpage table'; 
            $this->audit($task);
            $this->session->set_flashdata('message', 'Web page updated successfully');
            redirect(site_url('page'));
        
    }

    public function delete($id)
    {
      //  $this->check_role(); 
        $row = $this->Pages_model->get_by_id($id);

        if ($row) {
            $this->Pages_model->delete($id);
            // $task='Deleted '.$row->name.' from Blood Group';
           // $this->audit($task);
             $task='Deleted a page from webpage table'; 
            $this->audit($task);
            $this->session->set_flashdata('message', 'Page deleted Successfully');
            redirect(site_url('page'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('page'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required|is_unique[tb_page_content.pageName]',
        array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'
        ));
    $this->form_validation->set_rules('meta_data', 'meta data', 'trim');
        $this->form_validation->set_rules('content', 'Contents', 'trim|required');
        $this->form_validation->set_rules('reference', 'Web reference', 'trim|required');
	$this->form_validation->set_error_delimiters('<li>', '</li>');
    }
    
     public function audit($task){
        $login=$this->session->userdata('logged_in');
            $user=$login['firstname'].' '.$login['lastname'];
            $data_audit = array(
                'user' => $user,
                'task' => $task,
                'date_time' => date('Y-m-d H:i:s',time()),
		      );
            
            $this->Audit_model->insert($data_audit);
    }
    
}

/* End of file Blood_group.php */
/* Location: ./application/controllers/Blood_group.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-01 14:53:53 */
/* http://harviacode.com */
