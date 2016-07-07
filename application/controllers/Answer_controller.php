<?php 
	/**
	* 
	*/
	class Answer_controller extends CI_Controller
	{
		
		function __construct()	
		{
			parent::__construct();
			$this->load->model('Answers');
			$this->load->model('Questions');
			$this->load->model('Users');
			$this->load->library('email');
		}
		function index()
		{
			echo "in";
		}
		function post_answer()
		{
			$response = array('success' => 0);				
			if(isset($_POST['user_id']))
			{
				$data = array($_POST['q_id'], $_POST['user_id'], $_POST['answer']);
				
				if($this->Answers->insert($data))
				{
					$response['success'] = 1;
					// Get question details by Question id.
					$question = $this->Questions->get($_POST['q_id']);

					$title = $question[0]['title'];
					$link = site_url().'/question/get/'.$_POST['q_id'];
					
					$message = "A new answer is added on the question ".$title.". Click here to visit: ".$link;
					// array for email id of contributors
					
					$email_list = array();
					$user_id = $question[0]['user_id'];
					// echo $user_id;
					if($_POST['user_id'] != $user_id)
					{
						// get user details by user id.
						$user_details = $this->Users->get($user_id);
						// Get all answers for a particular Question id. 
						array_push($email_list, $user_details[0]['email']);
					}
					
					$answers = $this->Answers->get_byQId($_POST['q_id']);
					
					foreach ($answers['result'] as $answer) {
						if($answer['user_id'] != $user_id)
						{
							$answer_user = $answer['user_id'];
							$email = $this->Users->get($answer_user)[0]['email'];
							if(!in_array($email, $email_list, true)){
								array_push($email_list, $email);
							}
						}
					}
					// Send mail to the contributors
					foreach ($email_list as $email) {
						$result = $this->email
						->from('jamiamentors@gmail.com')
						->to($email)
						->subject("New activity on QA-forum")
						->message($message)
						->send();
					}
				}
				else
					$response['message'] = 'Answered couldnot be posted';
			}
			else
			{
				$response['message'] = 'Something is wrong with post parameters';
			}
			echo json_encode($response);
		}
	}
?>