<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Photos extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model(['Gallery_model', 'Gallery_category_model', 'Audit_model']);
        $this->load->library(['form_validation', 'upload']);
    }

    public function index()
    {
        $data['gallery_lists'] = $this->Gallery_model->get_all();
        $data['title'] = 'gallery';
        $this->template->load('admin', 'gallery/list', $data);
    }


    public function create()
    {

        $data['cat_lists'] = $this->Gallery_category_model->get_all();
        $data['title'] = 'Add gallery';
        $this->template->load('admin', 'gallery/add', $data);

    }

    public function create_action()
    {

        $this->form_validation->set_rules('title', 'Gallery Title', 'required');
        $this->form_validation->set_rules('page_id', 'Gallery Category Page', 'required');

        if ($this->form_validation->run() == false) {
            $this->add_gallery();
        } else {

            $ext = substr(strrchr($_FILES['image']['name'], '.'), 1);
            $new_name = date('Ymd') . time() . "." . $ext;
            $config['file_name'] = $new_name;
            $config['upload_path'] = './images/picture/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1200;
            $config['max_width'] = 2200;
            $config['max_height'] = 1280;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                $this->create();
            } else {
                $config['image_library'] = 'gd2';
                $config['source_image'] = './images/picture/' . $new_name;
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = false;
                $config['quality'] = "50%";
                $config['width'] = 1200;
                $config['height'] = 400;
                $config['new_image'] = './images/picture/' . $new_name;

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $data = array('upload_data' => $this->upload->data());
                $data = array(
                    'gal_category' => $this->input->post('page_id'),
                    'gal_title' => $this->input->post('title'),
                    'path' => $new_name,
                    'date_added' => date('Y-m-d H:i:s', time()),
                );
                $this->Gallery_model->insert($data);
                $task = 'Added a photo to gallery table';
                $this->audit($task);
                $this->session->set_flashdata('success', 'Photo added successfully');
                redirect(site_url('photos'));
            }

        }

    }

    public function edit($id)
    {
        if (!empty($id)) {

            if ($data['gallery_details'] = $this->Gallery_model->get_by_id($id)) {

                $data['cat_lists'] = $this->Gallery_category_model->get_all();
                $data['title'] = 'Edit gallery';
                $this->template->load('admin', 'gallery/edit', $data);
            } else {
                $this->session->set_flashdata('error', 'This Gallery does not exist');
                redirect(site_url('photos'));
            }
        } else {

            redirect(site_url('photos'));
        }

    }


    public function edit_action()
    {

        $this->form_validation->set_rules('title', 'Gallery Title', 'required');
        $this->form_validation->set_rules('page_id', 'Gallery Category Page', 'required');

        if ($this->form_validation->run() == false) {
            redirect(site_url('photos/edit/' . $this->input->post('id')));
        } else {

            $ext = substr(strrchr($_FILES['image']['name'], '.'), 1);
            $new_name = date('Ymd') . time() . "." . $ext;
            $config['file_name'] = $new_name;
            $config['upload_path'] = './images/picture/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1200;
            $config['max_width'] = 2200;
            $config['max_height'] = 1280;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {
                $data = array(
                    'gallery_head' => $this->input->post('page_id'),
                    'gal_title' => $this->input->post('title'),
                    'date_added' => date('Y-m-d H:i:s', time()),
                );
                $this->Gallery_model->update($this->input->post('id'), $data);
                $task = 'Updated a photo on Gallery table';
                $this->audit($task);
                $this->session->set_flashdata('success', 'Gallery photo updated successfully');
                redirect(site_url('photos'));
            } else {
                $config['image_library'] = 'gd2';
                $config['source_image'] = './images/picture/' . $new_name;
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = false;
                $config['quality'] = "50%";
                $config['width'] = 1200;
                $config['height'] = 400;
                $config['new_image'] = './images/picture/' . $new_name;

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                    // $data = array('upload_data' => $this->upload->data());
                $data = array(
                    'gallery_head' => $this->input->post('page_id'),
                    'gal_title' => $this->input->post('title'),
                    'path' => $new_name,
                    'date_added' => date('Y-m-d H:i:s', time()),
                );
                $this->Gallery_model->update($this->input->post('id'), $data);
                $task = 'Updated a photo on Gallery table';
                $this->audit($task);
                $this->session->set_flashdata('success', 'Gallery photo updated successfully');
                redirect(site_url('photos'));
            }

        }
    }

    public function delete($id)
    {
        if (!empty($id)) {

            if ($data['gallery_details'] = $this->Gallery_model->get_by_id($id)) {
                $this->Gallery_model->delete($id);
                $task = 'Deleted a photo from Gallery table';
                $this->audit($task);
                $this->session->set_flashdata('success', 'Gallery successfully deleted');
                redirect(site_url('photos'));

            } else {
                $this->session->set_flashdata('error', 'This Gallery does not exist');
                redirect(site_url('photos'));
            }
        } else {

            redirect(site_url('photos'));
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