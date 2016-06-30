<?php 
	/**
	* 
	*/
	class Answers extends MY_Model
	{
		
		function __construct()
		{
			parent::__construct('answers','a_id');
		}

		function get_byQId($q_id)
		{
			$sql = $this->conn_id->query("select * from answers where q_id = '".$q_id."' ORDER BY answer_time DESC");
			if($result = $sql -> fetchAll(PDO::FETCH_ASSOC))
				return $result;
			else
				return 0;
		}

		function insert($data)
		{
			try
			{
				$sql = $this->conn_id->prepare("INSERT INTO answers(q_id, user_id, answer_text) VALUES (?, ?, ?)");
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

		function get_answers($user_id)
		{			
			$query = "SELECT * FROM questions as q ";
			$query .= "INNER JOIN answers as a ON a.q_id=q.q_id  ";
			$query .= "where a.user_id=".$user_id ;
			$sql = $this->conn_id->prepare($query);
			$sql->execute();
			$r = $sql->fetchALL(PDO::FETCH_ASSOC);
			//print_r($r);
			return $r;

		}

		function get_anscount()
		{
			$query = "SELECT q_id ,count(a_id) as count from answers  group by q_id";
			$sql = $this->conn_id->prepare($query);
			$sql->execute();
			$r = $sql->fetchALL(PDO::FETCH_ASSOC);
			return($r);
		}

	}
?>