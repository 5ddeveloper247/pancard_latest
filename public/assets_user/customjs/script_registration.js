function getStateCityWrtCodeData() {

    var pinCode = $("#user_pin").val();
    if (pinCode != '') {
        let type = 'POST';
        let url = '/getStateCityWrtCodeData';
        let message = '';
        let form = '';
        let data = new FormData();
        data.append("pinCode", pinCode);
        // PASSING DATA TO FUNCTION
        SendAjaxRequestToServer(type, url, data, '', getStateCityWrtCodeDataResponse, '', 'submit_button');
    }
}
function getStateCityWrtCodeDataResponse(response) {

    var data = response.data;

    var stateId = data.stateId;
    var cityId = data.cityId;
    var areaId = data.areaId;

    var cities = data.citiesLov;
    var areas = data.areasLov;

    var cityOptions = `<option value="">Choose City</option>`;
    if (cities.length > 0) {
        $.each(cities, function (index, value) {
            cityOptions += `<option value="${value.id}">${value.name}</option>`;
        });
        $("#user_city").html(cityOptions);
    }

    var areasOptions = `<option value="">Choose Area</option>`;
    if (areas.length > 0) {
        $.each(areas, function (index, value) {
            areasOptions += `<option value="${value.id}">${value.name}</option>`;
        });
        $("#user_area").html(areasOptions);
    }

    if (stateId != '') {
        $("#user_state").val(stateId);
    }
    if (cityId != '') {
        $("#user_city").val(cityId);
    }
    if (areaId != '') {
        $("#user_area").val(areaId);
    }
}
function getCitiesLovData() {

    var state_id = $("#user_state").val();
    if (state_id != '') {
        let type = 'POST';
        let url = '/getCitiesLovData';
        let message = '';
        let form = '';
        let data = new FormData();
        data.append("state_id", state_id);
        // PASSING DATA TO FUNCTION
        SendAjaxRequestToServer(type, url, data, '', getCitiesLovDataResponse, '', 'submit_button');
    } else {
        $("#user_city").val('').html('<option value="">Choose City</option>');
        $("#user_area").val('').html('<option value="">Choose Area</option>');
    }
}
function getCitiesLovDataResponse(response) {

    var data = response.data;
    var cities = data.cities;

    var cityOptions = `<option value="">Choose City</option>`;
    if (cities.length > 0) {
        $.each(cities, function (index, value) {
            cityOptions += `<option value="${value.id}">${value.name}</option>`;
        });
    }
    $("#user_city").html(cityOptions);
    $("#user_area").val('').html('<option value="">Choose Area</option>');
}

function getAreasLovData() {

    var city_id = $("#user_city").val();
    if (city_id != '') {
        let type = 'POST';
        let url = '/getAreasLovData';
        let message = '';
        let form = '';
        let data = new FormData();
        data.append("city_id", city_id);
        // PASSING DATA TO FUNCTION
        SendAjaxRequestToServer(type, url, data, '', getAreasLovDataResponse, '', 'submit_button');
    } else {
        $("#user_area").val('').html('<option value="">Choose Area</option>');
    }
}
function getAreasLovDataResponse(response) {

    var data = response.data;
    var areas = data.areas;

    var areasOptions = `<option value="">Choose Area</option>`;
    if (areas.length > 0) {
        $.each(areas, function (index, value) {
            areasOptions += `<option value="${value.id}">${value.name}</option>`;
        });
    }
    $("#user_area").html(areasOptions);
}

$(document).on('click', '.register_form_submit', function (e) {

    e.preventDefault();
    let type = 'POST';
    let url = '/registerUser';
    let message = '';
    let form = $('#registration_form');
    let data = new FormData(form[0]);

    // PASSING DATA TO FUNCTION
    $('[name]').removeClass('is-invalid');
    SendAjaxRequestToServer(type, url, data, '', registerUserResponse, '', '.register_form_submit');

});



function registerUserResponse(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    console.log(response);
    if (response.status == 200 || response.status == '200') {

        toastr.success(response.message, '', {
            timeOut: 3000
        });

        let form = $('#registration_form');
        form.trigger("reset");

        var data = response.data;
        $("#username_auto").val(data.username_auto);

        $("#picturename").text('Upload Picture');
        $("#filename").text('Upload Aadhar');
        const userData = response.data.userData;
        const formData = response.data.formData;
        const payment_settings = response.data.payment_gateway_settings;
        
        const dataObj = {
            uData: userData,
            fData: formData
        }
        const datax = JSON.stringify(dataObj);
        if(payment_settings == 'on'){
            setTimeout(function () {
                toDoPayment(datax);
            }, 3000);
        }


    } else {

        error = response.responseJSON.message;
        var is_invalid = response.responseJSON.errors;

        $.each(is_invalid, function (key) {
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




$(document).ready(function () {
    // getPageData();

});

document.getElementById('cameraIcon').addEventListener('click', function () {
    // Trigger click event on the input field
    document.getElementById('upload_picture').click();
});
document.getElementById('upload_picture').addEventListener('change', function () {
    if (this.files.length > 0) {
        // Get the filename of the selected file
        var fileSize = this.files[0].size; // Size in bytes
        var maxSize = 400 * 1024; // 400 KB in bytes

        if (fileSize > maxSize) {
            $("#upload_picture").val('');
            document.getElementById('picturename').innerText = 'Upload Picture';
            toastr.error('File size exceeds 400 KB. Please choose a smaller file.', '', {
                timeOut: 3000
            });
          
        }
        else{

            var filename = this.files[0].name;
    
            // Update the content of the <span> element with the filename
            document.getElementById('picturename').innerText = filename;
            toastr.success('Uploaded', '', {
                timeOut: 3000
            });
        }
    } else {
        // No file selected, reset the content of the <span> element
        document.getElementById('picturename').innerText = 'Upload Picture';
    }
});

document.getElementById('aadharUploadIcon').addEventListener('click', function () {
    // Trigger click event on the input field
    document.getElementById('upload_aadhar').click();
});
document.getElementById('upload_aadhar').addEventListener('change', function () {
    if (this.files.length > 0) {
        // Get the filename of the selected file
        var fileSize = this.files[0].size; // Size in bytes
        var maxSize = 400 * 1024; // 400 KB in bytes

        if (fileSize > maxSize) {
            $('#upload_aadhar').val('');
            document.getElementById('filename').innerText = 'Upload Aadhar';
            toastr.error('File size exceeds 400 KB. Please choose a smaller file.', '', {
                timeOut: 3000
            });
          
        }
        else{

            var filename = this.files[0].name;
    
            // Update the content of the <span> element with the filename
            document.getElementById('filename').innerText = filename;
            toastr.success('Uploaded', '', {
                timeOut: 3000
            });
        }
    } else {
        // No file selected, reset the content of the <span> element
        document.getElementById('filename').innerText = 'Upload Aadhar';
    }
});