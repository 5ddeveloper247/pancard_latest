function getBanklist() {
    let type = 'GET';
    let url = '/admin/getBankList';
    SendAjaxRequestToServer(type, url, '', '', getBanklist_response, '', '');
}
function getBanklist_response(response) {
    var data = JSON.parse(response);

    var html = '<p class="bank-list-heading py-1">List of Bank accounts & UPI’s</p>';

    data.forEach(bank => {
        if (bank.bank_type == 2) {
            html += `
                <div class="d-flex align-items-center justify-content-between border rounded-2 px-2 bank-account-lists my-2">
                    <div class="py-1">
                        <p class="mb-1">Bank Name</p>
                        <p class="mb-1">Holder Name</p>
                        <p class="mb-1">A/C No</p>
                        <p class="mb-1">IFSC Code</p>
                    </div>
                    <div class="py-1">
                        <span class="mb-1 px-1 text-start bank-account-details-bg">${bank.bank_name}</span><br>
                        <span class="mb-1 px-1 text-start bank-account-details-bg">${bank.holder_name}</span><br>
                        <span class="mb-1 px-1 text-start bank-account-details-bg">${bank.account_number}</span><br>
                        <span class="mb-1 px-1 text-start bank-account-details-bg">${bank.ifsc_code}</span>
                    </div>
                    <div class="pe-1">
                        <button type="button" class="modal-btn-neutral py-2 px-2 delete_bank_btn" data-id="${bank.id}">
                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21.9375 6.5H18.6875V4.46875C18.6875 3.57246 17.9588 2.84375 17.0625 2.84375H8.9375C8.04121 2.84375 7.3125 3.57246 7.3125 4.46875V6.5H4.0625C3.61309 6.5 3.25 6.86309 3.25 7.3125V8.125C3.25 8.23672 3.34141 8.32812 3.45312 8.32812H4.98672L5.61387 21.6074C5.65449 22.4732 6.37051 23.1562 7.23633 23.1562H18.7637C19.632 23.1562 20.3455 22.4758 20.3861 21.6074L21.0133 8.32812H22.5469C22.6586 8.32812 22.75 8.23672 22.75 8.125V7.3125C22.75 6.86309 22.3869 6.5 21.9375 6.5ZM9.14062 4.67188H16.8594V6.5H9.14062V4.67188ZM18.5682 21.3281H7.43184L6.81738 8.32812H19.1826L18.5682 21.3281Z" fill="#515C6F" />
                            </svg>
                        </button>
                    </div>
                </div>
            `;
        } else {
            html += `
                <div class="d-flex align-items-center justify-content-between border rounded-2 px-2 bank-account-lists my-2">
                    <div class="py-1">
                        <p class="mb-1">Holder Name</p>
                        <p class="mb-1">UPI ID</p>
                    </div>
                    <div class="py-1">
                        <span class="mb-1 px-1 text-start bank-account-details-bg">${bank.holder_name}</span><br>
                        <span class="mb-1 px-1 text-start bank-account-details-bg">${bank.upi_id}</span><br>
                    </div>
                    <div class="pe-1">
                        <button type="button" class="modal-btn-neutral py-2 px-2 delete_bank_btn" data-id="${bank.id}">
                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21.9375 6.5H18.6875V4.46875C18.6875 3.57246 17.9588 2.84375 17.0625 2.84375H8.9375C8.04121 2.84375 7.3125 3.57246 7.3125 4.46875V6.5H4.0625C3.61309 6.5 3.25 6.86309 3.25 7.3125V8.125C3.25 8.23672 3.34141 8.32812 3.45312 8.32812H4.98672L5.61387 21.6074C5.65449 22.4732 6.37051 23.1562 7.23633 23.1562H18.7637C19.632 23.1562 20.3455 22.4758 20.3861 21.6074L21.0133 8.32812H22.5469C22.6586 8.32812 22.75 8.23672 22.75 8.125V7.3125C22.75 6.86309 22.3869 6.5 21.9375 6.5ZM9.14062 4.67188H16.8594V6.5H9.14062V4.67188ZM18.5682 21.3281H7.43184L6.81738 8.32812H19.1826L18.5682 21.3281Z" fill="#515C6F" />
                            </svg>
                        </button>
                    </div>
                </div>
            `;
        }
    });

    $('#bankListDiv').html(html);// = html;
}

