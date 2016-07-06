<div class="container">
    <div class="row">
        <!-- <div class="col-sm-6 col-md-4 col-md-offset-4">
			<h3>Welcome to Public profile</h3> -->
			
			<!-- <div>
				<br><b>Email</b> : <?php echo $user_details[0]['email'] ?><br>
				<b>About User</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp; &nbsp; <?php echo $user_details[0]['about'] ?><br><br>
			</div> -->
			<!-- <div class="container"> -->
    <h1 class="page-header">Public Profile</h1>
    <div class="row">
        <!-- left column -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="text-center">
                <img src="<?php echo base_url()."/application/uploads/".$user_details[0]['profilepic'] ?>" width="200" height="100" />
            </div>
        </div>
        <!-- display info -->
        <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
            <br>
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" id="name" name="name" value="<?php echo $user_details[0]['name']; ?>" type="text" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" value="<?php echo $user_details[0]['email']; ?>" type="text" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Mobile:</label>
                    <div class="col-lg-8">
                        <input class="form-control" id="mobileno" name="mobileno" value="<?php echo $user_details[0]['mobileno']; ?>" type="text" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">About me:</label>
                    <div class="col-lg-8">
                        <input class="form-control" id="about" name="about" value="<?php echo $user_details[0]['about']; ?>" type="text" disabled>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Join date:</label>
                    <div class="col-lg-8">
                        <input class="form-control" value="<?php echo $user_details[0]['creation_time']; ?>" type="text" disabled>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>



			</div>
			</div>
			<h1>Activities</h1>
			<div>
				<?php
				if($questions)
				{
					echo "<h2>Questions</h2>";
					echo "<div class='header'>";
					foreach($questions as $question) {
						echo "<h4>";
						$qid = $question['q_id'];
						$link= site_url('question/get/'.$qid);
						echo "Q. <a href='$link'>"."<strong>Title : ".$question['title']."</strong><br></a>";
						echo "</h4>";
						echo "Description : ".$question['description']."<br>";
						echo "Creation time: ".$question['creation_time']."<br>";
					}
					echo "</div>";  
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
            		echo "<div class='header'>";
					foreach($answers as $answer) {
						echo "<h4>";
						$qid = $answer['q_id'];
						$link= site_url('question/get/'.$qid);
						echo "<a href='$link'>"."<strong>Title : ".$answer['title']."</strong><br></a>";
						echo "</h4>";
						echo "Description : ".$answer['description']."<br>";
						// echo "Creation time: ".$answer['creation_time']."<br> ";
						echo "<strong>Answer : ".$answer['answer_text']."</strong><br>";
						echo "Answer time: ".$answer['answer_time']."<br> <br>";
					} 
					echo "</div>";
				}
				else
				{
					echo "<h2>No answers</h2>";
				}
				?>
			</div>
			<div>
				<?php
				if($tags)
				{
					echo "<br><div class='list-group col-sm-2'>
							<a href='#' class='list-group-item active'>
							<span class='glyphicon glyphicon-tag'></span>Tags Followed
					    	</a>";
					foreach($tags as $tag) {
						$tag_id = $tag['tag_id'];
						$link= site_url('tag/get/'.$tag_id);
						echo "<a href='$link'><div class='list-group-item'>
        					<span class='glyphicon glyphicon-link'></span>".$tag['name']."</div></a>";
					} 
				}
				else
				{
					echo "<h2>No tags</h2>";
				}
				?> 
			</div>
</div>