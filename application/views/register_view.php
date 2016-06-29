<div class="container">
    <div class="row">
        <form method="POST" role="form" action="verifyregister" id="register_form">
            <div class="col-lg-6">
            <div class="well well-sm"><strong>Fill registration details:</strong></div>
                
                <div class="form-group">
                    <label for="InputName">Enter Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
                        <span class="input-group-addon"></span>
                        <span id="name_error"></span>
                   
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Enter Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                        <span class="input-group-addon"></span>
                        <span id="email_error"></span>
                    </div>
                </div>
               	<div class="form-group">
                    <label for="InputMobile">Enter Mobile no.</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="mobileno" id="mobileno" placeholder="Enter Mobile no." required>
                        <span class="input-group-addon"></span>
                        <span id="mobileno_error"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="InputPassword">Enter Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required>
                        <span class="input-group-addon"></span>
                        <span id="password_error"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm">confirm password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Re-Enter Password" required>
                        <span class="input-group-addon"></span>
                    </div>
                </div>
                <span id="form_error"></span>
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info">
            </div>
        </form>
    </div>
</div>

