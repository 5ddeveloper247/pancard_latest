function getSettingsPageData () {

	let type = 'POST';
	let url = '/admin/getSettingsPageData';
	let message = '';
	let form = '';
	let data = '';
	// PASSING DATA TO FUNCTION
	SendAjaxRequestToServer(type, url, data, '', getSettingsPageDataResponse, '', 'submit_button');
	
}
function getSettingsPageDataResponse(response){

    var data = response.data;
    var general_settings = data.settings;
    var api_settings = data.api_settings;
    var notifications = data.notifications;
    var tutorials = data.tutorials;

    if(general_settings != null){
        $("#company").val(general_settings['company']);
        $("#websiteTitle").val(general_settings['website_title']);
        $("#retailerRate").val(general_settings['retailer_rate']);
        $("#distributorRate").val(general_settings['distributor_rate']);
        $("#supDistributorRate").val(general_settings['super_distributor_rate']);
        $("#apiRate").val(general_settings['api_rate']);
        $("#helplineEmail").val(general_settings['helpline_email']);
        $("#helplineNumber").val(general_settings['helpline_phone']);
        $("#pucType").val(general_settings['puc_type']);
        $("#disableUser").val(general_settings['disable_user_id']);
    }
    if(api_settings != null){
        $("#merchatId").val(api_settings['merchant_id']);
        $("#merchantKey").val(api_settings['merchant_key']);
        $("#convinceFee").val(api_settings['fee_percent']);
        if(api_settings['status'] == 'on'){
            $("#apiStatus").prop('checked', true);
        }else{
            $("#apiStatus").prop('checked', false);
        }
    }

    updateNotificationsList(notifications);
    updateTutorialsList(tutorials);
}

$(document).on('click', '#general_form_submit', function (e) {

	e.preventDefault();
	let type = 'POST';
	let url = '/admin/storeGeneralSettings';
	let message = '';
	let form = $('#general_settings_form');
	let data = new FormData(form[0]);
	    
	// PASSING DATA TO FUNCTION
	$('[name]').removeClass('is-invalid');
	SendAjaxRequestToServer(type, url, data, '', addGeneralSettingsResponse, '', '#general_form_submit');
	
});

function addGeneralSettingsResponse(response) {

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
            // Add the 'is-invalid' class to the input field's parent or any desired container
            inputField.closest('.form-control').addClass('is-invalid');
        });
        toastr.error(error, '', {
            timeOut: 3000
        });
    }
}

$(document).on('click', '#pg_form_submit', function (e) {

	e.preventDefault();
	let type = 'POST';
	let url = '/admin/storeApiSettings';
	let message = '';
	let form = $('#pg_settings_form');
	let data = new FormData(form[0]);
	    
	// PASSING DATA TO FUNCTION
	$('[name]').removeClass('is-invalid');
	SendAjaxRequestToServer(type, url, data, '', addPgSettingsResponse, '', '#pg_form_submit');
	
});

function addPgSettingsResponse(response) {

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
            // Add the 'is-invalid' class to the input field's parent or any desired container
            inputField.closest('.form-control').addClass('is-invalid');
        });
        toastr.error(error, '', {
            timeOut: 3000
        });
    }
}

// notification save code start
$(document).on('click', '#notif_form_submit', function (e) {

	e.preventDefault();
	let type = 'POST';
	let url = '/admin/storeNotifSettings';
	let message = '';
	let form = $('#notif_settings_form');
	let data = new FormData(form[0]);
	    
	// PASSING DATA TO FUNCTION
	$('[name]').removeClass('is-invalid');
	SendAjaxRequestToServer(type, url, data, '', addNotifSettingsResponse, '', '#notif_form_submit');
	
});

function addNotifSettingsResponse(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
      
        toastr.success(response.message, '', {
            timeOut: 3000
        });
        let form = $('#notif_settings_form');
        form.trigger("reset");
        var data = response.data;
        updateNotificationsList(data['notifications']);
        // success response action 

    } else {
        
    	error = response.responseJSON.message;
        var is_invalid = response.responseJSON.errors;
        
        $.each(is_invalid, function(key) {
            // Assuming 'key' corresponds to the form field name
            var inputField = $('[name="' + key + '"]');
            // Add the 'is-invalid' class to the input field's parent or any desired container
            inputField.closest('.form-control').addClass('is-invalid');
        });
        toastr.error(error, '', {
            timeOut: 3000
        });
    }
}

$(document).on('click', '.delete_notif_btn', function (e) {

    var confirmed = confirm("Are you sure you want to delete this notification?");

    if (confirmed) {
        e.preventDefault();
        let type = 'POST';
        let url = '/admin/deleteSpecificNotification';
        let message = '';
        let form = '';
        let data = new FormData();
        data.append("id", $(this).attr('data-id'));
            
        // PASSING DATA TO FUNCTION
        SendAjaxRequestToServer(type, url, data, '', deleteNotificationResponse, '', '.delete_notif_btn');
    }
});

