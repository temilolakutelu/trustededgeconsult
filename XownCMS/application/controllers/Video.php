<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

	
     function __construct()
    {
        parent::__construct();
        $this->load->model(['Video_model', 'Gallery_category_model', 'Audit_model']);
        $this->load->library(['form_validation', 'upload']);
    }
       
       public function index(){
           $data['gallery_lists']= $this->Video_model->get_all();
            $data['title'] = 'Video';
            $this->template->load('admin', 'video/list', $data);
        }
    
    
    public function create(){

            $data['cat_lists']= $this->Gallery_category_model->get_all();
            $data['title'] = 'Add Video';
            $this->template->load('admin', 'video/add', $data);
        
        }
    
    public function create_action(){
        
                $this->form_validation->set_rules('title', 'Video TDescription', 'required');
                $this->form_validation->set_rules('page_id', 'Gallery Category Page', 'required');
                $this->form_validation->set_rules('reference', 'media web reference', 'trim|required');

                if ($this->form_validation->run() == FALSE)
                {
                     $this->create();
                }
                else
                {
            
                     $ext = substr( strrchr($_FILES['image']['name'], '.'), 1);
                    $new_name = date('Ymd').time().".".$ext;
                $config['file_name']            = $new_name;
                $config['upload_path']          = './images/thumbnail/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1200;
                $config['max_width']            = 2200;
                $config['max_height']           = 1280;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                    
            if ( ! $this->upload->do_upload('image'))
                {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    $this->create(); 
                }
                else
                {
                      $config['image_library'] = 'gd2';
                    $config['source_image'] = './images/thumbnail/'.$new_name;
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = "50%";
                    $config['width']         = 200;
                    $config['height']       = 121;
                    $config['new_image']    ='./images/thumbnail/'.$new_name;

                    $this->load->library('image_lib', $config);
                     $this->image_lib->resize();
                    // $data = array('upload_data' => $this->upload->data());
                     $data = array(
                                'gal_category' => $this->input->post('page_id'),
                                 'url' => $this->input->post('reference'),
                                'title' => $this->input->post('title'),
                                'thumb'=>$new_name,
                                'date_added'=>date('Y-m-d H:i:s',time()),
                               );
                 $this->Video_model->insert($data);
                 $task='Added a video to gallery'; 
                $this->audit($task);
                    $this->session->set_flashdata('success', 'video added successfully');
                     redirect(site_url('video')); 
            }
                
        }
    
}
    
    public function edit($id){
            if(!empty($id)){
              
              if( $data['gallery_details']= $this->Video_model->get_by_id($id)){
                  
                   $data['cat_lists']= $this->Gallery_category_model->get_all();
                   $data['title'] = 'Edit Video gallery';
                    $this->template->load('admin', 'video/edit', $data);   
              }else{
                  $this->session->set_flashdata('error', 'This video does not exist');
                   redirect(site_url('video'));
              }   
          }else{
              
            redirect(site_url('video'));   
          }
        
        }
    
    
     public function edit_action(){
        
               $this->form_validation->set_rules('title', 'Video Title', 'required');
                $this->form_validation->set_rules('page_id', 'Gallery Category Page', 'required');
                
                if ($this->form_validation->run() == FALSE)
                {
                   redirect(site_url('video/edit/'.$this->input->post('id')));      
                }
                else
                {
           
                     $ext = substr( strrchr($_FILES['image']['name'], '.'), 1);
            $new_name = date('Ymd').time().".".$ext;
                $config['file_name']            = $new_name;
                $config['upload_path']          = './images/thumbnail/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1200;
                $config['max_width']            = 2200;
                $config['max_height']           = 1280;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                    
            if ( ! $this->upload->do_upload('image'))
                {
                    $data = array(
                                'gal_category' => $this->input->post('page_id'),
                                 'url' => $this->input->post('reference'),
                                'title' => $this->input->post('title'),
                                'date_added'=>date('Y-m-d H:i:s',time()),  
                                );
                    $this->Video_model->update($this->input->post('id'), $data);
                         $task='Updated a video on Gallery table'; 
                  $this->audit($task);
                    $this->session->set_flashdata('success', 'Gallery video updated successfully');
                     redirect(site_url('video')); 
                }
                else
                {
                     $config['image_library'] = 'gd2';
                    $config['source_image'] = './images/thumbnail/'.$new_name;
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = "50%";
                    $config['width']         = 200;
                    $config['height']       = 121;
                    $config['new_image']    ='./images/thumbnail/'.$new_name;

                    $this->load->library('image_lib', $config);
                     $this->image_lib->resize();
                    // $data = array('upload_data' => $this->upload->data());
                     $data = array(
                               'gal_category' => $this->input->post('page_id'),
                                 'url' => $this->input->post('reference'),
                                'title' => $this->input->post('title'),
                                'thumb'=>$new_name,
                                'date_added'=>date('Y-m-d H:i:s',time()),
                                 );
                 $this->Video_model->update($this->input->post('id'), $data);
                    $task='Updated a video on Gallery table'; 
                  $this->audit($task);
                    $this->session->set_flashdata('success', 'Gallery video updated successfully');
                     redirect(site_url('video')); 
            }
                
        }   
     }
    
       public function delete($id){
            if(!empty($id)){
              
              if( $data['gallery_details']= $this->Video_model->get_by_id($id)){
                   $this->Video_model->delete($id);
                  $task='Deleted a video from Gallery table'; 
                  $this->audit($task);
                  $this->session->set_flashdata('success', 'video gallery successfully deleted');
                   redirect(site_url('video')); 
                        
              }else{
                  $this->session->set_flashdata('error', 'This video gallery does not exist');
                   redirect(site_url('video'));
              }   
          }else{
              
            redirect(site_url('video'));   
          }
        
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