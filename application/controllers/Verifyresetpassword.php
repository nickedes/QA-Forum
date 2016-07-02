<?php 
	/**
	* This class takes care of verifying the email id
	*/
	class Verifyresetpassword extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('Users');
		}

		function index()
		{
			$this->load->view('templates/header');
			if (isset($_GET['key']))
			{
				$hash_key = $_GET['key'];
				if($this->Users->check_hash_key($hash_key))
				{
					$email= $_GET['email'];
					
					// $this->load->view('templates/header');
					$this->load->view('resetpassword',array('email'=>$email));
				}
				else
				{
					echo '<br><div class="alert alert-danger text-center">Wrong hash key</div>';
				}
			}
			else
			{
				echo '<br><div class="alert alert-danger text-center">No key Found</div>';
			}
			$this->load->view('templates/footer');
		}
	}
?>