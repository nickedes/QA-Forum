

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

   // var newdata = new array();

   $.ajax({  
                type: 'POST',
                 crossDomain: true,
           
                url: "http://localhost/codeigniter/index.php/search_controller/return_array",
                 dataType : 'json',
                success: function(data) {
                     console.log(data);
                 //    newdata = json_decode(data);
                  }
                  // ,
                // error: function(data) {
                //     console.log(data);
                // }
            });
            return false;
         });
	
