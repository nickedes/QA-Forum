<div class="container">
    <div class="row">
        <form method="POST" role="form" action="verifyregister" id="register_form">
            <div class="col-lg-6">
                <div class="well well-sm"><strong>Fill registration details:</strong></div>
                <div class="form-group">
                    <label for="name">Enter Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                        <span class="input-group-addon"></span>
                    </div>
                    <span id="name_error"></span>
                </div>
                <div class="form-group">
                    <label for="email">Enter Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                        <span class="input-group-addon"></span>    
                    </div>
                    <span id="email_error"></span>
                </div>
                <div class="form-group">
                    <label for="mobile">Enter Mobile no.</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="mobileno" id="mobileno" placeholder="Enter Mobile no.">
                        <span class="input-group-addon"></span>                        
                    </div>
                    <span id="mobileno_error"></span>
                </div>
                <div class="form-group">
                    <label for="password">Enter Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                        <span class="input-group-addon"></span>                        
                    </div>
                    <span id="password_error"></span>
                </div>
                <div class="form-group">
                    <label for="confirm">confirm password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Re-Enter Password">
                        <span class="input-group-addon"></span>
                    </div>
                </div>
                <span id="form_error"></span>
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info">
            </div>
        </form>
    </div>
</div>

