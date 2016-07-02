$(document).ready(function () {
    $(function() {
    highlight_errors_validate();
    // Setup form validation on the element
    $("#post_question_form").validate({
        // Specify the validation rules
        rules: {
            title: "required",
            description: "required",
            tag1: "required"
        },
        
        // Specify the validation error messages
        messages: {
            title: {
                required: '<br><div class="alert alert-danger">Please enter a title</div>'
            },
            description: {
                required :'<br><div class="alert alert-danger">Please enter a description</div>',
            },
            tag1: {
                required:'<br><div class="alert alert-danger">Please enter a Tag</div>'
            }
        },
        
        submitHandler: function(form) {
                    console.log('here');
            $.ajax({  
                type: 'POST',
                url: $(form).attr('action'),
                data: $(form).serialize(),
                dataType : 'json',
                success: function(data) {
                    $('#form_error').html('');
                    $('#title_error').html('');
                    $('#description_error').html('');
                    $('tag_error').html('');
                    if (data.success){
                        console.log(data);
                        // when question posted successfully
                        $('#form_error').html('<br><div class="alert alert-success">'+ data.message +'</div>');
                        if(data.tag != null)
                            $('#tag_insert').html('<br><div class="alert alert-success">'+ data.tag +'</div>');
                        // post is successful -> redirect to home after 3 secs.
                        setTimeout(function(){
                                $('#form_error').empty();
                                $('#tag_insert').empty();
                                window.location.href = "home";
                            }, 3000);
                    }
                    else
                    {
                        if(data.message != null)
                        {
                            $('#form_error').html('<br><div class="alert alert-danger">'+ data.message +'</div>');
                        }
                        else
                        {
                            if(typeof(data.title) != "undefined" && data.title != "" )
                                $('#title_error').html('<br><div class="alert alert-danger">' + data.title + '</div>');
                            if(typeof(data.description) != "undefined" && data.description != "" )
                                $('#description_error').html('<br><div class="alert alert-danger">' + data.description + '</div>');
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