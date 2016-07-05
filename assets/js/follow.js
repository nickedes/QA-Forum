$('#follow').click(function (e) {
	var user_id = $('#user_id').val();
	var tag_id = $('#tag_id').val();
    var name = $("#follow").val();
	var users = $("#users").val();

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
            $("#users").val(parseInt($("#users").val()) + 1);
            $("#form_error").html('<br><div class="alert alert-success text-center">You Followed this Tag</div>');
            setTimeout(function(){
                $('#form_error').empty();
                // no need of refresh
                // location.reload();
            }, 3000);
        },
        error: function(response) {
            console.log(response);
            alert("Fail");
        }
	});

	e.preventDefault();
})