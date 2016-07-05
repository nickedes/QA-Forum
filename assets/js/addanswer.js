$(document).ready(function () {
    $(function() {
    highlight_errors_validate();
    $('#post_answer_form').validate({
        // Specify the validation rules
        rules: {
            answer: "required"
        },
        
        // Specify the validation error messages
        messages: {
            answer: {
                required: '<br><div class="alert alert-danger">Please post an answer</div>'
            }
        },
        
        submitHandler: function(form) {
            $.ajax({  
                type: 'POST',
                url: $(form).attr('action'),
                data: $(form).serialize(),
                dataType : 'json',
                success: function(data) {
                    $('#form_error').html('');
                    $('#answer_error').html('');
                    if (data.success){
                        $('#form_error').html('<br><div class="alert alert-success text-center">Answer posted successfully</div><br>');
                        setTimeout(function(){
                            $('#form_error').empty();
                            location.reload();
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
                            if(typeof(data.answer) != "undefined" && data.answer != "" )
                                $('#answer_error').html('<br><div class="alert alert-danger">' + data.answer + '</div>');
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
