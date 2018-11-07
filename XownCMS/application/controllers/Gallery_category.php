<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery_category extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['Gallery_category_model', 'Audit_model']);
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $category_data = $this->Gallery_category_model->get_all();
        $data = array(
            'title' => 'Gallery Categories',
            'category_data' => $category_data,
        );
        $this->template->load('admin', 'gallery_category/list', $data);
    }

    public function create()
    {
        $category_data = $this->Gallery_category_model->get_category();
        $data = array(
            'button' => 'Create',
            'title' => 'Add Gallery Category',
            'action' => site_url('gallery_category/create_action'),
            'category_data' => $category_data,
        );
        $this->template->load('admin', 'gallery_category/form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $ext = substr(strrchr($_FILES['image']['name'], '.'), 1);
            $new_name = date('Ymd') . time() . "." . $ext;
            $config['file_name'] = $new_name;
            $config['upload_path'] = './images/thumbnail/';
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
                if ($this->input->post('priority', true)) {
                    $priority = 1;
                } else {
                    $priority = 0;
                }
                $config['image_library'] = 'gd2';
                $config['source_image'] = './images/thumbnail/' . $new_name;
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = false;
                $config['quality'] = "50%";
                $config['width'] = 200;
                $config['height'] = 120;
                $config['new_image'] = './images/thumbnail/' . $new_name;

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();

                $data = array(
                    'name' => $this->input->post('name', true),
                    'image' => $new_name,
                );

                $this->Gallery_category_model->insert($data);
                $task = 'Added ' . $this->input->post('name', true) . ' to Gallery category table';
                $this->audit($task);
                $this->session->set_flashdata('message', 'New gallery category created successfully');
                redirect(site_url('gallery_category'));
            }
        }
    }

    public function update($id)
    {

        $row = $this->Gallery_category_model->get_by_id($id);
        $category_data = $this->Gallery_category_model->get_category();
        if ($row) {
            $data = array(
                'button' => 'Update',
                'title' => 'Update Category',
                'action' => site_url('gallery_category/update_action'),
                'id' => $row->id,
                'name' => $row->name,
                'category_data' => $category_data,
            );
            $this->template->load('admin', 'gallery_category/edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gallery_category'));
        }
    }

    public function update_action()
    {
        $ext = substr(strrchr($_FILES['image']['name'], '.'), 1);
        $new_name = date('Ymd') . time() . "." . $ext;
        $config['file_name'] = $new_name;
        $config['upload_path'] = './images/thumbnail/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1200;
        $config['max_width'] = 2200;
        $config['max_height'] = 1280;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('image')) {
            $data = array(
                'name' => $this->input->post('name', true),
                'image' => $new_name,
            );

            $this->Gallery_category_model->update($this->input->post('id', true), $data);
            $task = 'Updated ' . $this->input->post('name', true) . ' on Gallery category table';
            $this->audit($task);
            $this->session->set_flashdata('message', 'Gallery category updated successfully');
            redirect(site_url('gallery_category'));
        } else {
            $config['image_library'] = 'gd2';
            $config['source_image'] = './images/thumbnail/' . $new_name;
            $config['create_thumb'] = false;
            $config['maintain_ratio'] = false;
            $config['quality'] = "50%";
            $config['width'] = 200;
            $config['height'] = 120;
            $config['new_image'] = './images/thumbnail/' . $new_name;

            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $data = array(
                'name' => $this->input->post('name', true),
                'image' => $new_name,
            );

            $this->Gallery_category_model->update($this->input->post('id', true), $data);
            $task = 'Updated ' . $this->input->post('name', true) . ' on Gallery category table';
            $this->audit($task);
            $this->session->set_flashdata('message', 'Gallery category updated successfully');
            redirect(site_url('gallery_category'));
        }
    }

    public function delete($id)
    {
      //  $this->check_role(); 
        $row = $this->Gallery_category_model->get_by_id($id);

        if ($row) {
            $this->Gallery_category_model->delete($id);
            $task = 'Deleted ' . $row->name . ' from Gallery category table';
            $this->audit($task);
            $this->session->set_flashdata('message', 'Page category deleted Successfully');
            redirect(site_url('gallery_category'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gallery_category'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules(
            'name',
            'name',
            'trim|required|is_unique[tb_gallery_category.name]',
            array(
                'required' => 'You have not provided %s.',
                'is_unique' => 'This %s already exists.'
            )
        );
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
