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

			$sth = $this->conn_id->prepare("INSERT INTO users(name, email, mobileno, profilepic, passwd, hash_key) VALUES (?,?,?,?,?,?)");
			$sth->execute($data);
			$affected_rows = $sth->rowCount();
			print_r($affected_rows);
			return $affected_rows;
		}

		function check($data)
		{
			$sql = $this->conn_id->query('select * from '.$this->table_name. ' WHERE email = '.$data['email'] ' and passwd = '.$data['password']);
			$r = $sql->fetchALL(PDO::FETCH_ASSOC);
			return $r;
		}
	}
?>