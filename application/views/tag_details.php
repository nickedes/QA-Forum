<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<!-- <?php print_r($users); ?> -->
	<h1>Tag Name: <?php echo $result[0]['name'] ?></h1>
	<form method="POST" action="<?php echo site_url(); ?>/follow" id="follow_unfollow">
		No. of users following :
		<input id="users" value="<?php echo $users; ?>" disabled>
		<input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>">
		<input type="hidden" id="tag_id" name="tag_id" value="<?php echo $result[0]['tag_id'] ?>">
		<br><br>
		<button type="submit" id="follow" name="link" value="follow" <?php if($relation) echo "disabled"?>>Follow</button> 
		<button type="submit" id="unfollow" name="link" value="unfollow" <?php if(!$relation) echo "disabled"?>>Unfollow</button>
	</form>
	<?php
		if($questions)
		{ //print_r($questions);
			echo "Questions : <br><br>";
			foreach ($questions as $q) {
				$qid = $q['q_id'];
 $link= site_url('question/get/'.$qid);

        echo "<a href='$link'>"."<strong>Title : ".$q['title']."</strong><br></a>";
        echo "Description : ".$q['description']."<br>";
        echo "Creation time: ".$q['creation_time']."<br><br>";
      }
		}
		else
		{
			echo "<br><br> No questions..";
		}
	 ?>
	
</body>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/follow.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/unfollow.js"></script>
</html>