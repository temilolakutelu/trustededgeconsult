<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Staff_profile extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['Staff_model', 'Audit_model']);
        $this->load->library('form_validation');
	$this->load->library('datatables');
    }

    public function index()
    {
        $page_data = $this->Staff_model->get_all();
       
      $data = array(
        'title' => 'News',
        'staff_data' => $page_data,
      );
        $this->template->load('admin', 'staff/list', $data);
    }

    public function create()
    {
         $dept = $this->Staff_model->dept_all();
        $data = array(
            'button' => 'Add staff',
            'title' => 'Staffs',
            'action' => site_url('staff/create_action'),
            'dept' => $dept,
	      );
        $this->template->load('admin', 'staff/add', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            
            if($_FILES['image']['size'] > 0){
                
                $ext = substr( strrchr($_FILES['image']['name'], '.'), 1);
                $new_name = date('Ymd').time().".".$ext;
                $config['file_name']            = $new_name;
                $config['upload_path']          = './images/picture/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 2200;
                $config['max_height']           = 1280;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                 if(!$this->upload->do_upload('image'))
                {
                 $this->create();
                }
                else
                {
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './images/picture/'.$new_name;
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = "50%";
                    $config['width']         = 200;
                    $config['height']       = 200;
                    $config['new_image']    ='./images/picture/'.$new_name;

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();
                
               if($_FILES['pdf']['size'] > 0){
                     
                $ext = substr( strrchr($_FILES['pdf']['name'], '.'), 1);
                $new_name2 = date('Ymd').time().".".$ext;
                $config['file_name']            = $new_name2;
                $config['upload_path']          = './cv/';
                $config['allowed_types']        = 'pdf';
                $config['max_size']             = 5000;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
            
            if (!$this->upload->do_upload('pdf'))
                {
                 $this->create();
                }
                else
                {
                    $bio=$this->input->post('biography');
                     $pub=$this->input->post('public');
                     $res=$this->input->post('research');
                     $con=$this->input->post('conference');
                     $cou=$this->input->post('course');
                     $qua=$this->input->post('qualification');
                    
            $data = array(
		          'TITLE' => $this->input->post('title',TRUE),
                 'dept_id' => $this->input->post('dept',TRUE),
                 'FULLNAME' => $this->input->post('name',TRUE),
                'BIOGRAPHY' => htmlentities($bio),
                 'PUBLICATION' => htmlentities($pub),
                 'RESEARCH_EMPHASIS' => htmlentities($res),
                 'CONFERENCE' => htmlentities($con),
                 'COURSES' => htmlentities($cou),
                 'PROFESSIONAL_QUALIFICATION' => htmlentities($qua),
                'PICTURE'=>$new_name,
                'CV'=>$new_name2,
               'email' => $this->input->post('email',TRUE),
                'facebook' => $this->input->post('fbook',TRUE),
                'linkedin' => $this->input->post('link',TRUE),
                'google_plus' => $this->input->post('gplus',TRUE),     
	    );
                 $this->Staff_model->insert($data);
                     $task='Added a staff to staffs table'; 
                    $this->audit($task);
            $this->session->set_flashdata('message', 'New staff added successfully');
            redirect(site_url('staff_profile'));    
            
                }
                 
                 }

        }
    }
                
    }
    }
    
    public function edit($id)
    {
         $row= $this->Staff_model->get_by_id($id);
         $dept = $this->Staff_model->dept_all();
        if ($row) {
            $data = array(
                'title' => 'Edit Staff',
                'button'=>'Update Staff',
                'action' => site_url('staff/edit_action'),
            'id' => $row->PROFILE_ID,
            'title' => $row->TITLE,
             'name' =>  $row->FULLNAME,
                'dept_id' => $row->dept_id,
                'email' => $row->EMAIL,
                'fbook' => $row->facebook,
                'link' => $row->linkedin,
                'gplus' => $row->google_plus,
            'biography'=> html_entity_decode($row->BIOGRAPHY),
                'course'=> html_entity_decode($row->COURSES),
                'public'=> html_entity_decode($row->PUBLICATION),
                'conference'=> html_entity_decode($row->CONFERENCE),
                'research'=> html_entity_decode($row->RESEARCH_EMPHASIS),
                'qualification'=> html_entity_decode($row->PROFESSIONAL_QUALIFICATION),
            'image'=>$row->PICTURE,
                'pdf'=>$row->CV,
                'dept' => $dept,
		);
            $this->template->load('admin', 'staff/edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('staff_profile'));
        }
    }

    public function edit_action()
    {
        $input_id=$this->input->post('id',TRUE);
           $new_name=$this->input->post('img_id',TRUE);
            $new_name2=$this->input->post('cv_id',TRUE);
             if($_FILES['image']['size'] > 0){
                 
                 $ext = substr( strrchr($_FILES['image']['name'], '.'), 1);
                $new_name = date('Ymd').time().".".$ext;
                $config['file_name']            = $new_name;
                $config['upload_path']          = './images/picture/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 2200;
                $config['max_height']           = 1280;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                 
                 $config['image_library'] = 'gd2';
                    $config['source_image'] = './images/picture/'.$new_name;
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = "50%";
                    $config['width']         = 200;
                    $config['height']       = 200;
                    $config['new_image']    ='./images/picture/'.$new_name;

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();
             }
                 
            if($_FILES['pdf'][size] > 0 ){
                      
                $ext = substr( strrchr($_FILES['pdf']['name'], '.'), 1);
                $new_name2 = date('Ymd').time().".".$ext;
                $config['file_name']            = $new_name2;
                $config['upload_path']          = './cv/';
                $config['allowed_types']        = 'pdf';
                $config['max_size']             = 5000;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);     
            }
        
                 $bio=$this->input->post('biography');
                     $pub=$this->input->post('public');
                     $res=$this->input->post('research');
                     $con=$this->input->post('conference');
                     $cou=$this->input->post('course');
                     $qua=$this->input->post('qualification');
                    
            $data = array(
		          'TITLE' => $this->input->post('title',TRUE),
                 'dept_id' => $this->input->post('dept',TRUE),
                 'FULLNAME' => $this->input->post('name',TRUE),
                'BIOGRAPHY' => htmlentities($bio),
                 'PUBLICATION' => htmlentities($pub),
                 'RESEARCH_EMPHASIS' => htmlentities($res),
                 'CONFERENCE' => htmlentities($con),
                 'COURSES' => htmlentities($cou),
                 'PROFESSIONAL_QUALIFICATION' => htmlentities($qua),
                'PICTURE'=>$new_name,
                'CV'=>$new_name2,
               'email' => $this->input->post('email',TRUE),
                'facebook' => $this->input->post('fbook',TRUE),
                'linkedin' => $this->input->post('link',TRUE),
                'google_plus' => $this->input->post('gplus',TRUE),     
	    );
                  $this->Staff_model->update($input_id, $data);
                     $task='Updated a staff on news table'; 
            $this->audit($task);
            $this->session->set_flashdata('message', 'Staff updated successfully');
            redirect(site_url('staff_profile'));  
           
    }

    public function delete($id)
    {
      //  $this->check_role(); 
        $row = $this->Staff_model->get_by_id($id);

        if ($row) {
            $this->Staff_model->delete($id);
         $task='Deleted a staff from staffs table'; 
            $this->audit($task);
            $this->session->set_flashdata('message', 'staff deleted Successfully');
            redirect(site_url('staff_profile'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('staff_profile'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('title', 'Staff title', 'trim|required');
         $this->form_validation->set_rules('name', 'Staff name', 'trim|required');
        $this->form_validation->set_rules('dept', 'Staffs Department', 'trim|required');
         $this->form_validation->set_rules('email', 'Staffs email', 'trim|required|valid_email');
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

