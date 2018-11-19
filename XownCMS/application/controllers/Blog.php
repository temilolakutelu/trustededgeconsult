<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['Blog_model', 'Audit_model']);
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $post_data = $this->Blog_model->get_all();

        $data = array(
            'title' => 'blogs',
            'post_data' => $post_data,
        );

        $this->template->load('admin', 'blog/list', $data);

    }



    public function create()
    {
        // $category_data = $this->Blog_model->get_category();
        $data = array(
            'title' => 'Blog',
            'button' => 'Create Post',
            // 'result' => $category_data
        );
        $this->template->load('admin', 'blog/form', $data);
    }

    public function create_action()
    {
        $this->form_validation->set_rules('title', 'Post Title', 'trim|required');
        $this->form_validation->set_rules('subtitle', 'Post subTitle', 'trim|required');
        $this->form_validation->set_rules('author', 'Author', 'trim|required');
        $this->form_validation->set_rules('tag', 'Tag', 'trim|required');
        $this->form_validation->set_rules('article', 'Article', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {

            $ext = substr(strrchr($_FILES['image']['name'], '.'), 1);
            $new_name = date('Ymd') . time() . "." . $ext;
            $config['file_name'] = $new_name;
            $config['upload_path'] = './images/blog';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 1500;
            $config['max_width'] = 2200;
            $config['max_height'] = 1280;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                $this->create();
            } else {

                $config['image_library'] = 'gd2';
                $config['source_image'] = './images/blog' . $new_name;
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = false;
                $config['quality'] = "50%";
                $config['width'] = 1024;
                $config['height'] = 600;
                $config['new_image'] = './img/blog/' . $new_name;

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();

                $cont = $this->input->post('article');

                $data_1 = array(
                    'title' => $this->input->post('title', true),
                    'subtitle' => $this->input->post('subtitle', true),
                    'author' => $this->input->post('author', true),
                    'image' => $new_name,
                    'article' => htmlentities($cont),
                    'tag' => $this->input->post('tag', true),
                );

                $data_2 = array(
                    'name' => $this->input->post('tag', true),

                );
                    // for blog table
                $this->Blog_model->insert2($data_1);
                // for tag table
                $this->Blog_model->insert($data_2);
                $task = 'Created a Post on Blog table';
                $this->audit($task);
                $this->session->set_flashdata('message', 'post updated successfully');
                redirect(site_url('blog'));

            }
        }

    }


    public function edit($id)
    {
        $row = $this->Blog_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Edit Post',
                'button' => 'Update Post',
                'action' => site_url('blog/edit_action'),
                'id' => set_value('id', $row->blogID),
                'title' => set_value('title', $row->title),
                'subtitle' => set_value('subtitle', $row->subtitle),
                'tag' => set_value('tag', $row->tag),
                'author' => set_value('author', $row->author),
                'image' => set_value('image', $row->image),
                'article' => set_value('article', html_entity_decode($row->article)),
            );
            $this->template->load('admin', 'blog/edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Post Record Not Found');
            redirect(site_url('blog'));
        }
    }

    public function edit_action()
    {
        $input_id = $this->input->post('id', true);

        $this->form_validation->set_rules('title', 'Post Title', 'trim|required');
        $this->form_validation->set_rules('subtitle', 'Post subTitle', 'trim|required');
        $this->form_validation->set_rules('author', 'Author', 'trim|required');
        $this->form_validation->set_rules('tag', 'Tag', 'trim|required');
        $this->form_validation->set_rules('article', 'Article', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->edit($input_id);
        } else {


            $ext = substr(strrchr($_FILES['image']['name'], '.'), 1);

            $new_name = date('Ymd') . time() . "." . $ext;
            $config['file_name'] = $new_name;
            $config['upload_path'] = './images/blog';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 1500;
            $config['max_width'] = 2200;
            $config['max_height'] = 1280;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);


            if (!$this->upload->do_upload('image')) {
                $cont = $this->input->post('article');
                $data_1 = array(
                    'title' => $this->input->post('title', true),
                    'subtitle' => $this->input->post('subtitle', true),
                    'author' => $this->input->post('author', true),
                    'image' => $new_name,
                    'article' => htmlentities($cont),
                    'tag' => $this->input->post('tag', true),
                );

                $data_2 = array(
                    'name' => $this->input->post('tag', true),

                );
                $this->Blog_model->insert($data_2);
                $this->Blog_model->update_2($this->input->post('id'), $data_1);
                $task = 'Updated a post on blog post table';
                $this->audit($task);
                $this->session->set_flashdata('success', 'post updated successfully');
                redirect(site_url('blog'));
            } else {
                $config['image_library'] = 'gd2';
                $config['source_image'] = './images/blog' . $new_name;
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = false;
                $config['quality'] = "50%";
                $config['width'] = 1024;
                $config['height'] = 600;
                $config['new_image'] = './img/blog/' . $new_name;
                $this->load->library('image_lib', $config);

                $this->image_lib->resize();
                    // $data = array('upload_data' => $this->upload->data());
                $data_1 = array(
                    'title' => $this->input->post('title', true),
                    'subtitle' => $this->input->post('subtitle', true),
                    'author' => $this->input->post('author', true),
                    'image' => $new_name,
                    'article' => htmlentities('article', true),
                    'tag' => $this->input->post('tag', true),
                );

                $data_2 = array(
                    'name' => $this->input->post('tag', true),

                );

                $this->Blog_model->insert($data_2);
                $this->Blog_model->update_2($this->input->post('id'), $data_1);
                $task = 'Updated a post on blog post table';
                $this->audit($task);
                $this->session->set_flashdata('message', 'post updated successfully');
                redirect(site_url('blog'));

            }
        }
    }

    public function delete($id)
    {
      //  $this->check_role(); 
        $row = $this->Blog_model->get_by_id($id);

        if ($row) {
            $this->Blog_model->delete($id);
            $task = 'Deleted a post from Blog table';
            $this->audit($task);
            $this->session->set_flashdata('message', 'post deleted Successfully');
            redirect(site_url('blog'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('blog'));
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

/* End of file Blood_group.php */
/* Location: ./application/controllers/Blood_group.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-01 14:53:53 */
/* http://harviacode.com */
