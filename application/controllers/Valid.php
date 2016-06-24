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

   $this->session->set_userdata('logged_in', $data);
   $this->load->helper('url');
   redirect('success');
 }
 else
 { 

  /*Redirect the user to some site*/ 
  $this->load->view('form');
}


    function new_password()
    {
      echo "helloo new password";
    }
}


}