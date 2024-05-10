function getPucPageData(){

    let type = 'POST';
    let url = '/getPucPageData';
    let message = '';
    let form = '';
    let data = '';
    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', getPucPageDataResponse, '', 'submit_button');
}
function getPucPageDataResponse(response){

    var data = response.data;
    
    var puc_list = data['puc_list'];

    var html = '';
    if(puc_list.length > 0){
        $.each(puc_list, function(index, value) {
            
            html += `<div class="home-card d-flex align-items-center justify-content-between py-3 px-3 mb-4 mx-md-5 px-md-4">
                        <div class="d-flex flex-column">
                            <span class="fw-bold text-dark">
                                ${value.name}
                            </span>
                            <span class="text-dark d-flex ">${value.puc_type.name}&nbsp;-&nbsp;<b>${value.registration_number} </b></span>
                            <span class="text-dark">
                                Pulsar 150 - 8720954378
                            </span>
                            <span class="text-dark">
                                Challan (2) - 50924, 23645
                            </span>
                            <span class="diff-bg px-2 my-1">
                                26/03/2023 to 26/03/2024
                            </span>
                        </div>

                        <div class="d-flex flex-column">
                            <div class="d-flex align-items-center justify-content-end">
                                <!-- Button trigger modal -->
                                <button type="button" class="modal-btn" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    <svg width="74" height="71" viewBox="0 0 74 71" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g filter="url(#filter0_d_954_152)">
                                            <rect x="5.38458" y="3" width="63.0769" height="61" rx="5" fill="white" />
                                        </g>
                                        <path opacity="0.5" d="M47.7363 29.4336H39.4762" stroke="#515C6F"
                                            stroke-width="1.5" stroke-linecap="round" />
                                        <path opacity="0.5"
                                            d="M34.5201 18.2502H45.2582C46.0248 18.2502 46.4097 18.2502 46.7318 18.2918C47.8131 18.4297 48.8171 18.9086 49.5883 19.6544C50.3595 20.4002 50.8547 21.3712 50.9973 22.4168C51.0403 22.7284 51.0403 23.1006 51.0403 23.8419"
                                            stroke="#515C6F" stroke-width="1.5" />
                                        <path
                                            d="M21.304 24.5608C21.304 23.1501 21.304 22.4456 21.4197 21.8576C21.6662 20.5953 22.3004 19.434 23.2396 18.5255C24.1788 17.6169 25.3793 17.0032 26.6846 16.7644C27.2942 16.6526 28.0244 16.6526 29.4815 16.6526C30.1192 16.6526 30.4397 16.6526 30.7469 16.6797C32.0703 16.7999 33.3254 17.3033 34.3483 18.124C34.5862 18.3141 34.8109 18.5314 35.2635 18.9691L36.1721 19.8478C37.5202 21.1515 38.1942 21.8033 39.0004 22.2363C39.4435 22.4751 39.9136 22.6638 40.4013 22.7986C41.2901 23.0431 42.2433 23.0431 44.1481 23.0431H44.7659C49.114 23.0431 51.2897 23.0431 52.7022 24.2732C52.8327 24.3851 52.9566 24.5049 53.0723 24.6311C54.3443 25.9971 54.3443 28.1011 54.3443 32.3061V35.824C54.3443 41.8486 54.3443 44.8617 52.4081 46.7326C50.4736 48.605 47.3579 48.605 41.1282 48.605H34.5201C28.2904 48.605 25.1747 48.605 23.2402 46.7326C21.304 44.8617 21.304 41.8486 21.304 35.824V24.5608Z"
                                            stroke="#515C6F" stroke-width="1.5" />
                                        <defs>
                                            <filter id="filter0_d_954_152" x="0.384583" y="0" width="73.0769"
                                                height="71" filterUnits="userSpaceOnUse"
                                                color-interpolation-filters="sRGB">
                                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                <feColorMatrix in="SourceAlpha" type="matrix"
                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                    result="hardAlpha" />
                                                <feOffset dy="2" />
                                                <feGaussianBlur stdDeviation="2.5" />
                                                <feComposite in2="hardAlpha" operator="out" />
                                                <feColorMatrix type="matrix"
                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0" />
                                                <feBlend mode="normal" in2="BackgroundImageFix"
                                                    result="effect1_dropShadow_954_152" />
                                                <feBlend mode="normal" in="SourceGraphic"
                                                    in2="effect1_dropShadow_954_152" result="shape" />
                                            </filter>
                                        </defs>
                                    </svg>
                                </button>

                                <svg width="74" height="71" viewBox="0 0 74 71" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_954_146)">
                                        <rect x="5.07697" y="3" width="63.0769" height="61" rx="5" fill="white" />
                                    </g>
                                    <path
                                        d="M32.301 16.9749C34.0034 16.748 35.4349 17.7553 36.1122 19.0646L37.7783 22.2862C38.7026 24.0739 38.1715 26.1716 36.7706 27.4912C35.9429 28.2701 35.1111 29.16 34.6287 29.9452C34.5968 30.0012 34.5868 30.0664 34.6006 30.1289C35.0467 32.4662 36.6847 34.7756 38.1459 36.4315C38.2194 36.5105 38.3153 36.5667 38.4216 36.5933C38.528 36.6199 38.6401 36.6155 38.7439 36.5809L42.0273 35.5888C42.9117 35.3214 43.8615 35.3351 44.7373 35.6278C45.6131 35.9205 46.369 36.4768 46.8941 37.2151L49.2705 40.5582C49.9148 41.4648 50.2411 42.695 49.7471 43.878C49.306 44.9348 48.4528 46.459 46.9007 47.4727C45.29 48.5239 43.0837 48.9233 40.1968 47.9663C36.9713 46.8959 33.9241 44.2119 31.3974 40.7794C28.8558 37.3254 26.7635 33.011 25.4947 28.5121C24.2954 24.2648 25.019 21.4051 26.7222 19.5639C28.3651 17.7873 30.7192 17.185 32.301 16.9749ZM34.2645 19.9577C33.887 19.2284 33.2138 18.8681 32.5819 18.952C31.1768 19.1389 29.4174 19.6445 28.2619 20.8947C27.1666 22.0793 26.4083 24.1658 27.4854 27.9865C28.6955 32.2745 30.6878 36.3724 33.0791 39.6212C35.4853 42.8907 38.2194 45.1993 40.8659 46.0771C43.2242 46.8592 44.7399 46.4726 45.7443 45.8175C46.8065 45.1234 47.4599 44.0202 47.8316 43.1303C48.0018 42.7229 47.9283 42.1957 47.5681 41.6893L45.1917 38.3471C44.9167 37.9603 44.5209 37.6688 44.0621 37.5154C43.6034 37.362 43.1059 37.3548 42.6426 37.4947L39.3593 38.4869C38.378 38.7832 37.2728 38.5188 36.5748 37.728C35.0541 36.005 33.1163 33.3625 32.5687 30.4908C32.464 29.9526 32.5649 29.3959 32.8528 28.9243C33.4789 27.9066 34.4701 26.869 35.3283 26.0606C36.1667 25.2713 36.4046 24.0971 35.9305 23.1793L34.2645 19.9577Z"
                                        fill="#515C6F" />
                                    <defs>
                                        <filter id="filter0_d_954_146" x="0.0769653" y="0" width="73.0769" height="71"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dy="2" />
                                            <feGaussianBlur stdDeviation="2.5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_954_146" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_954_146"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </div>

                            <span class="text-end bg-o ms-2 ms-sm-5 pe-2">
                                <svg width="12" height="11" viewBox="0 0 12 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.5"
                                        d="M6 10.25C8.76142 10.25 11 8.17932 11 5.625C11 3.07068 8.76142 1 6 1C3.23858 1 1 3.07068 1 5.625C1 8.17932 3.23858 10.25 6 10.25Z"
                                        stroke="#F45D08" stroke-width="1.5" />
                                    <path d="M6 3.77502V5.62502L7.25 6.78127" stroke="#F45D08" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Processing
                            </span>
                        </div>
                    </div>`;
        });
    }else{
        html = `<div class="border rounded-2 text-center py-3 px-3 mb-4 mx-md-5 px-md-4">
                    <p>No record found!</p>
                </div>`;
    }

    $("#pucOrders_container").html(html);

    
}

