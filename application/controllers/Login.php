<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller{

	function __construct()
	{
		

		parent::__construct();
		if(isset($this->session->userdata['email']))
		{
			$this->load->helper('url');
			redirect('profilepage/self');
		}
	}

	function index()
	{ 
//step1/*
		/*
$tag_name= "web+development";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "http://localhost:8983/solr/query?q=tag_name:".$tag_name);
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
$result=json_decode($result, true);
print_r( $result['response']);
//$data = json_decode($result, true);
$data = array(
	"response" => $result['response']['docs']
	);


  //  print_r($data);

//echo "<br><br>";

//print_r($data['response']);

echo "<br>";
*/


		$this->load->view('templates/header');
		$this->load->view('login_view');
		$this->load->view('templates/footer');
	}
}
?>