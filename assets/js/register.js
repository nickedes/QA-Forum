$(document).ready(function () {
$(function() {
    // Setup form validation on the element
    $("#register_form").validate({
        // Specify the validation rules
        rules: {
            name: "required",

            email: {
                required: true,
                email: true
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
                required :"Please enter a email address",
                email: "Please enter a valid email address"
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
            $.ajax({  
                type: 'POST',
                url: $(form).attr('action'),
                data: $(form).serialize(),
                // dataType : 'json',
                success: function(data) {
                    if (data.success){
                        if(data.email != null)
                        {
                            console.log("Verification link sent to" + data.email);
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
                            $('#form_error').text(data.message);
                        }
                        else
                        {
                            $('#email_error').text(data.email);
                            $('#name_error').text(data.name);
                            $('#password_error').text(data.password);
                            $('#mobileno_error').text(data.mobileno);
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
