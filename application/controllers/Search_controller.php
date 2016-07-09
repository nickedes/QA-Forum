<?php

class Search_controller extends  CI_Controller {

	function __construct() {
		parent::__construct();
		if(!isset($this->session->userdata['user_id']))
			redirect('login');
		header('Access-Control-Allow-Origin: *');
		$this->load->helper('url');
		$this->load->model('users');
		$this->load->model('tags');
		$this->load->model('answers');
		$this->load->model('questions');
		$this->load->model('pagingclass');
	}

	function index() {
		$name= urlencode($_GET['search']);
		$name= "*".$name."*";
		
		$curl = curl_init();

		curl_setopt($curl, CURLOPT_URL, "http://localhost:8983/solr/collection1/select?q=name%3A".$name."&wt=json&indent=true");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSLVERSION, 3);

		$result = curl_exec($curl);
		curl_close($curl);
		$result=json_decode($result, true);
		
		$data = array(
			"resp" => $result['response']['docs'],
			"count" => $result['response']['numFound']
			);


		$this->load->view('templates/header');
		$this->load->view('search_success',$data);
		$this->load->view('templates/footer');
	}

	function get()
	{	

		$response = array('success' => 0);
		if($r=$this->tags->tag_set())
		{
			$response['success'] = 1;
			$response['taglinks'] = $r[0];
			$response['tagnames'] = $r[1];
		}
		echo json_encode($response);
	}

}




?>
