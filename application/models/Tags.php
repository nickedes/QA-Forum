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
			$sql = $this->conn_id->query("select name from tags ");
			$result = $sql->fetchALL(PDO::FETCH_ASSOC);
	         $tagname = array();
	         foreach ($result as $res) {
	         	array_push($tagname, $res['name']);
							
	         }
	        /* print_r($result);
		    echo "<br><br>";
		    print_r($tagname);
	         	echo "<br><br>";

*/
	         	return $tagname;
		}
	}
?>