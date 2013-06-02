<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('User_model');
   $this->load->model('Avatar_model');
   $this->load->model('Item_model');
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['avatars'] = $this->Avatar_model->get_latest();
     $data['items'] = $this->Item_model->get_latest();
     //$data['id'] = $session_data['id'];
     $this->load->view('templates/header');
     $this->load->view('home', $data);
     $this->load->view('templates/footer');
     //redirect('index.php/home', 'refresh');
   }
   else
   {
     //If no session, redirect to login page
     redirect('home/login', 'refresh');
   }
 }

 function login()
 {
   $this->load->helper(array('form'));
   $this->load->view('login_view');
 }

 function verifyLogin()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.&nbsp; User redirected to login page
     redirect('home/login', 'refresh');
   }
   else
   {
     //Go to private area
     redirect('home/index', 'refresh');
   }

 }

 function check_database($password)
 {
   //Field validation succeeded.&nbsp; Validate against database
   $username = $this->input->post('username');

   //query the database
   $result = $this->User_model->login($username, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username,
         'admin' => $row->admin);
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home/login', 'refresh');
 }

}

