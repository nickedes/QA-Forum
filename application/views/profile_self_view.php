<html>
<head>
	<h1>Welcome to your profile<h1>
</head>

	<body>
		<?php  
		echo $this->session->userdata('name');
		echo $this->session->userdata('user_id');
		$this->load->library('form_validation');
		echo validation_errors(); 
		echo form_open('profilepage/self');
		?>

		<button type= 'submit'>Edit profile</button>
	</body>
</html>