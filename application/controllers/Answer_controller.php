<?php 
	/**
	* 
	*/
	class Answer_controller extends CI_Controller
	{
		
		function __construct()	
		{
			parent::__construct();
			$this->load->model('Answers');
		}
		function index()
		{
			echo "in";
		}
		function post_answer()
		{
			if(isset($_POST['user_id']))
			{
				var_dump($_POST);
			}
			else
			{
				echo ":(";
			}
		}
	}
?>