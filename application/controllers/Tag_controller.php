<?php
	/**
	*
	*/
	class Tag_controller extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Tags');
			$this->load->model('Follows');
			$this->load->model('Questions');
			$this->load->model('Question_tags');
		}
		function get()
		{
			if (isset($_GET['id']))
			{
				// get tag by id
				$result = $this->Tags->get($_GET['id']);
				if (!$result)
				{
					echo "You supplied wrong Tag id.";
				}
				else
				{
					// get follow relations with the tag_id
					$data = array(
						'tag_id' => $_GET['id'],
						// Todo: take user_id from session
						'user_id' => 12
						);
					$relation = $this->Follows->check($data);
					$users = $this->Follows->count($data['tag_id']);
					$questions = $this->Question_tags->get_ByTagID($data['tag_id']);
					$ques_data = array();
					foreach ($questions as $question) {
						$ques_data[$question['q_id']] = $this->Questions->get($question['q_id'])[0];
					}
					print_r($ques_data);
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