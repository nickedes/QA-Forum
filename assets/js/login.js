$(document).ready(function () {
$(function() {
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
                    if (data.success){
                        // login successful -> redirect to home.
                        window.location.href = "home";
                    }
                    else
                    {
                        if(data.message != null)
                        {
                            $('#form_error').text(data.message);
                        }
                        else
                        {
                            $('#email_error').text(data.message);
                            $('#password_error').text(data.message);
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
