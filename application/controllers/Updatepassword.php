<?php 
	/**
	* This class takes care of verifying the email id
	*/
	class Updatepassword extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('Users');
			$this->load->library('form_validation');
		}

		function index()
		{
			if(($this->input->post('email') != NULL) && ($this->input->post('password') != NULL))
			{
				// validation rules
				$this->form_validation->set_rules('password', 'Password', 'trim|required');
				$this->form_validation->set_rules('confirm_password', 'Password', 'trim|required|matches[password]');

				// to save response of the controller in this array
				$response = array();
				// given a default value; means unsuccessful reset password
				$response['success'] = 0;
				// when the above validations are satisfied
				if($this->form_validation->run() == TRUE)
				{
					// update password in db
					if($this->Users->reset_pass($this->input->post('email'),$this->input->post('password'))==TRUE)
					{
						$response['success'] = 1;
						$response['message'] = 'Password Reset Successful';
					}
					else
					{
						$response['message'] = "Unable to reset password in db. Something went wrong";
					}
				}
				else
				{
					// take form vaidation error messages when form validations false
					$response['password'] = form_error('password');
					$response['confirm_password'] = form_error('confirm_password');
				}
				echo json_encode($response);
			}
			else
			{
				$this->load->view('templates/header');
				$this->load->view('resetpassword',array('email'=>$this->input->post('email')));
				$this->load->view('templates/footer');
			}
		}
	}


	?>