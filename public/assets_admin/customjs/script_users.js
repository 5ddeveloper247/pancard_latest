function getUsersPageData () {

	let type = 'POST';
	let url = '/admin/getUsersPageData';
	let message = '';
	let form = '';
	let data = '';
	// PASSING DATA TO FUNCTION
	SendAjaxRequestToServer(type, url, data, '', getUsersPageDataResponse, '', 'submit_button');
	
}
function getUsersPageDataResponse(response){

    var data = response.data;
    var pending_users = data.pending_users;
    var active_users = data.active_users;

    updatePendingUsersList(pending_users);
    updateActiveUsersList(active_users);

}

function updatePendingUsersList(pending_users){
    
    var html = '';
    if(pending_users.length > 0){
        $.each(pending_users, function(index, value) {
            
            html += `<div class="home-card py-1 px-2 mb-2 my-2">
                        <div class="d-flex align-items-center justify-content-between ">
                            <div class="d-flex flex-column">
                                <span class="fw-bold text-dark d-flex">
                                    ${value.name} <p class="fw-normal m-0">,${value.username}</p>
                                </span>
                                <span class="text-dark d-flex ">${value.company_name}, ${value.pin_code}</span>
                                <span class="text-dark">
                                    ${value.email}, ${value.phone_number}
                                </span>
                                <span class="text-dark">
                                    ${value.area.name}, ${value.city.name}, ${value.state.name}
                                </span>
                            </div>

                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center justify-content-end">
                                    <!-- Button trigger modal -->
                                    <a href="tel:${value.phone_number}" class="modal-btn-neutral py-1 px-2">
                                        <svg width="17" height="21" viewBox="0 0 17 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.264 0.163832C6.34357 0.0150705 7.25133 0.675594 7.68086 1.53412L8.73738 3.64664C9.32352 4.81893 8.98671 6.19445 8.09833 7.05979C7.57347 7.5705 7.046 8.15402 6.74009 8.66893C6.71983 8.70563 6.7135 8.74841 6.72228 8.7894C7.00514 10.3221 8.04385 11.8364 8.97047 12.9223C9.01708 12.974 9.0779 13.0109 9.14534 13.0283C9.21279 13.0458 9.28387 13.0429 9.34971 13.0202L11.4319 12.3696C11.9927 12.1943 12.595 12.2033 13.1504 12.3952C13.7058 12.5871 14.1852 12.9519 14.5181 13.4361L16.0251 15.6283C16.4337 16.2228 16.6406 17.0295 16.3274 17.8052C16.0477 18.4982 15.5066 19.4976 14.5223 20.1624C13.5009 20.8517 12.1018 21.1136 10.2711 20.4861C8.22562 19.7842 6.29328 18.0242 4.69095 15.7734C3.07919 13.5084 1.75238 10.6793 0.947808 7.72921C0.187236 4.94412 0.646093 3.06888 1.72619 1.8615C2.76805 0.696547 4.2609 0.301594 5.264 0.163832ZM6.50909 2.11974C6.26971 1.6415 5.84281 1.40526 5.44209 1.46026C4.55109 1.58283 3.43538 1.9144 2.70257 2.73417C2.008 3.51098 1.52714 4.87917 2.21019 7.38455C2.97757 10.1964 4.241 12.8835 5.75743 15.0138C7.28328 17.1578 9.01709 18.6716 10.6954 19.2473C12.1909 19.7601 13.152 19.5065 13.789 19.077C14.4626 18.6218 14.877 17.8985 15.1127 17.3149C15.2206 17.0478 15.174 16.7021 14.9456 16.37L13.4386 14.1784C13.2642 13.9247 13.0132 13.7336 12.7223 13.633C12.4314 13.5324 12.1159 13.5277 11.8221 13.6195L9.73995 14.27C9.11766 14.4644 8.41681 14.291 7.97419 13.7724C7.00985 12.6425 5.781 10.9098 5.43371 9.02669C5.36733 8.67377 5.43136 8.30875 5.6139 7.9995C6.01095 7.33217 6.63952 6.65174 7.18376 6.12164C7.71543 5.60412 7.86628 4.83412 7.56562 4.23226L6.50909 2.11974Z"
                                                fill="#515C6F" />
                                        </svg>
                                    </a>
                                    <button type="button" class="modal-btn-neutral py-1 px-2 ms-2">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.5" d="M18.8571 11.3333H13.619" stroke="#515C6F" stroke-width="1.5"
                                                stroke-linecap="round" />
                                            <path opacity="0.5"
                                                d="M10.4762 3.99997H17.2857C17.7718 3.99997 18.0159 3.99997 18.2202 4.02721C18.9059 4.11763 19.5426 4.43171 20.0316 4.92075C20.5206 5.40979 20.8347 6.04649 20.9252 6.73216C20.9524 6.93645 20.9524 7.18054 20.9524 7.66664"
                                                stroke="#515C6F" stroke-width="1.5" />
                                            <path
                                                d="M2.09521 8.13808C2.09521 7.21303 2.09521 6.75103 2.16855 6.3655C2.32488 5.53772 2.72707 4.77627 3.32266 4.18049C3.91825 3.58472 4.67957 3.18228 5.50731 3.0257C5.89388 2.95236 6.35693 2.95236 7.28093 2.95236C7.68531 2.95236 7.88855 2.95236 8.08341 2.97017C8.9226 3.04898 9.71852 3.37904 10.3672 3.91722C10.5181 4.04189 10.6605 4.18436 10.9476 4.47141L11.5238 5.0476C12.3786 5.90246 12.8061 6.32989 13.3173 6.61379C13.5983 6.7704 13.8964 6.89414 14.2057 6.98255C14.7693 7.14284 15.3738 7.14284 16.5817 7.14284H16.9735C19.7308 7.14284 21.1105 7.14284 22.0063 7.94951C22.089 8.02284 22.1676 8.10141 22.2409 8.18417C23.0476 9.07989 23.0476 10.4596 23.0476 13.2169V15.5238C23.0476 19.4744 23.0476 21.4502 21.8198 22.6769C20.593 23.9047 18.6172 23.9047 14.6666 23.9047H10.4762C6.5256 23.9047 4.54979 23.9047 3.32302 22.6769C2.09521 21.4502 2.09521 19.4744 2.09521 15.5238V8.13808Z"
                                                stroke="#515C6F" stroke-width="1.5" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>`;
        });
    }else{
        html = `<div class="border rounded-2 text-center mt-2 pt-3">
                    <p>No record found!</p>
                </div>`;
    }

    $("#pending_user_container").html(html);
}

