<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Forgotpassword extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//$this->load->library('form_validation');
		
			$this->load->model('Users');
			$this->load->library('email');
	}

	function index()
	{
		$this->load->view('forgot_pass');
		if (isset($_POST['forgot_submit']))
		{
			
			$this->load->library('form_validation');
 
   			$this->form_validation->set_rules('forgot_email', 'Forgot_Email', 'valid_email|trim|required');
			
				if ($this->form_validation->run() == TRUE)
			{

				$em = $_POST['forgot_email'];

			 		// generating a random hash key for the activation of the link.
				$r = $this->Users->userexist($em);
				if( $r != FALSE) 
				{
					echo "user already exists<br>";
					
          	
					if ($this -> send_verification_mail($r[0]['name'],$em,$r[0]['hash_key']))
						{
							echo "The mail has been sent to your email ".$em.". Please verify your email to proceed.";
						}
						else
						{
							echo "Something went wrong while sending you a mail.";
						}
				}
				else
					echo "Enter registered email id";
			
			}

			else
			{
				echo "not working";
				//$this->load->view('forgotpassword');
			}

		}
		else
		{echo "Errrrrorrrrrr!!!!!!!!!!!!!";
			//$this->load->view('forgotpassword');
		}

	}




	function send_verification_mail($username,$address,$hash_key)
		{
			// first create the link to be send to the user.
			$link = "http://localhost/codeigniter/index.php" . '/verifyresetpassword?key='. $hash_key .'&email='.$address;

			// subject to be send at the particular email ids
			$subject = 'Password Reset';
			// message in which the link will be mentioned

			$message = 'Hi '.$username.'! Welcome to the MyForum. Please reenter your new password by clicking the link: '.$link;

			$result = $this->email
			->from('rahulsaini027@gmail.com')
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