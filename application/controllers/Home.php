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
	   		// print_r($this->Users->get_data());
	   		//$data = 

	   		$rec_questions= $this->questions->get_allq_sorted();
	   		$int_questions= $this->questions->get_all_interestedq($this->session->userdata['user_id']);
	   		//$this->answers->get_byQId();
	   		//echo "rahul";

	   		//print_r($int_questions);
	   		$r = array(
	   			"rec_questions" => $rec_questions,
	   			"int_questions" => $int_questions
	   			);
	   		$this->load->view('templates/header');
	   		$this->load->view('homeview',$r);
	   		$this->load->view('templates/footer');
	   	
	   	}


	   	function butn_redirection() {
		$formSubmit = $this->input->post('submitform');
		if( $formSubmit == 'edit' )
  		  {
   		 	$this->load->helper('url');
         	redirect('profilepage/self');
  		  }
  	  else 
    if ( $formSubmit == 'logout')
    {echo "ABout to logout !!!";
    	 $this->session->unset_userdata('email');
   session_destroy();
    $this->load->helper('url');
   redirect('login', 'refresh');
    }
	   	}
	    
	}

?>
