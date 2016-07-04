<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Forgotpassword extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//$this->load->library('form_validation');
		
			$this->load->model('Users');
			$this->load->library('email');
			$this->load->library('form_validation');
	}

	function index()
	{
		if (isset($_POST['forgotpassword_email']))
		{
			// set rules for form validations
   			$this->form_validation->set_rules('forgotpassword_email', 'Email', 'valid_email|trim|required|xss_clean');
			// response of the controller
			$response = array();
			$response['success'] = 0;
			if ($this->form_validation->run() == TRUE)
			{
				$email = $_POST['forgotpassword_email'];
				$r = $this->Users->userexist('email', $email);
				if( $r != FALSE) 
				{
          	
					if ($this -> send_verification_mail($r[0]['name'],$email,$r[0]['hash_key']))
					{
						$response['success'] = 1;
						$response['success_message'] = 'Email sent : Reset password';
						
					}
					else
					{
						$response['message'] = 'Unable to send email. Please try later.';
					}
				}
				else
				{	
					$response['message'] = "Email id doesn't exist.";
				}
			}
			else
			{
				$response['message'] = form_error('forgotpassword_email');
			}
		}
		else
		{
			$response['message'] = "Not a valid request.";
		}
		echo json_encode($response);
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