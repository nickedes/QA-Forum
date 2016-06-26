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
		}
		function get()
		{
			if (isset($_GET['id']))
			{
				// get tag by id
				$result = $this->Tags->get($_GET['id']);
				// get follow relations with the tag_id
				$data = array(
					'tag_id' => $_GET['id'],
					// Todo: take user_id from session
					'user_id' => 12
					);
				$relation = $this->Follows->check($data);
				$users = $this->Follows->count($data['tag_id']);
				if (!$result)
				{
					echo "You supplied wrong Tag id.";
				}
				else
				{
					$data = array(
						'result' => $result,
						'relation' => $relation,
						'users' => $users
						);
					$this->load->view('tag_details', $data);
					// var_dump($result);
				}
			}
		}
	}
?>