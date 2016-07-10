<div class="container">
	<br><br><h2><b>Welcome to the Forum, </b><?php echo $this->session->userdata['name']; ?></h2>
	<hr>
	<?php
	$this->load->library('form_validation');
	echo validation_errors(); 
	echo form_open('home/butn_redirection');
	?>
	<br>	
	<?php 
	$rec ="";
	$int ="";
	$url = $_SERVER['REQUEST_URI'];
	//echo $url;
	if (strpos($url, '?i') != false) {
		$int = "active";
	}
	else
		$rec ="active";
	?>


	<!-- tab contents -->
	<div id="content">
		<br><ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
		<li class="<?php echo $rec ?>" style="font-size:15px" ><a href="#recent" data-toggle="tab">Recent Questions</a></li>
		<li class="<?php echo $int ?>" style="font-size:15px"><a href="#my_interest" data-toggle="tab">My Interests</a></li>
	</ul>
	<div id="my-tab-content" class="tab-content">
		<br><div class="<?php echo 'tab-pane '.$rec ?>"  id="recent">
		<?php
		if($rec_questions)
		{	
			echo "<h2>Questions</h2>";
			foreach($rec_questions as $rec_question) {
				echo "<div class='jumbotron vertical-center'>";
				echo "<div class='container '>";


				$q_id = $rec_question['q_id'];
				$userid = $rec_question['user_id'];
				$userlink = site_url('profile/get/'.$userid);
				$ques_link= site_url('question/get/'.$q_id);

						// question detail page link with question title
				echo "<a href='$ques_link'>"."<strong>Title : ".$rec_question['title']."</strong><br></a>";
				echo "<br><div class='list-group col-sm-2'>
				<a href='#' class='list-group-item active'>
					<span class='glyphicon glyphicon-tag'></span>Tags
				</a>";
				foreach ($ques_tags[$q_id] as $tag) {
					$tag_link = site_url('/tag/get/'.$tag);
					
					echo "<a href='$tag_link'><div class='list-group-item'>
					<span class='glyphicon glyphicon-link'></span>".$tag_details[$tag]."</div></a>";
				}
				echo "</div>";
				echo "<b>Description : </b>".$rec_question['description']."<br>";
				echo "<b>Creation time: </b>".$rec_question['creation_time']."<br>";

						// user linked with his profile page
				echo "<b>Asked by : </b><a href='$userlink'>".$ques_user_details[$q_id]['name']."</a><br>";
				if(!isset($answers[$q_id]))
					echo "Answers(0)<br>";
				else
					echo "Answers(".$answers[$q_id].")<br>";
				echo "</div>";
				echo "</div>";
				echo "<hr>";
			}
		}
		else
			echo "<h3>No Questions posted.</h3>";
		echo $this->pagingclass->paginglink($rec_query,$rec_record_per_page,"rec");
		?>
	</div>
	<div class="<?php echo 'tab-pane '.$int ?>"  id="my_interest">
		<?php
		if($int_questions){
			echo "<h2>Questions</h2>";
			foreach($int_questions as $int_question) {
				echo "<div class='jumbotron vertical-center'>";
				echo "<div class='container '>";
				$q_id = $int_question['q_id'];
						// $tagid = $int_question['tag_id'];
						// $link1=  site_url('tag/get/'.$tagid);
				$link= site_url('question/get/'.$q_id);
				echo "<a href='$link'>"."<strong>Title : ".$int_question['title']."</strong><br></a>";
				
				echo "<br><div class='list-group col-sm-2'>
				<a href='#' class='list-group-item active'>
					<span class='glyphicon glyphicon-tag'></span>Tags
				</a>";
				foreach ($ques_tags[$q_id] as $tag) {
					$tag_link = site_url('/tag/get/'.$tag);
					
					echo "<a href='$tag_link'><div class='list-group-item'>
					<span class='glyphicon glyphicon-link'></span>".$tag_details[$tag]."</div></a>";
				}
				echo "</div>";
				echo "<b>Description : </b>".$int_question['description']."<br>";
				echo "<b>Creation time: </b>".$int_question['creation_time']."<br>";
				$userlink = site_url('profile/get/'.$int_question['user_id']);
				echo "<b>Asked by : </b><a href='$userlink'>".$users[$int_question['user_id']]."</a><br>";

				if(!isset($answers[$q_id]))
					echo "Answers(0)<br><br><br>";
				else
					echo "Answers(".$answers[$q_id].")<br><br><br>";
				echo "</div>";
				echo "</div>";
				echo "<hr>";
			}

		}
		else
		{
			echo "No questions";
		}
		echo $this->pagingclass->paginglink($int_query,$int_record_per_page,"int")."<br><br><br><br>";
		?>
	</div>
</div>
</div>
</div>
