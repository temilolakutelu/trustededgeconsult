<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_management extends MY_Controller {

    function __construct() {
       parent::__construct();
        $this->load->model(['Audit_model','Welcome_model', 'Setting_model']);
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }
    
    public function index() {
        $user_data = $this->Welcome_model->get_all();
        $data = array(
            'title' => 'Admin Users',
            'user_data' => $user_data,
        );
        $this->template->load('admin', 'user/list', $data);
        
    }

    public function create() {
       $data = array(
            'title' => 'New users',
           );
        $this->template->load('admin', 'user/form', $data); 
    
        }
    
    public function create_action(){
    
        $this->form_validation->set_rules('first_name', 'Firstname', 'trim|required');
         $this->form_validation->set_rules('last_name', 'Lastname', 'trim|required');
    $this->form_validation->set_rules('role', 'Admin role', 'trim|required');
         $this->form_validation->set_rules('email', 'New password', 'trim|required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
             $email = $this->input->post('email', TRUE);
             $password= uniqid();
            $options = [
            'cost' => 11,
            ];
            
            $host=$this->Setting_model->get_all();
            $message="<p>Please be informed you profile is successfully created on Landmark University Admin System to update the website and maintain other web applications".
				    "<p>Kindly Login with the new details below</p>".
					
				  "<p><strong>Username:</strong> ".$email.
				  "<br><strong>Password:</strong> ". $password.
				  "<br>For any enquries, please contact the administrator".
				  "<br>Thank you.</p>";
             
            $config=Array(
            'mailtype' => 'html',
            'wordwrap' => FALSE,
            'protocol' => 'smtp',
            'smtp_host' => $host->host_name,
            'smtp_port' => 25,
            'smtp_user' => $host->username,
            'smtp_pass' => $host->password,
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );
        
         $this->load->library('email', $config);
        
                    $this->email->from('noreply@lmu.edu.ng', 'LMU Content Management System');
                    $this->email->to($email);
                    $this->email->subject('Admin Registraton');
                    $this->email->message($message);
                    $this->email->set_alt_message('View the mail using an html email client');
                    $this->email->send(); 
            
            $pass= password_hash($password, PASSWORD_BCRYPT, $options);
            $data = array(
            'firstname' => $this->input->post('first_name',TRUE),
            'lastname' => $this->input->post('last_name',TRUE),
            'email' => $this->input->post('email',TRUE),
            'password' =>$pass,
            'date_added' =>date('Y-m-d',time()),
	    );

            $user_id= $this->Welcome_model->insert($data);
            
            $echeck = $this->input->post('privilege',TRUE);
               for($i=0; $i<count($echeck); $i++){
                   $data = array(
                        'user_id' => $user_id,
                        'role_id' => $echeck[$i],
                    );
                  $this->Admin_privileges_model->insert($data); 
            }
            
            
            $task='Added '. $this->input->post('first_name',TRUE).' as admin user';
            $this->audit($task);
            $this->session->set_flashdata('message', 'New admin user successfully added');
            redirect(site_url('user_management'));
        }
    }

    
    public function delete($id){
     if($this->Welcome_model->get_by_id($id)){
         $this->Welcome_model->delete($id);
         $task='Deleted an admin user';
        $this->audit($task);
         $this->session->set_flashdata('message', 'user suceesfully removed from admin');
            redirect(site_url('user_management'));       
    }else{
         $this->session->set_flashdata('error', 'User record does not exist');
           redirect(site_url('user_management'));  
         }
    }
    
    public function update_password(){
       
          $data = array(
            'title' => 'Change Password',
              
        );
        
        $this->template->load('admin', 'user/edit_password', $data);
    }
    
    public function update_password_action(){
         if ($this->session->userdata('logged_in')) {
                 $this->db->db_debug = false;// To disable Dabase error on unique
             $login=$this->session->userdata('logged_in');
        $email=$login['email'];
             
         $this->form_validation->set_rules('old_pass', 'Old password', 'trim|required');
         $this->form_validation->set_rules('new_pass', 'New password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
           $this->update_password();
        } else {
                $oldpassword= $this->input->post('old_pass');
                $newpassword= $this->input->post('new_pass');
             $options = [
            'cost' => 11,
            ];
            $pass= password_hash($newpassword, PASSWORD_BCRYPT, $options);
               $user_data2=array(
                'password' =>$pass,
            );
            if($verify_pass=$this->Welcome_model->login($email, $oldpassword)){
                $this->Welcome_model->reset_user($email, $user_data2);
                $task='Updated password';
                $this->audit($task);
                 $this->session->set_flashdata('message', 'Password changed successfully');
                redirect(site_url('user_management/update_password')); 
                
          }else{
                 $this->session->set_flashdata('error', 'Invalid Password, try again');
              redirect(site_url('user_management/update_password'));   
            }
           
        }
    }else{
          redirect(site_url('welcome'));    
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

/* End of file Provider_type.php */
/* Location: ./application/controllers/Provider_type.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-01 14:54:04 */
/* http://harviacode.com */
