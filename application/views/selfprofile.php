<div class="container">
    <h1 class="text-center login-title">Self Profile</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="text-center">
                <img src="<?php echo base_url()."/application/uploads/".$user_details[0]['profilepic'] ?>" width="80" height="60" />
            </div>
            <!-- load upload image view, with an option that it is included in profile image file. -->
            <?php $this->load->view('upload',array('is_profile' => true)); ?>
        </div>

        
   
        <!-- edit form column -->
        <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
            <br>
            <form class="form-horizontal" id="myprofile_form" method="POST" action="update_details" role="form">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" id="name" name="name" value="<?php echo $user_details[0]['name']; ?>" type="text">
                    </div>
                </div>
                <div class="row">
                    <div  class="col-lg-offset-3" id="name_error"></div>
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
                        <input class="form-control" id="mobileno" name="mobileno" value="<?php echo $user_details[0]['mobileno']; ?>" type="text">
                    </div>
                </div>

                <div class="row">
                    <div  class="col-lg-offset-3" id="mobileno_error"></div>
                </div>
               

                <div class="form-group">
                    <label class="col-lg-3 control-label">About me:</label>
                    <div class="col-lg-8">
                        <input class="form-control" id="about" name="about" value="<?php echo $user_details[0]['about']; ?>" type="text">
                    </div>
                </div>

                <div class="row">
                    <div  class="col-lg-offset-3" id="about_error"></div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Join date:</label>
                    <div class="col-lg-8">
                        <input class="form-control" value="<?php echo $user_details[0]['creation_time']; ?>" type="text" disabled>
                    </div>
                </div>

                <div class="row">
                    <div  class="col-lg-offset-3" id="myprofile_form_error"></div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">

 <a class="button" href="#popup1">Change Password</a>


                        <button class="btn btn-primary" value="save" type="submit" name="submitform">Save changes</button>
                         <button class="btn btn-primary" value="cancel"  name="submitform">Cancel</button>
                    </div>
                     
                </div>
            </form>
        </div>
    </div>
</div>

<div id="popup1" class="overlay">
    <div class="popup">
    <a class="close" href="#">&times;</a>
    <br>

       <div class="container">
      Current Password: <input type="password" name="cur_pass" id = "cur_pass" ><br><br>
       New Password:  &nbsp;&nbsp;&nbsp; &nbsp;<input type="password" name="new_pass" id = "new_pass" ><br><br>
       Confirm Password: <input type="password" name="confirm_pass" id = "confirm_pass" ><br><br>
       <button type="submit" >Save Changes</button>
        </div>
    </div>
</div>

<?php 
  $q ="";
  $a ="";
   $t ="";
  $url = $_SERVER['REQUEST_URI'];
  //echo $url;
  if (strpos($url, 'self?ques') != false) 
    $q = "active";
  else
    if(strpos($url, 'self?ans') !=false)
      $a= "active";
  else
   $t = "active";
  ?>

<div class="container">
    <h2>Activities</h2>
    <!-- Info about qustions posted by user -->
    <div id="content">
        <br><ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="<?php echo $q ?>"><a href="#questions" data-toggle="tab">Questions</a></li>
            <li class="<?php echo $a ?>"><a href="#answers" data-toggle="tab">Answers</a></li>
            <li class="<?php echo $t ?>"><a href="#tags" data-toggle="tab">Followed Tags</a></li>
       
        </ul>
        <div id="my-tab-content" class="tab-content">
            <br><div class="<?php echo 'tab-pane '.$q ?>"  id="questions">
       
    <?php
        if($ques_res){
//print_r($questions);
            echo "<div class='header'>";
            foreach($ques_res as $ques_res) {
                echo "<h4>";
                $qid = $ques_res['q_id'];
                $link= site_url('question/get/'.$qid);
                echo "Q. <a href='$link'>"."<strong>Title : ".$ques_res['title']."</strong><br></a>";
                echo "</h4>";
                echo "<span class='name'>Asked by: <a href=".site_url()."/profile/get/".$ques_res['q_id'].">".$ques_res['name']."</a></br></span>";
                echo $ques_res['creation_time']."<br>";
                echo "<hr>";
            } 
            echo "</div>";
         echo $this->pagingclass->paginglink($ques_query,$ques_rec_record_per_page,"ques");
  
        }
        else
            echo "<h3>No Questions posted.</h3>";
         ?>
         </div>
           <div class="<?php echo 'tab-pane '.$a ?>"  id="answers">
          
    <!-- Displays info about answers by user -->
    <?php
        if($ans_res)
        {    
            echo "<div class='header'>";
            foreach($ans_res as $ans_res) {
                echo "<h4>";
                $qid = $ans_res['q_id'];
                $link= site_url('question/get/'.$qid);
                echo "<a href='$link'>"."<strong>Title : ".$ans_res['title']."</strong><br></a>";
                echo "</h4>";
                echo "<strong>Answer : ".$ans_res['answer_text']."</strong><br>";
                echo "Answer time: ".$ans_res['answer_time']."<br>";
                echo "<hr>";
            }
            echo "</div>";
              echo $this->pagingclass->paginglink($ans_query,$ans_rec_record_per_page,"ans");
  
        }
        else
            echo "<h3>No answers posted.</h3>";
        
    ?>
</div>
  <div class="<?php echo 'tab-pane '.$t ?>"  id="tags">
          
    <!-- Displays info about tags user follows -->
<div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
                    <?php
                        if($tags)
                        {//print_r($tags);

                            foreach($tags as $tag) {
                                $tag_id = $tag['tag_id'];
                                $link = site_url('tag/get/'.$tag_id);
                            ?>
                            <form method='POST' id='follow_unfollow' action="<?php echo site_url(); ?>/follow">
                            <input type='hidden' id='user_id' name='user_id' value="<?php echo $user_id; ?>">
                            <input type='hidden' id='tag_id' name='tag_id' value="<?php echo $tag_id; ?>">
                            <a href="<?php echo $link;?>">
                            <span class="glyphicon glyphicon-link"></span><strong><?php echo $tag['name'];?></strong>
                            </a>
                            &nbsp;&nbsp;&nbsp;
                            <button type="submit" class="btn btn-danger" id="unfollow" name="name" value="unfollow">Unfollow</button>
                            </form>
                            <br><br>
                        <?php
                         
                            echo "<hr>";
                            }
                             echo $this->pagingclass->paginglink($tag_query,$tag_record_per_page,"tags");
  
                        }
                        else
                        {
                            echo "<h3>No tags followed</h3>";
                        }
                        ?>
        </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/unfollow.js"></script>
