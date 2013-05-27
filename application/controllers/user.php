<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class User extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
 
        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */ 
        $this->load->model('User_model');
        $this->load->library('grocery_CRUD');
 
    }
 
    public function index()
    {
        if(!$this->session->userdata('logged_in'))
       {
        redirect('home/login', 'refresh');
       }
        $data['users'] = $this->User_model->get_all();
        $data['title'] = 'Users';

        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
 
    public function users()
    {
        $this->grocery_crud->set_table('User');
        $output = $this->grocery_crud->render();
 
        $this->_example_output($output);        
    }
 
    function _example_output($output = null)
 
    {
        $this->load->view('template.php',$output);    
    }

    public function view($id)
    {
        if(!$this->session->userdata('logged_in'))
       {
        redirect('index.php/home/login', 'refresh');
       }
        $data['user'] = $this->User_model->get_by_id($id)->row();
        $data['title'] = 'Users';
        $this->load->view('templates/header', $data);
        $this->load->view('user/view',$data);
        $this->load->view('templates/footer');
    }
    
    public function edit($id)
    {
        if(!$this->session->userdata('logged_in'))
       {
        redirect('index.php/home/login', 'refresh');
       }
        $user = array('username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'password' => MD5($this->input->post('password')),
                    'admin' => $this->input->post('admin'));
                    
        $this->User_model->edit($id,$user);
        
        $this->load->helper('url');
        redirect('user/index');
    }
    
    public function update($id)
    {
        if(!$this->session->userdata('logged_in'))
       {
        redirect('index.php/home/login', 'refresh');
       }
        //$data['utilizador'] = $this->Utilizador_model->edit($id);
        $data['title'] = 'Users';
        $data['id']=$id;
        $data['user'] = $this->User_model->get_by_id($id)->row();
        $this->load->view('templates/header', $data);
        $this->load->view('user/update', $data);
        $this->load->view('templates/footer');
    }
    
    public function delete($id)
    {
        if(!$this->session->userdata('logged_in'))
       {
        redirect('index.php/home/login', 'refresh');
       }
        $this->User_model->delete($id);
        $this->load->helper('url');
        redirect('user/index');
    }

}
/* End of file main.php */
/* Location: ./application/controllers/main.php */
?>