function updateActiveUsersList(active_users){
    
    var html = '';
    if(active_users.length > 0){
        $.each(active_users, function(index, value) {
            
            html += `<div class="home-card py-1 px-2 mb-2 mx-md-0 px-md-4">
                        <div class="d-flex align-items-center justify-content-between ">
                            <div class="d-flex flex-column">
                                <span class="fw-bold text-dark text-nowrap">
                                    ${value.username} (${value.company_name})
                                </span>
                                <span class="text-dark">
                                ${value.name}
                                </span>
                                <span class="text-dark d-flex align-items-center utr-code-bg px-1">
                                    Available Balance: ₹${value.balance}
                                </span>
                            </div>

                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center justify-content-end">
                                    <!-- Button trigger modal -->
                                    <a href="tel:${value.phone_number}" class="modal-btn-neutral p-3">
                                        <svg width="17" height="21" viewBox="0 0 17 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.26403 0.163832C6.3436 0.0150705 7.25136 0.675594 7.68089 1.53412L8.73741 3.64664C9.32355 4.81893 8.98674 6.19445 8.09836 7.05979C7.5735 7.5705 7.04603 8.15402 6.74012 8.66893C6.71986 8.70563 6.71354 8.74841 6.72231 8.7894C7.00517 10.3221 8.04388 11.8364 8.9705 12.9223C9.01711 12.974 9.07793 13.0109 9.14537 13.0283C9.21282 13.0458 9.2839 13.0429 9.34974 13.0202L11.4319 12.3696C11.9928 12.1943 12.595 12.2033 13.1505 12.3952C13.7059 12.5871 14.1852 12.9519 14.5182 13.4361L16.0252 15.6283C16.4337 16.2228 16.6406 17.0295 16.3274 17.8052C16.0477 18.4982 15.5066 19.4976 14.5224 20.1624C13.5009 20.8517 12.1018 21.1136 10.2711 20.4861C8.22565 19.7842 6.29331 18.0242 4.69098 15.7734C3.07922 13.5084 1.75241 10.6793 0.947838 7.72921C0.187267 4.94412 0.646124 3.06888 1.72622 1.8615C2.76808 0.696547 4.26093 0.301594 5.26403 0.163832ZM6.50912 2.11974C6.26974 1.6415 5.84284 1.40526 5.44212 1.46026C4.55112 1.58283 3.43541 1.9144 2.7026 2.73417C2.00803 3.51098 1.52717 4.87917 2.21022 7.38455C2.9776 10.1964 4.24103 12.8835 5.75746 15.0138C7.28331 17.1578 9.01712 18.6716 10.6954 19.2473C12.1909 19.7601 13.1521 19.5065 13.789 19.077C14.4626 18.6218 14.877 17.8985 15.1127 17.3149C15.2206 17.0478 15.174 16.7021 14.9456 16.37L13.4386 14.1784C13.2642 13.9247 13.0132 13.7336 12.7223 13.633C12.4314 13.5324 12.1159 13.5277 11.8221 13.6195L9.73998 14.27C9.11769 14.4644 8.41684 14.291 7.97422 13.7724C7.00989 12.6425 5.78103 10.9098 5.43374 9.02669C5.36736 8.67377 5.43139 8.30875 5.61393 7.9995C6.01098 7.33217 6.63955 6.65174 7.18379 6.12164C7.71546 5.60412 7.86631 4.83412 7.56565 4.23226L6.50912 2.11974Z"
                                                fill="#515C6F"></path>
                                        </svg>
                                    </a>
                                    <div class="form-floating col-6 col-md-4 my-2 mx-2">
                                        <input type="number" class="form-control form-control-sm click-your-selfie rmv-arrow user-add-amount"
                                            id="user_add_amount_${value.id}" placeholder="Enter Amount" value="0">
                                        <label class="ms-0 d-flex align-items-center" for="clickSelfie">Enter Amount</label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-md-center justify-content-between">
                                <div class="d-flex flex-column">
                                    <button type="button" class="btn action-btns btn-success px-3 py-0 my-1" onclick="creditAmountUser(${value.id})">
                                        Credit
                                    </button>
                                    <button type="button" class="btn action-btns btn-danger px-3 py-0 my-1" onclick="debitAmountUser(${value.id})">
                                        Debit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>`;
        });
    }else{
        html = `<div class="border rounded-2 text-center mt-2 pt-3">
                    <p>No record found!</p>
                </div>`;
    }

    $("#active_user_container").html(html);
}

