<?php 
	/**
	*  Question Model
	*/
	class Questions extends MY_Model
	{
		
		public function __construct()
		{	
			// send tablename and primary key to base model
			parent::__construct('questions','q_id');
			$this->load->model('pagingclass');
		}

		// insert question details in table
		public function insert($data)
		{
			try
			{
				$sql = $this->conn_id->prepare("INSERT INTO questions(title, description, user_id) VALUES (?,?,?)");
				$sql->execute($data);
				$affected_rows = $sql->rowCount();
				// lastInsertId() gives the q_id of last inserted question
				return array($affected_rows, $this->conn_id->lastInsertId());
			}
			catch (PDOException $e)
			{
				return $e;
			}
		}

		// Get a sorted list of questions
		public function get_sorted($questions)
		{
			$q_ids = array();
			// create array of question-ids
			foreach ($questions as $q) {
				array_push($q_ids, $q['q_id']);
			}
			$questionMarks = join(",", array_pad(array(), count($q_ids), "?"));
			
			// Get all questions in order of recency whose q_id is present in the array
			$sql = $this->conn_id->prepare("SELECT * FROM questions WHERE q_id IN ($questionMarks) order by creation_time DESC");
			$sql->execute($q_ids);
			if($result = $sql->fetchAll(PDO::FETCH_ASSOC))
				return $result;
			else
				return 0;
		}

		// get all users and questions in order of recency
		public function get_ques_user()
		{
			$query = "SELECT u.user_id,u.name,q.title,q.description, q.creation_time,q.q_id";
			$query .= " FROM questions as q INNER JOIN users as u ON  q.user_id = u.user_id"; 
			$query .= " order by q.creation_time DESC";
			$sql = $this->conn_id->prepare($query);
			$sql->execute();
			if($result = $sql->fetchAll(PDO::FETCH_ASSOC))
				return $result;
			else
				return 0;
		}

		// Get questions and all associated tags in array such that key is q_id
		// and value is array of tag_ids
		public function get_ques_tag()
		{
			$query = "SELECT * FROM questions as q INNER JOIN question_tags as t ON  q.q_id = t.q_id";
			$sql = $this->conn_id->prepare($query);
			$sql->execute();
			if($result = $sql->fetchAll(PDO::FETCH_ASSOC))
			{
				if(!empty($result))
				{
					$ques_tags = array();
					foreach ($result as $r) {
						$ques_tags[$r['q_id']] = array();
					}
					foreach ($result as $r) {
						array_push($ques_tags[$r['q_id']], $r['tag_id']);
					}
					return $ques_tags;
				}
				else
					return 0;
			}
			else
				return 0;
		}

		// questions of user followed tags -> My interest
		public function get_all_interestedq($user_id)
		{
			
			$query = "SELECT * FROM follows as f INNER JOIN question_tags as qt INNER JOIN ";
			$query .= "questions as q WHERE qt.tag_id = f.tag_id and qt.q_id = q.q_id and ";
			$query .= "f.user_id = ".$user_id." order by q.creation_time DESC";
			// records per page for pagination
			$record_per_page=2;
			$new_query = $this->pagingclass->paging($query,$record_per_page,"int");
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

		// Get all questions of a user in order of recency
		public function get_questions($user_id)
		{
			$user_id = "'".$user_id."'";
			$query = "select q.title, q.q_id, u.name, q.creation_time from questions as q";
			$query .= " JOIN users as u where q.user_id = u.user_id and u.user_id";
			$query .= " = ".$user_id." order by q.creation_time DESC" ;
			$record_per_page=3;
			$new_query = $this->pagingclass->paging($query,$record_per_page,"ques");
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
		
		public function get_allq_sorted()
		{
			$query = "SELECT * from questions order by creation_time DESC";
			$record_per_page=2;
			$new_query = $this->pagingclass->paging($query,$record_per_page,"rec");
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
				return 0;
		}
	}
	?>