<?php 
	/**
	* 
	*/
	class Users extends MY_Model
	{
		$this->conn_id = parent::get_pdo();

		// private $table_name = "users";
		function __construct()
		{	
			// parent::__construct($this->table_name);
			parent::__construct('users');
		}

		function insert($data)
		{

			$sql = $this->conn_id->prepare("INSERT INTO users(name, email, mobileno, profilepic, passwd, hash_key) VALUES (?,?,?,?,?,?)");
			$sql->execute($data);
			$affected_rows = $sql->rowCount();
			/*
				returns 1 if entry in table
				else 0
			*/
			return $affected_rows;
		}

		function check($data)
		{
			$this->load->library('form_validation');
 
   			$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|required');
   			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
 

			$email = "'".$data['email']."'";
			$passwrd = "'".$data['password']."'";
			

			$sql = $this->conn_id->query("select * from users where email = ".$email ." and passwd= ".$passwrd);
				$r = $sql->fetchALL(PDO::FETCH_ASSOC);
			
			if($this->form_validation->run() ==TRUE && !empty($r))
				return TRUE;
			else
				return FALSE;
			
		}
	}
?>