$(document).on('click', '.filter_orders', function (e) {
    
    var param1 = param2 = param3 = '';
    var filterFlag = '1';

    $(".filter_orders").removeClass('active');
    $(this).addClass('active');

    param1 = $(this).attr('data-filter');

    var flag = $(".filter1_orders.active").attr('data-filter');
    if(flag == 'today'){

        param2 = moment().format('YYYY-MM-DD');
    
    }else if(flag == 'yesterday'){
    
        param2 = moment().subtract(1, 'days').format('YYYY-MM-DD');
    
    }

    console.log(param1);
    console.log(param2);
    
    
    // getUserFilteredData (filterflag, param1, param2);
});

$(document).on('click', '.filter1_orders', function (e) {
    
    var param1 = param2 = param3 = '';
    var filterFlag = '1';

    $(".filter1_orders").removeClass('active');
    $(this).addClass('active');
    
    param1 = $(".filter_orders.active").attr('data-filter');

    var flag = $(this).attr('data-filter');
    if(flag == 'today'){

        param2 = moment().format('YYYY-MM-DD');
    
    }else if(flag == 'yesterday'){
    
        param2 = moment().subtract(1, 'days').format('YYYY-MM-DD');
    
    }
    
    // getOrderFilteredData (filterflag, param1, param2);
});

