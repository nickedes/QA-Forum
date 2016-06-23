<?php

	class Home extends  CI_Controller {

	    function __construct() {
	        parent::__construct();
	        $this->load->helper('url');
	        $this->load->model('Users');
	    }

	   	function index() {
	   		// print_r($this->Users->get_data());
	   		$this->load->view('register');
	   	}
	    
	}

?>