function creditAmountUser(userId){

    var flag = 'credit';
    if($("#user_add_amount_"+userId).val() == ''){
        toastr.error('Enter amount first!', '', {
            timeOut: 3000
        });return;
    }else
    if($("#user_add_amount_"+userId).val() <= 0){
        toastr.error('Amount must be greater then zero!', '', {
            timeOut: 3000
        });return;
    }
    updateUserBalance(userId,flag);
}
function debitAmountUser(userId){

    var flag = 'debit';
    if($("#user_add_amount_"+userId).val() == ''){
        toastr.error('Enter amount first!', '', {
            timeOut: 3000
        });return;
    }else
    if($("#user_add_amount_"+userId).val() <= 0){
        toastr.error('Amount must be greater then zero!', '', {
            timeOut: 3000
        });return;
    }
    updateUserBalance(userId,flag);
}

function updateUserBalance(userId, flag){
    
    var amount = $("#user_add_amount_"+userId).val();

    let type = 'POST';
	let url = '/admin/updateUserBalance';
	let message = '';
	let form = '';
	let data = new FormData();
    data.append("user_id", userId);
    data.append("flag", flag);
    data.append("amount", amount);

	// PASSING DATA TO FUNCTION
	SendAjaxRequestToServer(type, url, data, '', updateUserBalanceResponse, '', 'submit_button');
}

function updateUserBalanceResponse(response){

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
      
        var data = response.data;
        var active_users = data['active_users'];
        
        updateActiveUsersList(active_users);

        $(".user-add-amount").val(0);

        toastr.success(response.message, '', {
            timeOut: 3000
        });

    } else {
        
    	error = response.message;
        var is_invalid = response.errors;
        
        toastr.error(error, '', {
            timeOut: 3000
        });
    }

    
}

// $(document).on('click', '#general_form_submit', function (e) {

// 	e.preventDefault();
// 	let type = 'POST';
// 	let url = '/admin/storeGeneralSettings';
// 	let message = '';
// 	let form = $('#general_settings_form');
// 	let data = new FormData(form[0]);
	    
// 	// PASSING DATA TO FUNCTION
// 	$('[name]').removeClass('is-invalid');
// 	SendAjaxRequestToServer(type, url, data, '', addGeneralSettingsResponse, '', '#general_form_submit');
	
// });

// function addGeneralSettingsResponse(response) {

//     // SHOWING MESSAGE ACCORDING TO RESPONSE
//     if (response.status == 200 || response.status == '200') {
      
//         toastr.success(response.message, '', {
//             timeOut: 3000
//         });
//         // success response action 

//     } else {
        
//     	error = response.responseJSON.message;
//         var is_invalid = response.responseJSON.errors;
        
//         $.each(is_invalid, function(key) {
//             // Assuming 'key' corresponds to the form field name
//             var inputField = $('[name="' + key + '"]');
//             // Add the 'is-invalid' class to the input field's parent or any desired container
//             inputField.closest('.form-control').addClass('is-invalid');
//         });
//         toastr.error(error, '', {
//             timeOut: 3000
//         });
//     }
// }





$(document).ready(function () {
    getUsersPageData();

    
});

// document.getElementById('cameraIcon').addEventListener('click', function() {
//     // Trigger click event on the input field
//     document.getElementById('uploadThumbnail').click();
// });
// document.getElementById('uploadThumbnail').addEventListener('change', function() {
//     if (this.files.length > 0) {
//         // Get the filename of the selected file
//         var filename = this.files[0].name;
//         // Update the content of the <span> element with the filename
//         document.getElementById('filename').innerText = filename;
//     } else {
//         // No file selected, reset the content of the <span> element
//         document.getElementById('filename').innerText = 'Upload Thumbnail';
//     }
// });