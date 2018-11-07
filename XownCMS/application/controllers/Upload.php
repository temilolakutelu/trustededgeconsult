<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Upload_model', 'Audit_model']);
        $this->load->library(['form_validation', 'upload']);
    }

    public function index()
    {
        $data['Upload_lists'] = $this->Upload_model->get_all();
        $data['title'] = 'Upload';
        $this->template->load('admin', 'upload/list', $data);
    }


    public function create()
    {

        $data['title'] = 'Add File';
        $this->template->load('admin', 'upload/add', $data);

    }

    public function create_action()
    {

        $this->form_validation->set_rules('name', 'Filename', 'required');

        if ($this->form_validation->run() == false) {
            $this->add_Upload();
        } else {

            $ext = substr(strrchr($_FILES['file']['name'], '.'), 1);
            $new_name = date('Ymd') . time() . "." . $ext;
            $config['file_name'] = $new_name;
            $config['upload_path'] = '../documents/';
            $config['allowed_types'] = 'pdf|doc';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                $this->create();
            } else {

                $config['source_file'] = '../documents/' . $new_name;
                $config['new_file'] = '../documents/' . $new_name;

                $data = array('upload_data' => $this->upload->data());
                $data = array(
                    'filename' => $this->input->post('name'),
                    'url' => "www.trustededgeconsult.com/documents/" . $new_name,
                    'date' => date('Y-m-d H:i:s', time()),
                );
                $this->Upload_model->insert($data);
                $task = 'Added a file to Upload table';
                $this->audit($task);
                $this->session->set_flashdata('success', 'File added successfully');
                redirect(site_url('upload'));
            }

        }

    }

    public function edit($id)
    {
        if (!empty($id)) {

            if ($data['Upload_details'] = $this->Upload_model->get_by_id($id)) {


                $data['title'] = 'Edit Upload';
                $this->template->load('admin', 'upload/edit', $data);
            } else {
                $this->session->set_flashdata('error', 'This File does not exist');
                redirect(site_url('upload'));
            }
        } else {

            redirect(site_url('upload'));
        }

    }


    public function edit_action()
    {

        $this->form_validation->set_rules('name', 'Filename', 'required');

        if ($this->form_validation->run() == false) {
            redirect(site_url('upload/edit/' . $this->input->post('id')));
        } else {

            $ext = substr(strrchr($_FILES['file']['name'], '.'), 1);
            $new_name = date('Ymd') . time() . "." . $ext;
            $config['file_name'] = $new_name;
            $config['upload_path'] = '../documents/';
            $config['allowed_types'] = 'pdf|doc';


            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                $this->create();
            } else {

                $config['source_file'] = '../documents/' . $new_name;
                $config['new_file'] = '../documents/' . $new_name;

                $data = array('upload_data' => $this->upload->data());
                $data = array(
                    'filename' => $this->input->post('name'),
                    'url' => $new_name,
                    'date' => date('Y-m-d H:i:s', time()),
                );
                $this->Upload_model->insert($data);
                $task = 'Added a file to Upload table';
                $this->audit($task);
                $this->session->set_flashdata('success', 'File added successfully');
                redirect(site_url('upload'));
            }


        }
    }

    public function delete($id)
    {
        if (!empty($id)) {

            if ($data['Upload_details'] = $this->Upload_model->get_by_id($id)) {
                $this->Upload_model->delete($id);
                $task = 'Deleted a file from Upload table';
                $this->audit($task);
                $this->session->set_flashdata('success', 'Upload successfully deleted');
                redirect(site_url('upload'));

            } else {
                $this->session->set_flashdata('error', 'This Upload does not exist');
                redirect(site_url('upload'));
            }
        } else {

            redirect(site_url('upload'));
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