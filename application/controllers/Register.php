<?php 
	/**
	* 
	*/
	class Register extends CI_Controller
	{
		
		function __construct()
		{	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper(array('form'));
			$this->load->helper('security');
			$this->load->library('form_validation');
			$this->load->model('Users');
		}
		
		function index()
		{
			if (isset($_POST['submit']))
			{
				// Validations here
				// TODO: Add validations in a Libraray.

 				$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');
   				
   				$this->form_validation->set_rules('password', 'Password', 'trim|min_length[6]|required|xss_clean');

				$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]');
   				
   				$this->form_validation->set_rules('mobileno', 'Mobile', 'required|exact_length[10]');

   				$this->form_validation->set_rules('confirm_password', 'Confirm password', 'trim|required|matches[password]');

   				if($this->form_validation->run() == TRUE)
   				{
					$data = array(
						$_POST['name'],
						$_POST['email'],
						$_POST['mobileno'],
						'/',
						md5($_POST['password']),
						md5(rand(1, 1000))
						);

					if ($this->Users->insert($data))
					{
						echo "the user is entered successfully.";
					}		
				}
				else
				{
					echo "Question failed";
					$this->load->view('question');
				}
			}
			else
			{
				$this->load->view('question');
			}
		}
	}
?>