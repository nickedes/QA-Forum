<?php 
	 if(isset($this->session->userdata['email']))
	 {
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
                <form class="form-signin" method="POST" action="valid" id="login_form">
                    <input type="email" class="form-control" placeholder="Email" name="email" id="email" >
                    <span id="email_error"></span>
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" >
                    <span id="password_error"></span>
                    <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
                    <span id="form_error"></span>
                </form>
            </div>
            <br>
            <a href="register" class="text-center new-account"><button class="btn btn-default" id="register">Register</button></a>
            <a href="forgotpassword" class="pull-right need-help"><button class="btn btn-default" id="register">Forgot Password</button></a>
        </div>
    </div>
</div>