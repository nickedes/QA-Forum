$(document).ready(function () {
	$.ajax({  
		type: 'GET',
		crossDomain: true,
		url: "http://127.0.0.1/codeigniter/index.php/search_controller/get",
		dataType : 'json',
		success: function(data) {
			// console.log(data.taglinks);
			var tag_links = {
				data: data.taglinks,
				getValue: "text",
				template: {
					type: "links",
					fields: {
						link: "website-link"
					}
				},
				list: {
						match: {
								enabled: true
						}
				}
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
			var i = 1;
			$('#addTag').click(function (e) {
				i++;
				$("#tag"+i).easyAutocomplete(options);
			});
		},
		error: function(data) {
				console.log(data);
		}
	});
return false;
});