$(document).ready(function () {

    $('#filter_dateRange').daterangepicker({
        startDate: moment().startOf('month'),
        endDate: moment().endOf('month'),
        locale: {
            format: 'DD-MM-YYYY' // Set the date format
        }
    });
    $('#filter_dateRange').val('');

    getBanklist();
    pendingTransactionsList();
    walletHistory();
    
    $('.upi_id_div').hide();
    $('.bank_name_div').hide();
    $('.holder_name_div').hide();
    $('.account_number_div').hide();
    $('.ifsc_code_div').hide();
    if ($('#bank_type').val() == '') {
        $('#add_bank_btn').addClass('disabled');
    }

    $('#bank_type').change(function () {
        var bank_type = $('#bank_type').val();
        if (bank_type == '1') {
            $('#add_bank_btn').removeClass('disabled');
            $('.upi_id_div').show();
            $('.bank_name_div').hide();
            $('.holder_name_div').show();
            $('.account_number_div').hide();
            $('.ifsc_code_div').hide();

        }
        else if (bank_type == '2') {
            $('#add_bank_btn').removeClass('disabled');
            $('.upi_id_div').hide();
            $('.bank_name_div').show();
            $('.holder_name_div').show();
            $('.account_number_div').show();
            $('.ifsc_code_div').show();
        }
        else {
            $('.upi_id_div').hide();
            $('.bank_name_div').hide();
            $('.holder_name_div').hide();
            $('.account_number_div').hide();
            $('.ifsc_code_div').hide();
            $('#add_bank_btn').addClass('disabled');
        }
    });
    


});

$(document).on('click', '#add_bank_btn', function (e) {

    e.preventDefault();
    let type = 'POST';
    let url = '/admin/addBank';
    let message = '';
    let form = $('#add_bank_form');
    let data = new FormData(form[0]);

    // PASSING DATA TO FUNCTION
    $('[name]').removeClass('is-invalid');
    SendAjaxRequestToServer(type, url, data, '', addBankResponse, '', '#add_bank_btn');

});

