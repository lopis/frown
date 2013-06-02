<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Item extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
 
        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        /* ------------------ */ 
        $this->load->model('Item_model');
        $this->load->library('grocery_CRUD');
        $this->load->helper(array('form', 'url'));
 
    }
 
    public function index()
    {
        if(!$this->session->userdata('logged_in'))
       {
        redirect('home/login', 'refresh');
       }
        $data['items'] = $this->Item_model->get_all_by_type();
        $data['items']['All'] = $this->Item_model->get_all();
        $data['items']['NoType'] = $this->Item_model->get_all_by_no_type();
        $data['title'] = 'Items';
        $data['types'] = $this->Item_model->fillCombo();
        $data['types']['NoType'] = 'NoType';
        $data['types']['All'] = 'All';
        $data["types_select"] = $this->Item_model->get_all_types();

        $this->load->view('templates/header', $data);
        $this->load->view('item/index', $data);
        $this->load->view('templates/footer');

    }
 
    public function items()
    {
        $this->grocery_crud->set_table('item');
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
        $data['item'] = $this->Item_model->get_by_id($id)->row();
        $data['notype'] = "";
        if($this->Item_model->get_type_by_item($id)!=null)
            $data['type'] = $this->Item_model->get_type_by_item($id)->row();
        else
            $data['notype'] = "NoType";
        $data['title'] = 'Items';
        $this->load->view('templates/header', $data);
        $this->load->view('item/view',$data);
        $this->load->view('templates/footer');
    }
    
    public function edit($id)
    {
        if(!$this->session->userdata('logged_in'))
       {
        redirect('home/login', 'refresh');
       }
        $item = array('name' => $this->input->post('name'),
                            'layer' => $this->input->post('layer'));
                    
        $this->Item_model->edit($id,$item,$this->input->post('type'));
        
        $this->load->helper('url');
        redirect('item/index');
    }
    
    public function update($id)
    {
        if(!$this->session->userdata('logged_in'))
       {
        redirect('home/login', 'refresh');
       }
        //$data['utilizador'] = $this->Utilizador_model->edit($id);
        $data['title'] = 'Items';
        $data['id']=$id;
        $data['item'] = $this->Item_model->get_by_id($id)->row();
        $this->load->view('templates/header', $data);
        $this->load->view('item/update', $data);
        $this->load->view('templates/footer');
    }
        public function delete($id)
    {
        if(!$this->session->userdata('logged_in'))
       {
        redirect('home/login', 'refresh');
       }
        $this->Item_model->delete($id);
        $this->load->helper('url');
        redirect('item/index');
    }

    public function create()
    {
        if(!$this->session->userdata('logged_in'))
       {
        redirect('home/login', 'refresh');
       }
        //$data['utilizador'] = $this->Utilizador_model->create();
        $data['title'] = 'Items';
        $this->load->view('templates/header', $data);
        $this->load->view('item/create');
        $this->load->view('templates/footer');
    }

    public function create_manual()
    {
        if(!$this->session->userdata('logged_in'))
       {
        redirect('home/login', 'refresh');
       }
        //$data['utilizador'] = $this->Utilizador_model->create();
        $data['title'] = 'Items';
        $this->load->view('templates/header', $data);
        $this->load->view('item/create_manual');
        $this->load->view('templates/footer');
    }
    
    public function add()
    {
        /*if (strpos($this->input->post('userfile'),'.svg') == false) {
          // redirect('home/index', 'refresh');
           echo $this->input->post('userfile'); 
           echo "aki";
        }*/
        //echo file_get_contents($this->input->post('svg'));
        /*if(!$this->session->userdata('logged_in'))
       {
        redirect('home/login', 'refresh');
       }
        $item = array('name' => $this->input->post('name'),
                            'layer' => $this->input->post('layer'),
                            'color' => $this->input->post('color'),
                            'svg' => $this->input->post('svg'),
                            'type' => $this->input->post('type'));
        $this->Item_model->create($item);
        
        $this->load->helper('url');
        redirect('item/index');*/
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());

            echo $error;
        }
        else
        {
            $data = $this->upload->data();
            if (strpos($data['file_name'],'.svg') == false) {
               unlink('./uploads/'.$data['file_name']); 
               echo "Wrong file type";
            }
            $layer="";
            $type="";
            $newSvg="";
            $name="";
            $color="";
            $svg=file_get_contents('./uploads/'.$data['file_name']);
            $xml = new SimpleXMLElement($svg);
            $xml['height']='128px';
            $xml['width']='128px';
            $layer=$xml['layer'];
            $name=$xml['id'];
            $type=$xml['type'];
            $newSvg=$xml->asXml();
            if($layer=="" || $type=="" || $newSvg=="" || $name=="")
            {
               unlink('./uploads/'.$data['file_name']); 
               echo "Not Enough Information!";
                echo 'Layer: '.$layer;
                echo 'Type: '.$type;
                echo 'Svg: '.$newSvg;
                echo 'Name: '.$name;
            }
            $item = array('name' => (string)$name,
                    'layer' => $layer,
                    'color' => $color,
                    'svg' => (string)$newSvg);

            $this->Item_model->create($item, $type);
            unlink('./uploads/'.$data['file_name']);
            $this->load->helper('url');
            redirect('item/index');

        }
    }

    public function add_manual()
    {
        /*if (strpos($this->input->post('userfile'),'.svg') == false) {
          // redirect('home/index', 'refresh');
           echo $this->input->post('userfile'); 
           echo "aki";
        }*/
        //echo file_get_contents($this->input->post('svg'));
        /*if(!$this->session->userdata('logged_in'))
       {
        redirect('home/login', 'refresh');
       }
        $item = array('name' => $this->input->post('name'),
                            'layer' => $this->input->post('layer'),
                            'color' => $this->input->post('color'),
                            'svg' => $this->input->post('svg'),
                            'type' => $this->input->post('type'));
        $this->Item_model->create($item);
        
        $this->load->helper('url');
        redirect('item/index');*/
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());

            echo $error;
        }
        else
        {
            $data = $this->upload->data();
            if (strpos($data['file_name'],'.svg') == false) {
               unlink('./uploads/'.$data['file_name']); 
               echo "Wrong file type";
            }
            $layer=$this->input->post('layer');
            $type=$this->input->post('type');
            $newSvg="";
            $name=$this->input->post('name');
            $color=$this->input->post('color');

            $svg=file_get_contents('./uploads/'.$data['file_name']);
            $xml = new SimpleXMLElement($svg);
            $xml['height']='128px';
            $xml['width']='128px';
            if(isset($xml['layer']))
            {
                $xml['layer']=$layer;
            }
            else
            {
                $xml->addAttribute('layer', $layer);
            }
            if(isset($xml['type']))
            {
                $xml['type']=$type;
            }
            else
            {
                $xml->addAttribute('type', $type);
            }
            if(isset($xml['id']))
            {
                $xml['id']=$name;
            }
            else
            {
                $xml->addAttribute('id', $name);
            }
            $newSvg=$xml->asXml();
            $item = array('name' => (string)$name,
                    'layer' => $layer,
                    'color' => $color,
                    'svg' => (string)$newSvg);

            $this->Item_model->create($item, $type);
            unlink('./uploads/'.$data['file_name']);
            //$this->load->helper('url');
            redirect('item/index');

        }
    }
}
?>