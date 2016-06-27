<html>
<head><h1>Welcome to Self profile</h1></head>
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
User Name&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  : &nbsp; &nbsp; <?php echo $this->session->userdata['name'] ?><br>

Email : <?php echo $this->session->userdata['email'] ?><br>

About Me&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp; &nbsp; <?php echo $this->session->userdata['about'] ?><br><br>


</form>

</div>


<h1>Activities</h1>

<div>
<h2>Questions</h2>
<?php
	$this->load->model('users');
	$data= $this->users->get_questions($this->session->userdata['user_id']);
  ?>


<?php
    foreach($data as $item) {
        echo "<strong>".$item['title']."</strong><br>".$item['description']."<br> ".$item['creation_time']."<br><br>";
    }
?>
 </div>

<div>
<h2>Answers</h2>
<?php
	$this->load->model('users');
	$data= $this->users->get_answers($this->session->userdata['user_id']);
  ?>


<?php
    foreach($data as $item) {
        echo $item['answer_text']."<br> ".$item['answer_time']."<br><br>";
    }
?>
</div>



<div>
<h2>Tags</h2>
<?php
	$this->load->model('users');
	$data= $this->users->get_tags($this->session->userdata['user_id']);
  ?>


<?php
    foreach($data as $item) {
        echo $item['tag_name']."<br><br>";
    }
?>
</div>

</body>
</html>