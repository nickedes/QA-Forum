<?php
	/**
	*
	*/
	class Tag_controller extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
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
				$result = $this->Tags->get($id);
				if (!$result)
				{
					echo "You supplied wrong Tag id.";
				}
				else
				{     
					// get follow relations with the tag_id

					
					$data = array(
						'tag_id' => $id,
						// Todo: take user_id from session
						'user_id' => $this->session->userdata('user_id')
						);
					$relation = $this->follows->check($data);
					$users = $this->follows->count($data['tag_id']);
					$questions = $this->question_tags->get_ByTagID($data['tag_id']);
					$ques_data = array();
					if($questions)
						$ques_data = $this->questions->get_sorted($questions);
					//print_r($ques_data);
					//$questions = $this->questions->get_all_tagq($id);
					//$ques_data = array();
					$data = array(
						'result' => $result,
						'relation' => $relation,
						'users' => $users,
						'questions' => $ques_data
						);
						$this->load->view('tag_details', $data);
					}
				}
			}
		}
		?>