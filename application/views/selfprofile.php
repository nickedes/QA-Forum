<h1>Welcome to Self profile</h1>
<?php
    $this->load->view('thumbnail_view.php');
?>
<div>
    <?php
        $this->load->library('form_validation');
        $this->load->model('pagingclass');
        echo validation_errors(); 
        echo form_open('profilepage/update_details');
    ?>
        <button name="submitform" value="logout">LOGOUT</button>
        User Name&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  : &nbsp; &nbsp;  <input type="text"  value="<?php echo $this->session->userdata['name'] ?>" name="name" ><br>

        Email : <?php echo $this->session->userdata['email'] ?><br>

        Mobile no.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp; &nbsp; <input type="number"   name="mobileno" value="<?php echo $this->session->userdata['mobileno']?>" ><br>

        <!-- removed password from session -->
        <!-- Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; : &nbsp; &nbsp; <input type="password"  value="<?php echo $this->session->userdata['passwd'] ?>" name="password" ><br> -->
        About Me&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp; &nbsp; <input type="text"  value="<?php echo $this->session->userdata['about'] ?>"  name="about"><br><br>

        <button type="submit" name="submitform" value="save">Save changes</button>
        </form>

</div>
<h1>Activities</h1>
<div>
    <!-- Info about qustions posted by user -->
    <?php
        if($ques_res){
        echo "<h2>Questions</h2>";
            foreach($ques_res as $ques_res) {
                $qid = $ques_res['q_id'];
                $link= site_url('question/get/'.$qid);
                echo "<a href='$link'>"."<strong>Title : ".$ques_res['title']."</strong><br></a>";
                echo "Description : ".$ques_res['description']."<br>";
                echo "Creation time: ".$ques_res['creation_time']."<br> <br>";
            } 
        }
        else
            echo "<h3>No Questions posted by user</h3>";
        echo $this->pagingclass->paginglink($ques_query,$ques_rec_record_per_page);


    ?>
</div>
<div>
    <!-- Displays info about answers by user -->
    <h2>Answers</h2>
    <?php
        foreach($ans_res as $ans_res) {
            $qid = $ans_res['q_id'];
            $link= site_url('question/get/'.$qid);
            echo "<a href='$link'>"."<strong>Title : ".$ans_res['title']."</strong><br></a>";
            echo "Description : ".$ans_res['description']."<br>";
            echo "Creation time: ".$ans_res['creation_time']."<br> ";

            echo "<strong>Answer : ".$ans_res['answer_text']."</strong><br>";
            echo "Answer time: ".$ans_res['answer_time']."<br> <br>";
        }
          echo $this->pagingclass->paginglink($ans_query,$ans_rec_record_per_page);
    
    ?>
</div>
<div>
    <!-- Displays info about tags user follows -->
    <h2>Tags</h2>
    <?php
        foreach($tags as $tag) {
            $tag_id = $tag['tag_id'];
            $link = site_url('tag/get/'.$tag_id);
            echo "<a href='$link'>"."<strong>".$tag['name']."</strong><br></a>";
            echo "<form method='POST' action=".site_url()."/follow id='follow_unfollow'>";
            echo "<input type='hidden' id='user_id' name='user_id' value=".$user_id.">";
            echo "<input type='hidden' id='tag_id' name='tag_id' value=".$tag_id.">";
            echo "<button type='submit' id='unfollow' name='link' value='unfollow'>Unfollow</button></form>";
        }
    ?>
</div>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/unfollow.js"></script>
