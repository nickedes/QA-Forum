<html>
<head><h1>Welcome to the Forum</h1></head>

<body>
<?php
echo "Welcome ".$this->session->userdata['name'];
$this->load->library('form_validation');
echo validation_errors(); 
   echo form_open('home/butn_redirection');
?>

<button name="submitform" value="logout">LOGOUT</button>
<button name="submitform" value="edit">Edit Profile</button>

<hr>

<h2>Recent Questions</h2>

<?php
foreach($rec_questions as $rec_question) {
 $qid = $rec_question['q_id'];
$link= site_url('question/get/'.$qid);
        echo "<a href='$link'>"."<strong>Title : ".$rec_question['title']."</strong><br></a>";
        echo "Description : ".$rec_question['description']."<br>";
        echo "Creation time: ".$rec_question['creation_time']."<br> <br>";
      } 
?>

<h2>My Interests</h2>
<?php
foreach($int_questions as $int_question) {
 $qid = $int_question['q_id'];
$link= site_url('question/get/'.$qid);
        echo "<a href='$link'>"."<strong>Title : ".$int_question['title']."</strong><br></a>";
        echo "Description : ".$int_question['description']."<br>";
        echo "Creation time: ".$int_question['creation_time']."<br>";
        echo "Asked by : ".$int_question['username']."<br>";
        echo "Tag : ".$int_question['tagname']."<br><br>";
      } 
?>

</body>
</html>