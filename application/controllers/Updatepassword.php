<?php 
	/**
	* This class takes care of verifying the email id
	*/
	class updatepassword extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('Users');
			$this->load->library('form_validation');
		}

		function index()
		{
		/*	echo "aaaya?";
			echo $_POST['new_pass'];
			$data= array('value' => $_POST['new_pass'],
				'email' => $_POST['hidden_email']
				);
			$this->users->update_password($data);*/

			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('password1', 'Password', 'trim|required|matches[password]');//add matches at application level also
			if($this->form_validation->run() == TRUE)
			{
				if($this->Users->reset_pass($this->input->post('email'),$this->input->post('password'))==TRUE)
				{
					echo "Password Reset Successfull";
				}
				else
				{
					echo "Something went wrong while resetting.";
				}
			}
			else
			{
				$this->load->view('resetpassword',array('email'=>$this->input->post('email')));
			}

		}
	}


	?>