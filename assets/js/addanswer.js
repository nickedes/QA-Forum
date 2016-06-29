$('#answer_submit').click(function (e) {
	
	var answer = $('#answer').val();
	var user_id = $('#user_id').val();
	var q_id = $('#q_id').val();

	// ajax call 
	$.ajax({
        type: "POST",
        url: $('#post_answer').attr('action'),
        data: {
            answer: answer,
            q_id: q_id,
            user_id: user_id
        },
        success: function(response) {
        	if(response)
        	{
        		var text = "User : " + user_id + "<br>" + "Answer: " + answer + "<br>";
        		// jQuery("div#result").html(text);
                //$("#answer").val('Post Answer');
                location.reload();
        	}
            console.log(response);
        },
        error: function(response) {
            console.log(response);
            // alert("Fail");
        }
});

	e.preventDefault();
})