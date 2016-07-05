<?php
	/**
	*
	*/
	class Tag_controller extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if(!isset($this->session->userdata['user_id']))
			{
				redirect('login');
			}
			$this->load->model('tags');
			$this->load->model('follows');
			$this->load->model('questions');
			$this->load->model('question_tags');
		}


		function get($id = NULL)
		{
			if ($id != NULL)
			{
				// get tag by id
				$result = $this->tags->get($id);
				if (!$result)
				{
					echo "You supplied wrong Tag id.";
				}
				else
				{     
					// get follow relations with the tag_id

					
					$user_id = $this->session->userdata('user_id');
					$data = array(
						'tag_id' => $id,
						// take user_id from session
						'user_id' => $user_id
						);
					$relation = $this->follows->check($data);
					$users = $this->follows->count($data['tag_id']);
					$questions = $this->question_tags->get_ByTagID($data['tag_id']);

					$ques_data = array();
					if($questions)
						$ques_data = $this->questions->get_sorted($questions['result']);
					$data = array(
						'result' => $result,
						'tag_query' => $questions['query'],
						'tag_record_per_page' => $questions['record_per_page'],
						'relation' => $relation,
						'users' => $users,
						'questions' => $ques_data,
						'user_id' => $user_id
						);
						$this->load->view('templates/header');
						$this->load->view('tag_details', $data);
						$this->load->view('templates/footer');
					}
				}
			}
		}
		?>