<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tab extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['Tab_model', 'Audit_model']);
        $this->load->library('form_validation');
	$this->load->library('datatables');
    }

    public function index()
    {
      $page_data = $this->Tab_model->get_all();

      $data = array(
        'title' => 'Tabs',
        'tab_data' => $page_data,
      );
        $this->template->load('admin', 'Tab/list', $data);
    }

    public function create()
    {
        
        $data = array(
            'button' => 'Add Tab',
            'title' => 'Tab',
            'action' => site_url('tab/add_action'),
	);
        $this->template->load('admin', 'tab/add', $data);
    }

    public function create_action()
    {
        $this->_rules();

         if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            
             $ext = substr( strrchr($_FILES['image']['name'], '.'), 1);
            $new_name = date('Ymd').time().".".$ext;
                $config['file_name']            = $new_name;
                $config['upload_path']          = './images/tab/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 2200;
                $config['max_height']           = 1280;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
            
            if (!$this->upload->do_upload('image'))
                {
                 $this->create();
                }
                else
                {
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './images/tab/'.$new_name;
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = "50%";
                    $config['width']         = 243;
                    $config['height']       = 179;
                    $config['new_image']    ='./images/tab/'.$new_name;

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();
             $cont=$this->input->post('content');
             $desc=$this->input->post('description');
            $data = array(
		          'tabTitle' => $this->input->post('title',TRUE),
                 'tabSubTitle' => $this->input->post('brief',TRUE),
                 'tabLinkURL' => $this->input->post('reference',TRUE),
                'tabSubContent' => htmlentities($desc),
                 'tabContent' => htmlentities($cont),
                'tabImageURL'=>$new_name,
	    );

            $this->Tab_model->insert($data);
                     $task='Added a new tab to tabs table'; 
            $this->audit($task);
            $this->session->set_flashdata('message', 'Tab added successfully');
            redirect(site_url('tab'));
        }
    }
    }
    
    public function edit($id)
    {
         $row= $this->Tab_model->get_by_id($id);
         if ($row) {
            $data = array(
                'title' => 'Edit Tab',
                'button'=>'Update tab',
                'action' => site_url('tab/edit_action'),
            'id' => $row->tabID,
            'title' => set_value('title',  $row->tabTitle),
             'brief' => set_value('brief',  $row->tabSubTitle),
            'content'=>set_value('content', html_entity_decode($row->tabContent)),
            'description'=>set_value('description', html_entity_decode($row->tabSubContent)),
                'reference'=>set_value('reference', $row->tabLinkURL),
           'image'=>$row->tabImageURL,
		);
            $this->template->load('admin', 'tab/edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tab'));
        }
    }

    public function edit_action()
    {
        $input_id=$this->input->post('id',TRUE);
            
             $ext = substr( strrchr($_FILES['image']['name'], '.'), 1);
            $new_name = date('Ymd').time().".".$ext;
                $config['file_name']            = $new_name;
                $config['upload_path']          = './images/tab/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 2200;
                $config['max_height']           = 1280;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
            
            if (!$this->upload->do_upload('image'))
                {
                    $cont=$this->input->post('content');
             $desc=$this->input->post('description');
            $data = array(
		          'tabTitle' => $this->input->post('title',TRUE),
                 'tabSubTitle' => $this->input->post('brief',TRUE),
                 'tabLinkURL' => $this->input->post('reference',TRUE),
                'tabSubContent' => htmlentities($desc),
                 'tabContent' => htmlentities($cont),
	    );

            $this->Tab_model->update($input_id, $data);
            $task='Updated a tab on Tab table'; 
            $this->audit($task);
            $this->session->set_flashdata('message', 'Tab updated successfully');
            redirect(site_url('tab'));
                }
                else
                {
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './images/tab/'.$new_name;
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = "30%";
                    $config['width']         = 450;
                    $config['height']       = 300;
                    $config['new_image']    ='./images/tab/'.$new_name;

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();
            $cont=$this->input->post('content');
             $desc=$this->input->post('description');
            $data = array(
		          'tabTitle' => $this->input->post('title',TRUE),
                 'tabSubTitle' => $this->input->post('brief',TRUE),
                 'tabLinkURL' => $this->input->post('reference',TRUE),
                'tabSubContent' => htmlentities($desc),
                 'tabContent' => htmlentities($cont),
                'tabImageURL'=>$new_name,
	    );
            $this->Tab_model->update($input_id, $data);
            $task='Updated a tab on Tab table'; 
            $this->audit($task);
            $this->session->set_flashdata('message', 'Tab updated successfully');
            redirect(site_url('tab'));
        }
        
    }

  
    public function delete($id)
    {
      //  $this->check_role(); 
        $row = $this->Tab_model->get_by_id($id);

        if ($row) {
            $this->Tab_model->delete($id);
            // $task='Deleted '.$row->name.' from Blood Group';
           // $this->audit($task);
             $task='Deleted '. $row->tabTitle.' from Tab table'; 
            $this->audit($task);
            $this->session->set_flashdata('message', 'Tab deleted Successfully');
            redirect(site_url('tab'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tab'));
        }
    }
    
     public function _rules()
    {
	$this->form_validation->set_rules('title', 'Tab title', 'trim|required|is_unique[tb_tab.tabTitle]',
        array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'
        ));
         $this->form_validation->set_rules('brief', 'Tab title brief', 'trim|required');
        $this->form_validation->set_rules('description', 'Tab summary', 'trim|required');
         $this->form_validation->set_rules('reference', 'Tab web reference', 'trim|required');
        $this->form_validation->set_rules('content', 'Tab Content', 'trim|required');
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
