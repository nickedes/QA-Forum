<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profilepage extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		if(!isset($this->session->userdata['email']))
		{
			$this->load->helper('url');
			redirect('login');
		}
		$this->load->model('users');
	}

	function index()
	{ 
		echo $this->session->userdata('email');
		if($this->session->userdata('email') != FALSE)
			echo "P";
		else
			echo "n";
		//$this->load->view('profile_self_view');

	}

	function self()
	{
		$this->load->model('users');
		$questions= $this->users->get_questions($this->session->userdata['user_id']);
		//print_r($questions);
		$answers= $this->users->get_answers($this->session->userdata['user_id']);
		//print_r($answers);
		//echo "<br><br>";
		$tags= $this->users->get_tags($this->session->userdata['user_id']);
  		//print_r($tags);
		$data = array(
			'questions' => $questions,
			'answers' => $answers,
			'tags' => $tags
			);


		$this->load->view('selfprofile',$data);
	}		

	function update_details()
	{	$formSubmit = $this->input->post('submitform');
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
		$userdetails = $this->users->getuserdetails($user_id);
		$questions= $this->users->get_questions($user_id);
		$answers= $this->users->get_answers($user_id);
		$tags= $this->users->get_tags($user_id);
		$data = array(
			'userdetails' => $userdetails,
			'questions' => $questions,
			'answers' => $answers,
			'tags' => $tags
			);
		print_r($data);
		$this->load->view('publicprofile',$data);
	}
}