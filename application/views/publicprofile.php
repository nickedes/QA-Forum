<html>
<head><h1>Welcome to Public profile</h1></head>
<body>
<div>
<img src=" /assets/images/anon.jpg" width="30" height="40">
</div>

<div>
<?php

$this->load->library('form_validation');
echo validation_errors(); 
   echo form_open('profilepage/update_details');
   ?>

<form >
User Name&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  : &nbsp; &nbsp; <?php echo $userdetails[0]['name']?><br>

Email : <?php echo $userdetails[0]['email'] ?><br>

About Me&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp; &nbsp; <?php echo $userdetails[0]['about'] ?><br><br>


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