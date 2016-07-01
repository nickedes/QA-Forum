$(document).ready(function () {
    $(function() {
    $('#resend_link').hide();
    highlight_errors_validate();
    // Setup form validation on the element
    $("#login_form").validate({
        // Specify the validation rules
        rules: {
            password: "required",
            email: {
                required: true,
                email: true
            }
        },
        
        // Specify the validation error messages
        messages: {
            password: "Please enter your password",
            email: "Please enter a valid email address",
        },
        
        submitHandler: function(form) {
            $.ajax({  
                type: 'POST',
                url: $(form).attr('action'),
                data: $(form).serialize(),
                dataType : 'json',
                success: function(data) {
                    $('#form_error').html('');
                    $('#email_error').html('');
                    $('#password_error').html('');
                    $('resend_error').html('');
                    if (data.success){
                        // user is not verified
                        if(!data.is_active)
                        {
                            $('#resend_error').html('<div class="alert alert-danger col-sm-8">You have not verified. Please verify'+
                                '</div><br>');
                            $('#resend_link').show();
                      }     
                      else
                      {

                        // When user is active and login is successful -> redirect to home.
                        window.location.href = "home";
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
                        if(typeof(data.email) != "undefined" && data.email != "" )
                            $('#email_error').html('<br><div class="alert alert-danger">' + data.email + '</div>');
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

    $("#forgotpassword_form").validate({
        // Specify the validation rules
        rules: {
            forgotpassword_email: "required"
        },
        
        // Specify the validation error messages
        messages: {
            email: "Please enter a valid email address"
        },
        
        submitHandler: function(form) {
            $('#forgotpassword_error').empty();
            $.ajax({  
                type: 'POST',
                url: $(form).attr('action'),
                data: $(form).serialize(),
                dataType : 'json',
                success: function(data) 
                {
                    if (data.success){
                        // console.log(data.success);
                        $('#forgotpassword_error').html('<br><div class="alert alert-success">' + data.success_message + '</div>');

                        setTimeout(function(){
                            $('#forgotpassword_error').empty();
                            $('#forgotpasswordModal').modal('hide');
                        }, 3000);
                    }
                    else
                    {
                        if(data.message != "")
                            $('#forgotpassword_error').html('<br><div class="alert alert-danger">' + data.message + '</div>');
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
            return false;
        },
    });

    $("#resend_link").click(function(){
        // console.log("here");
        $.ajax
        ({
            type: 'POST',
            // send ajax request to register/resend_verification_link
            url: 'verifyregister/resend_verification_mail',
            data: {'email' :$('#email').val()},
            dataType: "json",
            success: function(data){
                if(data.success)
                    console.log("calling");                
            },
            error: function(data){
                console.log(data);
            }

        })
    });
});

});