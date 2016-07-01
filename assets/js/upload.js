$(document).ready(function () {
    $(function() {

    highlight_errors_validate();
    // Setup form validation on the element
    $("#upload_form").validate({
        // Specify the validation rules
        rules: {
            userfile: "required"
        },
        
        // Specify the validation error messages
        messages: {
            userfile:"Please enter a valid file"
        },
        
        submitHandler: function(form) {
            $('#upload_error').html('<br><div class="alert alert-info col-sm-6">Uploading...</div>');
            $.ajax({  
                type: 'POST',
                url: $(form).attr('action'),
                data: $(form).serialize(),
                dataType : 'json',
                success: function(data) {

                    if (data.success){
                        $('#upload_error').html('Image has been uploaded successfully.');

                        setTimeout(function(){
                            $('#upload_error').empty();
                            window.location.href = "login";
                        }, 3000);
                    }
                    else
                    {
                        $('#upload_error').text(data.message);
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
            return false;
        },
    });

    $("#skip_upload").click( function() {
        window.location.href = "login";
    });
});

});