<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Profilepage extends CI_Controller{

		function __construct()
		{
			parent::__construct();
			// when session is not set or user is not verified ->send to login page
			if(!isset($this->session->userdata['email']))
			{
				redirect('login');
			}
			$this->load->model('users');
			$this->load->model('answers');
			$this->load->model('questions');
			$this->load->model('follows');
			$this->load->library('Sessionlibrary');
		}

		function self()
		{
			$user_id = $this->session->userdata['user_id'];
			// Get all questions asked by this user
			$questions = $this->questions->get_questions($user_id);
			// Get all answers given this user
			$answers = $this->answers->get_answers($user_id);
			// Get all tags followed by this user
			$tags = $this->follows->get_tags($user_id);
			// Get user details
			$user_details = $this->users->get($user_id);
			// collect all the above information in array
			
			$data = array(
			'ques_res' => $questions['result'],
			'ques_query' => $questions['query'],
			'ques_rec_record_per_page' => $questions['record_per_page'],
			'ans_res' => $answers['result'],
			'ans_query' => $answers['query'],
			'ans_rec_record_per_page' => $answers['record_per_page'],

			'tags' => $tags,
			'user_id' => $user_id,
			'user_details' => $user_details
			);

			// load self-profile page
			$this->load->view('templates/header');
			$this->load->view('selfprofile',$data);
			// $this->load->view('templates/footer');
		}		

		function update_details()
		{	
			$formSubmit = $this->input->post('submitform');
			var_dump($formSubmit);
			if($formSubmit == 'cancel')
			{
				$this->load->helper('url');
				redirect('success');
			}
			elseif( $formSubmit == 'logout')
			{
				$this->session->unset_userdata('email');
				session_destroy();
				redirect('login', 'refresh');
			}
			// get details from submit form of save changes
			$data = array(
				'name'=> $_POST['name'],
				'email' => $this->session->userdata('email'),
				'user_id' => $this->session->userdata('user_id'),
				'mobileno' => $_POST['mobileno'],
				// 'password' => md5($_POST['password']),
				'is_active' => $this->session->userdata('is_active'),
				'hash_key' => $this->session->userdata('hash_key'),
				'about' => $_POST['about']
				);
			$this->sessionlibrary->set_session($data);
			// $this->session->set_userdata($data);
			$this->users->edit_details($data);
		}

		function get($user_id)
		{	
			$this->load->model('users');
			if($user_id == $this->session->userdata('user_id'))
			{
				redirect('profilepage/self');
			}
			// Get user details
			$user_details = $this->users->get($user_id);
			// Get all questions asked by this user
			$questions = $this->questions->get_questions($user_id);
			// Get all answers given this user
			$answers = $this->answers->get_answers($user_id);
			// Get all tags followed by this user
			$tags = $this->follows->get_tags($user_id);

			$data = array(
				'user_details' => $user_details,
				'questions' => $questions['result'],
				'ques_query' => $questions['query'],
				'ques_record_per_page' => $questions['record_per_page'],
				'answers' => $answers['result'],
				'ans_query' => $answers['query'],
				'ans_record_per_page' => $answers['record_per_page'],
				'tags' => $tags
				);
			$this->load->view('templates/header');
			$this->load->view('publicprofile',$data);
			// $this->load->view('templates/footer');
		}
	}