var flag = false;
$(document).on('change', '#filter_dateRange', function (e) {
    if(flag){
        var param1 = param2 = param3 = '';
        var filterFlag = '2';   // for date range

        $(".filter1_orders").removeClass('active');

        param1 = $(".filter_orders.active").attr('data-filter');
        
        
        var dateString = $(this).val();
        var dateArray = dateString.split(" - ");
        // Extract start and end dates from the array
        var startDateFormatted = moment(dateArray[0], 'DD-MM-YYYY').format('YYYY-MM-DD');
        var endDateFormatted = moment(dateArray[1], 'DD-MM-YYYY').format('YYYY-MM-DD');
        
        $(".filter-btns").removeClass('active');
        $("#filter_month").val('');
        
        param2 = startDateFormatted;
        param3 = endDateFormatted;
        
        console.log(param1);
        console.log(param2);
        console.log(param3);
        // getUserFilteredData (filterflag, param1, param2, param3);
    }
    flag = true;
});







// $(document).on('click', '#puc_create_submit', function (e) {

// 	e.preventDefault();
// 	let type = 'POST';
// 	let url = '/createPucUser';
// 	let message = '';
// 	let form = $('#puc_create_form');
// 	let data = new FormData(form[0]);
	    
// 	// PASSING DATA TO FUNCTION
// 	$('[name]').removeClass('is-invalid');
// 	SendAjaxRequestToServer(type, url, data, '', resetPasswordProfileResponse, '', '.reset_pass_submit');
	
// });

// function resetPasswordProfileResponse(response) {

//     // SHOWING MESSAGE ACCORDING TO RESPONSE
//     if (response.status == 200 || response.status == '200') {
      
//         toastr.success(response.message, '', {
//             timeOut: 3000
//         });

//         let form = $('#puc_create_form');
//         form.trigger("reset");

//         $("#main_section").show();
//         $("#makePuc_section, #notification_section").hide(); 

//     } else {
        
//         if(response.status == 402){
            
//             error = response.message;

//         }else{
            
//             error = response.responseJSON.message;
//             var is_invalid = response.responseJSON.errors;
        
//             $.each(is_invalid, function(key) {
//                 // Assuming 'key' corresponds to the form field name
//                 var inputField = $('[name="' + key + '"]');
//                 var selectField = $('[name="' + key + '"]');
//                 // Add the 'is-invalid' class to the input field's parent or any desired container
//                 inputField.closest('.form-control').addClass('is-invalid');
//                 selectField.closest('.form-select').addClass('is-invalid');
//             });
//         }
    	
        
//         toastr.error(error, '', {
//             timeOut: 3000
//         });
//     }
// }



$(document).ready(function () {
    
    getPucPageData();
    
    $('#filter_dateRange').daterangepicker({
        // startDate: moment().startOf('month'),
        // endDate: moment().endOf('month'),
        autoApply: false,
        locale: {
            format: 'DD-MM-YYYY' // Set the date format
        }
    });

    $("#filter_dateRange").val('');
});

// document.getElementById('cameraIcon').addEventListener('click', function() {
//     // Trigger click event on the input field
//     document.getElementById('upload_vehicle').click();
// });
// document.getElementById('upload_vehicle').addEventListener('change', function() {
//     if (this.files.length > 0) {
//         // Get the filename of the selected file
//         var filename = this.files[0].name;
//         // Update the content of the <span> element with the filename
//         document.getElementById('picturename').innerText = filename;
//     } else {
//         // No file selected, reset the content of the <span> element
//         document.getElementById('picturename').innerText = 'Upload Vehicle Photo';
//     }
// });

// document.getElementById('challanIcon').addEventListener('click', function() {
//     // Trigger click event on the input field
//     document.getElementById('upload_challan').click();
// });
// document.getElementById('upload_challan').addEventListener('change', function() {
//     if (this.files.length > 0) {
//         // Get the filename of the selected file
//         var filename = this.files[0].name;
//         // Update the content of the <span> element with the filename
//         document.getElementById('challanName').innerText = filename;
//     } else {
//         // No file selected, reset the content of the <span> element
//         document.getElementById('challanName').innerText = 'Upload Challan Screenshot';
//     }
// });

