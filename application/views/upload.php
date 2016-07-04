<h3> Image Upload </h3>
<div id="container">
 
<?php 
	$this->load->helper('form');
	echo  form_open_multipart('upload/uploadImage');
?>

<input type="file" name="userfile" />
 
<button class="btn btn-success" type="submit" name="submit">
<i class="fa fa-upload fa-2x" aria-hidden="true"></i>
</button>
 
<?php echo form_close();?>
 
</div>
 
</body>
</html>