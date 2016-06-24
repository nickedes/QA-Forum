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

				$this->form_validation->set_rules('description', 'Question Description', 'trim|required|xss_clean');

				$this->form_validation->set_rules('tag1', 'Tag 1', 'trim|required|min_length[1]');

				if($this->form_validation->run() == TRUE)
				{



					$tags = array();
					try 
					{
						foreach ($_POST as $key => $value) {
					// let us check whether the request consists of tags
					// echo "key is ".$key

							if (0 === strpos($key, 'tag')) {
								array_push($tags, $value);

							}
							elseif (0 === strpos($key,'description')) {
								$description = $value;
							}
							elseif (0 === strpos($key,'title')) {
								$title = $value;
							}

							else {
								echo "Something is wrong with the post parameters.";
							}
						}
					} 
					catch (Exception $e) 
					{
						//show error messages.	
					}

					var_dump($tags);
					$data = array(
						$title,
						$description,
						//Todo: User_id from session 
						1
						);

					// $tags = array();
					$request = $this->Questions->insert($data);
					if ($request[0]==1)
					{
						echo "the Question is entered successfully.";
						$q_id = $request[1];
							// doubt : should load here or not
						$this->load->model('Tags');
							// Todo : insert new tags in tags table.
						foreach ($tags as $tag) {
							
							$request = $this->Tags->insert($tag);
							if($request[0] == 1) // if tags inserted.
							{
								echo "tags inserted";
								$this->load->model('Question_tags');
								$tag_ids = $request[1];
								
								if($this->Question_tags->insert($q_id, $tag_ids))
								{
									echo "tags - question relation done.";
								}
							}
						}
					}
				}
				else
				{
					// echo "Question post failed";
					echo "string";
					$this->load->view('question');
				}
			}
			else
			{
				// echo ;
				$this->load->view('question');
			}
		}
	}
	?>