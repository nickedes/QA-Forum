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