<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* The Base table 
	*/
	class MY_Model extends CI_Model {
		private $table_name = "";
		private $field_keys = array("Fields");
		protected $conn_id;

		function __construct($table_name) {
			parent::__construct();
			$this->table_name = $table_name;
			$this->load->library('Connection');
			$this->conn_id = $this->connection->get_conn();

		}

		public function get_pdo()
		{
			return $this->conn_id;
		}

		function get_data($id = 0)
		{
			$sql = $this->conn_id->query('select * from '.$this->table_name);
			$r = $sql->fetchALL(PDO::FETCH_ASSOC);
			return $r;
		}

		// function insert($field, $values)
		// {

		// 	print_r("INSERT INTO ".$this->table_name."  ".$field." VALUES ".$values);
		// 	$sql = $this->conn_id->exec("INSERT INTO ".$this->table_name."  ".$field." VALUES ".$values);
		// 	$r = $sql->rowCount();
		// 	return 1;
		// }
	};
?>