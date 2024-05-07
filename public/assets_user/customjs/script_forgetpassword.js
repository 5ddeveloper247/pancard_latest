function getOtpCode () {

    $("#otp_btn").hide();
    var registered_email = $("#registered_email").val();
   
    let type = 'POST';
    let url = '/getOtpCodeForget';
    let message = '';
    let form = '';
    let data = new FormData();
    data.append("registered_email", registered_email);
    $('[name]').removeClass('is-invalid');
    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', getOtpCodeResponse, '', '#otp_btn');
    
}
function getOtpCodeResponse(response){

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
      
        toastr.success(response.message, '', {
            timeOut: 3000
        });

        $("#otp_btn").hide();

    } else {
        
        $("#otp_btn").show();
    	error = response.responseJSON.message;
        var is_invalid = response.responseJSON.errors;
        
        $.each(is_invalid, function(key) {
            // Assuming 'key' corresponds to the form field name
            var inputField = $('[name="' + key + '"]');
            var selectField = $('[name="' + key + '"]');
            // Add the 'is-invalid' class to the input field's parent or any desired container
            inputField.closest('.form-control').addClass('is-invalid');
            selectField.closest('.form-select').addClass('is-invalid');
        });
        toastr.error(error, '', {
            timeOut: 3000
        });
    }
}

function verifyOtpCode () {

    $("#verify_otp_btn").hide();
    var registered_email = $("#registered_email").val();
    var user_otp = $("#one_time_password").val();
   
    let type = 'POST';
    let url = '/verifyOtpCodeForget';
    let message = '';
    let form = '';
    let data = new FormData();
    data.append("registered_email", registered_email);
    data.append("one_time_password", user_otp);
    $('[name]').removeClass('is-invalid');
    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', verifyOtpCodeResponse, '', '#otp_btn');
    
}
function verifyOtpCodeResponse(response){

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
      
        toastr.success(response.message, '', {
            timeOut: 3000
        });

        $("#verify_otp_btn").hide();
        $(".forget_form_submit").prop('disabled', false);

    } else {
        
        $("#verify_otp_btn").show();
        
        if(response.status != undefined && response.status == '402'){
            
            error = response.message;
            var inputField = $('[name="one_time_password"]');
            inputField.closest('.form-control').addClass('is-invalid');

        }else{
            
            error = response.responseJSON.message;
            var is_invalid = response.responseJSON.errors;
            
            $.each(is_invalid, function(key) {
                // Assuming 'key' corresponds to the form field name
                var inputField = $('[name="' + key + '"]');
                var selectField = $('[name="' + key + '"]');
                // Add the 'is-invalid' class to the input field's parent or any desired container
                inputField.closest('.form-control').addClass('is-invalid');
                selectField.closest('.form-select').addClass('is-invalid');
            });
        }

        toastr.error(error, '', {
            timeOut: 3000
        });
    }
}


$(document).on('click', '.forget_form_submit', function (e) {

	e.preventDefault();
	let type = 'POST';
	let url = '/resetForgetPassword';
	let message = '';
	let form = $('#forgetpassword_form');
	let data = new FormData(form[0]);
	    
	// PASSING DATA TO FUNCTION
	$('[name]').removeClass('is-invalid');
	SendAjaxRequestToServer(type, url, data, '', resetForgetPasswordResponse, '', '.forget_form_submit');
	
});

function resetForgetPasswordResponse(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
      
        toastr.success(response.message, '', {
            timeOut: 3000
        });

        let form = $('#forgetpassword_form');
        form.trigger("reset"); 
        setTimeout(function(){
            tologin();
        },3000);
    
    } else {
        
    	if(response.status != undefined && response.status == '402'){
            
            error = response.message;
            var inputField = $('[name="new_password"]');
            inputField.closest('.form-control').addClass('is-invalid');

        }else{
            
            error = response.responseJSON.message;
            var is_invalid = response.responseJSON.errors;
            
            $.each(is_invalid, function(key) {
                // Assuming 'key' corresponds to the form field name
                var inputField = $('[name="' + key + '"]');
                var selectField = $('[name="' + key + '"]');
                // Add the 'is-invalid' class to the input field's parent or any desired container
                inputField.closest('.form-control').addClass('is-invalid');
                selectField.closest('.form-select').addClass('is-invalid');
            });
        }

        toastr.error(error, '', {
            timeOut: 3000
        });
    }
}




$(document).ready(function () {
    // getPageData();
 
});
