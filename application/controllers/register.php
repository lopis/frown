<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }

 function index()
 {
   $this->load->helper(array('form'));
   $this->load->view('register_view');
 }

 function create()
 {
    $user = array('username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'password' => MD5($this->input->post('password')),
					'admin' => 0);

   $this->user->create($user);
   redirect('login', 'refresh');
 }

}

?>