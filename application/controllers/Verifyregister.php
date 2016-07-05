<?php 
	/**
	* 
	*/
	class Verifyregister extends CI_Controller
	{
		
		function __construct()
		{	
			parent::__construct();
			$this->load->helper(array('form'));
			$this->load->model('Users');
			$this->load->library('email');
			$this->load->library('form_validation');
		}
		
		function index()
		{
			if(($this->input->post('email') != NULL) && ($this->input->post('password') != NULL) && ($this->input->post('name') != NULL) && ($this->input->post('mobileno') != NULL) && ($this->input->post('confirm_password') != NULL))
			{
				// Validations from library
				$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');
				$this->form_validation->set_rules('password', 'Password', 'trim|min_length[6]|required|xss_clean');
				$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]');
				$this->form_validation->set_rules('mobileno', 'Mobile', 'required|exact_length[10]');
				$this->form_validation->set_rules('confirm_password', 'Confirm password', 'trim|required|matches[password]');

				if($this->form_validation->run() == TRUE)
				{
					$email = $_POST['email'];
					$name = $_POST['name'];
					
					// generating a random hash key for the activation of the link.
					$hash_key = md5(rand(1,100000));

					$data = array(
						$this->input->post('name'),
						$this->input->post('email'),
						$this->input->post('mobileno'),
						'/',
						// password is hashed
						md5($this->input->post('password')),
						$hash_key
						);

					$response = array('success' => 0);
					// check if email id already exists or not
					$email_exists = $this->Users->userexist('email', $this->input->post('email'));
					// check if mobile no. already exists or not
					$mobile_exists = $this->Users->userexist('mobileno', $this->input->post('mobileno'));
					// when both email and mobile are unique
					if($email_exists == FALSE && $mobile_exists == FALSE)
					{
						// insert data in database.
						if ($this->Users->insert($data))
						{
							$response['success'] = 1;
							// send activation link
							if ($this -> send_verification_mail($name,$email,$hash_key))
							{
								// set to check if verification sent or not
								$response['email'] = $email;
								$response['success_message'] = 'Registration complete. Please complete registration by clicking link';

							}
						}		
						else
						{
							$response['success'] = 0;
							$response['message'] = "Unable to insert in database";
						}
					}
					else
					{
						$response['success'] = 0;
						// email id already exists in db.
						if($email_exists)
							$response['email'] = "The email id already exists. Please sign up with a different email id.";
						// if mobile no already exists in db
						if($mobile_exists)
							$response['mobileno'] = 'The mobile no already exists. Please sign up with a different mobile no.';
					}
				}
				else
				{
					$response = array(
						'name' => form_error('name'),
						'email' => form_error('email'),
						'mobileno' => form_error('mobileno'),
						'password' => form_error('password'),
						'confirm_password' => form_error('confirm_password'),
						'success' => 0
						);
				}
				echo json_encode($response);
			}
			else
			{
				$this->load->view('templates/header');
				$this->load->view('register_view');
				$this->load->view('templates/footer');
			}
		}
		function send_verification_mail($username,$address,$hash_key)
		{
			// first create the link to be send to the user.
			$link = "http://localhost/codeigniter/index.php" . '/verifyemail?key='. $hash_key;

			// subject to be send at the particular email ids
			$subject = 'Verify your email id for project.com';
			// message in which the link will be mentioned

			$message = 'Hi '.$username.'! Welcome to the MyForum. Please verify your email by clicking the link: '.$link;

			$result = $this->email
			->from('jamiamentors@gmail.com')
			->to($address)
			->subject($subject)
			->message($message)
			->send();

              //  var_dump($result);
               // echo '<br />';
               // echo $this->email->print_debugger();
			return $result;
		}

		function resend_verification_mail()
		{
			$user_details = $this->Users->userexist('email', $_POST['email']);
			$username = $user_details[0]['name'];
			$address = $_POST['email'];
			$hash_key = $user_details[0]['hash_key'];
			$is_active = $this->session->userdata('is_active');

			// response to ajax call.
			$response = array();

			// send verification link to user
			if($this->send_verification_mail($username,$address,$hash_key))
			{
				$response['success'] = 1; 
			}
			else
			{
				$response['message'] = "Unable to send verification mail";
			}
			echo json_encode($response);
		}
	}
	?>