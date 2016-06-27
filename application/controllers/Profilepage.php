<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profilepage extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model('users');
	}

	function index()
	{ 
		echo $this->session->userdata('email');
		if($this->session->userdata('email') != FALSE)
			echo "P";
		else
			echo "n";
		//$this->load->view('profile_self_view');

	}

	function self()
	{
		$this->load->view('selfprofile');
	}		

	function update_details()
	{	$formSubmit = $this->input->post('submitform');
if( $formSubmit == 'cancel' )
    {
    	$this->load->helper('url');
         	redirect('success');
    }
	//echo $this->session->userdata('email');
		$data = array(
			'name'=> $_POST['name'],
			'email' => $this->session->userdata('email'),
			'mobileno' => $_POST['mobileno'],
			'password' => md5($_POST['password']),
			'about' => $_POST['about']
			);
			$this->session->set_userdata($data);
			$this->users->edit_details($data);
	}

	function pub()
	{
		echo "rahul";
		//$this->load->view('publicprofile');
	}
}