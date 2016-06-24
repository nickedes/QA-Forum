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
			$data['email'] = "'".$data['email']."'";
			$data['password'] = "'".$data['password']."'";

			$sql = $this->conn_id->query('select * from '.$this->table_name. ' WHERE email = '.$data['email'].' and passwd = '.$data['password']);
			$r = $sql->fetchALL(PDO::FETCH_ASSOC);
			return $r;
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