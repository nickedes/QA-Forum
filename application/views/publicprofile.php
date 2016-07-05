<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
			<h3>Welcome to Public profile</h3>
			<?php
			$this->load->view('thumbnail_view.php');
			?>
			<div>
				<b>Email</b> : <?php echo $user_details[0]['email'] ?><br>
				<b>About User</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp; &nbsp; <?php echo $user_details[0]['about'] ?><br><br>
			</div>
			</div>
			</div>
			<h1>Activities</h1>
			<div>
				<?php
				if($questions)
				{
					echo "<h2>Questions</h2>";
					foreach($questions as $question) {
						$qid = $question['q_id'];
						$link= site_url('question/get/'.$qid);
						echo "<a href='$link'>"."<strong>Title : ".$question['title']."</strong><br></a>";
						echo "Description : ".$question['description']."<br>";
						echo "Creation time: ".$question['creation_time']."<br> <br>";
					}  
					 echo $this->pagingclass->paginglink($ques_query,$ques_rec_record_per_page);
  
				}
				else
				{
					echo "<h2>No questions</h2>";
				}
				?>
			</div>
			<div>
				<?php
				if($answers)
				{
					echo "<h2>Answers</h2>";
					foreach($answers as $answer) {
						$qid = $answer['q_id'];
						$link= site_url('question/get/'.$qid);
						echo "<a href='$link'>"."<strong>Title : ".$answer['title']."</strong><br></a>";
						echo "Description : ".$answer['description']."<br>";
						echo "Creation time: ".$answer['creation_time']."<br> ";
						echo "<strong>Answer : ".$answer['answer_text']."</strong><br>";
						echo "Answer time: ".$answer['answer_time']."<br> <br>";
					} 
					 echo $this->pagingclass->paginglink($ans_query,$ans_rec_record_per_page);
  
				}
				else
				{
					echo "<h2>No answers</h2>";
				}
				?>
			</div>
			<div>
				<h2>Tags</h2>
				<?php
				if($tags)
				{
					foreach($tags as $tag) {
						$tag_id = $tag['tag_id'];
						$link= site_url('tag/get/'.$tag_id);
						echo "<a href='$link'>"."<strong>".$tag['name']."</strong><br><br></a>";
					} 
					 echo $this->pagingclass->paginglink($tag_query,$tag_record_per_page);
  
				}
				else
				{
					echo "<h2>No tags</h2>";
				}
				?> 
			</div>