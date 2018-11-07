<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(['Setting_model', 'Welcome_model', 'Audit_model']);
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('welcome/dashboard');
        } else {
            $data = array(
                'title' => 'Login',
                'action' => site_url('welcome/login'),
            );
            $this->load->view('welcome/login', $data);
        }
    }

    public function login()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $data = array(
                'action' => site_url('welcome/login'),
                'title' => 'Login',
            );
            $this->load->view('welcome/login', $data);
        } else {
            $email = $this->input->post('email', true);
            $password = $this->input->post('password', true);
            $row = $this->Welcome_model->login($email, $password);

            if ($row) {
                $sess_array = array(
                    'firstname' => $row->firstname,
                    'lastname' => $row->lastname,
                    'email' => $row->email,
                    'roleID' => $row->role_ID,
                );
                $this->session->set_userdata('logged_in', $sess_array);
                $this->_checkUser();
                $task = 'Logged in to LMU CMS';
                $this->audit($task);
                redirect(site_url('welcome/dashboard'));
            } else {
                $this->session->set_flashdata('error', 'Invalid Email or Password');
                redirect(site_url('welcome'));
            }
        }
    }

    public function logout()
    {
        $user_data = $this->session->all_userdata();
        $task = 'Logged out of LMU CMS';
        $this->audit($task);
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity' && $key != 'firstname' && $key != 'roleID') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect('welcome');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'trim|required');

        $this->form_validation->set_error_delimiters('<li>', '</li>');
    }

    public function _checkUser()
    {
        if ($this->session->userdata('logged_in') == false) {
            redirect('welcome/logout');
        }
    }

    public function dashboard()
    {
        $this->_checkUser();
        $no_users = $this->Welcome_model->no_user();
        $today_users = $this->Welcome_model->today_user();
        $all_country = $this->Welcome_model->all_country();
           // $total=count;
           /* foreach($all_country as $country){
               // $count=$this->Welcome_model->count_country($country->clientCountry);
                $info=array(
                    'country'=> $country->clientCountry,
                    'code'=> $country->clientCountryCode,
                   // 'count'=>$count;
                );
            }*/
            // $all_browser = $this->Welcome_model->all_browser();
             //$chrome = $this->Welcome_model->browser('Chrome');
            // $ie = $this->Welcome_model->browser('Internet Explorer');
            //$mobile = $this->Welcome_model->browser('HandHeld browser');
           //  $fire = $this->Welcome_model->browser('Firefox');
           //  $opera = $this->Welcome_model->browser('Opera');
           //  $safari = $this->Welcome_model->browser('safari');
           //  $others = $this->Welcome_model->browser('others');
        $data = array(
            'title' => 'Dashboard',
            'no_users' => $no_users,
            'today_users' => $today_users,

        );
        $this->template->load('admin', 'welcome/dashboard', $data);
    }

    public function forget()
    {

        $data = array(
            'title' => 'Forget Password',
        );
        $this->load->view('welcome/forget_password', $data);
    }


    public function reset_action()
    {
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $host = $this->Setting_model->get_all();

        if ($this->form_validation->run() == false) {
            $this->forget();
        } else {

            $email = $this->input->post('email', true);
            $password = uniqid();
            $options = [
                'cost' => 11,
            ];
            $pass = password_hash($password, PASSWORD_BCRYPT, $options);

            if ($this->Welcome_model->checkMail($email)) {


                $message = "<p>Please be informed your password reset was successfully done on Landmark University Admin System</p>" .
                    "<p>Kindly Login with the new details below</p>" .

                    "<p><strong>Username:</strong> " . $email .
                    "<br><strong>Password:</strong> " . $password .
                    "<br>For any enquries, please contact the administrator" .
                    "<br>Thank you.</p>";

                $config = array(
                    'mailtype' => 'html',
                    'wordwrap' => false,
                    'protocol' => 'smtp',
                    'smtp_host' => $host->host_name,
                    'smtp_port' => 25,
                    'smtp_user' => $host->username,
                    'smtp_pass' => $host->password,
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1'
                );

                $this->load->library('email', $config);

                $this->email->from('support@lmu.edu.ng', 'LMU Content Management System');
                $this->email->to($email);
                $this->email->subject('Password Reset Request');
                $this->email->message($message);
                $this->email->set_alt_message('View the mail using an html email client');
                $this->email->send();

                $user_data2 = array(
                    'password' => $pass,
                );
                $this->Welcome_model->reset_user($email, $user_data2);
                $this->session->set_flashdata('message', 'Password reset successfully, kindly check your mail to get new password.');
                $this->forget();

            } else {
                $this->session->set_flashdata('error', 'Invalid Email');
                $this->forget();
            }
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
