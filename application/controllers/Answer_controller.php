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
				// $this->form_validation->set_rules('answer', 'Answer', 'trim|required||min_length[5]');
				$data = array($_POST['q_id'], $_POST['user_id'], $_POST['answer']);
				if($this->Answers->insert($data))
					echo "Answer: Success";
				else
					echo "Answer: Failure";
			}
			else
			{
				echo ":(";
			}
		}
	}
?>