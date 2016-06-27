<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller{

	function __construct()
	{


		parent::__construct();
if(isset($this->session->userdata['email']))
 {
 	$this->load->helper('url');
 	redirect('profilepage/self');
 }
	}

	function index()
	{ 
		$this->load->view('form');

	}
}