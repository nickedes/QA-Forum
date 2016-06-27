<html>
<head><h1>Reenter new password!!!</h1></head>
<body>
	
	<form method="POST" action="updatepassword">
	New Password : <input type="password" name="password"><br>
	Confirm New Password : <input type="password" name="password1" >

	<input type="hidden" name="email" value="<?php echo $email; ?>">  
   
	<button type="submit" name="new_submit">Submit</button>
	</form>
</body>
</html>