<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class success extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {  echo "asdasd";
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['email'] = $session_data['email'];
     $this->load->view('success_view', $data);
   }
   else
   { $this->load->helper('url');
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
    $this->load->helper('url');
   redirect('login', 'refresh');
 }

}

?>