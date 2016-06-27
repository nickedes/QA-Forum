<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class valid extends CI_Controller{

	function __construct()
 {  
  parent::__construct();
}

function index()
{ 
 $data = array(
  "email" => $_POST['email'],
  'password' => md5($_POST['password'])
  );
 

 $this->load->model("users");
 if($this->users->check($data)== TRUE)
 {
   $sess_data = $this->users->getuser($data['email']);
   print_r($sess_data[0]);
   $this->session->set_userdata($sess_data[0]);
   $this->load->helper('url');
   redirect('success');
 }
 else
 { 

  /*Redirect the user to some site*/ 
  $this->load->view('form');
}


}


}