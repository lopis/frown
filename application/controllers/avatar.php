<!-- by João Lopes & Ricardo Pinho -->
<!-- FEUP 2013 - LAPD -->
<!-- http://paginas.fe.up.pt/~ei10009 -->

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


    /**
     *  If the user is not logged in, returns to the initial page.
     *  Add "$this->check_auth();" whever you want private access.
     */
    public function check_auth(){
        if(!$this->session->userdata('logged_in')){
            redirect('index.php', 'refresh');
        }
    }
 
    public function index()
    {
        $this->check_auth();
        $session_data = $this->session->userdata('logged_in');
        $data['users'] = $this->User_model->fillCombo();
        $data['users']['All'] = 'All';
        $data['avatars'] = $this->Avatar_model->get_all_from_users();
        $data['avatars']['All'] = $this->Avatar_model->get_all_box();
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
        $this->check_auth();
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
        $this->check_auth();
        //$items = explode(',', $this->input->post('items'));
        $avatar = array(
            'name' => $this->input->post('name'),
            'svg' => $this->input->post('svg'));
                    
        $this->Avatar_model->edit($id,$avatar,$items);
        
        $this->load->helper('url');
        redirect('avatar/index');
    }
    
    public function update($id)
    {
        $this->check_auth();
        //$data['utilizador'] = $this->Utilizador_model->edit($id);
        $data['title'] = 'Avatars';
        $data['id']=$id;
        $data['avatar'] = $this->Avatar_model->get_by_id($id)->row();
        $data['items'] = $this->Item_model->get_all();
        $data['avatar_items'] = $this->Item_model->get_avatar_items($id);
        $this->load->view('templates/header', $data);
        $this->load->view('avatar/update', $data);
        $this->load->view('templates/footer');
    }
    
    public function delete($id)
    {
        $this->check_auth();
        $this->Avatar_model->delete($id);
        $this->load->helper('url');
        redirect('avatar/index');
    }

    public function create()
    {
        $this->check_auth();
        //$data['utilizador'] = $this->Utilizador_model->create();
        $data['title'] = 'Avatars';
        $data['items'] = $this->Item_model->get_all();
        $this->load->view('templates/header', $data);
        $this->load->view('avatar/create');
        $this->load->view('templates/footer');
    }
    
    public function add()
    {
        $this->check_auth();
        $items = explode(',', $this->input->post('items'));
        $avatar = array(
            'name' => $this->input->post('name'),
            'svg' => $this->input->post('svg'));

        $session_data = $this->session->userdata('logged_in');
        $id_user = $session_data['id'];

        $this->Avatar_model->create($avatar, $id_user, $items);

        $this->load->helper('url');
        redirect('avatar/index');
    }
}
?>