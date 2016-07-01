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
            var formData = new FormData();
            formData.append('userfile', $('input[type=file]')[0].files[0]);
            $.ajax
            ({  
                type: 'POST',
                url: $(form).attr('action'),
                data:  formData,
                dataType : 'json',
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.success){
                        $('#upload_error').html('<br><div class="alert alert-success">Image has been uploaded successfully.');

                        setTimeout(function(){
                            $('#upload_error').empty();
                            window.location.href = "login";
                        }, 3000);
                    }
                    else
                    {
                        $('#upload_error').html('<div class="alert alert-danger col-sm-6">'+data.message+'</div>');
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