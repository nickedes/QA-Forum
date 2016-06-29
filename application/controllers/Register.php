<?php 
	/**
	* 
	*/
	class Register extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function index()
		{
			$this->load->view('templates/header');
			$this->load->view('register_view');
			$this->load->view('templates/footer');
		}
	}
?>