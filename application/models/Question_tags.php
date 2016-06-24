<?php 
	/**
	* 
	*/
	class Question_tags extends MY_Model
	{
		
		function __construct()
		{	
			parent::__construct('tags');
		}

		function insert($q_id, $tags)
		{
			// $tags - array of tag ids
			foreach ($tags as $tag) {
				$sql = $this->conn_id->prepare("INSERT INTO question_tags(tag_id, q_id) VALUES (?, ?)");
				$sql->execute(array($tag, $q_id));
			}
		}
	}
?>