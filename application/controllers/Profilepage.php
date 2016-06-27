<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profilepage extends CI_Controller{

	function __construct()
	{
		parent::__construct();
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
  		$tags= $this->users->get_tags($this->session->userdata['user_id']);
  		$data = array(
  			'questions' => $questions,
  			'answers' => $answers,
  			'tags' => $tags
  			);
  		print_r($tags);
  		// $data = array(
  		// 	'title' => $questions['title'],
  		// 	'description' => $questions['title'],
  		// 	'creation_time' => $questions['creation_time'],
  		// 	'answer_text' => $answers['answer_text'],
  		// 	'answer_time' => $answers['answer_time'],
  		// 	'tag_name' => $tags['name']
  		// 	);
  		// print_r($data);
 
		$this->load->view('selfprofile',$data);
	}		

	function update_details()
	{	$formSubmit = $this->input->post('submitform');
if( $formSubmit == 'cancel' )
    {
    	$this->load->helper('url');
         	redirect('success');
    }
    else 
    if ( $formSubmit == 'logout')
    {echo "ABout to logout !!!";
    	 $this->session->unset_userdata('email');
   session_destroy();
    $this->load->helper('url');
   redirect('login', 'refresh');
    }
	//echo $this->session->userdata('email');
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

	function pub()
	{
		echo "rahul";
		//$this->load->view('publicprofile');
	}
}