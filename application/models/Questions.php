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

		function get_allq_sorted()
		{
			$query = "SELECT u.user_id,q.title,q.description, q.creation_time,t.name as tagname,u.name as username,q.q_id,t.tag_id FROM questions as q ";
			$query .= "INNER JOIN question_tags as qt  INNER JOIN tags as t INNER JOIN users as u ON  qt.q_id = q.q_id and t.tag_id = qt.tag_id and u.user_id = q.user_id order by q.creation_time DESC ";
			//$query .= "order by q.creation_time DESC ";
			$sql = $this->conn_id->prepare($query);
		
			$sql->execute();
			if($result = $sql->fetchAll(PDO::FETCH_ASSOC))
			{
				// print_r($result);
				return $result;
			}
			else
				return 0;
		}

		function get_all_interestedq($user_id)
		{
			$query = "SELECT u.user_id,q.title,q.description, q.creation_time,t.name as tagname,u.name as username,q.q_id FROM questions as q ";
			$query .= "INNER JOIN follows as f INNER JOIN question_tags as qt  INNER JOIN tags as t INNER JOIN users as u ON f.tag_id=qt.tag_id and qt.q_id = q.q_id and t.tag_id = f.tag_id and u.user_id = f.user_id ";
			$query .= "where f.user_id=".$user_id." order by q.creation_time DESC" ;
			$sql = $this->conn_id->prepare($query);
			$sql->execute();
			$r = $sql->fetchALL(PDO::FETCH_ASSOC);
			//print_r($r);
			//echo "rahul";
			return($r);
		}

		function get_anscount()
		{
			$query = "SELECT q_id ,count(a_id) as count from answers  group by q_id";
			$sql = $this->conn_id->prepare($query);
			$sql->execute();
			$r = $sql->fetchALL(PDO::FETCH_ASSOC);
			//print_r($r);
			//echo "rahul";
			return($r);
		}
	}
?>