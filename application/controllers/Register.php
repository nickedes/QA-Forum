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
			$this->load->model('Users');
			$this->load->library('email');
			$this->load->library('validation');
		}
		
		function index()
		{
			if (isset($_POST['submit']))
			{
				// Validations from library
				if($this->validation->register_validations() == TRUE)
   				{
   					$email = $_POST['email'];
					$name = $_POST['name'];
					
					// generating a random hash key for the activation of the link.

					$hash_key = md5(rand(1,100000));
					$data = array(
						$_POST['name'],
						$_POST['email'],
						$_POST['mobileno'],
						'/',
						md5($_POST['password']),
						$hash_key	
						);

					if ($this->Users->insert($data))
					{
						echo "the user is entered successfully.";
						if ($this -> send_verification_mail($name,$email,$hash_key))
						{
							echo "The mail has been sent to your email ".$email.". Please verify your email to proceed.";
						}
						else
						{
							echo "Something went wrong while sending you a mail.";
						}
					}		
				}
				else
				{
					echo "Registration failed";
					$this->load->view('register');
				}
			}
			else
			{
				$this->load->view('register');
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
	}
?>