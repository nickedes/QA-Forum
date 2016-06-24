<?php 
	/**
	* 
	*/
	class Questions extends MY_Model
	{
		
		function __construct()
		{	
			parent::__construct('questions');
		}

		function insert($data)
		{
			try
			{
				$sql = $this->conn_id->prepare("INSERT INTO questions(title, description, user_id) VALUES (?,?,?)");
				$sql->execute($data);
				$affected_rows = $sql->rowCount();
				print_r($this->conn_id->lastInsertId());
				return $affected_rows;
			}
			catch (PDOException $e)
			{

			}
		}
	}
?>