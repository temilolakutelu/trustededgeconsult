<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner extends CI_Controller
{


    function __construct()
    {
        parent::__construct();

        $this->load->model(['Banner_model', 'Pages_model', 'Audit_model']);
        $this->load->library(['form_validation', 'upload']);
    }

    public function index()
    {
        $data['page_list'] = $this->Pages_model->get_all();
        $data['banner_lists'] = $this->Banner_model->get_all();
        $data['title'] = 'Banners';
           //$data['ip_add']=$this->input->ip_address();
        $this->template->load('admin', 'banner/list', $data);
    }


    public function add()
    {

        $data['page_list'] = $this->Pages_model->get_all();
        $data['title'] = 'Add Banners';
        $this->template->load('admin', 'banner/form', $data);

    }

    public function banner_action()
    {

        $this->form_validation->set_rules('title', 'Banner Title', 'required');
        $this->form_validation->set_rules('page_id', 'Banner Page', 'required');

        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            $ext = substr(strrchr($_FILES['image']['name'], '.'), 1);
            $new_name = date('Ymd') . time() . "." . $ext;
            $config['file_name'] = $new_name;
            $config['upload_path'] = '../img/banner/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1200;
            $config['max_width'] = 2200;
            $config['max_height'] = 1280;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                $this->add();
            } else {

                $config['image_library'] = 'gd2';
                $config['source_image'] = '../img/banner/' . $new_name;
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = false;
                $config['quality'] = "50%";
                $config['width'] = 1024;
                $config['height'] = 600;
                $config['new_image'] = '../img/banner' . $new_name;

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();
                    // $data = array('upload_data' => $this->upload->data());
                $data = array(
                    'title' => $this->input->post('title'),
                    'pageID' => $this->input->post('page_id'),
                    'imageURL' => $new_name,
                    'textLine1' => $this->input->post('txt1'),
                    'textLine2' => $this->input->post('txt2'),
                );
                $this->Banner_model->insert($data);
                $task = 'Added a banner to banners table';
                $this->audit($task);
                $this->session->set_flashdata('success', 'Banner added successfully');
                redirect(site_url('banner'));
            }

        }

    }

    public function edit($id)
    {
        if (!empty($id)) {

            if ($data['banner_details'] = $this->Banner_model->get_by_id($id)) {

                $data['page_list'] = $this->Pages_model->get_all();
                $data['title'] = 'Edit Banner';
                $this->template->load('admin', 'banner/edit', $data);

            } else {
                $this->session->set_flashdata('error', 'This banner does not exist');
                redirect(site_url('banner'));
            }
        } else {

            redirect(site_url('banner'));
        }

    }


    public function edit_action()
    {

        $this->form_validation->set_rules('title', 'Banner Title', 'required');
        $this->form_validation->set_rules('page_id', 'Banner Page', 'required');

        if ($this->form_validation->run() == false) {
            redirect(site_url('banners/edit/' . $this->input->post('id')));
        } else {
            if ($this->input->post('priority', true)) {
                $priority = 1;
            } else {
                $priority = 0;
            }
            $ext = substr(strrchr($_FILES['image']['name'], '.'), 1);

            $new_name = date('Ymd') . time() . "." . $ext;
            $config['file_name'] = $new_name;
            $config['upload_path'] = '../img/banner/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1200;
            $config['max_width'] = 2200;
            $config['max_height'] = 1280;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {
                $data = array(
                    'title' => $this->input->post('title'),
                    'pageID' => $this->input->post('page_id'),
                    'imageURL' => $new_name,
                    'textLine1' => $this->input->post('txt1'),
                    'textLine2' => $this->input->post('txt2'),
                );
                $this->Banner_model->update($this->input->post('id'), $data);
                $task = 'Updated a banner on banners table';
                $this->audit($task);
                $this->session->set_flashdata('success', 'Banner updated successfully');
                redirect(site_url('banner'));
            } else {
                $config['image_library'] = 'gd2';
                $config['source_image'] = '../img/banner/' . $new_name;
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = false;
                $config['quality'] = "50%";
                $config['width'] = 1024;
                $config['height'] = 600;
                $config['new_image'] = '../img/banner/' . $new_name;
                $this->load->library('image_lib', $config);

                $this->image_lib->resize();
                    // $data = array('upload_data' => $this->upload->data());
                $data = array(
                    'title' => $this->input->post('title'),
                    'pageID' => $this->input->post('page_id'),
                    'imageURL' => $new_name,
                    'textLine1' => $this->input->post('txt1'),
                    'textLine2' => $this->input->post('txt2'),
                );
                $this->Banner_model->update($this->input->post('id'), $data);
                $task = 'Updated a banner on banners table';
                $this->audit($task);
                $this->session->set_flashdata('success', 'Banner updated successfully');
                redirect(site_url('banner'));
            }

        }
    }

    public function delete($id)
    {
        if (!empty($id)) {

            if ($data['banner_details'] = $this->Banner_model->get_by_id($id)) {
                $this->Banner_model->delete($id);
                $task = 'Deleted a banner from banners table';
                $this->audit($task);
                $this->session->set_flashdata('success', 'Banner successfully deleted');
                redirect(site_url('banner'));

            } else {
                $this->session->set_flashdata('error', 'This banner does not exist');
                redirect(site_url('banner'));
            }
        } else {

            redirect(site_url('banner'));
        }

    }

    public function activate($id)
    {
        if (!empty($id)) {

            if ($data['banner_details'] = $this->Banner_model->get_by_id($id)) {

                $data = array(
                    'del_flg' => 'N',
                );
                $this->Banner_model->update($id, $data);

                $task = 'Activated a banner on banners table';
                $this->audit($task);
                $this->session->set_flashdata('success', 'Banner successfully activated');
                redirect(site_url('banner'));

            } else {
                $this->session->set_flashdata('error', 'This banner does not exist');
                redirect(site_url('banner'));
            }
        } else {

            redirect(site_url('banner'));
        }

    }

    public function deactivate($id)
    {
        if (!empty($id)) {

            if ($data['banner_details'] = $this->Banner_model->get_by_id($id)) {
                $data = array(
                    'del_flg' => 'Y',
                );
                $this->Banner_model->update($id, $data);
                $task = 'Deactivated a banner on banners table';
                $this->audit($task);
                $this->session->set_flashdata('success', 'Banner successfully deactivated');
                redirect(site_url('banner'));

            } else {
                $this->session->set_flashdata('error', 'This banner does not exist');
                redirect(site_url('banner'));
            }
        } else {

            redirect(site_url('banner'));
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