function addBankResponse(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {

        toastr.success(response.message, '', {
            timeOut: 3000
        });
        $('#add_bank_form')[0].reset();
        $('.upi_id_div').hide();
        $('.bank_name_div').hide();
        $('.holder_name_div').hide();
        $('.account_number_div').hide();
        $('.ifsc_code_div').hide();
        getBanklist();
        // success response action 

    } else {

        error = response.responseJSON.message;
        var is_invalid = response.responseJSON.errors;

        $.each(is_invalid, function (key) {
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
// to delete banks 
tempBankId = '';
$(document).on('click', '.delete_bank_btn', function (e) {

    var bank_id = $(this).attr('data-id');
    tempBankId = bank_id;
    $("#deleteBankConfirmModal").modal('show');
});

function deletebank() {
    let type = 'POST';
    let url = '/admin/deleteBank';
    let data = new FormData();
    data.append('bank_id', tempBankId);
    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', deletebankResponse, '', '');
}

function deletebankResponse(response) {
    if (response.status == 200 || response.status == '200') {

        toastr.success(response.message, '', {
            timeOut: 3000
        });
        getBanklist();
        $("#deleteBankConfirmModal").modal('hide');
        // success response action 

    } else {

        error = response.responseJSON.message;
        var is_invalid = response.responseJSON.errors;

        $.each(is_invalid, function (key) {
            $("#deleteBankConfirmModal").modal('hide');
            tempBankId = '';
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

function closedeletebankmodal() {
    tempBankId = '';
    $("#deleteBankConfirmModal").modal('hide');
}

function pendingTransactionsList() {
    let type = 'GET';
    let url = '/admin/pendingTransactionsList';

    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, '', '', pendingTransactionsListResponse, '', '');
}

function pendingTransactionsListResponse(response) {
    var transaction_list = response.data.pendingTransactionsList;
    
    var html = '';
    
    if(transaction_list.length > 0){
        $.each(transaction_list, function (index, list) {
            
            if(list.transaction_type == 1){
                var bank_type = list.bank_name != null ? list.bank_name.bank_type : '';
            
                if (bank_type == '1') {
                    var bank = list.bank_name.upi_id;
        
                }else
                if (bank_type == '2') {
                    var bank = list.bank_name.bank_name;
        
                }else{
                    var bank = '';
                }
            }else{
                var bank = 'Online Payment';
            }
                
            
            var formattedDate = new Date(list.date).toLocaleDateString('en-GB', { day: '2-digit', month: '2-digit', year: 'numeric' });
            var companyName = list.created_by_user.company_name;
            var truncatedCompanyName = companyName.length > 10 ? companyName.substring(0, 10) + '...' : companyName;

            html += `<div class="home-card py-1 px-2 mb-2 mx-md-0 px-md-4 identify">
            
                            <div class="d-flex align-items-center justify-content-between ">
                                <div class="d-flex flex-column">
                                    <span class="fw-bold text-dark grid-p-searchby">
                                        ${list.created_by_user.name}
                                    </span>
                                    <span class="text-dark d-flex grid-p-searchby">Date: ${formattedDate}</span>
                                    <span class="text-dark grid-p-searchby">
                                        Bank Account: ${bank}
                                    </span>
                                    <span class="text-dark d-flex align-items-center  utr-code-bg px-1 grid-p-searchby">
                                        UTR: ${list.transaction_number != null ? list.transaction_number : ''} 
                                        <span class="ps-2"> 
                                            <svg width="10" height="11" viewBox="0 0 10 11" class="copy-icon" data-copy="${list.transaction_number}"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2.33336 5.09092C2.33336 3.80547 2.33336 3.16228 2.72403 2.76319C3.11425 2.36365 3.74314 2.36365 5.00003 2.36365H6.33336C7.59025 2.36365 8.21914 2.36365 8.60936 2.76319C9.00003 3.16228 9.00003 3.80547 9.00003 5.09092V7.36365C9.00003 8.6491 9.00003 9.29228 8.60936 9.69137C8.21914 10.0909 7.59025 10.0909 6.33336 10.0909H5.00003C3.74314 10.0909 3.11425 10.0909 2.72403 9.69137C2.33336 9.29228 2.33336 8.6491 2.33336 7.36365V5.09092Z"
                                                    stroke="#515C6F" />
                                                <path opacity="0.5"
                                                    d="M2.33333 8.72727C1.97971 8.72727 1.64057 8.5836 1.39052 8.32787C1.14048 8.07214 1 7.72529 1 7.36364V4.63636C1 2.92227 1 2.065 1.52089 1.53273C2.04133 1 2.87956 1 4.55556 1H6.33333C6.68696 1 7.02609 1.14367 7.27614 1.3994C7.52619 1.65513 7.66667 2.00198 7.66667 2.36364"
                                                    stroke="#515C6F" />
                                            </svg>
                                        </span>
                                    </span>
                                    <div class="d-flex justify-content-md-center justify-content-between"></div>
                        
                                </div>
                        
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <!-- Button trigger modal -->
                                        <a href="tel:${list.created_by_user.phone_number} type="button" class="modal-btn-neutral py-1 px-2">
                                            <svg width="17" height="21" viewBox="0 0 17 21" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.26403 0.163832C6.3436 0.0150705 7.25136 0.675594 7.68089 1.53412L8.73741 3.64664C9.32355 4.81893 8.98674 6.19445 8.09836 7.05979C7.5735 7.5705 7.04603 8.15402 6.74012 8.66893C6.71986 8.70563 6.71354 8.74841 6.72231 8.7894C7.00517 10.3221 8.04388 11.8364 8.9705 12.9223C9.01711 12.974 9.07793 13.0109 9.14537 13.0283C9.21282 13.0458 9.2839 13.0429 9.34974 13.0202L11.4319 12.3696C11.9928 12.1943 12.595 12.2033 13.1505 12.3952C13.7059 12.5871 14.1852 12.9519 14.5182 13.4361L16.0252 15.6283C16.4337 16.2228 16.6406 17.0295 16.3274 17.8052C16.0477 18.4982 15.5066 19.4976 14.5224 20.1624C13.5009 20.8517 12.1018 21.1136 10.2711 20.4861C8.22565 19.7842 6.29331 18.0242 4.69098 15.7734C3.07922 13.5084 1.75241 10.6793 0.947838 7.72921C0.187267 4.94412 0.646124 3.06888 1.72622 1.8615C2.76808 0.696547 4.26093 0.301594 5.26403 0.163832ZM6.50912 2.11974C6.26974 1.6415 5.84284 1.40526 5.44212 1.46026C4.55112 1.58283 3.43541 1.9144 2.7026 2.73417C2.00803 3.51098 1.52717 4.87917 2.21022 7.38455C2.9776 10.1964 4.24103 12.8835 5.75746 15.0138C7.28331 17.1578 9.01712 18.6716 10.6954 19.2473C12.1909 19.7601 13.1521 19.5065 13.789 19.077C14.4626 18.6218 14.877 17.8985 15.1127 17.3149C15.2206 17.0478 15.174 16.7021 14.9456 16.37L13.4386 14.1784C13.2642 13.9247 13.0132 13.7336 12.7223 13.633C12.4314 13.5324 12.1159 13.5277 11.8221 13.6195L9.73998 14.27C9.11769 14.4644 8.41684 14.291 7.97422 13.7724C7.00989 12.6425 5.78103 10.9098 5.43374 9.02669C5.36736 8.67377 5.43139 8.30875 5.61393 7.9995C6.01098 7.33217 6.63955 6.65174 7.18379 6.12164C7.71546 5.60412 7.86631 4.83412 7.56565 4.23226L6.50912 2.11974Z"
                                                    fill="#515C6F" />
                                            </svg>
                                        </a>
                                        <button type="button" class="modal-btn-price py-1 px-2 ms-2 grid-p-searchby">
                                            ₹${list.amount}
                                        </button>
                                    </div>
                        
                                </div>
                            </div>
                            <div class="d-flex flex-nowrap justify-content-between">
                                <div>
                                    <span class="diff-bg px-2 py-1 mx-md-3 mr-1 my-1 text-primary text-nowrap grid-p-searchby transaction_username" data-user="${list.created_by_user.id}">
                                        <b>${list.created_by_user.username}</b>(${truncatedCompanyName})
                                    </span>
                                </div>
                                <div class="d-flex flex-nowrap">
                                    <span class="states-btns mx-md-3 ms-1 my-1 text-white text-nowrap">
                                        <button type="button" class="btn action-btns btn-danger px-2 py-0 rejectTransactionbtn"data-id="${list.id}">
                                            Reject
                                        </button>
                                    </span>
                                    <span class="states-btns mx-md-3 ms-1 my-1 text-white text-nowrap">
                                        <button type="button" class="btn action-btns btn-primary px-2 py-0 acceptTransactionbtn" 
                                            data-id="${list.id}">
                                            Complete
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>`;
    
            
    
        });
    }else{
        html = `<div class="border rounded-2 text-center mt-2 pt-3">
                    <p>No record found!</p>
                </div>`;
    }
    
    $('#wallet-pending-content').html(html);

    
}

$(document).on('click', '.transaction_username', function (e) {

    var id = $(this).attr('data-user');

    let type = 'POST';
    let url = '/admin/getUserInfoData';
   
    let data = new FormData();
    data.append("user_id", id);
    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', getUserInfoDataResponse, '', '');

});


function getUserInfoDataResponse(response){

    var data = response.data;
    var user_info = data['user_info'];
    
    if(user_info != null){
        $('#user_name').text(user_info.name);
        $('#username').text(user_info.username);
        $('#company_name').text(user_info.company_name);
        $('#user_email').text(user_info.email);
        $('#user_phone').text(user_info.phone_number);
        $('#user_state').text(user_info.state.name);
        $('#user_city').text(user_info.city.name);
        $('#user_area').text(user_info.area.name);
        $('#user_landmark').text(user_info.landmark);
        $('#user_balance').text(user_info.balance);
        $('#user_usertype').text(user_info.user_type);
        $('#user_status').text(user_info.status);
    }

    $("#userDetailModal").modal('show')
}
var temptransactionId = '';

$(document).on('click', '.acceptTransactionbtn', function (e) {

    var transaction_id = $(this).attr('data-id');
    temptransactionId = transaction_id;
    $("#completeTransactionModal").modal('show');
});

function completeTransaction(){

    let type = 'POST';
    let url = '/admin/completeTransaction';
    let message = '';
   
    let data = new FormData();
    data.append('transaction_id', temptransactionId);

    // PASSING DATA TO FUNCTION

    SendAjaxRequestToServer(type, url, data, '', completeTransactionResponse, '', '');
}

function completeTransactionResponse(response){

    if (response.status == 200 || response.status == '200') {

        toastr.success(response.message, '', {
            timeOut: 3000
        });
        pendingTransactionsList();
        closecompleteTransactionModal();
        walletHistory();
    }
}

function closecompleteTransactionModal(){

    temptransactionId = '';
    tempuserid = '';
    $("#completeTransactionModal").modal('hide');

}

$(document).on('click', '.rejectTransactionbtn', function (e) {

    var transaction_id = $(this).attr('data-id');
    temptransactionId = transaction_id;
    $("#rejectTransactionModal").modal('show');
});

function rejectTransaction(){
    let type = 'POST';
    let url = '/admin/rejectTransaction';
    let message = '';
   
    let data = new FormData();
    data.append('transaction_id', temptransactionId);

    // PASSING DATA TO FUNCTION

    SendAjaxRequestToServer(type, url, data, '', rejectTransactionResponse, '', '');
}

function rejectTransactionResponse(response){
    if (response.status == 200 || response.status == '200') {

        toastr.success(response.message, '', {
            timeOut: 3000
        });
        pendingTransactionsList();
        walletHistory();
        closerejectTransactionModal();
        
        // success response action 

    }
}

function closerejectTransactionModal(){

    temptransactionId = '';
    tempuserid = '';
    $("#rejectTransactionModal").modal('hide');

}

function formatAMPM(date) {
    let hours = date.getHours();
    let minutes = date.getMinutes();
    let ampm = hours >= 12 ? 'pm' : 'am';
    hours %= 12;
    hours = hours || 12; //(0 hours)
    minutes = minutes < 10 ? '0' + minutes : minutes;
    return hours + ':' + minutes + ' ' + ampm;
}

function formatDate(dateString) {
    const date = new Date(dateString);
    const day = date.getDate();
    const month = date.toLocaleString('default', { month: 'short' });
    const year = date.getFullYear().toString().slice(-2);
    return `${day} ${month} ${year}`;
}

function walletHistory(){
    let type = 'GET';
    let url = '/admin/walletHistory';
    let message = '';
   

    SendAjaxRequestToServer(type, url, '', '', walletHistoryResponse, '', '');
}

function walletHistoryResponse(response){

    var walletHistoryList = response.data.walletHistory;

    updateWalletHistoryList(walletHistoryList);
}

function updateWalletHistoryList(walletHistoryList){
    var html = '';

    if(walletHistoryList.length > 0){
        $.each(walletHistoryList, function (index, walletHistory) {
            if(walletHistory.type == '2'){
                var status = ` <span class="fw-bold text-danger">Debited</span>`;
                var amount_txt = `<span class="fw-bolder text-danger"> &minus; &#8377;${walletHistory.amount}</span>`;
                var name_txt = `<h6 class="m-0">Wallet debited</h6>`;
            }else{
                
                var name_txt = `<h6 class="m-0">Wallet added</h6>`;

                if(walletHistory.status == '1'){
                    var status = ` <span class="fw-bold text-warning">Pending</span>`;
                    var amount_txt = `<span class="fw-bolder text-warning"> &plus; &#8377;${walletHistory.amount}</span>`;
                    
                }
                if(walletHistory.status == '2'){
                    if(walletHistory.transaction_status == '2'){

                        var status = ` <span class="fw-bold text-danger">Failed</span>`;
                    }

                else{

                    var status = ` <span class="fw-bold text-danger">Rejected</span>`;
                }
                    // var status = ` <span class="fw-bold text-danger">Rejected</span>`;
                    var amount_txt = `<span class="fw-bolder text-danger"> &plus; &#8377;${walletHistory.amount}</span>`;
                    
                }
                if(walletHistory.status == '3'){
                    var status = ` <span class="fw-bold text-success">Success</span>`;
                    var amount_txt = `<span class="fw-bolder text-success"> &plus; &#8377;${walletHistory.amount}</span>`;
                    
                }
            }
            
            var companyName = walletHistory.created_by_user.company_name;
            var truncatedCompanyName = companyName.length > 10 ? companyName.substring(0, 10) + '...' : companyName;
    
    
            html += `<div class="d-flex justify-content-between border rounded-2 my-2 identify">
                        <div class="d-flex align-items-center pt-3 ps-3 pb-2">
                            <svg width="68" height="68" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="37" height="37" rx="4.5" fill="#FBFBFB"
                                    stroke="#F0F0F0" />
                                <path d="M23.1666 19.5834H24.5555V20.9723H23.1666V19.5834Z" fill="#727C8E" />
                                <path
                                    d="M27.5714 13.5556H10.4286V11.4222H26.1429V10H10.4286C10.0497 10 9.68633 10.1498 9.41842 10.4166C9.15051 10.6833 9 11.045 9 11.4222V26.3556C9 26.7328 9.15051 27.0945 9.41842 27.3612C9.68633 27.6279 10.0497 27.7778 10.4286 27.7778H27.5714C27.9503 27.7778 28.3137 27.6279 28.5816 27.3612C28.8495 27.0945 29 26.7328 29 26.3556V14.9778C29 14.6006 28.8495 14.2388 28.5816 13.9721C28.3137 13.7054 27.9503 13.5556 27.5714 13.5556ZM10.4286 26.3556V14.9778H27.5714V17.1111H21.8571C21.4783 17.1111 21.1149 17.261 20.847 17.5277C20.5791 17.7944 20.4286 18.1561 20.4286 18.5333V22.8C20.4286 23.1772 20.5791 23.5389 20.847 23.8057C21.1149 24.0724 21.4783 24.2222 21.8571 24.2222H27.5714V26.3556H10.4286ZM27.5714 18.5333V22.8H21.8571V18.5333H27.5714Z"
                                    fill="#515C6F" />
                            </svg>
                            <div class="d-flex flex-column grid-p-searchby">
                                ${name_txt}
                                <small>${formatDate(walletHistory.created_at)}</small>
                                <span class="grid-p-searchby d-none">${walletHistory.transaction_number}</span>
                                <span class="diff-bg px-2 py-1 mr-1 my-1 text-primary text-nowrap grid-p-searchby transaction_username" data-user="${walletHistory.created_by_user.id}">
                                    <b>${walletHistory.created_by_user.username}</b>(${truncatedCompanyName})
                                </span>
                            </div>
                        </div>
                        <div class="pt-3 pe-3 pb-2 d-flex flex-column align-items-end grid-p-searchby">
                            ${amount_txt}
                            ${status}
                            <button type="button" class="btn added-by-admin px-2 py-0 mt-1 grid-p-searchby">
                                ${walletHistory.transaction_remarks}
                            </button>
                        </div>
    
                    </div>`;
    
        
        });
    }else{
        html = `<div class="border rounded-2 text-center mt-2 pt-3">
                    <p>No record found!</p>
                </div>`;
    }

    $('#walletHistoryDiv').html(html);
}


$(document).on('click', '.filter_today', function (e) {
    
    $(".filter-btns").removeClass('active');
    $(".filter_today").addClass('active');
    $("#filter_month,#filter_dateRange").val('');
   

    var param1 = moment().format('YYYY-MM-DD');
    var param2 = '';
    var filterflag = '1';
    console.log(param1);
    console.log(param2);
    console.log(filterflag);
    getWalletHistoryFilteredData (filterflag, param1, param2);
});

$(document).on('click', '.filter_yesterday', function (e) {
    
    $(".filter-btns").removeClass('active');
    $(".filter_yesterday").addClass('active');
    $("#filter_month,#filter_dateRange").val('');

    var param1 = moment().subtract(1, 'days').format('YYYY-MM-DD');
    var param2 = '';
    var filterflag = '1';
    console.log(param1);
    console.log(param2);
    console.log(filterflag);
    getWalletHistoryFilteredData (filterflag, param1, param2);
});

$(document).on('change', '#filter_month', function (e) {

    $(".filter-btns").removeClass('active');
    $("#filter_dateRange").val('');

    var param1 = $(this).val();
    var param2 = '';
    var filterflag = '2';
    console.log(param1);
    console.log(param2);
    console.log(filterflag);
    getWalletHistoryFilteredData (filterflag, param1, param2);
    
});

var flag = false;
$(document).on('change', '#filter_dateRange', function (e) {
    if(flag){
        var dateString = $(this).val();
        var dateArray = dateString.split(" - ");
        // Extract start and end dates from the array
        var startDateFormatted = moment(dateArray[0], 'DD-MM-YYYY').format('YYYY-MM-DD');
        var endDateFormatted = moment(dateArray[1], 'DD-MM-YYYY').format('YYYY-MM-DD');
        
        $(".filter-btns").removeClass('active');
        $("#filter_month").val('');
        
        var param1 = startDateFormatted;
        var param2 = endDateFormatted;
        var filterflag = '3';
        console.log(param1);
        console.log(param2);
        console.log(filterflag);
        getWalletHistoryFilteredData (filterflag, param1, param2);
    }
    flag = true;
});

function getWalletHistoryFilteredData (filterFlag, param1='', param2='' ) {
    
    let type = 'POST';
    let url = '/admin/getWalletHistoryFilteredData';
    let message = '';
    let form = '';
    let data = new FormData();
    data.append("filterFlag", filterFlag);
    data.append("param1", param1);
    data.append("param2", param2);
    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', getWalletHistoryFilteredDataResponse, '', 'submit_button');
    
}

function getWalletHistoryFilteredDataResponse(response){

    var data = response.data;
    var walletHistoryList = data.walletHistory;
    updateWalletHistoryList(walletHistoryList)
    
}

$('#searchInListing').on("keyup", function (e)  {     
    var tr = $('.identify');
    
    if ($(this).val().length >= 1) {//character limit in search box.
        var noElem = true;
        var val = $.trim(this.value).toLowerCase();
        el = tr.filter(function() {
            return $(this).find('.grid-p-searchby').text().toLowerCase().match(val);
        });
        if (el.length >= 1) {
            noElem = false;
        }
        tr.not(el).hide().addClass("d-none");
		el.fadeIn().removeClass("d-none");
	} else {
		tr.fadeIn().removeClass("d-none");
    }
});

$(document).on('click', '.copy-icon', function (e) {
   
        
                const textToCopy = this.getAttribute('data-copy');
                navigator.clipboard.writeText(textToCopy).then(() => {
                    toastr.success('text copied', '', {
            timeOut: 3000
        });
                }).catch(err => {
                    toastr.error('failed to copy text', '', {
            timeOut: 3000
       
            });
        });

});
