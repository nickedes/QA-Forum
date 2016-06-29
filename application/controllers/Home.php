<?php

class Home extends  CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Users');
	}

	function index() {
	   		// print_r($this->Users->get_data());
	   		//$data = 
		$this->load->model('questions');
		$this->load->model('answers');
		$rec_questions= $this->questions->get_allq_sorted();
		$int_questions= $this->questions->get_all_interestedq($this->session->userdata['user_id']);
		$ans_count= $this->questions->get_anscount();
		// print_r($ans_count);

		$answers = array();
		foreach ($ans_count as $key ) {
			// print_r($key['count']);
			$answers[$key['q_id']] = $key['count'];
			// $count[] = array($key['q_id'] => $key['count']);
		}
	//	print_r($answers);
	//	echo "rahul";
		// print_r($count);
	//	echo $count[0]['2'];
		$r = array(
			"rec_questions" => $rec_questions,
			"int_questions" => $int_questions,
			"answers" => $answers
			);

          //  echo "<br><br>";
	   		//print_r($rec_questions);
		$this->load->view('homeview',$r);

	}


	function butn_redirection() {
		$formSubmit = $this->input->post('submitform');
		if( $formSubmit == 'edit' )
		{
			//$this->load->helper('url');
			redirect('profilepage/self');
		}
		else 
			if ( $formSubmit == 'logout')
				{echo "ABout to logout !!!";
			$this->session->unset_userdata('email');
			session_destroy();
			//$this->load->helper('url');
			redirect('login', 'refresh');
		}
		else if( $formSubmit == 'question' )
		{
			//$this->load->helper('url');
			redirect('question_controller');
		}
		
	}

}

?>
