<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class verify extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function check($data)
	{
		if (!empty($_POST['email']) && !empty($_POST['password'])) {

			if ($data['email'] == "root@gmail.com" && $data['password'] == "12345") {
				return 1;
			}else {
				return 0;
			}
		}
	}
}