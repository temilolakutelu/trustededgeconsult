<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['Category_model']);
        $this->load->library('form_validation');
	$this->load->library('datatables');
    }

    public function index()
    {
      $category_data = $this->Category_model->get_all();
      $data = array(
        'title' => 'Page Categories',
        'category_data' => $category_data,
      );
        $this->template->load('admin', 'category/list', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Blood_group_model->json();
    }

   

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'title' => 'Add Page Category',
            'action' => site_url('category/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	);
        $this->template->load('admin', 'category/form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
	    );

            $this->Category_model->insert($data);
            // $task='Added '. $this->input->post('name',TRUE).' to Blood Group';
           // $this->audit($task);
            $this->session->set_flashdata('message', 'New page category created successfully');
            redirect(site_url('category'));
        }
    }

    public function update($id)
    {
        $row = $this->Category_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'title' => 'Update Category',
                'action' => site_url('category/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		);
            $this->template->load('admin', 'category/form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('category'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		);

            $this->Category_model->update($this->input->post('id', TRUE), $data);
            // $task='Updated '. $this->input->post('name',TRUE).' on Blood Group';
           // $this->audit($task);
            $this->session->set_flashdata('message', 'Page category updated successfully');
            redirect(site_url('category'));
        }
    }

    public function delete($id)
    {
      //  $this->check_role(); 
        $row = $this->Category_model->get_by_id($id);

        if ($row) {
            $this->Category_model->delete($id);
            // $task='Deleted '.$row->name.' from Blood Group';
           // $this->audit($task);
            $this->session->set_flashdata('message', 'Page category deleted Successfully');
            redirect(site_url('category'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('category'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required|is_unique[tb_category.name]',
        array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'
        ));
	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<li>', '</li>');
    }

/* 
      public function audit($task){
        $login=$this->session->userdata('logged_in');
            $user=$login['id'];
            $data_audit = array(
                'user_id' => $user,
                'task' => $task,
		      );
            
            $this->Audit_tray_model->insert($data_audit);
    }
    
     public function check_role(){
        $find=false;
         $contr = $this->router->fetch_class();
         $current = $this->router->fetch_method();
        if($current == 'index'){$addr=$contr;}else{
        $addr=$contr.'/'.$current;}
        $module_id=$this->Admin_modules_model->get_by_name($addr);
        $login=$this->session->userdata('logged_in');
         $role_type=$login['role_type'];
        foreach($role_type aS $type){
            if($this->Admin_role_privileges_model->get_role_module($type->role_id, $module_id)){
                $find=true;
            }
        }
        if($find=='true'){
            
        }
         else{
            $this->session->set_flashdata('error', 'You are not authorised to view the requested page');
             redirect(site_url('welcome/dashboard')); 
           }  
    }
    
     public function excel()
    {
       // $this->check_role(); 
        $task='Downloaded Bloodgroup Data Sheet';
        $this->audit($task);
        //$this->load->helper('exportexcel');
        require(APPPATH. 'third_party/PHPExcel/Classes/PHPExcel.php');
        require(APPPATH. 'third_party/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php');
        
        $objPHPexcel = new PHPExcel;
        
         $objPHPexcel->getProperties()->setCreator(" ");
         $objPHPexcel->getProperties()->setLastModifiedBy(" ");
         $objPHPexcel->getProperties()->setTitle(" ");
         $objPHPexcel->getProperties()->setSubject(" ");
         $objPHPexcel->getProperties()->setDescription(" ");
        
        $objPHPexcel->setActiveSheetIndex("0");
        
        $objPHPexcel->getActiveSheet()->setCellValue("A1", "No");
        $objPHPexcel->getActiveSheet()->setCellValue("B1", "Name");
        $objPHPexcel->getActiveSheet()->setCellValue("C1", "Description");
       
        $row=2;
         $nourut = 1;
        
         foreach ($this->Blood_group_model->get_all() as $data) {
        $objPHPexcel->getActiveSheet()->setCellValue("A".$row, $nourut);
        $objPHPexcel->getActiveSheet()->setCellValue("B".$row, $data->name);
        $objPHPexcel->getActiveSheet()->setCellValue("C".$row, $data->description);
           
        $row++;
            $nourut++;
        }
        
        $namaFile = "Blood Group.xlsx";
        $objPHPexcel->getActiveSheet()->setTitle("blood Group table");
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Cache-Control: max-age=0 ");
        
        $writer=PHPExcel_IOFactory::createWriter($objPHPexcel, 'Excel2007');
        $writer->save('php://output');
        exit;

    }
    */
}

/* End of file Blood_group.php */
/* Location: ./application/controllers/Blood_group.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-01 14:53:53 */
/* http://harviacode.com */
