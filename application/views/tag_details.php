<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php print_r($relation); ?>
	<h1>Tag Name: <?php echo $result[0]['name'] ?></h1>
	<form method="POST" action="<?php echo site_url(); ?>/follow/">
		<input type="hidden" id="user_id" name="user_id" value="1">
	 	<button type="submit" id="follow"> <?php if(!$relation) echo "disabled"?> >Follow</button> 
	 	<button type="submit" id="unfollow"> <?php if($relation) echo "disabled"?> >Unfollow</button>
	</form>
</body>
</html>