<h1>Welcome to Self profile</h1>
<?php
    $this->load->view('thumbnail_view.php');
?>
<div>
    <?php
        $this->load->library('form_validation');
        echo validation_errors(); 
        echo form_open('profilepage/update_details');
    ?>
        <button name="submitform" value="logout">LOGOUT</button>
        User Name&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  : &nbsp; &nbsp;  <input type="text"  value="<?php echo $this->session->userdata['name'] ?>" name="name" ><br>

        Email : <?php echo $this->session->userdata['email'] ?><br>

        Mobile no.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp; &nbsp; <input type="number"   name="mobileno" value="<?php echo $this->session->userdata['mobileno']?>" ><br>

        Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; : &nbsp; &nbsp; <input type="password"  value="<?php echo $this->session->userdata['passwd'] ?>" name="password" ><br>
        About Me&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp; &nbsp; <input type="text"  value="<?php echo $this->session->userdata['about'] ?>"  name="about"><br><br>

        <button type="submit" name="submitform" value="save">Save changes</button>
        </form>

</div>
<h1>Activities</h1>
<div>
    <!-- Info about qustions posted by user -->
    <h2>Questions</h2>
    <?php
        foreach($questions as $question) {
            $qid = $question['q_id'];
            $link= site_url('question/get/'.$qid);
            echo "<a href='$link'>"."<strong>Title : ".$question['title']."</strong><br></a>";
            echo "Description : ".$question['description']."<br>";
            echo "Creation time: ".$question['creation_time']."<br> <br>";
        } 
    ?>
</div>
<div>
    <!-- Displays info about answers by user -->
    <h2>Answers</h2>
    <?php
        foreach($answers as $answer) {
            $qid = $answer['q_id'];
            $link= site_url('question/get/'.$qid);
            echo "<a href='$link'>"."<strong>Title : ".$answer['title']."</strong><br></a>";
            echo "Description : ".$answer['description']."<br>";
            echo "Creation time: ".$answer['creation_time']."<br> ";

            echo "<strong>Answer : ".$answer['answer_text']."</strong><br>";
            echo "Answer time: ".$answer['answer_time']."<br> <br>";
        }
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
