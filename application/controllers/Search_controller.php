<?php

class Search_controller extends  CI_Controller {

	function __construct() {
		parent::__construct();
		echo "yes";
		
		$this->load->helper('url');
		$this->load->model('users');
		$this->load->model('tags');
		$this->load->model('answers');
		$this->load->model('questions');
		$this->load->model('pagingclass');
	}

	function index() {
	       echo "found";   

	    echo $_GET['search'];      
		$this->load->view('templates/header');
		//$this->load->view('homeview',$r);
		$this->load->view('templates/footer');
	}



	}

	?>
