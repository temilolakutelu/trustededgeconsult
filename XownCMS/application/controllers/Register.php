<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['Register_model', 'Audit_model']);
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {

        $register_data = $this->Register_model->get_all();

        $data = array(
            'title' => 'Registered',
            'register_data' => $register_data,
        );

        $this->template->load('admin', 'register/list', $data);

    }




    public function delete($id)
    {
      //  $this->check_role(); 
        $row = $this->Register_model->get_by_id($id);

        if ($row) {
            $this->Register_model->delete($id);
            $task = 'Deleted a trainee from Register table';
            $this->audit($task);
            $this->session->set_flashdata('message', 'trainee deleted Successfully');
            redirect(site_url('register'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('register'));
        }
    }




    public function audit($task)
    {
        $login = $this->session->userdata('logged_in');
        $user = $login['firstname'] . ' ' . $login['lastname'];
        $data_audit = array(
            'user' => $user,
            'task' => $task,
            'date_time' => date('Y-m-d H:i:s', time()),
        );

        $this->Audit_model->insert($data_audit);
    }
}