<?php

	class Test extends  CI_Controller {

	    function __construct() {
	        parent::__construct();
	        $this->pdo = $this->load->database('pdo', true);
	    }

	    function index(){
	    	var_dump($this->pdo->conn_id); 
	    }
	};

?>
