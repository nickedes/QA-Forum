<html>
<head><h1>Welcome to Self profile</h1></head>
<body>
    <div>
        <img src=" /var/www/html/codeigniter/assets/images/anon.jpg" width="30" height="40">
    </div>

    <div>
        <?php
        $this->load->library('form_validation');
        echo validation_errors(); 
        echo form_open('profilepage/update_details');
        ?>
        <button name="submitform" value="logout">LOGOUT</button>
        <form >
            User Name&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  : &nbsp; &nbsp;  <input type="text"  value="<?php echo $this->session->userdata['name'] ?>" name="name" ><br>

            Email : <?php echo $this->session->userdata['email'] ?><br>

            Mobile no.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp; &nbsp; <input type="number"   name="mobileno" value="<?php echo $this->session->userdata['mobileno']?>" ><br>

            Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; : &nbsp; &nbsp; <input type="password"  value="<?php echo $this->session->userdata['passwd'] ?>" name="password" ><br>
            About Me&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp; &nbsp; <input type="text"  value="<?php echo $this->session->userdata['about'] ?>"  name="about"><br><br>

            <button type="submit" name="submitform" value="save">Save changes</button>
            <button name="submitform" href="profilepage" value="cancel">Cancel</button>  <!---/// ???? -->

        </form>

    </div>


    <h1>Activities</h1>



    <div>
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
    <h2>Tags</h2>
    <?php
    foreach($tags as $tag) {
       $tag_id = $tag['tag_id'];
       $link= site_url('tag/get/'.$tag_id);
       echo "<a href='$link'>"."<strong>".$tag['name']."</strong><br><br></a>";
   } 

   ?> 
</div>

</body>
</html>