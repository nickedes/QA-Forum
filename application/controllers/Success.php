<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class success extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {  echo "asdasd";
 //echo $this->session->userdata('name');
   if($this->session->userdata('email'))
   {
   //  $session_data = $this->session->userdata('logged_in');
     //$data['name'] = $this->session->userdata('name');
     $this->load->view('question');
    // $this->load->helper('url');
     //If no session, redirect to login page
    // redirect('profilepage', 'refresh');
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