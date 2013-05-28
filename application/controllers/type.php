<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Type extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
 
        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */ 
        $this->load->model('Type_model');
        $this->load->library('grocery_CRUD');
 
    }
 
    public function index()
    {
        if(!$this->session->userdata('logged_in'))
       {
        redirect('home/login', 'refresh');
       }
        $data['types'] = $this->Type_model->get_all();
        $data['title'] = 'Types';

        $this->load->view('templates/header', $data);
        $this->load->view('type/index', $data);
        $this->load->view('templates/footer');

    }
 
    public function types()
    {
        $this->grocery_crud->set_table('type');
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
        redirect('home/login', 'refresh');
       }
        $data['type'] = $this->Type_model->get_by_id($id)->row();
        $data['title'] = 'Types';
        $this->load->view('templates/header', $data);
        $this->load->view('type/view',$data);
        $this->load->view('templates/footer');
    }
    
    public function edit($id)
    {
        if(!$this->session->userdata('logged_in'))
       {
        redirect('home/login', 'refresh');
       }
        $type = array('name' => $this->input->post('name'));
                    
        $this->Type_model->edit($id,$type);
        
        $this->load->helper('url');
        redirect('type/index');
    }
    
    public function update($id)
    {
        if(!$this->session->userdata('logged_in'))
       {
        redirect('home/login', 'refresh');
       }
        //$data['utilizador'] = $this->Utilizador_model->edit($id);
        $data['title'] = 'Types';
        $data['id']=$id;
        $data['type'] = $this->Type_model->get_by_id($id)->row();
        $this->load->view('templates/header', $data);
        $this->load->view('type/update', $data);
        $this->load->view('templates/footer');
    }
    
    public function delete($id)
    {
        if(!$this->session->userdata('logged_in'))
       {
        redirect('home/login', 'refresh');
       }
        $this->Type_model->delete($id);
        $this->load->helper('url');
        redirect('type/index');
    }

    public function create()
    {
        if(!$this->session->userdata('logged_in'))
       {
        redirect('home/login', 'refresh');
       }
        //$data['utilizador'] = $this->Utilizador_model->create();
        $data['title'] = 'Types';
        $this->load->view('templates/header', $data);
        $this->load->view('type/create');
        $this->load->view('templates/footer');
    }
    
    public function add()
    {
        if(!$this->session->userdata('logged_in'))
       {
        redirect('home/login', 'refresh');
       }
        $type = array('name' => $this->input->post('name'));

        $this->Type_model->create($type);

        $this->load->helper('url');
        redirect('type/index');
    }
}
?>