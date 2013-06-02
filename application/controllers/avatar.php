<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Avatar extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
 
        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */ 
        $this->load->model('Avatar_model');
        $this->load->model('Item_model');
        $this->load->model('User_model');
        $this->load->library('grocery_CRUD');
 
    }
 
    public function index()
    {
        if(!$this->session->userdata('logged_in'))
       {
        redirect('home/login', 'refresh');
       }
        $session_data = $this->session->userdata('logged_in');
        $data['users'] = $this->User_model->fillCombo();
        $data['users']['All'] = 'All';
        $data['avatars'] = $this->Avatar_model->get_all_from_users();
        $data['avatars']['All'] = $this->Avatar_model->get_all();
        $data['title'] = 'Avatars';

        $this->load->view('templates/header', $data);
        $this->load->view('avatar/index', $data);
        $this->load->view('templates/footer');

    }
 
    public function avatars()
    {
        $this->grocery_crud->set_table('avatar');
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
        $data['avatar'] = $this->Avatar_model->get_by_id($id)->row();
        $data['title'] = 'Avatars';
        $xml = new SimpleXMLElement($data['avatar']->svg);
        $xml['width'] = '256px';
        $xml['height']='256px';
        $data['avatar']->svg=$xml->asXML();
        $this->load->view('templates/header', $data);
        $this->load->view('avatar/view',$data);
        $this->load->view('templates/footer');
    }
    
    public function edit($id)
    {
        if(!$this->session->userdata('logged_in'))
       {
        redirect('home/login', 'refresh');
       }
        $avatar = array('name' => $this->input->post('name'),
                            'svg' => $this->input->post('svg'));
                    
        $this->Avatar_model->edit($id,$avatar);
        
        $this->load->helper('url');
        redirect('avatar/index');
    }
    
    public function update($id)
    {
        if(!$this->session->userdata('logged_in'))
       {
        redirect('home/login', 'refresh');
       }
        //$data['utilizador'] = $this->Utilizador_model->edit($id);
        $data['title'] = 'Avatars';
        $data['id']=$id;
        $data['avatar'] = $this->Avatar_model->get_by_id($id)->row();
        $this->load->view('templates/header', $data);
        $this->load->view('avatar/update', $data);
        $this->load->view('templates/footer');
    }
    
    public function delete($id)
    {
        if(!$this->session->userdata('logged_in'))
       {
        redirect('home/login', 'refresh');
       }
        $this->Avatar_model->delete($id);
        $this->load->helper('url');
        redirect('avatar/index');
    }

    public function create()
    {
        if(!$this->session->userdata('logged_in'))
       {
        redirect('home/login', 'refresh');
       }
        //$data['utilizador'] = $this->Utilizador_model->create();
        $data['title'] = 'Avatars';
        $data['items'] = $this->Item_model->get_all();
        $this->load->view('templates/header', $data);
        $this->load->view('avatar/create');
        $this->load->view('templates/footer');
    }
    
    public function add()
    {
        if(!$this->session->userdata('logged_in'))
       {
        redirect('home/login', 'refresh');
       }
        $avatar = array('name' => $this->input->post('name'),
                            'svg' => $this->input->post('svg'));

        $session_data = $this->session->userdata('logged_in');
        $id_user = $session_data['id'];

        $this->Avatar_model->create($avatar, $id_user);

        $this->load->helper('url');
        redirect('avatar/index');
    }
}
?>