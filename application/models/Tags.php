<?php 
	/**
	* 
	*/
	class Tags extends MY_Model
	{
		
		function __construct()
		{	
			parent::__construct('tags', 'tag_id');
		}

		function insert($tag)
		{
			try
			{
				$sql = $this->conn_id->prepare("INSERT INTO tags(name) VALUES (?)");
				$sql->execute(array($tag));
				$affected_rows = $sql->rowCount();
				return array($affected_rows, $this->conn_id->lastInsertId());
			}
			catch (PDOException $e)
			{
				// Todo
			}
		}

		function get_tagid($tag)
		{
			$sql = $this->conn_id->query("select * from tags WHERE name = '".$tag."'");
			$r = $sql->fetchALL(PDO::FETCH_ASSOC);
			if(count($r) > 0)
				return $r[0]['tag_id'];
			else
				return 0;
		}

		function tag_set()
		{
			$sql = $this->conn_id->query("select * from tags");
			$result = $sql->fetchALL(PDO::FETCH_ASSOC);
	        $tagname_link = array();
			foreach ($result as $res) {
				array_push($tagname_link, array('text' => $res['name'], 'website-link' => site_url().'/tag/get/'.$res['tag_id']));
			}

			$tagname = array();
	         foreach ($result as $res) {
	         	array_push($tagname, $res['name']);
							
	         }
	        return array($tagname_link, $tagname);
		}
	}
?>