<div id="">
<!-- <?php var_dump($original_question_poster) ?> -->
<img src="<?php echo base_url()."/application/uploads/".$user_details[0]['profilepic'] ?>" width="80" height="60" />
<?php 
	$user_link = site_url('profile/get/'.$user_details[0]['user_id']);
	echo "<b>Name</b> : <a href='$user_link'>".$user_details[0]['name']."</a>";
?>
</div>