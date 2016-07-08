<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* The Base table 
	* To modify the CI model, we define the class in core folder
	*/
	class MY_Model extends CI_Model {
		private $table_name = "";
		private $primary_key;
		// conn id is protected so that it can be accessible after being inherited
		protected $conn_id;

		public function __construct($table_name, $primary_key = NULL) {
			parent::__construct();
			$this->table_name = $table_name;
			$this->primary_key = $primary_key;
			$this->load->library('Connection');
			$this->conn_id = $this->connection->get_conn();
		}

		// Get information from table
		public function get($id = 0)
		{
			try 
			{
				// it means we need to display all data from table.
				if ( $id == 0 )
				{
					$sql = $this->conn_id->query('select * from '.$this->table_name);
					$result = $sql -> fetchAll(PDO::FETCH_ASSOC);
					return $result;
				}
				// now user passes a particular id to the table.
				else
				{
					$sql = $this->conn_id->query("select * from ".$this->table_name." where ".$this->primary_key ." = '".(int)$id."'");
					if ($result = $sql->fetchAll(PDO::FETCH_ASSOC))
						return $result;
					else
						return 0;
				}
			}
			catch (Exception $e) 
			{
				return $e;
			}
		}
	};
?>