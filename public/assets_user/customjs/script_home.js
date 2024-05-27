function getPucTypeRate(){

    var puc_type_id = $("#puc_type").val();
    var puc_challan = $("#Challan-form").val();
    
    let type = 'POST';
    let url = '/getPucTypeRate';
    let message = '';
    let form = '';
    let data = new FormData();
    data.append("puc_type_id", puc_type_id);
    data.append("puc_challan", puc_challan);
    
    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', getPucTypeRateResponse, '', 'submit_button');
}
function getPucTypeRateResponse(response){

    var data = response.data;
    var charges = data['charges'];
    var pucTypeTotalRate = data['pucTypeTotalRate'];
    var challanTotalRate = data['challanTotalRate'];

    if(charges != null){
        $("#puc_charges").html('&#8377; '+charges);
        $("#puc_total_charges").val(charges != null ? charges : 0);
        $("#puc_type_rate").val(pucTypeTotalRate != null ? pucTypeTotalRate : 0);
        $("#puc_challan_rate").val(challanTotalRate != null ? challanTotalRate : 0);
    }else{
        $("#puc_charges").html(`&#8377; 0`);
        $("#puc_total_charges").val('0');
        $("#puc_type_rate").val('0');
        $("#puc_challan_rate").val('0');
    }
}
$(document).on('change', '#Challan-form', function (e) {

	getPucTypeRate();
	
});

$(document).on('click', '#puc_create_submit', function (e) {

	e.preventDefault();
	let type = 'POST';
	let url = '/createPucUser';
	let message = '';
	let form = $('#puc_create_form');
	let data = new FormData(form[0]);
    data.append('puc_id', '');
	// PASSING DATA TO FUNCTION
	$('[name]').removeClass('is-invalid');
	SendAjaxRequestToServer(type, url, data, '', resetPasswordProfileResponse, '', '#puc_create_submit');
	
});

function resetPasswordProfileResponse(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
      
        toastr.success(response.message, '', {
            timeOut: 3000
        });

        let form = $('#puc_create_form');
        form.trigger("reset");

        $("#main_section").show();
        $("#makePuc_section, #notification_section").hide(); 

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
    
    $(document).on('click', '#makeNewPuc_btn', function (e) {
        
        if(user_balance > 0){
            let form = $('#puc_create_form');
            form.trigger("reset");
    
            $("#picturename").html('Upload Vehicle Photo');
            $("#challanName").html('Upload Challan Screenshot');
    
            $("#puc_charges").html('&#8377; 0');
            $("#puc_total_charges").val('0');
            $("#puc_type_rate").val('0');
            $("#puc_challan_rate").val('0');
    
            $("#main_section, #notification_section").hide();
            $("#makePuc_section").show();
        }else{
            toastr.error('Insufficient balance, please add balance in your wallet first!', '', {
                timeOut: 3000
            });
        }
        
        
    });

    $(document).on('click', '#viewAllNotif_btn', function (e) {

        $("#main_section, #makePuc_section").hide();
        $("#notification_section").show();
        
    });
    
    $(document).on('click', '#backToMainPage', function (e) {

        $("#main_section").show();
        $("#makePuc_section, #notification_section").hide();
        
    });

    $(document).on('change', '#Challan-form', function (e) {

        var challan_val = $(this).val();

        if(challan_val != ''){
            $(".challan_opt_div").show();
        }else{
            $(".challan_opt_div").hide();
        }
        
    });
    
});

document.getElementById('cameraIcon').addEventListener('click', function() {
    
    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        // Trigger click event on the input field
        document.getElementById('upload_vehicle').click();
    } else {
        if(upload_option == '1'){
            document.getElementById('upload_vehicle').click();
        }else{
            toastr.error('Not allowed to upload!', '', {
                timeOut: 3000
            });
        }
    }
});
document.getElementById('upload_vehicle').addEventListener('change', function() {
    if (this.files.length > 0) {
        // Get the filename of the selected file
       

        var fileSize = this.files[0].size; // Size in bytes
        var maxSize = 400 * 1024; // 400 KB in bytes

        if (fileSize > maxSize) {
            document.getElementById('picturename').innerText = 'Upload Vehicle Photo';
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
        document.getElementById('picturename').innerText = 'Upload Vehicle Photo';
    }
});

document.getElementById('challanIcon').addEventListener('click', function() {
    // Trigger click event on the input field
    document.getElementById('upload_challan').click();
});
document.getElementById('upload_challan').addEventListener('change', function() {
    if (this.files.length > 0) {
        // Get the filename of the selected file
        var fileSize = this.files[0].size; // Size in bytes
        var maxSize = 400 * 1024; // 400 KB in bytes

        if (fileSize > maxSize) {
            document.getElementById('challanName').innerText = 'Upload Challan Screenshot';
            toastr.error('File size exceeds 400 KB. Please choose a smaller file.', '', {
                timeOut: 3000
            });
          
        }
        else{

            var filename = this.files[0].name;
    
            // Update the content of the <span> element with the filename
            document.getElementById('challanName').innerText = filename;
            toastr.success('Uploaded', '', {
                timeOut: 3000
            });
        }
    } else {
        // No file selected, reset the content of the <span> element
        document.getElementById('challanName').innerText = 'Upload Challan Screenshot';
    }
});

$('#registration_number').on('input', function() {
    $(this).val($(this).val().toUpperCase());
});


