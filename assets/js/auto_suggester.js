

$("#basics").ready(function () {
   var newdata = [];
   var tags = [];

$.ajax({  
    type: 'GET',
    crossDomain: true,

    url: "search_controller/get",
    dataType : 'json',
    success: function(data) {
                    tags = data.value;
                    var options = {
                       data: tags,
                       list: {
                          match: {
                              enabled: true
                          }
                      }
                  };
                  $("#basics").easyAutocomplete(options);
                   $("#tag1").easyAutocomplete(options);
                  
                   },
                error: function(data) {
                    console.log(data);
                }
            });
return false;
});

