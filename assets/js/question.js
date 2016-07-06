$(document).ready(function () {
    $(function() {
    highlight_errors_validate();
    // function to add tags
    var i = 1;
    $('#addTag').click(function (e) {
        i++;
        console.log("add tag is clicked." + i);
        // make sure that there is no empty field left there.
        for (var j = 1; j < i ; j++) {
            var tag_ids = '#tag' + j;
            var is_empty_any_field = false;


            if ( !$(tag_ids).val())
            {
                i--;
                is_empty_any_field = true;
                break;
            }

        }
        // console.log
        if ( !is_empty_any_field )
        {
            $("#tag_error").empty();
            $('#tags').append("<br><input type='text' class='form-control' placeholder='tag' id='tag" + i + "'' name='tag" + i + "' />");
        }
        else
        {
            $('#tag_error').html("<br><div class='alert alert-danger'>Please fill available fields to add extra fields.</div>");
        }
        e.preventDefault();  
    });

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
                        $('#tag_error').hide();
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