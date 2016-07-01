<?php 
	/**
	* 
	*/
	class Upload extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function index()
		{
			$this->load->view('templates/header');
			$this->load->view('upload');
			$this->load->view('templates/footer');
		}
	}
?>