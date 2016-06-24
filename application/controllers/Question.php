<?php 
	/**
	* 
	*/
	class Question extends CI_Controller
	{
		
		function __construct()	
		{
			parent::__construct();
			$this->load->library('form_validation');
		}
		function index()
		{
			if (isset($_POST['submit']))
			{
				// Validations here
				// TODO: Add validations in a Libraray.

 				$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean|max_length[50]');
   				
   				$this->form_validation->set_rules('describe', 'Question Description', 'trim|required|xss_clean');

				$this->form_validation->set_rules('tags1', 'Tag 1', 'trim|required|min_length[1]');

				$this->form_validation->set_rules('tags2', 'Tag 2', 'trim|required|min_length[1]');
			}
		}
	}
?>