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
			$this->load->model('Questions');
			$this->load->model('Users');
			$this->load->model('Answers');
			$this->load->model('Tags');
			$this->load->model('Question_tags');
					
		}
		function index()
		{
		
			$this->load->view('templates/header');
			$this->load->view('question');
			$this->load->view('templates/footer');
		}

		function post_question()
		{
			// Validations here
			// TODO: Add validations in a Libraray.

			$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean|max_length[50]');

			$this->form_validation->set_rules('description', 'Question Description', 'trim|required|xss_clean');

			$this->form_validation->set_rules('tag1', 'Tag 1', 'trim|required|min_length[1]');

			$response = array('success' => 0);
			if($this->form_validation->run() == TRUE)
			{
				$tags = array();
				try 
				{
					foreach ($_POST as $key => $value) {
						// let us check whether the request consists of tags
						if (0 === strpos($key, 'tag')) {
							array_push($tags, $value);
						}
						elseif (0 === strpos($key,'description')) {
							$description = $value;
						}
						elseif (0 === strpos($key,'title')) {
							$title = $value;
						}
					}
				} 
				catch (Exception $e) 
				{
					$response['message'] = "Something is wrong with the post parameters.";
				}
				$data = array(
					$title,
					$description,
					$this->session->userdata('user_id')
					);
				$request = $this->Questions->insert($data);
				if ($request[0]==1)
				{
					$response['success'] = 1;
					$response['message'] = "The Question is posted successfully.";
					$q_id = $request[1];
					// for each tag insert new tags in tags table.
					// if tag already, then only make relation b/w ques and tag
					foreach ($tags as $tag) {
						$tag_id = $this->Tags->get_tagid($tag);
						// if no tag id -> insert in table
						if(!$tag_id)
						{
							$request = $this->Tags->insert($tag);
							if($request[0] == 1) // if tags inserted.
							{
								$response['tag'] = "New tags inserted";
								$tag_id = $request[1];
							}
						}
						if($this->Question_tags->insert($q_id, $tag_id))
						{
							$response['question_tag'] = "Tags and the question are now related";
						}
					}
				}
			}
			else
			{
				$response['title'] = form_error('title');
				$response['description'] = form_error('description');
			}
			echo json_encode($response);
		}
		function get($id = NULL)
		{
			if ($id != NULL)
			{
				$result = $this->Questions->get($id);
				if (!$result)
				{
					echo "You supplied wrong question id.";
				}
				else
				{
					$answers = $this->Answers->get_byQId($id);
					// data of profile photo and name
					$user_details = $this->Users->get($result[0]['user_id']);
					// answer users
					$answer_users = array();
					foreach ($answers as $answer) {
						$answer_users[$answer['a_id']] = $this->Users->get($answer['user_id']);
					}
					$data = array(
						'result' => $result,
						'answers' => $answers,
						'user_details' => $user_details,
						'answer_users' => $answer_users
						);
					$this->load->view('question_details', $data);
					// var_dump($result);
				}
			}
			else
			{
				$this->Questions->get();
			}
		}
	}
	?>