function deleteNotificationResponse(response){
    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
      
        toastr.success(response.message, '', {
            timeOut: 3000
        });
        var data = response.data;
        updateNotificationsList(data['notifications']);
        
    } else {
        
    	error = response.responseJSON.message;
        var is_invalid = response.responseJSON.errors;
        
        $.each(is_invalid, function(key) {
            // Assuming 'key' corresponds to the form field name
            var inputField = $('[name="' + key + '"]');
            // Add the 'is-invalid' class to the input field's parent or any desired container
            inputField.closest('.form-control').addClass('is-invalid');
        });
        toastr.error(error, '', {
            timeOut: 3000
        });
    }
}

function updateNotificationsList(notifications){
    
    var html = '';
    if(notifications.length > 0){
        $.each(notifications, function(index, notif) {
            var formattedDate =moment(notif.date).format("DD MMM YYYY - hh:mm A");
            if(notif.url != null){
                var urlTitle = `<a href="${notif.url != null ? notif.url : 'javascript:;'}" target="_blank">${notif.title}</a>`;
            }else{
                var urlTitle = notif.title;
            }
            
           
            html += `<div class="border rounded-2 mb-2">
                        <span class="d-flex justify-content-between p-2 pb-0">
                            <h6 class="text-primary m-0">${urlTitle}</h6>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="delete_notif_btn" data-id="${notif.id}" title="Delete" style="cursor:pointer;">
                                <path
                                    d="M6 19C6 20.1 6.9 21 8 21H16C17.1 21 18 20.1 18 19V9C18 7.9 17.1 7 16 7H8C6.9 7 6 7.9 6 9V19ZM18 4H15.5L14.79 3.29C14.61 3.11 14.35 3 14.09 3H9.91C9.65 3 9.39 3.11 9.21 3.29L8.5 4H6C5.45 4 5 4.45 5 5C5 5.55 5.45 6 6 6H18C18.55 6 19 5.55 19 5C19 4.45 18.55 4 18 4Z"
                                    fill="black" />
                            </svg>
                        </span>
                        <span class="notifications-list-date mx-2 edit_notification" data-id="${notif['id']}" title="Edit" style="cursor:pointer;">${formattedDate}</span>
                        <p class="px-2 pt-0 pb-1 mb-0 edit_notification" data-id="${notif['id']}" title="Edit" style="cursor:pointer;">${notif['message']}</p>
                    </div>`;
        });
    }else{
        html = `<div class="border rounded-2 text-center mb-4 pt-3">
                    <p>No record found!</p>
                </div>`;
    }

    $("#notif_list_container").html(html);
}

$(document).on('click', '.edit_notification', function (e) {

    e.preventDefault();
    let type = 'POST';
    let url = '/admin/editSpecificNotification';
    let message = '';
    let form = '';
    let data = new FormData();
    data.append("id", $(this).attr('data-id'));
        
    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', editNotificationResponse, '', 'submit_button');
});

function editNotificationResponse(response){
    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
      
        var data = response.data;
        var notification = data['notification'];
        console.log(notification);
        $("#notification_id").val(notification['id']);
        $("#notification_title").val(notification['title']);
        $("#notification_url").val(notification['url']);
        $("#notification_text").val(notification['message']);
        
        $('html, body').animate({ scrollTop: 0 }, 'slow');

    } else {
        
    	error = response.responseJSON.message;
        var is_invalid = response.responseJSON.errors;
        
        $.each(is_invalid, function(key) {
            // Assuming 'key' corresponds to the form field name
            var inputField = $('[name="' + key + '"]');
            // Add the 'is-invalid' class to the input field's parent or any desired container
            inputField.closest('.form-control').addClass('is-invalid');
        });
        toastr.error(error, '', {
            timeOut: 3000
        });
    }
}





$(document).on('click', '#tutorial_form_submit', function (e) {

	e.preventDefault();
	let type = 'POST';
	let url = '/admin/storeTutorialSettings';
	let message = '';
	let form = $('#tutorial_settings_form');
	let data = new FormData(form[0]);
	    
	// PASSING DATA TO FUNCTION
	$('[name]').removeClass('is-invalid');
	SendAjaxRequestToServer(type, url, data, '', addTutorialSettingsResponse, '', '#tutorial_form_submit');
	
});

function addTutorialSettingsResponse(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
      
        toastr.success(response.message, '', {
            timeOut: 3000
        });
        let form = $('#tutorial_settings_form');
        form.trigger("reset");

        $("#filename").text('Upload Thumbnail');

        var data = response.data;
        updateTutorialsList(data['tutorials']);
        // success response action 

    } else {
        
    	error = response.responseJSON.message;
        var is_invalid = response.responseJSON.errors;
        
        $.each(is_invalid, function(key) {
            // Assuming 'key' corresponds to the form field name
            var inputField = $('[name="' + key + '"]');
            // Add the 'is-invalid' class to the input field's parent or any desired container
            inputField.closest('.form-control').addClass('is-invalid');
        });
        toastr.error(error, '', {
            timeOut: 3000
        });
    }
}

