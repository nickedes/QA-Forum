$(document).ready(function () {
    $(function() {
    highlight_errors_validate();
    // Setup form validation on the element
    $("#resetpassword_form").validate({
        // Specify the validation rules
        rules: {
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
            $.ajax
            ({  
                type: 'POST',
                url: $(form).attr('action'),
                data: $(form).serialize(),
                dataType : 'json',
                success: function(data) {
                    $('#form_error').html('');
                    $('#confirm_password_error').html('');
                    $('#password_error').html('');
                    if (data.success){
                        // when password reset success
                        $('#form_error').html('<br><div class="alert alert-success">'+ data.message +'</div>')
                        // reset is successful -> redirect to home after 3 secs.
                        setTimeout(function(){
                                $('#form_error').empty();
                                window.location.href = "home";
                            }, 3000);
                    }
                    else
                    {
                        if(data.message != null)
                        {
                            $('#form_error').text(data.message);
                        }
                        else
                        {
                            if(typeof(data.confirm_password) != "undefined" && data.confirm_password != "" )
                                $('#confirm_password_error').html('<br><div class="alert alert-danger">' + data.confirm_password + '</div>');
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