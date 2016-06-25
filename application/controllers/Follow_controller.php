<?php 
	/**
	* 
	*/
	class Follow_controller extends CI_Controller
	{
		
		function __construct()	
		{
			parent::__construct();
			$this->load->model('Follows');
		}
		function index()
		{
			echo "in";
		}
		function follow()
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