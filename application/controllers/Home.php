<?php

class Home extends  CI_Controller {

	function __construct() {
		parent::__construct();
		if(!isset($this->session->userdata['email']))
		{
			$this->load->helper('url');
			redirect('login');
		}
		$this->load->helper('url');
		$this->load->model('Users');
		$this->load->model('answers');
		$this->load->model('questions');
	}

	function index() {
		$this->load->model('questions');
		$this->load->model('answers');
		$ques_user = $this->questions->get_ques_user();
		$ques_tag = $this->questions->get_ques_tag();
		print_r($ques_user);
		echo "<br><br>";
		print_r($ques_tag);
		
		//$rec_questions= $this->questions->get_allq_sorted();
		$int_questions= $this->questions->get_all_interestedq($this->session->userdata['user_id']);
	//	print_r($int_questions);
		$ans_count= $this->questions->get_anscount();
		
		$answers = array();
		foreach ($ans_count as $key ) {
			$answers[$key['q_id']] = $key['count'];
		}
		$r = array(
			"rec_questions" => $rec_questions,
			"int_questions" => $int_questions,
			"answers" => $answers
			);

		$this->load->view('templates/header');
		$this->load->view('homeview',$r);
		$this->load->view('templates/footer');

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
			{
				echo "ABout to logout !!!";
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
