<?php 
	/**
	* 
	*/
	class Question_tags extends MY_Model
	{
		
		function __construct()
		{	
			parent::__construct('question_tags', 'q_id');
		}

		function insert($q_id, $tag_id)
		{
			try
			{
				// $tags - array of tag ids
				$sql = $this->conn_id->prepare("INSERT INTO question_tags(tag_id, q_id) VALUES (?, ?)");
				$sql->execute(array($tag_id, $q_id));
				return 1;
			}
			catch (PDOException $e)
			{
				// Todo
			}
		}
		function get_ByTagID($tag_id)
		{
			try {
				$sql = $this->conn_id->query("select q_id from question_tags where tag_id = ".$tag_id);
				if($result = $sql -> fetchAll(PDO::FETCH_ASSOC))
					return $result;
				else
					return 0;				
			} catch (PDOException $e) {
				return 0;	
			}
		}

		function get_byQ($q_id)
		{
			try {
				$sql = $this->conn_id->query("select * from question_tags as q JOIN tags as t where t.tag_id = q.tag_id and q.q_id = ".$q_id);
				if($result = $sql -> fetchAll(PDO::FETCH_ASSOC))
					return $result;
				else
					return 0;				
			} catch (PDOException $e) {
				return 0;	
			}
		}
	}
	?>