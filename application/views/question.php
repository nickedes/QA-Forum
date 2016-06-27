<!DOCTYPE html>
<html>
<head>
	<title>POST A QUESTION</title>
</head>
<body>
<?php
	$this->load->library('form_validation');
	echo validation_errors();
	echo form_open('question'); 
?>
		<label>Title</label>
		<input type="text" name="title">
		<br>
		<label>Description</label>
		<input type="text" name="describe">
		<br>
		<label>Tags</label>
		<input type="text" name="tags1">
		<br>
		<label>Tags</label>
		<input type="text" name="tags2">
		<br>
		<button type="submit" name="submit">POST</button>
	</form>
</body>
</html>