<?php 
	/**
	* 
	*/
	class Upload extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			// $this->load->model('files_model');
			$this->load->helper('url');
		}

		function index()
		{
			$this->load->view('templates/header');
			$this->load->view('upload');
			$this->load->view('templates/footer');
		}

		function uploadImage()
 		{
			$config['upload_path']   =   "./application/uploads/";
			$config['allowed_types'] =   "gif|jpg|jpeg|png"; 
			$config['max_size']      =   "1024*1024*4";
			// $config['max_width']     =   "";
			// $config['max_height']    =   "";
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload())
			{

			   echo $this->upload->display_errors();
			}
			else
			{

			   $file_info=$this->upload->data();
			   // You can view content of the $finfo with the code block below

			   echo '<pre>';
			   print_r($file_info);
			   echo '</pre>';

			   $this->load->model('Users');
			   if($this->Users->update($file_info['file_name']))
			   {
					echo "Profile pic uploaded successfully.";
			   }
			   else
			   {
					echo "Upload failed";
					$this->load->view('upload');
			   }
			}
		}
	}
?>