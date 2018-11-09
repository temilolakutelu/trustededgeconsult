<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Post_job extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['Post_model', 'Audit_model']);
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $post_data = $this->Post_model->get_all();

        $data = array(
            'title' => 'Posts',
            'post_data' => $post_data
        );
        $this->template->load('admin', 'post_job/list', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Blood_group_model->json();
    }


    public function create()
    {

        $data = array(
            'button' => 'Create',
            'title' => 'Add new Web Page',
            'action' => site_url('post_job/create_action'),
        );
        $this->template->load('admin', 'post_job/form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {

            $data = array(
                'email' => $this->input->post('email', true),
                'title' => $this->input->post('title', true),
                'description' => $this->input->post('description', true),
                'url' => $this->input->post('url', true),
                'name' => $this->input->post('name', true),
                'website' => $this->input->post('website', true),
                'tagline' => $this->input->post('tagline', true),
                'twitter_name' => $this->input->post('twitter_name', true),
                'video' => $this->input->post('video', true),
                'date' => $this->input->post('date', true)

            );
            $this->Post_model->insert($data);

            $task = 'Added ' . $this->input->post('video') . ' to webpage table';
            $this->audit($task);
            $this->session->set_flashdata('success', 'logo added successfully');
            redirect(site_url('post_job'));
        }
    }

    public function update($id)
    {
        $row = $this->Post_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'title' => 'Update Posted Job',
                'action' => site_url('post_job/update_action'),
                'id' => set_value('id', $row->post_id),
                'email' => set_value('email', $row->email),
                'title' => set_value('title', $row->title),
                'url' => set_value('url', $row->url),
                'name' => set_value('name', $row->name),
                'website' => set_value('website', $row->website),
                'tagline' => set_value('tagline', $row->tagline),
                'twitter_name' => set_value('twitter_name', $row->twitter_name),
                'video' => set_value('video', $row->video),
                'post_id' => $row->post_id,
                'date' => set_value('date', $row->date),
            );
            $this->template->load('admin', 'post_job/edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('post_job'));
        }
    }

    public function update_action()
    {

        $data = array(
            'email' => $this->input->post('email', true),
            'title' => $this->input->post('title', true),
            'description' => $this->input->post('description', true),
            'url' => $this->input->post('url', true),
            'name' => $this->input->post('name', true),
            'website' => $this->input->post('website', true),
            'tagline' => $this->input->post('tagline', true),
            'twitter_name' => $this->input->post('twitter_name', true),
            'video' => $this->input->post('video', true),
            'date' => $this->input->post('date', true)
        );
        $this->Post_model->update($this->input->post('id', true), $data);
            // $task='Updated '. $this->input->post('name',TRUE).' on Blood Group';
           // $this->audit($task);
        $task = 'Updated ' . $this->input->post('name') . ' page on webpage table';
        $this->audit($task);
        $this->session->set_flashdata('message', 'Web page updated successfully');
        redirect(site_url('post_job'));

    }

    public function delete($id)
    {
      //  $this->check_role(); 
        $row = $this->Post_model->get_by_id($id);

        if ($row) {
            $this->Post_model->delete($id);
            // $task='Deleted '.$row->name.' from Blood Group';
           // $this->audit($task);
            $task = 'Deleted a page from webpage table';
            $this->audit($task);
            $this->session->set_flashdata('message', 'Job deleted Successfully');
            redirect(site_url('post_job'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('post_job'));
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('title', 'Job Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('url', 'URL', 'trim|required');
        $this->form_validation->set_rules('name', 'company name', 'trim|required');
        $this->form_validation->set_rules('website', 'website', 'trim|required');
        $this->form_validation->set_rules('tagline', 'Tagline', 'trim|required');
        $this->form_validation->set_rules('twitter_name', 'Username', 'trim');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_error_delimiters('<li>', '</li>');
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

/* End of file Blood_group.php */
/* Location: ./application/controllers/Blood_group.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-01 14:53:53 */
/* http://harviacode.com */
