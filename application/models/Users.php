<?php 
	/**
	* 
	*/
	class Users extends MY_Model
	{
		// private $table_name = "users";
		function __construct()
		{	
			// parent::__construct($this->table_name);
			parent::__construct('users');
		}
	}
?>