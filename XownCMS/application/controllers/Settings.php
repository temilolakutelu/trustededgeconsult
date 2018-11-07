<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['Setting_model', 'Audit_model']);
        $this->load->library('form_validation');
	$this->load->library('datatables');
    }

    public function index()
    {
      $page_data = $this->Setting_model->get_all();

      $data = array(
        'title' => 'Mail Configuration',
        'set_data' => $page_data,
      );
        $this->template->load('admin', 'settings/form', $data);
    }
    
     public function edit_action()
    {
         $cont=$this->input->post('content');
            $data= array(
                 'host_name' => $this->input->post('host', TRUE),
		          'username' => $this->input->post('name',TRUE),
                'password' => $this->input->post('password',TRUE),
                );
             $id=1;   
            $this->Setting_model->update($id, $data);
            // $task='Updated '. $this->input->post('name',TRUE).' on Blood Group';
           // $this->audit($task);
            $task='Change Mail configuration settings'; 
            $this->audit($task);
            $this->session->set_flashdata('message', 'Mail configuration changed successfully');
            redirect(site_url('settings'));
        
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
