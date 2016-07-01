<?php 
	/**
	* 
	*/
	class Question_tags extends MY_Model
	{
		
		function __construct()
		{	
			parent::__construct('tags');
			$this->load->model('pagingclass');

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
				$query = "select q_id from question_tags where tag_id = ".$tag_id;
				$record_per_page=2;
				$new_query = $this->pagingclass->paging($query,$record_per_page);
				$sql = $this->conn_id->prepare($new_query);
				$sql->execute();
				if($result = $sql->fetchAll(PDO::FETCH_ASSOC))
				{
					$data = array(
						'query' => $query,
						'record_per_page' => $record_per_page,
						'result' => $result
						);
					return $data;
				}
				else
				{
					return 0;
				}				
			} catch (PDOException $e) {
				return 0;	
			}
		}
	}
	?>