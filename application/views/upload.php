<!DOCTYPE html>
<html>
<head>
 
<title> Image Upload </title>
 
</head>
 
<body>
 
<div id="container">
 
<?php 
	$this->load->helper('form');
	echo  form_open_multipart('upload/uploadImage');
?>
 	
<input type="file" name="userfile" />
 
<p><input type="submit" name="submit" value="submit" /></p>
 
<?php echo form_close();?>
 
</div>
 
</body>
</html>