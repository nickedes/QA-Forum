<!DOCTYPE html>
<html>
<head>
	<title>QA-Forum</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
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
      <a class="navbar-brand" href="#">Forum</a>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="#">About</a></li>
      </ul>
     <form method="GET" action="search_controller">
      <div class="form-group">
          <input type="text" class="form-control"  id="basics" name="search" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>