<div class="container">
	<h4 class="text-center">Question Detail page</h4>
	<?php
		$this->load->view('thumbnail_view.php');
	?>
	<div class="text-center">
	<h4><b>Title:</b> <?php echo $result[0]['title'] ?></h4>
	<h4><b>Description:</b> <?php echo $result[0]['description'] ?></h4>
	</div>
	<div class="list-group col-sm-2">
		<a href="#" class="list-group-item active">
		<span class="glyphicon glyphicon-tag"></span>Tags
    	</a>
    	<?php
    		foreach ($tags as $tag) {
    			$tag_link = site_url('/tag/get/'.$tag['tag_id']);
    	?>
    		<a href="<?php echo $tag_link; ?>">
    		<div class="list-group-item">
        	<span class="glyphicon glyphicon-link"></span><?php echo $tag['name']; ?>
        	</div></a>
        <?php
    		}
    	?>
    </div>
	<form method="POST" action="<?php echo site_url(); ?>/answer/post_answer" id="post_answer_form">
		<div class="text-center">
		<textarea name="answer" id="answer" rows="3" cols="100" placeholder="Post Answer"></textarea>
		<div id="answer_error"></div>
		<!-- Get session user id -->
		<input type="hidden" id="user_id" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
		<input type="hidden" id="q_id" name="q_id" value="<?php echo $result[0]['q_id'] ?>">
		<br>
		
		<button class="btn btn-success" type="submit" id="answer_submit">Post Answer</button>
		<div id="form_error"></div>
		</div>
	</form>
	<?php
	//print_r($answers);
		if($answers)
		{	
			echo "<br><h4><b>Answers:</b></h4><div><br>";
			foreach ($answers as $answer) {
				$user_details = $answer_users[$answer['a_id']];
				$this->load->view('thumbnail_view.php', array('user_details' => $user_details));
				echo "Answered at : ".$answer['answer_time']."<br>";
				echo "Answer: ".$answer['answer_text']."<br> <br>";
				echo "<hr>";
			}
			echo "</div>";
			 echo $this->pagingclass->paginglink($ans_query,$ans_rec_record_per_page,"ans");
  
		}
		else
		{
			echo "No answers";
		}
		echo "<div id='result'>";
		echo "</div>";
	?>
</div>