function updateTutorialsList(tutorials){
    var html = '';
    if(tutorials.length > 0){
        $.each(tutorials, function(index, value) {
            var formattedDate =moment(value.date).format("DD MMM YYYY");
            var formattedTime =moment(value.date).format("hh:mm A");
            
            html += `<div class="d-flex justify-content-between border rounded-2 my-2">
                        <div class="d-flex align-items-center py-2 edit_tutorial" data-id="${value.id}">
                            <a href="${value.url}" target="_blank" style="height: 55px;width: 90px;">
                                <img src="${value.thumbnail}" alt="" style="height: 100%; width: 100%; border-radius: 6px;">
                            </a>
                            <div class="d-flex flex-column ps-2">
                                <h6 class="m-0">
                                    ${value.title}
                                </h6>
                                <small>${formattedDate}</small>
                                <span class="notifications-list-date px-2">${formattedTime}</span>
                            </div>
                        </div>
                        <div class="pt-3 pe-3 pb-2 d-flex align-items-center">
                            <svg class="delete_tutorial_btn" data-id="${value.id}" title="Delete" style="cursor:pointer;" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6 19C6 20.1 6.9 21 8 21H16C17.1 21 18 20.1 18 19V9C18 7.9 17.1 7 16 7H8C6.9 7 6 7.9 6 9V19ZM18 4H15.5L14.79 3.29C14.61 3.11 14.35 3 14.09 3H9.91C9.65 3 9.39 3.11 9.21 3.29L8.5 4H6C5.45 4 5 4.45 5 5C5 5.55 5.45 6 6 6H18C18.55 6 19 5.55 19 5C19 4.45 18.55 4 18 4Z"
                                    fill="black" />
                            </svg>
                        </div>

                    </div>`;
        });
    }else{
        html = `<div class="border rounded-2 my-2">
                    <p class="text-center pt-3">No record found!</p>
                </div>`;
    }

    $("#tutorial_list_container").html(html);
}

$(document).on('click', '.delete_tutorial_btn', function (e) {

    var confirmed = confirm("Are you sure you want to delete this tutorial?");

    if (confirmed) {
        e.preventDefault();
        let type = 'POST';
        let url = '/admin/deleteSpecificTutorial';
        let message = '';
        let form = '';
        let data = new FormData();
        data.append("id", $(this).attr('data-id'));
            
        // PASSING DATA TO FUNCTION
        SendAjaxRequestToServer(type, url, data, '', deleteTutorialResponse, '', '.delete_tutorial_btn');
    }
});

function deleteTutorialResponse(response){
    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
      
        toastr.success(response.message, '', {
            timeOut: 3000
        });
        var data = response.data;
        updateTutorialsList(data['tutorial']);
        
    }
}

$(document).on('click', '.edit_tutorial', function (e) {

    e.preventDefault();
    let type = 'POST';
    let url = '/admin/editSpecificTutorial';
    let message = '';
    let form = '';
    let data = new FormData();
    data.append("id", $(this).attr('data-id'));
        
    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', editTutorialResponse, '', '.edit_tutorial');
});

function editTutorialResponse(response){
    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
      
        var data = response.data;
        var tutorial = data['tutorial'];
        console.log(tutorial);
        $("#tutorial_id").val(tutorial['id']);
        $("#tutorial_title").val(tutorial['title']);
        $("#tutorial_url").val(tutorial['url']);
        $("#filename").text(tutorial['thumbnail']);
        if(tutorial['status'] == 'on'){
            $("#tutorial_status").prop('checked', true);
        }else{
            $("#tutorial_status").prop('checked', false);
        }
        
        
        $('html, body').animate({ scrollTop: 0 }, 'slow');

    } 
}



$(document).ready(function () {
    getSettingsPageData();
    
    $('#disableUser').select2({
        placeholder: 'Search User ID',
        allowClear: true // Optionally allow clearing the selection
    });
    $('#pucType').select2({
        placeholder: 'Search PUC Type',
        allowClear: true // Optionally allow clearing the selection
    });
    
});
 
document.getElementById('cameraIcon').addEventListener('click', function() {
    // Trigger click event on the input field
    document.getElementById('uploadThumbnail').click();
});
document.getElementById('uploadThumbnail').addEventListener('change', function() {
    if (this.files.length > 0) {
        // Get the filename of the selected file
        var filename = this.files[0].name;
        // Update the content of the <span> element with the filename
        document.getElementById('filename').innerText = filename;
    } else {
        // No file selected, reset the content of the <span> element
        document.getElementById('filename').innerText = 'Upload Thumbnail';
    }
});