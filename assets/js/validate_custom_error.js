function highlight_errors_validate() {
        $.validator.setDefaults({
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });
    }

// validation for email
jQuery.validator.addMethod("email_validator", function(value, element){
    // regex to accept email
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(value)) {
        return true;  // PASS validation when REGEX matches
    } else {
        return false;  // FAIL validation otherwise
    };
}, '<br><div class="alert alert-danger">Please enter a valid email address</div>');

// validation for Mobile
jQuery.validator.addMethod("mobile_validator", function(value, element){
    // regex to accept 10 digit no.
    var re = /^\d{10}$/;
    if (re.test(value)) {
        return true;  // PASS validation when REGEX matches
    } else {
        return false;  // FAIL validation otherwise
    };
}, '<br><div class="alert alert-danger">Please enter 10 digit number only</div>');

// validation for Name
jQuery.validator.addMethod("name_validator", function(value, element){
    // regex to accept only alphabets
    var re = /^[A-Za-z ]{2,100}$/;
    if (re.test(value)) {
        return true;  // PASS validation when REGEX matches
    } else {
        return false;  // FAIL validation otherwise
    };
}, '<br><div class="alert alert-danger">Name can contain alphabets only</div>');
