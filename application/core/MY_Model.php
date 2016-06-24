<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* The Base table 
	*/
	class MY_Model extends CI_Model {
		private $table_name = "";
		private $primary_key;
		protected $conn_id;

		function __construct($table_name, $primary_key) {
			parent::__construct();
			$this->table_name = $table_name;
			$this->primary_key = $primary_key;
			$this->load->library('Connection');
			$this->conn_id = $this->connection->get_conn();
		}

		function get($id = 0)
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
					// $q_id = ".$id.";
					$sql = $this->conn_id->query("select * from ".$this->table_name." where ".$this->primary_key ." = '".$id."'");

					// echo "select * from ".$this->table_name." where ".$this->primary_key ." = '".$id."'";

					if ( $result = $sql -> fetchAll(PDO::FETCH_ASSOC) )
					{
						return $result;
					}
					else
					{
						// echo "there are not results with id: ".$id;
						return 0;
					}
				}


			}
			catch (Exception $e) 
			{
				return 0;
			}
		}

		
	};
?>