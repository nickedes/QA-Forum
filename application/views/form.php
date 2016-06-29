<?php 
	 if(isset($this->session->userdata['email']))
	 {
	 	$this->load->helper('url');
	 	redirect('profilepage/self');
	 }
	 $this->load->library('form_validation');
	 echo validation_errors(); 
 ?>
	<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Sign in</h1>
            <div class="account-wall">
                <form class="form-signin" method="POST" action="valid">
                <input type="email" class="form-control" placeholder="Email" name="email" id="email" required autofocus>
                <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">
                    Sign in</button>
                </form>
            </div>
            <br>
            <button class="btn btn-default" id="register"><a href="register" class="text-center new-account">Register</a></button>
            <button class="btn btn-default" id="register"><a href="forgotpassword" class="pull-right need-help">Forgot Password</a></button>
        </div>
    </div>
</div>