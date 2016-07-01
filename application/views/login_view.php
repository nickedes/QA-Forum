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
            <div class="row">
                <div class="alert alert-danger col-sm-8" id="resend_link">You have not verified. Please verify
                    <button class="btn btn-success" id="resend_link">Send</button>
                </div>
                <div class="alert alert-success" id="success_send">Link sent successfully.</div>
            </div>
            <h1 class="text-center login-title">Sign in</h1>
            <div class="account-wall">
                <form class="form-signin" method="POST" action="valid" id="login_form">
                    <div class="form-group">
                        <label for="name">Enter Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" id="email" >
                        <span id="email_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="name">Enter Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password" >
                        <span id="password_error"></span>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
                    <span id="form_error"></span>
                </form>
            </div>
            <br>
            <a href="register" class="text-center new-account"><button class="btn btn-default" id="register">Register</button></a>
             <button class="btn btn-defualt" data-toggle="modal" data-target="#forgotpasswordModal" id="forgotpassword">Forgot Password</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="forgotpasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotpasswordLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="forgotpasswordLabel">Forgot your password?</h4>
    </div>
    <!-- modal body  -->
    <div class="modal-body">
        <form class="form-horizontal" method="POST" id="forgotpassword_form" action="forgotpassword">
            <!-- name goes here. -->
            <div class="form-group">
                <label for="forgotpassword_email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="forgotpassword_email" name="forgotpassword_email" placeholder="Enter your email id here." required autofocus>
                </div>
                <br>
                <div class="row">
                    <div class = "col-sm-offset-2 col-sm-8"><span id="forgotpassword_error"></span></div>
                </div>
            </div> 
        </div>
        <!-- footer -->
        <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-primary">Send Link</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </form>
</div>
</div>
</div>