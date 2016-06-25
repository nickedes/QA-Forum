<?php 
	/**
	* 
	*/
	class Follows extends MY_Model
	{
		
		function __construct()
		{	
			parent::__construct('tags', 'tag_id');
		}

		function insert($data)
		{
			try
			{
				$sql = $this->conn_id->prepare("INSERT INTO follows(tag_id, user_id) VALUES (?, ?)");
				$sql->execute($data);
				$affected_rows = $sql->rowCount();
				return $affected_rows;
			}
			catch (PDOException $e)
			{
				// Todo
				return 0;
			}
		}

		function check($data)
		{
			$sql = $this->conn_id->query("select * from follows WHERE tag_id = '".$data['tag_id']."' and user_id = '".$data['user_id']."'");
			$r = $sql->fetchALL(PDO::FETCH_ASSOC);
			print_r($r);
			if(count($r) > 0)
				return $r[0]['tag_id'];
			else
				return 0;
		}
	}
?>