<?php 
	/**
	* 
	*/
	class Question_controller extends CI_Controller
	{
		
		function __construct()	
		{

			parent::__construct();
			$this->load->helper(array('form'));
			$this->load->library('form_validation');
			$this->load->helper('url');
			$this->load->helper('security');
			$this->load->model('Questions');
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

				if($this->form_validation->run() == TRUE)
   				{
					$data = array(
							$_POST['title'],
							$_POST['describe'],
							1
							);
					if ($this->Questions->insert($data))
					{
							echo "the user is entered successfully.";
					}
				}
				else
				{
					// echo "Registration failed";
					echo "string";
					$this->load->view('question');
				}
			}
			else
			{
				echo "Registration failed";
				$this->load->view('question');
			}
		}
	}
?>