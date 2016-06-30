<?php 
	/**
	* This class creates connection.
	*/
	class Sessionlibrary
	{
		public function __construct()
		{
			// Assign the CodeIgniter object
			$this->CI =& get_instance();
			// access CI's session library
			$this->CI->load->library('session');
		}
		
		public function set_session($data)
		{
			$session_data = array(
				'user_id' => $data['user_id'],
				'email' => $data['email'],
				'is_active' => $data['is_active'],
				'name'=> $data['name'],
				'mobileno' => $data['mobileno'],
				'about' => $data['about']
				);
			// load user data in session
			$this->CI->session->set_userdata($session_data);
			return TRUE;
		}
	}
?>