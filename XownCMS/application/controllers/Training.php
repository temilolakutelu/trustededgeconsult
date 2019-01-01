<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Training extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['Trainings_model', 'Audit_model']);
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        // $page_data = $this->Trainings_model->get_all();
        $page_data = $this->Trainings_model->get_all2();

        $data = array(
            'title' => 'Trainings',
            'training_data' => $page_data,
        );

        $this->template->load('admin', 'training/list', $data);

    }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    


    public function create()
    {
        $category_data = $this->Trainings_model->get_category();
        $data = array(
            'title' => 'Trainings',
            'button' => 'Add Training',
            'result' => $category_data
        );
        $this->template->load('admin', 'training/form', $data);
    }

    public function create_action()
    {
        $this->form_validation->set_rules('title', 'Training Title', 'trim|required');
        $this->form_validation->set_rules('content', 'Training Details', 'trim|required');
        $this->form_validation->set_rules('from', 'Start Date', 'trim|required');
        $this->form_validation->set_rules('to', 'Ending Date', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {

            $ext = substr(strrchr($_FILES['image']['name'], '.'), 1);
            $new_name = date('Ymd') . time() . "." . $ext;
            $config['file_name'] = $new_name;
            $config['upload_path'] = './images/training';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
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
                $config['source_image'] = './images/training' . $new_name;
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = false;
                $config['quality'] = "50%";
                $config['width'] = 1024;
                $config['height'] = 600;
                $config['new_image'] = './img/training/' . $new_name;

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();

                $cont = $this->input->post('content');

                $data_1 = array(
                    'trainingTitle' => $this->input->post('title', true),
                    'startDate' => $this->input->post('from', true),
                    'endDate' => $this->input->post('to', true),
                    'imageURL' => $new_name,
                    'trainingDetail' => htmlentities($cont),
                    'category_id' => $this->input->post('category', true),
                );

                $data3 = array(
                    'title' => $this->input->post('title', true),
                    'start' => $this->input->post('from', true),
                    'end' => $this->input->post('to', true),
                );

                $this->Trainings_model->insert2($data_1);
                $calendar = $this->Trainings_model->insert3($data3);
                $task = 'Created a training on Trainings table';
                $this->audit($task);
                $this->session->set_flashdata('message', 'training updated successfully');
                redirect(site_url('training'));

            }
        }

    }


    public function edit($id)
    {
        $row = $this->Trainings_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Edit Training',
                'button' => 'Update Training',
                'action' => site_url('training/edit_action'),
                'id' => set_value('id', $row->trainingID),
                'title' => set_value('title', $row->trainingTitle),
                'from' => set_value('from', $row->startDate),
                'to' => set_value('to', $row->endDate),
                'image' => set_value('image', $row->imageURL),
                'content' => set_value('content', html_entity_decode($row->trainingDetail)),
            );
            $this->template->load('admin', 'training/edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('training'));
        }
    }

    public function edit_action()
    {
        $input_id = $this->input->post('id', true);

        $this->form_validation->set_rules('title', 'Training Title', 'trim|required');
        $this->form_validation->set_rules('content', 'Training Details', 'trim|required');
        $this->form_validation->set_rules('from', 'Start Date', 'trim|required');
        $this->form_validation->set_rules('to', 'Ending Date', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->edit($input_id);
        } else {


            $ext = substr(strrchr($_FILES['image']['name'], '.'), 1);

            $new_name = date('Ymd') . time() . "." . $ext;
            $config['file_name'] = $new_name;
            $config['upload_path'] = './images/training';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 1200;
            $config['max_width'] = 2200;
            $config['max_height'] = 1280;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);


            if (!$this->upload->do_upload('image')) {
                $cont = $this->input->post('content');
                $data_1 = array(
                    'trainingTitle' => $this->input->post('title', true),
                    'startDate' => $this->input->post('from', true),
                    'endDate' => $this->input->post('to', true),
                    'imageURL' => $new_name,
                    'trainingDetail' => htmlentities($cont)
                );

                $data_2 = array(
                    'trainingTitle' => $this->input->post('title', true),
                    'startDate' => $this->input->post('from', true),
                    'endDate' => $this->input->post('to', true),
                );
                $this->Trainings_model->update($this->input->post('id'), $data_1);
                $this->Trainings_model->update_2($this->input->post('id'), $data_2);
                $task = 'Updated a training on trainings table';
                $this->audit($task);
                $this->session->set_flashdata('success', 'training updated successfully');
                redirect(site_url('training'));
            } else {
                $config['image_library'] = 'gd2';
                $config['source_image'] = './images/training' . $new_name;
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = false;
                $config['quality'] = "50%";
                $config['width'] = 1024;
                $config['height'] = 600;
                $config['new_image'] = './img/training/' . $new_name;
                $this->load->library('image_lib', $config);

                $this->image_lib->resize();
                    // $data = array('upload_data' => $this->upload->data());
                $data_1 = array(
                    'trainingTitle' => $this->input->post('title', true),
                    'startDate' => $this->input->post('from', true),
                    'endDate' => $this->input->post('to', true),
                    'imageURL' => $new_name,
                    'trainingDetail' => htmlentities($cont)
                );

                $data_2 = array(
                    'trainingTitle' => $this->input->post('title', true),
                    'startDate' => $this->input->post('from', true),
                    'endDate' => $this->input->post('to', true),
                );

                $this->Trainings_model->update($input_id, $data_1);
                $this->Trainings_model->update_2($this->input->post('id'), $data_2);
                $task = 'Updated a training on Trainings table';
                $this->audit($task);
                $this->session->set_flashdata('message', 'training updated successfully');
                redirect(site_url('training'));

            }
        }
    }

    public function delete($id)
    {
      //  $this->check_role(); 
        $row = $this->Trainings_model->get_by_id($id);

        if ($row) {
            $this->Trainings_model->delete($id);
            $this->Trainings_model->delete_2($id);
            $task = 'Deleted a training from Trainings table';
            $this->audit($task);
            $this->session->set_flashdata('message', 'training deleted Successfully');
            redirect(site_url('training'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('training'));
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
