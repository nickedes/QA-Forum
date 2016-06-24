<!DOCTYPE html>
<html>
<head>
	<title>Question Detail page</title>
</head>
<body>
	<!-- <?php var_dump($answers)?> -->
	<h1>Title: <?php echo $result[0]['title'] ?></h1>
	<h2>Description: <?php echo $result[0]['description'] ?></h2>
	<h3>Created by: <?php echo $result[0]['user_id'] ?></h3>
	<form method="POST" action="<?php base_url(); ?>/codeigniter/index.php/answer/post_answer" id="post_answer">
		<textarea name="textarea" id="answer" rows="10" cols="30">Post Answer</textarea>
		<!-- Get session user id -->
		<input type="hidden" id="user_id" name="user_id" value="1">
		<input type="hidden" id="q_id" name="q_id" value="<?php echo $result[0]['q_id'] ?>">
		<br>
		<button type="submit" id="answer_submit">Submit</button>
	</form>
	Answers:
	<?php
		echo "<div>";
		foreach ($answers as $answer) {
			echo "User : ".$answer['user_id']."<br>";
			echo "Answered at : ".$answer['answer_time']."<br>";
			echo "Answer: ".$answer['answer_text']."<br> <br>";
		}
		echo "</div>";
		echo "<div id='result'>";
		echo "</div>"
	?>

</body>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/addanswer.js"></script>

</html>