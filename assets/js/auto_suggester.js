


// var options = {
// 	data: ["Web Development", "Web D", "Health", "exercise", "gyming`"],
// 	list: {
// 		match: {
// 			enabled: true
// 		}
// 	}
// };



// $("#basics").easyAutocomplete(options);


$(document).ready(function () {
$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, "http://localhost:8983/solr/collection1/select?q=name%3Aweb&wt=json&indent=true");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); //setting content type header
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

	var url='http://127.0.0.1:8983/solr/collection1/select?q=*%3A*&wt=json&indent=true';
	  //$.getJSON(url);$
	  $curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, "http://localhost:8983/solr/collection1/select?q=name%3Aweb&wt=json&indent=true");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); //setting content type header
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

	
	});