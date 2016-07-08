<!DOCTYPE html>
<html>
<head>
	<title>QA-Forum</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/easy-autocomplete.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/easy-autocomplete.themes.min.css">
 
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">Forum</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo site_url();?>/home">Home</a></li>
        <li><a href="<?php echo site_url();?>/profilepage/self">Profile page</a></li>
        <li><a href="<?php echo site_url();?>/question">Post question</a></li>
        <li><a href="<?php echo site_url();?>/logout">Logout</a></li>
      </ul>
      </div>
      <div>
     <form method="GET" action="<?php echo site_url();?>/search_controller">
      <div class="form-group">
          <input type="text" class="form-control"  id="basics" name="search" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>