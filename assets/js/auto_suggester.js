


// var options = {
// 	data: ["Web Development", "Web D", "Health", "exercise", "gyming`"],
// 	list: {
// 		match: {
// 			enabled: true
// 		}
// 	}
// };



// $("#basics").easyAutocomplete(options);


$(document).ready(function () {
   $.ajax({  
                type: 'POST',
                 crossDomain: true,
           
                url: "http://localhost:8983/solr/collection1/select?q=name%3Ahealth&wt=json&indent=true",
                 dataType : 'jsonp',
                success: function(data) {
                     console.log(data);
                  }
                  // ,
                // error: function(data) {
                //     console.log(data);
                // }
            });
            return false;
         });
	