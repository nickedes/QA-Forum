<?php 
	/**
	* This class creates connection.
	*/
	class Connection extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		
		public function get_conn()
		{
			return $this->load->database('pdo', true)->conn_id;
		}
	}
?>