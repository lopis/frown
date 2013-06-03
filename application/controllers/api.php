<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class API extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
 
        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        /* ------------------ */ 
        $this->load->model('Item_model');
        $this->load->model('Avatar_model');
    }
 
    public function index()
    {
        /*if(!$this->session->userdata('logged_in'))
       {
        redirect('home/login', 'refresh');
       }
        $data['items'] = $this->Item_model->get_all();
        $data['title'] = 'Items';

        $this->load->view('templates/header', $data);
        $this->load->view('item/index', $data);
        $this->load->view('templates/footer');*/

    }

    public function getItem($id)
    {
        $data['item'] = $this->Item_model->get_by_id($id)->row();
        if($this->Item_model->get_type_by_id($id)!=null)
            $data['type'] = $this->Item_model->get_type_by_id($id)->row();
        else
            $data['type'] = null;
        $data['title'] = 'Items';
        $xml = new SimpleXMLElement($data['item']->svg);
         if(isset($xml['layer']))
        {
            $xml['layer']=$data['item']->layer;
        }
        else
        {
            $xml->addAttribute('layer', $data['item']->layer);
        }
        if(isset($xml['type']))
        {
            if($data['type']!=null)
                $xml['type']=$data['type']->name;
            else
                $xml['type']='NoType';
        }
        else
        {
            if($data['type']!=null)
                $xml->addAttribute('type', $data['type']->name);
            else
                 $xml->addAttribute('type', 'NoType');
        }
        if(isset($xml['id']))
        {
            $xml['id']=$data['item']->name;
        }
        else
        {
            $xml->addAttribute('id', $data['item']->name);
        }
        header('Content-type: text/xml; charset=utf-8');
        echo $xml->asXml();
    }

    public function getAllItems()
    {
        $data['item'] = $this->Item_model->get_all();
        $dom = new DOMDocument('1.0', 'utf-8');
        $dom->formatOutput = true;
        $items = $dom->createElement('items');
        $dom->appendChild($items);
        foreach ($data['item'] as $getitem){
            $item = $dom->createElement('item');
            $item = $items->appendChild($item);
            $item-> setAttribute("name", $getitem['name']);
            $item-> setAttribute("id", $getitem['id']);
            $type = 'NoType';
            if($this->Item_model->get_type_by_id($getitem['id'])!=null)
            {
                $type = $this->Item_model->get_type_by_id($getitem['id'])->row();
                $item-> setAttribute("type", $type->name);
            }
            else
                $item-> setAttribute("type", $type);
    }
        header('Content-type: text/xml; charset=utf-8');
        echo $dom->saveXML();
    }

    public function getAvatar($id)
    {
        $data['avatar'] = $this->Avatar_model->get_by_id($id)->row();

        $xml = new SimpleXMLElement($data['avatar']->svg);

        header('Content-type: text/xml; charset=utf-8');
        echo $xml->asXml();
    }

    public function downloadAvatar($id)
    {
        $data['avatar'] = $this->Avatar_model->get_by_id($id)->row();

        $xml = new SimpleXMLElement($data['avatar']->svg);

        header('Content-type: text/xml; charset=utf-8');
        $file = 'uploads/'.str_replace(" ", "_", $data['avatar']->name).'.svg';
        $fh = fopen($file, 'w') or die("can't open file");

        $stringData=$xml->asXml();
        fwrite($fh, $stringData);
        fclose($fh);
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            unlink($file); 
            exit;
        }
    }

    public function downloadItem($id)
    {
        $data['item'] = $this->Item_model->get_by_id($id)->row();

        $xml = new SimpleXMLElement($data['item']->svg);

        header('Content-type: text/xml; charset=utf-8');
        $file = 'uploads/'.str_replace(' ', '_', $data['item']->name).'.svg';
        $fh = fopen($file, 'w') or die("can't open file");

        $stringData=$xml->asXml();
        fwrite($fh, $stringData);
        fclose($fh);
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            unlink($file); 
            exit;
        }
    }

    public function getAllAvatars()
    {
        $data['avatar'] = $this->Avatar_model->get_all();
        $dom = new DOMDocument('1.0', 'utf-8');
        $dom->formatOutput = true;
        $avatars = $dom->createElement('avatars');
        $dom->appendChild($avatars);
        foreach ($data['avatar'] as $getavatar){
            $avatar = $dom->createElement('avatar');
            $avatar = $avatars->appendChild($avatar);
            $avatar-> setAttribute("name", $getavatar['name']);
            $avatar-> setAttribute("id", $getavatar['id']);
    }
        header('Content-type: text/xml; charset=utf-8');
        $dom->saveXML();
    }

    public function makeAvatar()
    {
        $i=1;
        $dom = new DOMDocument('1.0', 'utf-8');
        $dom->formatOutput = true;
        $header= $dom->createDocumentFragment();
        $header->appendXML('<svg version="1.1" baseProfile="basic"
     id="makeavatar" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="128px" height="128px"
     viewBox="0 0 512 512" xml:space="preserve"></svg>');
        $header = $dom->appendChild($header);
        while($this->input->get('item'.$i)!=null)
            {
                if($this->Item_model->get_by_id($this->input->get('item'.$i))->num_rows()!=0)
                {
                    $item = $this->Item_model->get_by_id($this->input->get('item'.$i))->row();
                    //echo $item->svg;
                    $dom1 = new DOMDocument;
                    $dom1->loadXML($item->svg);
                    $oldNode = $dom1->getElementsByTagName('svg')->item(0);
                    $svg = $dom->CreateDocumentFragment();
                    foreach($oldNode->childNodes as $path)
                    {
                        $svg->appendChild($dom->importNode($path,true));
                    }

                    $svg=$header->appendChild($svg);
                    $i=$i+1;
                }
                else
                {
                    $i=$i+1;
                }
            }
        header('Content-type: text/xml; charset=utf-8');
        echo $dom->saveXML();
    }
    
    
}
?>