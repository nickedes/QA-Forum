$(document).ready(function () {
    $(function() {
    highlight_errors_validate();
    // Setup form validation on the element
    $("#register_form").validate({
        // Specify the validation rules
        rules: {
            name: {
                required: true,
                name_validator: true
            },

            email: {
                required: true,
                email: true,
                email_validator: true
            },
            mobileno: {
                required: true,
                mobile_validator: true
            },
            password: {
                required: true,
                minlength: 6
            },
            confirm_password: {
                required: true,
                equalTo: '#password'
            }
        },
        
        // Specify the validation error messages
        messages: {

            name: {
                required :'<br><div class="alert alert-danger">Please enter your names</div>'
            },
            email: {
                required :'<br><div class="alert alert-danger">Please enter a email address</div>',
                email: '<br><div class="alert alert-danger">Please enter a valid email address</div>'
            },
            mobileno: {
                required: '<br><div class="alert alert-danger">Please enter your mobile no.</div>'
                // exactlength: "The mobile no. should be of 10 characters"
            },
            password: {
                required: '<br><div class="alert alert-danger">Please enter a Password</div>',
                minlength: '<br><div class="alert alert-danger">The password should be of 6 characters in length</div>'
            },
            confirm_password: {
                required: '<br><div class="alert alert-danger">Confirm password is required</div>',
                equalTo: '<br><div class="alert alert-danger">The confirm password should match password.</div>'
            }
        },
        
        submitHandler: function(form) {
            // waiting for response
            $('#form_error').html('<br><div class="alert alert-success">Registration going on..</div>');

            $.ajax({  
                type: 'POST',
                url: $(form).attr('action'),
                data: $(form).serialize(),
                dataType : 'json',
                success: function(data) {
                    $('#form_error').html('');
                    $('#mobileno_error').html('');
                    $('#email_error').html('');
                    $('#name_error').html('');
                    $('#password_error').html('');
                    $('#register_on').html('');
                    if (data.success){
                        if(data.email != null)
                        {
                            console.log("Verification link sent to" + data.email);
                            
                            $('#form_error').html('<br><div class="alert alert-success">' + data.success_message + '</div>');
                            // redirect after 3 secs to upload image page
                            setTimeout(function(){
                                $('#form_error').empty();
                                window.location.href = "upload";
                            }, 3000);
                        }                        
                        else
                        {
                            console.log("Unable to send Verification link to " + data.email);
                        }
                    }
                    else
                    {
                        if(data.message != null)
                        {
                            $('#form_error').html('<div class="alert alert-danger">' + data.message + '</div><br>');
                        }
                        else
                        {
                            console.log(data);
                            if(typeof(data.mobileno) != "undefined" && data.mobileno != "" )
                                $('#mobileno_error').html('<br><div class="alert alert-danger">' + data.mobileno + '</div>');
                            if(typeof(data.email) != "undefined" && data.email != "" )
                                $('#email_error').html('<br><div class="alert alert-danger">' + data.email + '</div>');
                            if(typeof(data.name) != "undefined" && data.name != "" )
                                $('#name_error').html('<br><div class="alert alert-danger">' + data.name + '</div>');
                            if(typeof(data.password) != "undefined" && data.password != "" )
                                $('#password_error').html('<br><div class="alert alert-danger">' + data.password + '</div>');
                        }
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
            return false;
        },
    });
});

});
