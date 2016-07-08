<?php 
	/**
	* 
	*/
	class Verifyupload extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('Users');
			$this->load->helper(array('form', 'url')); 
		}

		function uploadImage()
 		{
			$config['upload_path']   =   "./application/uploads/";
			$config['allowed_types'] =   "gif|jpg|jpeg|png"; 
			$config['max_size']      =   "1024*1024*4";
			// $config['max_width']     =   "";
			// $config['max_height']    =   "";
			$this->load->library('upload',$config);
			$response = array();
			$response['success'] = 0;
			if(!$this->upload->do_upload('userfile'))
			{
				$response['message'] = $this->upload->display_errors();
			}
			else
			{

			   $file_info=$this->upload->data();
			   // You can view content of the $finfo with the code block below

			   // echo '<pre>';
			   // print_r($file_info);
			   // echo '</pre>';

			   if($this->Users->update_pic($file_info['file_name']))
			   {
					$response['success'] = 1;
					$response['message'] = "Profile pic uploaded successfully.";
			   }
			   else
			   {
					$response['message'] = "Upload failed";
					// $this->load->view('upload');
			   }
			}
			echo json_encode($response);
		}
	}
?>