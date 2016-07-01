$(document).ready(function () {
    $(function() {
    highlight_errors_validate();
    // Setup form validation on the element
    $("#register_form").validate({
        // Specify the validation rules
        rules: {
            name: "required",

            email: {
                required: true,
                email: true,
                email_validator: true
            },
            mobileno: {
                required: true
                // exactlength: 10
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

            name: "Please enter your name",
            email: {
                required :'<br><div class="alert alert-danger">Please enter a email address</div>',
                email: '<br><div class="alert alert-danger">Please enter a valid email address</div>'
            },
            mobileno: {
                required: "mobile no. is required"
                // exactlength: "The mobile no. should be of 10 characters"
            },
            password: {
                required: 'Password is required',
                minlength: 'The password should be of 6 characters in length'
            },
            confirm_password: {
                required: 'Confirm password is required',
                equalTo: 'The confirm password should match password.'
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
                            
                                // console.log(data.success);
                            $('#form_error').html('<br><div class="alert alert-success">' + data.success_message + '</div>');

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
