<!DOCTYPE html>
<html>
<head>
	<title>QA-Forum</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/easy-autocomplete.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/easy-autocomplete.themes.min.css">
 
</head>
<body>



   <nav class="navbar navbar-default navbar-fixed-top" role="navigation">

<!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" style="font-size: 20px;" href="#"><b>Forum</b></a>
  </div>

  <?php 
  $home ="";
  $profile ="";
   $post_question ="";
  $url = $_SERVER['REQUEST_URI'];
  //echo $url;
  if (strpos($url, 'profilepage') != false) 
    $profile = "active";
  else
    if(strpos($url, 'home') !=false)
      $home= "active";
  else
    if(strpos($url,'question')!=false && strpos($url,'question/')== false)
    $post_question="active";
  ?>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li  class="<?php echo $home ?>"><a style="font-size: 17px;" href="<?php echo site_url();?>/home">Home</a></li>
      <li class="<?php echo $profile ?>"><a style="font-size: 17px;" href="<?php echo site_url();?>/profilepage/self">Profile page</a></li>
     <li class="<?php echo $post_question ?>"><a style="font-size: 17px;" href="<?php echo site_url();?>/question">Post question</a></li>
      
    </ul>
    <div class="col-sm-3 col-md-3">
        <form method="GET" class="navbar-form" role="search" action="<?php echo site_url();?>/search_controller">
        <div class="input-group">
                     <input type="text" class="form-control"  name="search" placeholder="Search"  id="basics">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
    </div>
    <?php 
      if(isset($this->session->userdata['user_id']))
      {
    ?>
    <ul class="nav navbar-nav navbar-right" style="height:20px;">
       <li><a href="<?php echo site_url();?>/logout"><button style="font-size: 15px; margin-top:-10px; margin-right:10px;" class="btn btn-danger">Logout
       </button>
       </a>
       </li>
    </ul>
    <?php
     } 
    ?>
  </div><!-- /.navbar-collapse -->
</nav>
<br><br><br>