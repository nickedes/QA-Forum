$('#follow').click(function (e) {
	var user_id = $('#user_id').val();
	var tag_id = $('#tag_id').val();
	var name = $("#follow").val();

	$.ajax({
        type: "POST",
        url: $('#follow_unfollow').attr('action'),
        data: {
            tag_id: tag_id,
            user_id: user_id,
            name: name
        },
        success: function(response) {
        	$("#follow").attr("disabled", true);
        	$("#unfollow").attr("disabled", false);
            console.log(response);
        },
        error: function(response) {
            console.log(response);
            alert("Fail");
        }
	});

	e.preventDefault();
})