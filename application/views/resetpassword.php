<!-- <h3>Reset your Password</h3>
	<form method="POST" action="updatepassword">
	New Password : <input type="password" name="password"><br>
	Confirm New Password : <input type="password" name="password1" >

	<input type="hidden" name="email" value="<?php echo $email; ?>">  
   
	<button type="submit" name="new_submit">Submit</button>
	</form> -->

<div class="container">
    <div class="row">
        <h1 class="text-center login-title">Reset Password</h1>
        <div class="col-sm-4 col-md-4 col-md-offset-4">
            <div class="account-wall">
                <form class="form" method="POST" action="updatepassword" id="resetpassword_form">
                    <div class="form-group">
                        <label for="name">Enter New Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="name">Confirm New Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="
                        password1" id="confirm_password" >
                        <input type="hidden" name="email" value="<?php echo $email; ?>">  
                        <span id="password_error"></span>
                    </div>
                    <button class="btn btn-lg btn-success btn-block" name="new_submit" type="submit">Reset</button>
                    <span id="form_error"></span>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>