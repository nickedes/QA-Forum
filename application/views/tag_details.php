<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 text-center">
			<h3 ><b>Tag Name:</b> <?php echo $result[0]['name'] ?></h3>
			<br>
			<form method="POST" action="<?php echo site_url(); ?>/follow" id="follow_unfollow">
			<b>No. of users following :</b>
				<input id="users" size="4" value="<?php echo $users; ?>" disabled>
				<input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>">
				<input type="hidden" id="tag_id" name="tag_id" value="<?php echo $result[0]['tag_id'] ?>">
				<br><br>
				<div class="text-center">
					<button class = "btn btn-success" type="submit" id="follow" name="link" value="follow" <?php if($relation) echo "disabled"?>>Follow</button> 
					&nbsp;&nbsp;&nbsp;<button class = "btn btn-info" type="submit" id="unfollow" name="link" value="unfollow" <?php if(!$relation) echo "disabled"?>>Unfollow</button>
					<div id="form_error"></div>
				</div>
			</form>
		</div>
	</div>
	<br>
	<?php
	echo "<br><br>";
		if($questions)
		{ //print_r($questions);
			echo "<b>Questions : </b><br><br>";
			foreach ($questions as $q) {
				$qid = $q['q_id'];
				$link= site_url('question/get/'.$qid);
		        echo "<a href='$link'>"."<strong>Title : ".$q['title']."</strong><br></a>";
		        echo "Description : ".$q['description']."<br>";
		        echo "Creation time: ".$q['creation_time']."<br><br>";
		        echo "<hr>";
      		}
		echo $this->pagingclass->paginglink($tag_query,$tag_record_per_page,"tags");
		
		}
		else
		{
			echo "<br><br> No questions..";
		}
	 ?>
</div>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/follow.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/unfollow.js"></script>
