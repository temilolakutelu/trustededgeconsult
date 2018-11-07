<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Newspage extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['News_model', 'Audit_model', 'News_image_model']);
        $this->load->library('form_validation');
	$this->load->library('datatables');
    }

    public function index()
    {
      $page_data = $this->News_model->get_all();

      $data = array(
        'title' => 'News',
        'news_data' => $page_data,
      );
        $this->template->load('admin', 'news/list', $data);
    }

    public function create()
    {
         $news_data = $this->News_model->get_all();
        $data = array(
            'button' => 'Add news',
            'title' => 'News',
            'action' => site_url('news/add_action'),
	      );
        $this->template->load('admin', 'news/add', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            
             $ext = substr( strrchr($_FILES['image']['name'], '.'), 1);
            $new_name = date('Ymd').time().".".$ext;
                $config['file_name']            = $new_name;
                $config['upload_path']          = './images/news/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 2200;
                $config['max_height']           = 1280;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
            
            if (!$this->upload->do_upload('image'))
                {
                 $this->create();
                }
                else
                {
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './images/news/'.$new_name;
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = "50%";
                    $config['width']         = 450;
                    $config['height']       = 300;
                    $config['new_image']    ='./images/news/'.$new_name;

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();
             $cont=$this->input->post('content');
                    
            $data = array(
		          'newsTitle' => $this->input->post('title',TRUE),
                 'newsTitleBrief' => $this->input->post('brief',TRUE),
                 'web_reference' => $this->input->post('reference',TRUE),
                'newsSummaryBrief' => $this->input->post('description',TRUE),
                 'newsDetail' => htmlentities($cont),
                'newsImageURL'=>$new_name,
	    );

            $this->News_model->insert($data);
                     $task='Added a news to news table'; 
            $this->audit($task);
            $this->session->set_flashdata('message', 'News added successfully');
            redirect(site_url('newspage'));
        }
    }
    }
    
    public function edit($id)
    {
         $row= $this->News_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Edit News',
                'button'=>'Update News',
                'action' => site_url('news/edit_action'),
            'id' => $row->newsID,
            'title' => set_value('title',  $row->newsTitle),
             'brief' => set_value('brief',  $row->newsTitleBrief),
            'content'=>set_value('content', html_entity_decode($row->newsDetail)),
            'description'=>set_value('description', $row->newsSummaryBrief),
                'reference'=>set_value('reference', $row->web_reference),
           'image'=>$row->newsImageURL,
		);
            $this->template->load('admin', 'news/edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('newspage'));
        }
    }

    public function edit_action()
    {
        $input_id=$this->input->post('id',TRUE);
            
             $ext = substr( strrchr($_FILES['image']['name'], '.'), 1);
            $new_name = date('Ymd').time().".".$ext;
                $config['file_name']            = $new_name;
                $config['upload_path']          = './images/news/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 2200;
                $config['max_height']           = 1280;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
            
            if (!$this->upload->do_upload('image'))
                {
                    $cont=$this->input->post('content');
                    $data_1 = array(
		          'newsTitle' => $this->input->post('title',TRUE),
                 'newsTitleBrief' => $this->input->post('brief',TRUE),
                 'web_reference' => $this->input->post('reference',TRUE),
                'newsSummaryBrief' => $this->input->post('description',TRUE),
                 'newsDetail' => htmlentities($cont),
	    );

            $this->News_model->update($input_id, $data_1);
                     $task='Updated a news on news table'; 
            $this->audit($task);
            $this->session->set_flashdata('message', 'News updated successfully');
            redirect(site_url('newspage'));
                }
                else
                {
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './images/news/'.$new_name;
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = "30%";
                    $config['width']         = 450;
                    $config['height']       = 300;
                    $config['new_image']    ='./images/news/'.$new_name;

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();
             $cont=$this->input->post('content');
                    
            $data = array(
		          'newsTitle' => $this->input->post('title',TRUE),
                 'newsTitleBrief' => $this->input->post('brief',TRUE),
                 'web_reference' => $this->input->post('reference',TRUE),
                'newsSummaryBrief' => $this->input->post('description',TRUE),
                 'newsDetail' => htmlentities($cont),
                'newsImageURL'=>$new_name,
	    );
            $this->News_model->update($input_id, $data);
                     $task='Updated a news on news table'; 
            $this->audit($task);
            $this->session->set_flashdata('message', 'News updated successfully');
            redirect(site_url('newspage'));
        }
        
    }
    
     public function image_upload($id)
    {
         $row= $this->News_image_model->get_by_newsID($id);
         $row_news= $this->News_model->get_by_id($id);
        if ($row_news) {
            $data = array(
                'title' => 'Upload/ Edit News Images',
                'button'=>'Upload News Image(s)',
                'action' => site_url('news/edit_image'),
                'image_info' => $row,
                'news'=>$row_news->newsTitle,
                'news_id'=>$row_news->newsID,
           // 'news_id' => $row->newsID,
           // 'title' => set_value('title',  $row->newsTitle),
           //'image'=>$row->newsImageURL,
		);
            $this->template->load('admin', 'news/images', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('newspage'));
        }
    }
    
    public function add_images()
    {
              $ext = substr( strrchr($_FILES['image']['name'], '.'), 1);
               $new_name = date('Ymd').time().".".$ext;
                $config['file_name']            = $new_name;
                $config['upload_path']          = './images/news/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 2200;
                $config['max_height']           = 1280;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
        
                $news_id=$this->input->post('news_id',TRUE);
            if (!$this->upload->do_upload('image'))
                {
                 $this->image_upload($news_id);
                }
                else
                {
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './images/news/'.$new_name;
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = "50%";
                    $config['width']         = 700;
                    $config['height']       = 350;
                    $config['new_image']    ='./images/news/'.$new_name;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    
                    $data = array(
                          'title' => $this->input->post('title',TRUE),
                        'newsID'=>$this->input->post('news_id',TRUE),
                        'imageURL'=>$new_name,
                );

            $this->News_image_model->insert($data);
            $task='Added an image to a news'; 
            $this->audit($task);
            $this->session->set_flashdata('message', 'News added successfully');
            redirect(site_url('newspage/image_upload/'.$news_id));
        }
    }
    
    
    public function delete_image($id)
    {
      //  $this->check_role(); 
        $row = $this->News_image_model->get_by_id($id);

        if ($row) {
            $this->News_image_model->delete($id);
            // $task='Deleted '.$row->name.' from Blood Group';
           // $this->audit($task);
               // $this->audit($task);
         $task='Deleted an image from news'; 
            $this->audit($task);
            $this->session->set_flashdata('message', 'News Image deleted Successfully');
            redirect(site_url('newspage/image_upload/'.$row->newsID));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('newspage/image_upload/'.$row->newsID));
        }
    }
    
    
    public function delete($id)
    {
      //  $this->check_role(); 
        $row = $this->News_model->get_by_id($id);

        if ($row) {
            $this->News_model->delete($id);
            // $task='Deleted '.$row->name.' from Blood Group';
           // $this->audit($task);
               // $this->audit($task);
         $task='Deleted a news from news table'; 
            $this->audit($task);
            $this->session->set_flashdata('message', 'News deleted Successfully');
            redirect(site_url('newspage'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('newspage'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('title', 'News title', 'trim|required|is_unique[tb_news.newsTitle]',
        array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'
        ));
         $this->form_validation->set_rules('brief', 'News title summary', 'trim|required');
        $this->form_validation->set_rules('description', 'News summary', 'trim|required');
         $this->form_validation->set_rules('reference', 'News web reference', 'trim|required');
        $this->form_validation->set_rules('content', 'News Content', 'trim|required');
    }
    
    
     public function audit($task){
        $login=$this->session->userdata('logged_in');
            $user=$login['firstname'].' '.$login['lastname'];
            $data_audit = array(
                'user' => $user,
                'task' => $task,
                'date_time' => date('Y-m-d H:i:s',time()),
		      );
            
            $this->Audit_model->insert($data_audit);
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
