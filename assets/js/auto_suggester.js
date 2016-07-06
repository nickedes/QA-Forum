

$("#basics").ready(function () {
	 var newdata = [];
	 var tags = [];

$.ajax({  
		type: 'GET',
		crossDomain: true,

		url: "search_controller/get",
		dataType : 'json',
		success: function(data) {
			var tag_links = {
				data: data.taglinks,
				getValue: "text",
				template: {
					type: "links",
					fields: {
						link: "website-link"
					}
				},
			};
			var options = {
				 data: data.tagnames,
				 list: {
						match: {
								enabled: true
						}
				}
			};
			$("#basics").easyAutocomplete(tag_links);
			$("#tag1").easyAutocomplete(options);
		},
		error: function(data) {
				console.log(data);
		}
	});
return false;
});

