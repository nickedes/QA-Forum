$('#unfollow').click(function (e) {
	var user_id = $('#user_id').val();
	var tag_id = $('#tag_id').val();
    var name = $("#unfollow").val();

	$.ajax({
        type: "POST",
        url: $('#follow_unfollow').attr('action'),
        data: {
            tag_id: tag_id,
            user_id: user_id,
            name: name
        },
        success: function(response) {
            $("#unfollow").attr("disabled", true);
            $("#follow").attr("disabled", false);
            $("#users").val($("#users").val()-1);
            console.log($("#users").val());
            console.log(response);
            location.reload();
        },
        error: function(response) {
            console.log(response);
            alert("Fail");
        }
	});

	e.preventDefault();
})