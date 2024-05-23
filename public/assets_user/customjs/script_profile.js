function getUserProfilePageData(){
    let type = 'POST';
    let url = '/getUserProfileData';
    let message = '';
    let form = '';
    let data = '';
    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', getUserProfilePageDataResponse, '', 'submit_button');
}
function getUserProfilePageDataResponse(response){

    var data = response.data;
    var user_detail = data['user_detail'];

    getCitiesLovDataResponse(response);
    getAreasLovDataResponse(response);

    if(user_detail != null){
        
        $("#user_name").val(user_detail['name']);
        $("#username_auto").val(user_detail['username']);
        $("#company_name").val(user_detail['company_name']);
        $("#user_phone").val(user_detail['phone_number']);
        $("#user_email").val(user_detail['email']);
        $("#user_pin").val(user_detail['pin_code']);
        $("#user_state").val(user_detail['state_id']);
        $("#user_city").val(user_detail['city_id']);
        $("#user_area").val(user_detail['area_id']);
        $("#user_landmark").val(user_detail['landmark']);
        $("#picturename").text(user_detail['profile_picture']);
        $("#filename").text(user_detail['aadhar']);
        $("#user_type").val(user_detail['user_type']);
        
        
       $("#profileDetailModal").modal('show');

    }
}
function getCitiesLovData () {

    var state_id = $("#user_state").val();
    if(state_id != ''){
        let type = 'POST';
        let url = '/getCitiesLovData';
        let message = '';
        let form = '';
        let data = new FormData();
        data.append("state_id", state_id);
        // PASSING DATA TO FUNCTION
        SendAjaxRequestToServer(type, url, data, '', getCitiesLovDataResponse, '', 'submit_button');
    }else{
        $("#user_city").val('').html('<option value="">Choose City</option>');
        $("#user_area").val('').html('<option value="">Choose Area</option>');
    }
}
function getCitiesLovDataResponse(response){

    var data = response.data;
    var cities = data.cities;
    
    var cityOptions = `<option value="">Choose City</option>`;
    if(cities.length > 0){
        $.each(cities, function(index, value) {
            cityOptions += `<option value="${value.id}">${value.name}</option>`;
        });
    }
    $("#user_city").html(cityOptions);
    $("#user_area").val('').html('<option value="">Choose Area</option>');
}

function getAreasLovData () {

    var city_id = $("#user_city").val();
    if(city_id != ''){
        let type = 'POST';
        let url = '/getAreasLovData';
        let message = '';
        let form = '';
        let data = new FormData();
        data.append("city_id", city_id);
        // PASSING DATA TO FUNCTION
        SendAjaxRequestToServer(type, url, data, '', getAreasLovDataResponse, '', 'submit_button');
    }else{
        $("#user_area").val('').html('<option value="">Choose Area</option>');
    }
}
function getAreasLovDataResponse(response){

    var data = response.data;
    var areas = data.areas;
    
    var areasOptions = `<option value="">Choose Area</option>`;
    if(areas.length > 0){
        $.each(areas, function(index, value) {
            areasOptions += `<option value="${value.id}">${value.name}</option>`;
        });
    }
    $("#user_area").html(areasOptions);
}

$(document).on('click', '.update_form_submit', function (e) {

	e.preventDefault();
	let type = 'POST';
	let url = '/updateUserProfile';
	let message = '';
	let form = $('#registration_form');
	let data = new FormData(form[0]);
	    
	// PASSING DATA TO FUNCTION
	$('[name]').removeClass('is-invalid');
	SendAjaxRequestToServer(type, url, data, '', registerUserResponse, '', '#register_form_submit');
	
});

function registerUserResponse(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
      
        toastr.success(response.message, '', {
            timeOut: 3000
        });

        
        // success response action 

    } else {
        
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


$(document).on('click', '#reset_pass_submit', function (e) {

	e.preventDefault();
	let type = 'POST';
	let url = '/resetPasswordProfile';
	let message = '';
	let form = $('#reset_password_form');
	let data = new FormData(form[0]);
	    
	// PASSING DATA TO FUNCTION
	$('[name]').removeClass('is-invalid');
	SendAjaxRequestToServer(type, url, data, '', resetPasswordProfileResponse, '', '.reset_pass_submit');
	
});

function resetPasswordProfileResponse(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
      
        toastr.success(response.message, '', {
            timeOut: 3000
        });

        let form = $('#reset_password_form');
        form.trigger("reset");
        // success response action 

    } else {
        
        if(response.status == 402){
            
            error = response.message;

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
    
    $('#registration_form :input').not('#user_pin').not('.update_form_submit').prop('disabled', true);
    

    $(document).on('click', '#tutorials_btn', function (e) {

        $("#profile_section").hide();
        $("#tutorials_section").show();
        
    });
    $(document).on('click', '#notifications_btn', function (e) {

        $("#profile_section").hide();
        $("#notifications_section").show();
        
    });
    
    $(document).on('click', '#backToMainPage', function (e) {

        $("#profile_section").show();
        $("#tutorials_section, #notifications_section").hide();
        
    });

    
    
 
});

document.getElementById('cameraIcon').addEventListener('click', function() {
    // Trigger click event on the input field
    document.getElementById('upload_picture').click();
});
document.getElementById('upload_picture').addEventListener('change', function() {
    if (this.files.length > 0) {
        // Get the filename of the selected file
        var filename = this.files[0].name;
        // Update the content of the <span> element with the filename
        document.getElementById('picturename').innerText = filename;
    } else {
        // No file selected, reset the content of the <span> element
        document.getElementById('picturename').innerText = 'Upload Picture';
    }
});

document.getElementById('aadharUploadIcon').addEventListener('click', function() {
    // Trigger click event on the input field
    document.getElementById('upload_aadhar').click();
});
document.getElementById('upload_aadhar').addEventListener('change', function() {
    if (this.files.length > 0) {
        // Get the filename of the selected file
        var filename = this.files[0].name;
        // Update the content of the <span> element with the filename
        document.getElementById('filename').innerText = filename;
    } else {
        // No file selected, reset the content of the <span> element
        document.getElementById('filename').innerText = 'Upload Aadhar';
    }
});