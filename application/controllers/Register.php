<?php 
	/**
	* 
	*/
	class Register extends CI_Controller
	{
		
		function __construct()
		{	
			parent::__construct();
			
		}
		
		function index()
		{
			$this->load->model('Users');
			if ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['mobileno']))
			{
				// $data = $this->input->post();
				$data = array(
					$_POST['name'],
					$_POST['email'],
					$_POST['mobileno'],
					'/',
					$_POST['password'],
					md5($_POST['password'])
					);

				if ($this->Users->insert($data))
				{
					return "the user is entered successfully.";
				}		
				else
				{
					return "the user is wrong";
				}
			}
			else
			{
				$this->load->view('register');
			}
		}
	}
?>