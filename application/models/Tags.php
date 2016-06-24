<?php 
	/**
	* 
	*/
	class Tags extends MY_Model
	{
		
		function __construct()
		{	
			parent::__construct('tags');
		}

		function insert($tag)
		{
			try
			{
				$sql = $this->conn_id->prepare("INSERT INTO tags(name) VALUES (?)");
				$sql->execute($tag);
				$affected_rows = $sql->rowCount();
				return array($affected_rows, $this->conn_id->lastInsertId());
			}
			catch (PDOException $e)
			{
				// Todo
			}
		}
	}
?>