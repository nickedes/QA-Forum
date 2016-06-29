<html>
<head><h1>Welcome to the Forum</h1></head>

<body>
<?php
//error_reporting(0);
echo "Welcome ".$this->session->userdata['name'];
$this->load->library('form_validation');
echo validation_errors(); 
   echo form_open('home/butn_redirection');
?>

<button name="submitform" value="logout">LOGOUT</button>
<button name="submitform" value="edit">Edit Profile</button>
<button name="submitform" value="question">Ask a Question</button>

<hr>

<h2>Recent Questions</h2>

<?php
foreach($rec_questions as $rec_question) {
 $qid = $rec_question['q_id'];
 $tagid = $rec_question['tag_id'];
 $userid = $rec_question['user_id'];
 $userlink = site_url('profile/get/'.$userid);
 $link1=  site_url('tag/get/'.$tagid);
$link= site_url('question/get/'.$qid);
        echo "<a href='$link'>"."<strong>Title : ".$rec_question['title']."</strong><br></a>";
        echo "Description : ".$rec_question['description']."<br>";
        echo "Creation time: ".$rec_question['creation_time']."<br>";
        echo "Asked by : <a href='$userlink'>".$rec_question['username']."</a><br>";
        echo "Tag : <a href='$link1'>".$rec_question['tagname']."</a><br>";
        if(!isset($answers[$qid]))
            echo "Answers(0)<br><br><br><br>";
      else
        echo "Answers(".$answers[$qid].")<br><br><br><br>";
       }  
?>

<h2>My Interests</h2>
<?php
foreach($int_questions as $int_question) {
 $qid = $int_question['q_id'];
 $tagid = $int_question['tag_id'];
 $link1=  site_url('tag/get/'.$tagid);
$link= site_url('question/get/'.$qid);
        echo "<a href='$link'>"."<strong>Title : ".$int_question['title']."</strong><br></a>";
        echo "Description : ".$int_question['description']."<br>";
        echo "Creation time: ".$int_question['creation_time']."<br>";
        echo "Asked by : ".$int_question['username']."<br>";
        echo "Tag : <a href='$link1'>".$int_question['tagname']."</a><br>";
        if(!isset($answers[$qid]))
            echo "Answers(0)<br><br><br><br>";
      else
        echo "Answers(".$answers[$qid].")<br><br><br><br>";
        } 
?>

</body>
</html>