<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Profilepage extends CI_Controller{

		function __construct()
		{
			parent::__construct();
			if(!isset($this->session->userdata['email']))
			{
				redirect('login');
			}
			$this->load->model('users');
			$this->load->model('answers');
			$this->load->model('questions');
			$this->load->model('follows');
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
				'questions' => $questions,
				'answers' => $answers,
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
			if($formSubmit == 'cancel')
			{
				$this->load->helper('url');
				redirect('success');
			}
			elseif( $formSubmit == 'logout')
			{
				echo "ABout to logout !!!";
				$this->session->unset_userdata('email');
				session_destroy();
				redirect('login', 'refresh');
			}
			$data = array(
				'name'=> $_POST['name'],
				'email' => $this->session->userdata('email'),
				'mobileno' => $_POST['mobileno'],
				'password' => md5($_POST['password']),
				'about' => $_POST['about']
				);
			$this->session->set_userdata($data);
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
				'questions' => $questions,
				'answers' => $answers,
				'tags' => $tags
				);
			$this->load->view('publicprofile',$data);
		}
	}