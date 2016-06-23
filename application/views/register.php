<!DOCTYPE html>
<html>
<head>
	<title>QA-Forum</title>
</head>
<body>

<?php
	$this->load->library('form_validation');
	echo validation_errors(); 
	echo form_open('register'); 
?>  

	<label>Name</label>
	<input type="text" name="name"><br>
	<label>Email id</label>
	<input type="email" name="email"><br>
	<label>Mobile no.</label>
	<input type="text" name="mobileno"><br>
	<label>About</label>
	<input type="text" name="about"><br>
	<label>Password</label>
	<input type="password" name="password"><br>
	<label>Confirm Password</label>
	<input type="password" name="confirm_password"><br>
	<button type="submit" name="submit">Register</button>
</form>
</body>
</html>