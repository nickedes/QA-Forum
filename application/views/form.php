<html>
<head>
	<title>LOGIN FORM</title>
	<h1>LOGIN</h1>
</head>
<body>

 <?php 
 $this->load->library('form_validation');
 echo validation_errors(); 
 ?>
  
	<form method="POST" action="valid">
		Email : <input type="email" name="email" id="email"><br>
		Password : <input type="password" name="password" id="password"><br>
		<button name="submit" type="submit">Login</button>
	</form>
</body>
</html>
