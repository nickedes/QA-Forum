<?php

class Search_controller extends  CI_Controller {

	function __construct() {
		parent::__construct();
		//echo "yes";
	    header('Access-Control-Allow-Origin: *');
		$this->load->helper('url');
		$this->load->model('users');
		$this->load->model('tags');
		$this->load->model('answers');
		$this->load->model('questions');
		$this->load->model('pagingclass');
	}

	function index() {
		//echo "found";  
		$name= urlencode($_GET['search']);
		$name= $name."*";
	     //  $tag_name = $_GET['search'];      
	//echo $tag_name;
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, "http://localhost:8983/solr/collection1/select?q=name%3A".$name."&wt=json&indent=true");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); //setting content type header
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);



//The most important is

curl_setopt($curl, CURLOPT_SSLVERSION, 3);





// Download the given URL, and return output

$result = curl_exec($curl);




//curl_setopt($curl, CURLOPT_POSTFIELDS, $xml);//Setting raw post data as xml
$result = curl_exec($curl);
curl_close($curl);
// print_r($result);
$result=json_decode($result, true);
//print_r( $result['response']);
//$data = json_decode($result, true);
$data = array(
	"resp" => $result['response']['docs'],
	"count" => $result['response']['numFound']
	);



//echo "<br><br>";

//print_r($data['response']);


$this->load->view('templates/header');
$this->load->view('search_success',$data);
$this->load->view('templates/footer');
}



}


function return_array()
{
	echo "yes";
	$sql = $this->conn_id->query("select name from tags ");
			$r = $sql->fetchALL(PDO::FETCH_ASSOC);
			//if($r)
			print_r($r);
				echo json_encode($r);
			//else
			//	return 0;
}

?>
