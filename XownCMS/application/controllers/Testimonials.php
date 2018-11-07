<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Testimonials extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['Testimonials_model', 'Audit_model']);
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        // $page_data = $this->Testimonials_model->get_all();
        $page_data = $this->Testimonials_model->get_all();

        $data = array(
            'title' => 'Testimonials',
            'testimonial_data' => $page_data,
        );

        $this->template->load('admin', 'testimonials/list', $data);

    }

    public function create()
    {
        $data = array(
            'title' => 'Testimonials',
            'button' => 'Add Testimonial',
        );
        $this->template->load('admin', 'testimonials/form', $data);
    }


    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {

            $cont = $this->input->post('content');
            $data = array(
                'name' => $this->input->post('name', true),
                'position' => $this->input->post('position', true),
                'company' => $this->input->post('company', true),
                'item' => $this->input->post('item', true),
                'content' => htmlentities($cont),
            );
            $this->Testimonials_model->insert($data);
            // $task='Added '. $this->input->post('name',TRUE).' to Blood Group';
            $task = 'Added ' . $this->input->post('name') . ' to webpage table';
            $this->audit($task);
            $this->session->set_flashdata('message', 'Testimonial created successfully');
            redirect(site_url('testimonials'));
        }
    }


    public function edit($id)
    {
        $row = $this->Testimonials_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'title' => 'Update Testimonial',
                'action' => site_url('testimonials/edit_action'),
                'id' => set_value('id', $row->testimonial_id),
                'name' => set_value('name', $row->name),
                'position' => set_value('position', $row->position),
                'company' => set_value('company', $row->company),
                'item' => set_value('item', $row->item),
                'content' => set_value('content', html_entity_decode($row->content)),
            );
            $this->template->load('admin', 'testimonials/edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('testimonials'));
        }
    }

    public function edit_action()
    {
        $cont = $this->input->post('content');
        $data = array(
            'name' => $this->input->post('name', true),
            'position' => $this->input->post('position', true),
            'company' => $this->input->post('company', true),
            'item' => $this->input->post('item', true),
            'content' => htmlentities($cont),
        );
        $this->Testimonials_model->update($this->input->post('id', true), $data);
        // $task='Updated '. $this->input->post('name',TRUE).' on Blood Group';
       // $this->audit($task);
        $task = 'Updated ' . $this->input->post('name') . ' page on webpage table';
        $this->audit($task);
        $this->session->set_flashdata('message', 'Testimonial updated successfully');
        redirect(site_url('testimonials'));
    }

    public function delete($id)
    {
      //  $this->check_role(); 
        $row = $this->Testimonials_model->get_by_id($id);

        if ($row) {
            $this->Testimonials_model->delete($id);
            $task = 'Deleted a testimonial from Testimonials table';
            $this->audit($task);
            $this->session->set_flashdata('message', 'testimonial deleted Successfully');
            redirect(site_url('testimonials'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('testimonials'));
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

    public function _rules()
    {
        $this->form_validation->set_rules(
            'name',
            'name',
            'trim|required'
        );
        $this->form_validation->set_rules('position', 'position', 'trim|required');
        $this->form_validation->set_rules('company', 'Company', 'trim|required');
        $this->form_validation->set_rules('content', 'Contents', 'trim|required');
        $this->form_validation->set_rules('item', 'Item', 'trim|required');
    }

}

/* End of file Blood_group.php */
/* Location: ./application/controllers/Blood_group.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-01 14:53:53 */
/* http://harviacode.com */
