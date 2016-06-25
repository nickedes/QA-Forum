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
			parent::__construct('users', 'user_id');
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

		function update($value)
		{
			$value = "'".$value."'";
			// Todo: Where clause to include user_id
			$sql = $this->conn_id->query('select * from users ORDER BY user_id DESC LIMIT 1');
			$r = $sql->fetchALL(PDO::FETCH_ASSOC);
			// print_r($r[0]['user_id']);
			$sql = $this->conn_id->prepare("UPDATE users SET profilepic = ".$value." where user_id = ?");
			$sql->execute(array($r[0]['user_id']));
			$affected_rows = $sql->rowCount();
			echo $affected_rows;
			return $affected_rows;
		}
	}
?>