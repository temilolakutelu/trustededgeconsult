<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Log extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['Audit_model']);
        $this->load->library('form_validation');
	$this->load->library('datatables');
    }

    public function index()
    {
      $page_data = $this->Audit_model->get_all();

      $data = array(
        'title' => 'Activities',
        'log_data' => $page_data,
      );
        $this->template->load('admin', 'log/list', $data);
    }
}
