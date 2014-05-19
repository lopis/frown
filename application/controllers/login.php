<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* by João Lopes & Ricardo Pinho */
/* FEUP 2013 - LAPD */
/* http://paginas.fe.up.pt/~ei10009 */

class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
   $this->load->helper(array('form'));
   $this->load->view('login_view');
 }

}

?>