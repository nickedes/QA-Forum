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
		$this->load->model('users');
		$this->load->model('tags');
		$this->load->model('answers');
		$this->load->model('questions');
		$this->load->model('pagingclass');
		$this->load->library('Sessionlibrary');
	}

	function index() {
				// Get info about users and questions
		$ques_user = $this->questions->get_ques_user();
		$ques_user_details = array();
		foreach ($ques_user as $q) {
			$ques_user_details[$q['q_id']] = $q;
		}
		$ques_tags = $this->questions->get_ques_tag();

		$rec_questions= $this->questions->get_allq_sorted();//earlier rec_questions
		// $records_per_page=3;
       //// $rec_questions = $this->pagingclass->paging($query,$records_per_page);

		$int_questions= $this->questions->get_all_interestedq($this->session->userdata['user_id']);
		$ans_count= $this->answers->get_anscount();

		$get_tags = $this->tags->get();
		$tag_details = array();
		foreach ($get_tags as $tag) {
			$tag_details[$tag['tag_id']] = $tag['name'];
		}
		$answers = array();
		foreach ($ans_count as $key ) {
			$answers[$key['q_id']] = $key['count'];
		}
		//print_r($int_questions);														
		$r = array(
			'rec_questions' => $rec_questions['result'],
			'rec_query' => $rec_questions['query'],
			'rec_record_per_page' => $rec_questions['record_per_page'],
			'int_questions' => $int_questions['result'],
			'int_query' => $int_questions['query'],
			'int_record_per_page' => $int_questions['record_per_page'],			
			'ques_tags' => $ques_tags,
			'ques_user_details' => $ques_user_details,
			'tag_details' => $tag_details,
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
		else if( $formSubmit == 'question' )
		{
		//$this->load->helper('url');
			redirect('question_controller');
		}

		}
		function logout()
		{
			$this->sessionlibrary->destroy_session();
			redirect('home');
		}
	}

	?>
