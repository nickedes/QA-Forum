<?php 
	/**
	* 
	*/
	class Follows extends MY_Model
	{
		
		function __construct()
		{	
			parent::__construct('follows', 'user_id');
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
			if(count($r) > 0)
				return $r[0]['tag_id'];
			else
				return 0;
		}

		function delete($data)
		{
			try
			{
				echo "DELETE FROM follows WHERE tag_id = '".$data['tag_id']."' and user_id = '".$data['user_id']."'";
				$sql = $this->conn_id->prepare("DELETE FROM follows WHERE tag_id = '".$data['tag_id']."' and user_id = '".$data['user_id']."'");
				$sql->execute();
				$affected_rows = $sql->rowCount();
				return $affected_rows;
			}
			catch (PDOException $e)
			{
				// Todo
				return 0;
			}
		}

		// get no. of Users for the tag id.
		function count($tag_id)
		{
			try {
				$sql = $this->conn_id->query("SELECT count(user_id) FROM follows where tag_id=".$tag_id." group by tag_id");
				$row = $sql->fetchALL(PDO::FETCH_ASSOC);
				// print_r($row[0]['count(user_id)']);
				if(count($row) > 0)
					return $row[0]['count(user_id)'];
				else
					return 0;
				
			} catch (PDOException $e) {
				
			}
		}

		function get_tags($user_id)
		{

			$query = "SELECT f.user_id, f.tag_id, t.name FROM follows as f ";
			$query .= "INNER JOIN tags AS t ON f.tag_id = t.tag_id WHERE f.user_id = ".$user_id;
			$record_per_page=3;
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
		}


	}
?>