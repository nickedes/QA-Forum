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
                    <div id="password_error"></div>
                    <div class="form-group">
                        <label for="name">Confirm New Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="confirm_password" id="confirm_password" >
                        <input type="hidden" name="email" value="<?php echo $email; ?>">  
                    </div>
                    <div id="confirm_password_error"></div>
                    <button class="btn btn-lg btn-success btn-block" name="new_submit" type="submit">Reset</button>
                    <div id="form_error"></div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>