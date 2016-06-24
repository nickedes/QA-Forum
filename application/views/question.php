<!DOCTYPE html>
<html>
<head>
	<title>POST A QUESTION</title>
</head>
<body>
	<form method="POST" action="<?php echo site_url(); ?>/question">
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
		<button type="button" name="Submit">POST</button>
	</form>
</body>
</html>