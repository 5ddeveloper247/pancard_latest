transactionHistory();

$('.select_bank').click(function () {
    var bank_id = $(this).attr('data-id');
    let type = 'POST';
    let url = '/getBankDetails';
    let message = '';
    let form = '';
    let data = new FormData();
    data.append('bank_id', bank_id);
    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', getBankDetailsResponse, '', 'submit_button');
});

$('#transaction_amount').on('input', function () {
    var transaction_amount = $(this).val();
    if (transaction_amount == '') {
        $('.add_transaction_btn').text('Add to your wallet');
    }
    $('.add_transaction_btn').text('Add ₹' + transaction_amount + ' to your wallet');

});

function getBankDetailsResponse(response) {

    var data = response.data;
    var bank_detail = data['bank_detail'];
    $('#selected_bank_id').val(bank_detail.id);
    if (bank_detail.bank_type == 1) {
        var html = `
                <div class="d-flex flex-column">
                    <span>UPI ID</span>
                    <span>Holder Name</span>
                </div>
                <div class="d-flex flex-column">
                    <h6 class="fw-bolder m-0">${bank_detail.upi_id}</h6>
                    <h6 class="fw-bolder m-0">${bank_detail.holder_name}</h6>
                </div>
            `;
    }

    if (bank_detail.bank_type == 2) {
        var html = `
            <div class="d-flex flex-column">
                <span>Bank Name</span>
                <span>Holder Name</span>
                <span>A/C No</span>
                <span>IFSC Code</span>
            </div>
            <div class="d-flex flex-column">
                <h6 class="fw-bolder m-0">${bank_detail.bank_name}</h6>
                <h6 class="fw-bolder m-0">${bank_detail.holder_name}</h6>
                <h6 class="fw-bolder m-0">${bank_detail.account_number}</h6>
                <h6 class="fw-bolder m-0">${bank_detail.ifsc_code}</h6>
            </div>
        `;
    }

    $('#selected_bank_details').html(html);


}

$('#add_transaction_form').submit(function (e) {
    e.preventDefault();
    let type = 'POST';
    let url = '/addTransaction';
    let message = '';
    let form = $('#add_transaction_form');
    let data = new FormData(form[0]);

    // PASSING DATA TO FUNCTION
    $('[name]').removeClass('is-invalid');
    SendAjaxRequestToServer(type, url, data, '', addTransactionResponse, '', '.add_transaction_btn');

});

function addTransactionResponse(response) {
    if (response.status == 200 || response.status == '200') {
        toastr.success(response.message, '', {
            timeOut: 3000
        });
        $('#selected_bank_id').val('');
        $('#add_transaction_form')[0].reset();
        transactionHistory();
        var html = `<div class="d-flex flex-column">
        <span>Bank Name</span>
        <span>Holder Name</span>
        <span>A/C No</span>
        <span>IFSC Code</span>
    </div>
    <div class="d-flex flex-column">
        <h6 class="fw-bolder m-0">----------</h6>
        <h6 class="fw-bolder m-0">----------</h6>
        <h6 class="fw-bolder m-0">----------</h6>
        <h6 class="fw-bolder m-0">----------</h6>
    </div>`;
        $('#selected_bank_details').html(html);
        $('.add_transaction_btn').text('Add to your wallet');
    }
    else {
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


// for transaction history in online tab 
function transactionHistory() {
    let type = 'GET';
    let url = '/getTransactionHistory';
    let message = '';
    let form = '';

    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, '', '', transactionHistoryResponse, '', '');
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

function transactionHistoryResponse(response) {
    var history_list = response.data.history;
    var html = '';

    if (history_list.length > 0) {
        $.each(history_list, function (index, history) {

            var status_html = amount_txt = name_txt = '';
            if (history.type == '2') {
                status_html = ` <span class="fw-bold text-danger">Debited</span>`;
                amount_txt = `<span class="fw-bolder text-danger"> &minus; &#8377;${history.amount}</span><br>`;
                name_txt = `<h6>${history.user_puc != null ? history.user_puc.puc_type.name : history.transaction_remarks} </h6>`;
            } else {
                if (history.status == '1') {
                    status_html = `<span class="fw-bold text-warning">Pending</span>`;
                    amount_txt = `<span class="fw-bolder text-warning"> &plus; &#8377;${history.amount}</span><br>`;
                    name_txt = `<h6>${history.transaction_remarks} </h6>`;
                }
                if (history.status == '2') {
                    status_html = `<span class="fw-bold text-danger">Rejected</span>`;
                    amount_txt = `<span class="fw-bolder text-danger"> &plus; &#8377;${history.amount}</span><br>`;
                    name_txt = `<h6>${history.transaction_remarks} </h6>`;
                }
                if (history.status == '3') {
                    status_html = `<span class="fw-bold text-success">Approved</span>`;
                    amount_txt = `<span class="fw-bolder text-success"> &plus; &#8377;${history.amount}</span><br>`;
                    name_txt = `<h6>${history.transaction_remarks} </h6>`;
                }
            }
            html += `<div class="d-flex justify-content-between border rounded-2 mb-2">
                        <div class="d-flex pt-3 ps-3">
                            <svg width="68" height="68" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="37" height="37" rx="4.5" fill="#FBFBFB" stroke="#F0F0F0" />
                                <path d="M23.1666 19.5834H24.5555V20.9723H23.1666V19.5834Z" fill="#727C8E" />
                                <path
                                    d="M27.5714 13.5556H10.4286V11.4222H26.1429V10H10.4286C10.0497 10 9.68633 10.1498 9.41842 10.4166C9.15051 10.6833 9 11.045 9 11.4222V26.3556C9 26.7328 9.15051 27.0945 9.41842 27.3612C9.68633 27.6279 10.0497 27.7778 10.4286 27.7778H27.5714C27.9503 27.7778 28.3137 27.6279 28.5816 27.3612C28.8495 27.0945 29 26.7328 29 26.3556V14.9778C29 14.6006 28.8495 14.2388 28.5816 13.9721C28.3137 13.7054 27.9503 13.5556 27.5714 13.5556ZM10.4286 26.3556V14.9778H27.5714V17.1111H21.8571C21.4783 17.1111 21.1149 17.261 20.847 17.5277C20.5791 17.7944 20.4286 18.1561 20.4286 18.5333V22.8C20.4286 23.1772 20.5791 23.5389 20.847 23.8057C21.1149 24.0724 21.4783 24.2222 21.8571 24.2222H27.5714V26.3556H10.4286ZM27.5714 18.5333V22.8H21.8571V18.5333H27.5714Z"
                                    fill="#515C6F" />
                            </svg>
                            <div class="d-flex flex-column">
                                ${name_txt}
                                <small>${formatDate(history.created_at)}</small>
                            </div>
                        </div>
                        <div class="pt-3 pe-3">
                            ${amount_txt}
                            ${status_html}
                        </div>
                    </div>`;

        });
    } else {
        html = `<div class="border rounded-2 text-center mt-2 pt-3">
                    <p>No record found!</p>
                </div>`;
    }

    $('#transactionhistorydiv').html(html);
}



$('.addWalletOnlinebtn').on('click', function () {
    const walletAmount = $('.transaction_amount').val();
    if (walletAmount == '') {
        alert('Please enter amount!');
        return false;
    }
    else {

        window.location.href = "/user/addwallet/online/pay/" + walletAmount;
    }
});
