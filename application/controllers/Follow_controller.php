<?php 
	/**
	* 
	*/
	class Follow_controller extends CI_Controller
	{
		
		function __construct()	
		{
			parent::__construct();
			// http://stackoverflow.com/a/27280939
			header('Access-Control-Allow-Origin: *');
			$this->load->model('Follows');
		}
		function index()
		{
			if(isset($_POST['user_id']) && $_POST['name'] == 'follow')
			{
				$data = array($_POST['tag_id'], $_POST['user_id']);
				if($this->Follows->insert($data))
					echo "Followed";
				else
					echo "Follow failed";
			}
			elseif (isset($_POST['user_id']) && $_POST['name'] == 'unfollow') {
				$data = array(
					'tag_id' => $_POST['tag_id'],
					'user_id' => $_POST['user_id']
					);
				if($this->Follows->delete($data))
				{
					echo "Unfollowed";
				}
				else
					echo "UnFollow failed";	
			}
			else
			{
				echo ":(";
			}
		}
		function add_follow()
		{
		}
	}
?>