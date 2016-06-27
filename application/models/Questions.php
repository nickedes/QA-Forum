<?php 
	/**
	* 
	*/
	class Questions extends MY_Model
	{
		
		function __construct()
		{	
			parent::__construct('questions','q_id');
		}

		function insert($data)
		{
			try
			{
				$sql = $this->conn_id->prepare("INSERT INTO questions(title, description, user_id) VALUES (?,?,?)");
				$sql->execute($data);
				$affected_rows = $sql->rowCount();
				return array($affected_rows, $this->conn_id->lastInsertId());
			}
			catch (PDOException $e)
			{
				// Todo
			}
		}
		function get_sorted($questions)
		{
			$q_ids = array();
			foreach ($questions as $q_id) {
				array_push($q_ids, $q_id['q_id']);
			}
			$questionMarks = join(",", array_pad(array(), count($q_ids), "?"));
			$sql = $this->conn_id->prepare("SELECT * FROM questions WHERE q_id IN ($questionMarks) order by creation_time DESC");
			$sql->execute($q_ids);
			if($result = $sql->fetchAll(PDO::FETCH_ASSOC))
			{
				// print_r($result);
				return $result;
			}
			else
				return 0;
			return 0;
		}
	}
?>