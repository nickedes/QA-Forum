<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<!-- <?php print_r($relation); ?> -->
	<h1>Tag Name: <?php echo $result[0]['name'] ?></h1>
	<form method="POST" action="<?php echo site_url(); ?>/follow" id="follow_unfollow">
		<input type="hidden" id="user_id" name="user_id" value="12">
		<input type="hidden" id="tag_id" name="tag_id" value="<?php echo $result[0]['tag_id'] ?>">
	 	<button type="submit" id="follow" name="link" value="follow" <?php if($relation) echo "disabled"?>>Follow</button> 
	 	<button type="submit" id="unfollow" name="link" value="unfollow" <?php if(!$relation) echo "disabled"?>>Unfollow</button>
	</form>
</body>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/follow.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/unfollow.js"></script>
</html>