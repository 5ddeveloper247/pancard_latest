function getPucPageData(){

    let type = 'POST';
    let url = '/admin/getPucPageData';
    let message = '';
    let form = '';
    let data = '';
    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', getPucPageDataResponse, '', 'submit_button');
}
function getPucPageDataResponse(response){

    var data = response.data;
    
    var puc_list = data['pending_puc_list'];
    var all_puc_list = data['all_puc_list'];
    makePucPendingListing(puc_list);
    makePucOrderHistoryListing(all_puc_list);
}
function makePucPendingListing(puc_list){
    
    var html = '';
    if(puc_list.length > 0){
        $.each(puc_list, function(index, value) {
            var companyName = value.user.company_name;
            var truncatedCompanyName = companyName.length > 10 ? companyName.substring(0, 10) + '...' : companyName;

            // set dates and remaining days text
            var remainingDaysText = '';
            if(value.end_date != null){
                var startDate = moment(value.start_date, 'YYYY-MM-DD').format('DD/MM/YYYY');
                var endDate = moment(value.end_date, 'YYYY-MM-DD').format('DD/MM/YYYY');
                var daysRemaining = moment(value.end_date).diff(moment(), 'days');
                
                if (daysRemaining > 0) {
                    remainingDaysText = daysRemaining + ' days remaining';
                } else if (daysRemaining === 0) {
                    remainingDaysText = 'Today is the end date';
                } else {
                    remainingDaysText = 'Expired';
                }
            }

            html += `<div class="home-card py-1 px-2 mb-2 mx-md-0 px-md-4">
                        <div class="d-flex align-items-center justify-content-between ">
                            <div class="d-flex flex-column">
                                <span class="fw-bold text-dark">
                                ${value.name}
                                </span>
                                <span class="text-dark d-flex ">${value.puc_type.name}&nbsp;-&nbsp;<b>${value.registration_number} </b></span>
                                <span class="text-dark">
                                    ${value.model}&nbsp;-&nbsp;${value.phone_number}
                                </span>
                                <span class="text-dark">
                                Challan (${value.challan}) - ${value.engine_number}, ${value.chasis_number}
                                </span>
                                <div class="d-flex justify-content-md-center justify-content-between">
                                </div>

                            </div>

                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center justify-content-end">
                                    <!-- Button trigger modal -->

                                    <button type="button" class="modal-btn-completed py-1 px-2 ms-1">
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.6654 13.1353L19.49 7.35834L19.5638 7.27345C19.6731 7.12545 19.7258 6.94267 19.7122 6.75865C19.6987 6.57463 19.6198 6.40172 19.49 6.27165L13.6654 0.497273L13.5851 0.428048C13.1188 0.0753947 12.4323 0.414987 12.4323 1.04062V3.82266L12.1409 3.84226C7.52604 4.21058 4.82292 7.15589 4.1779 12.4979C4.095 13.1837 4.87473 13.6134 5.37986 13.1588C7.23332 11.4896 9.14895 10.4525 11.1371 10.0372C11.4557 9.97059 11.7756 9.91965 12.0982 9.88439L12.4323 9.85435V12.592L12.4388 12.6991C12.5165 13.2908 13.2276 13.569 13.6654 13.1353ZM12.2355 5.14446L13.7275 5.04389V2.38854L18.1909 6.81369L13.7275 11.2414V8.42414L11.9712 8.58349H11.9609C9.75511 8.82251 7.67369 9.71328 5.70885 11.1983C6.09482 9.44945 6.75409 8.13418 7.62059 7.19246C8.69562 6.02348 10.1981 5.30903 12.2355 5.14446ZM3.52381 1.5918C2.66503 1.5918 1.84142 1.93583 1.23417 2.54819C0.626917 3.16056 0.285767 3.9911 0.285767 4.85711V15.3061C0.285767 16.1721 0.626917 17.0027 1.23417 17.615C1.84142 18.2274 2.66503 18.5714 3.52381 18.5714H13.8856C14.7443 18.5714 15.568 18.2274 16.1752 17.615C16.7825 17.0027 17.1236 16.1721 17.1236 15.3061V14C17.1236 13.8268 17.0554 13.6607 16.9339 13.5382C16.8125 13.4157 16.6478 13.3469 16.476 13.3469C16.3042 13.3469 16.1395 13.4157 16.0181 13.5382C15.8966 13.6607 15.8284 13.8268 15.8284 14V15.3061C15.8284 15.8257 15.6237 16.324 15.2593 16.6915C14.895 17.0589 14.4008 17.2653 13.8856 17.2653H3.52381C3.00854 17.2653 2.51438 17.0589 2.15003 16.6915C1.78567 16.324 1.58098 15.8257 1.58098 15.3061V4.85711C1.58098 4.33751 1.78567 3.83918 2.15003 3.47176C2.51438 3.10434 3.00854 2.89793 3.52381 2.89793H7.40947C7.58122 2.89793 7.74595 2.82912 7.8674 2.70665C7.98885 2.58418 8.05708 2.41807 8.05708 2.24487C8.05708 2.07166 7.98885 1.90556 7.8674 1.78308C7.74595 1.66061 7.58122 1.5918 7.40947 1.5918H3.52381Z"
                                                fill="#515C6F" />
                                        </svg>
                                        <svg class="tick-icon" width="12" height="12" viewBox="0 0 12 12"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.56667 6.13333L5.76667 7.96667L8.7 4.3M6.13333 11.2667C5.45921 11.2667 4.7917 11.1339 4.16889 10.8759C3.54609 10.6179 2.98019 10.2398 2.50352 9.76315C2.02684 9.28647 1.64873 8.72058 1.39075 8.09777C1.13278 7.47497 1 6.80745 1 6.13333C1 5.45921 1.13278 4.7917 1.39075 4.16889C1.64873 3.54609 2.02684 2.98019 2.50352 2.50352C2.98019 2.02684 3.54609 1.64873 4.16889 1.39075C4.7917 1.13278 5.45921 1 6.13333 1C7.49478 1 8.80046 1.54083 9.76315 2.50352C10.7258 3.46621 11.2667 4.77189 11.2667 6.13333C11.2667 7.49478 10.7258 8.80046 9.76315 9.76315C8.80046 10.7258 7.49478 11.2667 6.13333 11.2667Z"
                                                stroke="#0D9E00" />
                                        </svg>
                                    </button>
                                    <button type="button" class="modal-btn-completed uploadPdf_btn py-1 px-2 ms-1" data-id="${value.id}" data-file="${value.certificate_pdf}">
                                        <svg width="22" height="21" viewBox="0 0 22 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.0001 13.1714V1.28571M11.0001 1.28571L13.9144 4.48571M11.0001 1.28571L8.08582 4.48571"
                                                stroke="#515C6F" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M7.11434 19.5714H14.8858C17.633 19.5714 19.0075 19.5714 19.8605 18.7687C20.7143 17.9641 20.7143 16.6722 20.7143 14.0857V13.1714C20.7143 10.5858 20.7143 9.29305 19.8605 8.48939C19.1144 7.78722 17.9701 7.69853 15.8572 7.68756M6.14291 7.68756C4.03005 7.69853 2.88571 7.78722 2.13965 8.48939C1.28577 9.29305 1.28577 10.5858 1.28577 13.1714V14.0857C1.28577 16.6722 1.28577 17.965 2.13965 18.7687C2.43108 19.043 2.78274 19.2231 3.22862 19.342"
                                                stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" />
                                        </svg>
                                        <svg class="tick-icon" width="12" height="12" viewBox="0 0 12 12"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.56667 6.13333L5.76667 7.96667L8.7 4.3M6.13333 11.2667C5.45921 11.2667 4.7917 11.1339 4.16889 10.8759C3.54609 10.6179 2.98019 10.2398 2.50352 9.76315C2.02684 9.28647 1.64873 8.72058 1.39075 8.09777C1.13278 7.47497 1 6.80745 1 6.13333C1 5.45921 1.13278 4.7917 1.39075 4.16889C1.64873 3.54609 2.02684 2.98019 2.50352 2.50352C2.98019 2.02684 3.54609 1.64873 4.16889 1.39075C4.7917 1.13278 5.45921 1 6.13333 1C7.49478 1 8.80046 1.54083 9.76315 2.50352C10.7258 3.46621 11.2667 4.77189 11.2667 6.13333C11.2667 7.49478 10.7258 8.80046 9.76315 9.76315C8.80046 10.7258 7.49478 11.2667 6.13333 11.2667Z"
                                                stroke="#0D9E00" />
                                        </svg>
                                    </button>
                                    <button type="button" class="modal-btn-completed showUploadsModal_btn py-1 px-2 ms-1" data-challan-ss="${value.challan_image}" data-vehicle-img="${value.vehicle_image}" data-puc-id="${value.id}">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.5" d="M18.8571 11.3333H13.619" stroke="#515C6F"
                                                stroke-width="1.5" stroke-linecap="round" />
                                            <path opacity="0.5"
                                                d="M10.4762 3.99994H17.2857C17.7718 3.99994 18.0159 3.99994 18.2202 4.02718C18.9059 4.1176 19.5426 4.43168 20.0316 4.92072C20.5206 5.40976 20.8347 6.04646 20.9252 6.73213C20.9524 6.93641 20.9524 7.18051 20.9524 7.66661"
                                                stroke="#515C6F" stroke-width="1.5" />
                                            <path
                                                d="M2.09521 8.13805C2.09521 7.213 2.09521 6.751 2.16855 6.36547C2.32488 5.53769 2.72707 4.77624 3.32266 4.18046C3.91825 3.58469 4.67957 3.18225 5.50731 3.02566C5.89388 2.95233 6.35693 2.95233 7.28093 2.95233C7.68531 2.95233 7.88855 2.95233 8.08341 2.97014C8.9226 3.04895 9.71852 3.379 10.3672 3.91719C10.5181 4.04186 10.6605 4.18433 10.9476 4.47138L11.5238 5.04757C12.3786 5.90243 12.8061 6.32986 13.3173 6.61376C13.5983 6.77037 13.8964 6.89411 14.2057 6.98252C14.7693 7.14281 15.3738 7.14281 16.5817 7.14281H16.9735C19.7308 7.14281 21.1105 7.14281 22.0063 7.94947C22.089 8.02281 22.1676 8.10138 22.2409 8.18414C23.0476 9.07986 23.0476 10.4596 23.0476 13.2169V15.5238C23.0476 19.4743 23.0476 21.4501 21.8198 22.6769C20.593 23.9047 18.6172 23.9047 14.6666 23.9047H10.4762C6.5256 23.9047 4.54979 23.9047 3.32302 22.6769C2.09521 21.4501 2.09521 19.4743 2.09521 15.5238V8.13805Z"
                                                stroke="#515C6F" stroke-width="1.5" />
                                        </svg>

                                        <svg class="tick-icon" width="12" height="12" viewBox="0 0 12 12"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.56667 6.13333L5.76667 7.96667L8.7 4.3M6.13333 11.2667C5.45921 11.2667 4.7917 11.1339 4.16889 10.8759C3.54609 10.6179 2.98019 10.2398 2.50352 9.76315C2.02684 9.28647 1.64873 8.72058 1.39075 8.09777C1.13278 7.47497 1 6.80745 1 6.13333C1 5.45921 1.13278 4.7917 1.39075 4.16889C1.64873 3.54609 2.02684 2.98019 2.50352 2.50352C2.98019 2.02684 3.54609 1.64873 4.16889 1.39075C4.7917 1.13278 5.45921 1 6.13333 1C7.49478 1 8.80046 1.54083 9.76315 2.50352C10.7258 3.46621 11.2667 4.77189 11.2667 6.13333C11.2667 7.49478 10.7258 8.80046 9.76315 9.76315C8.80046 10.7258 7.49478 11.2667 6.13333 11.2667Z"
                                                stroke="#0D9E00" />
                                        </svg>
                                    </button>
                                </div>

                            </div>
                        </div>
                        <div class="d-flex flex-nowrap justify-content-between">
                            <div>
                                <span class="diff-bg px-2 py-1 mr-1 my-1 text-primary text-nowrap" onclick="getUserInfo(${value.user.id})">
                                    <b>${value.user.username}</b>(${truncatedCompanyName})
                                </span>
                            </div>
                            <div class="d-flex flex-nowrap">
                                <select class="form-select pending-dropdown py-0 my-1 ms-2 reasonSelect_txt" id="" style=""><!-- width: 180px; -->
                                    <option value="">Choose Reason</option>
                                    <option value="Photo not clear">Photo not clear</option>
                                    <option value="Vehicle Not found">Vehicle Not found</option>
                                    <option value="Fine not paid">Fine not paid</option>
                                    <option value="Wrong vehicle selected">Wrong vehicle selected</option>
                                </select>
                                <span class="states-btns ms-1 my-1 text-white text-nowrap">
                                    <button type="button" class="btn action-btns btn-danger px-2 py-0 rejectPuc_btn" data-id="${value.id}" data-reason="${value.id}">
                                        Reject
                                    </button>
                                </span>
                                <span class="states-btns ms-1 my-1 text-white text-nowrap">
                                    <button type="button" class="btn action-btns btn-primary px-2 py-0 completePuc_btn" data-id="${value.id}"  data-registration="${value.registration_number}" data-model="${value.model}">
                                        Complete
                                    </button>
                                </span>
                            </div>
                        </div>
                        ${value.start_date != null ? `<div class="d-flex flex-nowrap justify-content-between">
                                                        <div> <span class="diff-bg-date px-2 my-1">
                                                                ${startDate} to ${endDate}
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <span class="diff-bg-date px-2 my-1">${remainingDaysText}</span>
                                                        </div>
                                                    </div>` : ""}
                    </div>`;
        });
    }else{
        html = `<div class="border rounded-2 text-center py-3 px-3 mb-4 mx-md-5 px-md-4">
                    <p>No record found!</p>
                </div>`;
    }

    $("#pendingPuc_container").html(html);
    
}

function makePucOrderHistoryListing(puc_list){

    var html = '';
    if(puc_list.length > 0){
        $.each(puc_list, function(index, value) {
            var companyName = value.user.company_name;
            var truncatedCompanyName = companyName.length > 10 ? companyName.substring(0, 10) + '...' : companyName;

            // set dates and remaining days text
            var remainingDaysText = '';
            if(value.end_date != null){
                var startDate = moment(value.start_date, 'YYYY-MM-DD').format('DD/MM/YYYY');
                var endDate = moment(value.end_date, 'YYYY-MM-DD').format('DD/MM/YYYY');
                var daysRemaining = moment(value.end_date).diff(moment(), 'days');
                
                if (daysRemaining > 0) {
                    remainingDaysText = daysRemaining + ' days remaining';
                } else if (daysRemaining === 0) {
                    remainingDaysText = 'Today is the end date';
                } else {
                    remainingDaysText = 'Expired';
                }
            }
           

            html += `<div class="home-card py-1 px-2 mb-2 mx-md-0 px-md-4" >
                        <div class="d-flex align-items-center justify-content-between ">
                            <div class="d-flex flex-column">
                                <span class="fw-bold text-dark">
                                    ${value.name}
                                </span>
                                <span class="text-dark d-flex ">${value.puc_type.name}&nbsp;-&nbsp;<b>${value.registration_number}</b></span>
                                <span class="text-dark">
                                    ${value.model}&nbsp;-&nbsp;${value.phone_number}
                                </span>
                                <span class="text-dark">
                                    Challan (${value.challan}) - ${value.engine_number}, ${value.chasis_number}
                                </span>
                                <div class="d-flex justify-content-md-center justify-content-between"></div>

                            </div>

                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center justify-content-end">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="modal-btn-neutral py-1 px-2">
                                        <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11 7.82864L11 19.7144M11 19.7144L8.08567 16.5144M11 19.7144L13.9142 16.5144"
                                                stroke="#515C6F" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M14.8857 1.42861L7.11423 1.42861C4.36703 1.42861 2.99246 1.42862 2.13955 2.23136C1.28566 3.03593 1.28566 4.32782 1.28566 6.91433L1.28566 7.82862C1.28566 10.4142 1.28566 11.707 2.13955 12.5107C2.8856 13.2128 4.02995 13.3015 6.1428 13.3125M15.8571 13.3125C17.9699 13.3015 19.1143 13.2128 19.8603 12.5107C20.7142 11.707 20.7142 10.4142 20.7142 7.82861L20.7142 6.91433C20.7142 4.32781 20.7142 3.03501 19.8603 2.23136C19.5689 1.95707 19.2173 1.77696 18.7714 1.6581"
                                                stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" />
                                        </svg>
                                    </button>
                                    <button type="button" class="modal-btn-neutral py-1 px-2 ms-1">
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.6654 13.1353L19.49 7.35834L19.5638 7.27345C19.6731 7.12545 19.7258 6.94267 19.7122 6.75865C19.6987 6.57463 19.6198 6.40172 19.49 6.27165L13.6654 0.497273L13.5851 0.428048C13.1188 0.0753947 12.4323 0.414987 12.4323 1.04062V3.82266L12.1409 3.84226C7.52604 4.21058 4.82292 7.15589 4.1779 12.4979C4.095 13.1837 4.87473 13.6134 5.37986 13.1588C7.23332 11.4896 9.14895 10.4525 11.1371 10.0372C11.4557 9.97059 11.7756 9.91965 12.0982 9.88439L12.4323 9.85435V12.592L12.4388 12.6991C12.5165 13.2908 13.2276 13.569 13.6654 13.1353ZM12.2355 5.14446L13.7275 5.04389V2.38854L18.1909 6.81369L13.7275 11.2414V8.42414L11.9712 8.58349H11.9609C9.75511 8.82251 7.67369 9.71328 5.70885 11.1983C6.09482 9.44945 6.75409 8.13418 7.62059 7.19246C8.69562 6.02348 10.1981 5.30903 12.2355 5.14446ZM3.52381 1.5918C2.66503 1.5918 1.84142 1.93583 1.23417 2.54819C0.626917 3.16056 0.285767 3.9911 0.285767 4.85711V15.3061C0.285767 16.1721 0.626917 17.0027 1.23417 17.615C1.84142 18.2274 2.66503 18.5714 3.52381 18.5714H13.8856C14.7443 18.5714 15.568 18.2274 16.1752 17.615C16.7825 17.0027 17.1236 16.1721 17.1236 15.3061V14C17.1236 13.8268 17.0554 13.6607 16.9339 13.5382C16.8125 13.4157 16.6478 13.3469 16.476 13.3469C16.3042 13.3469 16.1395 13.4157 16.0181 13.5382C15.8966 13.6607 15.8284 13.8268 15.8284 14V15.3061C15.8284 15.8257 15.6237 16.324 15.2593 16.6915C14.895 17.0589 14.4008 17.2653 13.8856 17.2653H3.52381C3.00854 17.2653 2.51438 17.0589 2.15003 16.6915C1.78567 16.324 1.58098 15.8257 1.58098 15.3061V4.85711C1.58098 4.33751 1.78567 3.83918 2.15003 3.47176C2.51438 3.10434 3.00854 2.89793 3.52381 2.89793H7.40947C7.58122 2.89793 7.74595 2.82912 7.8674 2.70665C7.98885 2.58418 8.05708 2.41807 8.05708 2.24487C8.05708 2.07166 7.98885 1.90556 7.8674 1.78308C7.74595 1.66061 7.58122 1.5918 7.40947 1.5918H3.52381Z"
                                                fill="#515C6F" />
                                        </svg>
                                    </button>
                                    <button type="button" class="modal-btn-completed uploadPdf_btn py-1 px-2 ms-1" data-id="${value.id}" data-file="${value.certificate_pdf}">
                                        <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.0001 13.1714V1.28571M11.0001 1.28571L13.9144 4.48571M11.0001 1.28571L8.08582 4.48571"
                                                stroke="#515C6F" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M7.11434 19.5714H14.8858C17.633 19.5714 19.0075 19.5714 19.8605 18.7687C20.7143 17.9641 20.7143 16.6722 20.7143 14.0857V13.1714C20.7143 10.5858 20.7143 9.29305 19.8605 8.48939C19.1144 7.78722 17.9701 7.69853 15.8572 7.68756M6.14291 7.68756C4.03005 7.69853 2.88571 7.78722 2.13965 8.48939C1.28577 9.29305 1.28577 10.5858 1.28577 13.1714V14.0857C1.28577 16.6722 1.28577 17.965 2.13965 18.7687C2.43108 19.043 2.78274 19.2231 3.22862 19.342"
                                                stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" />
                                        </svg>
                                        <svg class="tick-icon" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.56667 6.13333L5.76667 7.96667L8.7 4.3M6.13333 11.2667C5.45921 11.2667 4.7917 11.1339 4.16889 10.8759C3.54609 10.6179 2.98019 10.2398 2.50352 9.76315C2.02684 9.28647 1.64873 8.72058 1.39075 8.09777C1.13278 7.47497 1 6.80745 1 6.13333C1 5.45921 1.13278 4.7917 1.39075 4.16889C1.64873 3.54609 2.02684 2.98019 2.50352 2.50352C2.98019 2.02684 3.54609 1.64873 4.16889 1.39075C4.7917 1.13278 5.45921 1 6.13333 1C7.49478 1 8.80046 1.54083 9.76315 2.50352C10.7258 3.46621 11.2667 4.77189 11.2667 6.13333C11.2667 7.49478 10.7258 8.80046 9.76315 9.76315C8.80046 10.7258 7.49478 11.2667 6.13333 11.2667Z"
                                                stroke="#0D9E00" />
                                        </svg>
                                    </button>
                                    <button type="button" class="modal-btn-completed showUploadsModal_btn py-1 px-2 ms-1" data-challan-ss="${value.challan_image}" data-vehicle-img="${value.vehicle_image}" data-puc-id="${value.id}">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.5" d="M18.8571 11.3333H13.619" stroke="#515C6F"
                                                stroke-width="1.5" stroke-linecap="round" />
                                            <path opacity="0.5"
                                                d="M10.4762 3.99994H17.2857C17.7718 3.99994 18.0159 3.99994 18.2202 4.02718C18.9059 4.1176 19.5426 4.43168 20.0316 4.92072C20.5206 5.40976 20.8347 6.04646 20.9252 6.73213C20.9524 6.93641 20.9524 7.18051 20.9524 7.66661"
                                                stroke="#515C6F" stroke-width="1.5" />
                                            <path
                                                d="M2.09521 8.13805C2.09521 7.213 2.09521 6.751 2.16855 6.36547C2.32488 5.53769 2.72707 4.77624 3.32266 4.18046C3.91825 3.58469 4.67957 3.18225 5.50731 3.02566C5.89388 2.95233 6.35693 2.95233 7.28093 2.95233C7.68531 2.95233 7.88855 2.95233 8.08341 2.97014C8.9226 3.04895 9.71852 3.379 10.3672 3.91719C10.5181 4.04186 10.6605 4.18433 10.9476 4.47138L11.5238 5.04757C12.3786 5.90243 12.8061 6.32986 13.3173 6.61376C13.5983 6.77037 13.8964 6.89411 14.2057 6.98252C14.7693 7.14281 15.3738 7.14281 16.5817 7.14281H16.9735C19.7308 7.14281 21.1105 7.14281 22.0063 7.94947C22.089 8.02281 22.1676 8.10138 22.2409 8.18414C23.0476 9.07986 23.0476 10.4596 23.0476 13.2169V15.5238C23.0476 19.4743 23.0476 21.4501 21.8198 22.6769C20.593 23.9047 18.6172 23.9047 14.6666 23.9047H10.4762C6.5256 23.9047 4.54979 23.9047 3.32302 22.6769C2.09521 21.4501 2.09521 19.4743 2.09521 15.5238V8.13805Z"
                                                stroke="#515C6F" stroke-width="1.5" />
                                        </svg>

                                        <svg class="tick-icon" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.56667 6.13333L5.76667 7.96667L8.7 4.3M6.13333 11.2667C5.45921 11.2667 4.7917 11.1339 4.16889 10.8759C3.54609 10.6179 2.98019 10.2398 2.50352 9.76315C2.02684 9.28647 1.64873 8.72058 1.39075 8.09777C1.13278 7.47497 1 6.80745 1 6.13333C1 5.45921 1.13278 4.7917 1.39075 4.16889C1.64873 3.54609 2.02684 2.98019 2.50352 2.50352C2.98019 2.02684 3.54609 1.64873 4.16889 1.39075C4.7917 1.13278 5.45921 1 6.13333 1C7.49478 1 8.80046 1.54083 9.76315 2.50352C10.7258 3.46621 11.2667 4.77189 11.2667 6.13333C11.2667 7.49478 10.7258 8.80046 9.76315 9.76315C8.80046 10.7258 7.49478 11.2667 6.13333 11.2667Z"
                                                stroke="#0D9E00" />
                                        </svg>
                                    </button>
                                </div>

                            </div>
                        </div>
                        <div class="d-flex flex-nowrap justify-content-between">
                            <div>
                                <span class="diff-bg px-2 py-1 mr-1 my-1 text-primary text-nowrap" onclick="getUserInfo(${value.user.id})" style="cursor:pointer;">
                                    <b>${value.user.username}</b>(${truncatedCompanyName})
                                </span>
                            </div>
                            <div class="d-flex flex-nowrap ${value.status == '1' ? 'd-block' : 'd-none'}">
                                <select class="form-select pending-dropdown py-0 my-1 ms-2 reasonSelect_txt" id="" style=""><!-- width: 180px; -->
                                    <option value="">Choose Reason</option>
                                    <option value="Photo not clear">Photo not clear</option>
                                    <option value="Vehicle Not found">Vehicle Not found</option>
                                    <option value="Fine not paid">Fine not paid</option>
                                    <option value="Wrong vehicle selected">Wrong vehicle selected</option>
                                </select>
                                <span class="states-btns ms-1 my-1 text-white text-nowrap">
                                    <button type="button" class="btn action-btns btn-danger px-2 py-0 rejectPuc_btn" data-id="${value.id}" data-reason="${value.id}">
                                        Reject
                                    </button>
                                </span>
                                <span class="states-btns ms-1 my-1 text-white text-nowrap">
                                    <button type="button" class="btn action-btns btn-primary px-2 py-0 completePuc_btn" data-id="${value.id}"  data-registration="${value.registration_number}" data-model="${value.model}">
                                        Complete
                                    </button>
                                </span>
                            </div>
                            <div class="d-flex flex-nowrap ${value.status == '3' ? 'd-block' : 'd-none'}">
                                <span class="states-btns  ms-1 my-1 text-nowrap" style="color:red;">
                                    Rejected, Reason: ${value.rejection_reason}
                                </span>
                            </div>
                            <div class="d-flex flex-nowrap ${value.status == '4' ? 'd-block' : 'd-none'}">
                                <span class="states-btns  ms-1 my-1 text-nowrap" style="color:green;">
                                    Completed
                                </span>
                            </div>
                        </div>
                        ${value.start_date != null ? `<div class="d-flex flex-nowrap justify-content-between">
                                                        <div> <span class="diff-bg-date px-2 my-1">
                                                                ${startDate} to ${endDate}
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <span class="diff-bg-date px-2 my-1">${remainingDaysText}</span>
                                                        </div>
                                                    </div>` : ""}
                        
                    </div>`;
        });
    }else{
        html = `<div class="border rounded-2 text-center py-3 px-3 mb-4 mx-md-5 px-md-4">
                    <p>No record found!</p>
                </div>`;
    }

    $("#orderHistory_container").html(html);
    
}



$(document).on('click', '.showUploadsModal_btn', function (e) {
    
    var puc_id = $(this).attr('data-puc-id');
    var vehicleImg = $(this).attr('data-vehicle-img');
    var challanImg = $(this).attr('data-challan-ss');
    
    
    $("#puc_vehicle_img").attr('src', vehicleImg)
    $("#puc_challan_img").attr('src', challanImg)

    $("#uploadsModal").modal('show');
});

var tempPucId = '';
$(document).on('click', '.completePuc_btn', function (e) {
    
    var puc_id = $(this).attr('data-id');
    var registration_number = $(this).attr('data-registration');
    var model = $(this).attr('data-model');

    tempPucId = puc_id;

    $("#approvePucModelName_txt").html('<b>'+registration_number+',</b>&nbsp;'+model);

    $("#completeConfirmModal").modal('show');
});

$(document).on('click', '.rejectPuc_btn', function (e) {
    
    var statusFlag = '3';
    var puc_id = $(this).attr('data-id');

    tempPucId = puc_id;
    // Find the parent section of the button
    var section = $(this).closest('div');
    var select = section.find('.reasonSelect_txt');
    var selectedReason = select.val();

    if(selectedReason != ''){
        var param1 =  selectedReason;

        changePucStatus(statusFlag, param1);
    }else{
        toastr.error('Choose reason first!', '', {
            timeOut: 3000
        });
    }
});

function changePucStatus(statusFlag, param1=''){

    if(tempPucId != ''){
        let type = 'POST';
        let url = '/admin/changePucStatus';
        let message = '';
        let form = '';
        let data = new FormData();
        data.append('pucId', tempPucId);
        data.append('statusFlag', statusFlag);
        data.append('param1', param1);param1
        // PASSING DATA TO FUNCTION
        SendAjaxRequestToServer(type, url, data, '', changePucStatusResponse, '', 'submit_button');
    }else{
        toastr.error('Something went wrong!', '', {
            timeOut: 3000
        });
    }
}
function changePucStatusResponse(response){

    toastr.success(response.message, '', {
        timeOut: 3000
    });

    var data = response.data;
    
    tempPucId = '';
    
    $("#completeConfirmModal").modal('hide');

    getPucPageData();
}







$(document).on('click', '.filter_today', function (e) {
    
    $(".filter-btns").removeClass('active');
    $(".filter_today").addClass('active');
    $("#filter_month").val('');

    var param1 = moment().format('YYYY-MM-DD');
    var param2 = '';
    var filterflag = '1';
    getOrderHistoryFilteredData (filterflag, param1, param2);
});

$(document).on('click', '.filter_yesterday', function (e) {
    
    $(".filter-btns").removeClass('active');
    $(".filter_yesterday").addClass('active');
    $("#filter_month").val('');

    var param1 = moment().subtract(1, 'days').format('YYYY-MM-DD');
    var param2 = '';
    var filterflag = '2';
    getOrderHistoryFilteredData (filterflag, param1, param2);
});

$(document).on('change', '#filter_month', function (e) {

    $(".filter-btns").removeClass('active');
    var param1 = $(this).val();
    var param2 = '';
    var filterflag = '3';
    getOrderHistoryFilteredData (filterflag, param1, param2);
    
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
        var filterflag = '4';
        getOrderHistoryFilteredData (filterflag, param1, param2);
    }
    flag = true;
});

function getOrderHistoryFilteredData (filterFlag, param1='', param2='' ) {
    
    let type = 'POST';
    let url = '/admin/getOrderHistoryFilteredData';
    let message = '';
    let form = '';
    let data = new FormData();
    data.append("filterFlag", filterFlag);
    data.append("param1", param1);
    data.append("param2", param2);
    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', getOrderHistoryFilteredDataResponse, '', 'submit_button');
}

function getOrderHistoryFilteredDataResponse(response){

    var data = response.data;
    var all_puc_list = data['all_puc_list'];
    
    makePucOrderHistoryListing(all_puc_list);
}

$(document).on('click', '.closeConfirmModal', function (e) {
    
    $("#approvePucModelName_txt").html('');

    tempPucId = '';

    $("#completeConfirmModal").modal('hide');
    
});

function getUserInfo(user_id){

    let type = 'POST';
    let url = '/admin/getUserInfoData';
    let message = '';
    let form = '';
    let data = new FormData();
    data.append("user_id", user_id);
    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', getUserInfoDataResponse, '', 'submit_button');
}

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

$(document).on('click', '.uploadPdf_btn', function (e) {
    
    var puc_id = $(this).attr('data-id');
    var pdf_file = $(this).attr('data-file');
    
    if(pdf_file == 'null'){
        tempPucId = puc_id;

        let form = $('#uploadPdf_form');
        form.trigger("reset");

        $("#certificateFile_txt").text(pdf_file != 'null' ? pdf_file : 'No File Uploaded!');
        $("#filename").text('Click here to upload file');
        
        $("#uploadPdfModal").modal('show');
    }else{
        toastr.error('File already uploaded!', '', {
            timeOut: 3000
        });
    }
});

$(document).on('click', '#uploadPdf_submit', function (e) {

	e.preventDefault();
	let type = 'POST';
	let url = '/admin/uploadPucPdfFile';
	let message = '';
	let form = $('#uploadPdf_form');
	let data = new FormData(form[0]);
    data.append('puc_id', tempPucId);
	    
	// PASSING DATA TO FUNCTION
	$('[name]').removeClass('is-invalid');
	SendAjaxRequestToServer(type, url, data, '', uploadPucPdfFileResponse, '', '#uploadPdf_submit1');
	
});

function uploadPucPdfFileResponse(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
      
        toastr.success(response.message, '', {
            timeOut: 3000
        });

        let form = $('#uploadPdf_form');
        form.trigger("reset");

        tempPucId = '';

        $("#filename").text('Click here to upload file');

        $("#uploadPdfModal").modal('hide');

        getPucPageData();
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

$(document).on('click', '#uploadBulk_submit', function (e) {

	e.preventDefault();
	let type = 'POST';
	let url = '/admin/uploadExcelBulkForm';
	let message = '';
	let form = $('#uploadBulk_form');
	let data = new FormData(form[0]);
	    
	// PASSING DATA TO FUNCTION
	$('[name]').removeClass('is-invalid');
    $("#bulkUpload_container").html('<p class="text-center">Processing...</p>');
	SendAjaxRequestToServer(type, url, data, '', uploadBulkResponse, '', '#uploadBulk_submit');
	
});

function uploadBulkResponse(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
      
        toastr.success(response.message, '', {
            timeOut: 3000
        });

        var data = response.data;
        
        let form = $('#uploadBulk_form');
        form.trigger("reset");

        $("#filename1").text('Click here to upload file');
        $("#uploadBulk_submit").prop('disabled', true);

        makeBulkUploadResponseList(data);
        getPucPageData();

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
        $("#bulkUpload_container").html('');
        toastr.error(error, '', {
            timeOut: 3000
        });
    }
}

function makeBulkUploadResponseList(responseList){

    var html = '';
    if(responseList.length > 0){
        $.each(responseList, function(index, value) {
            

            html += `<div class="row justify-content-around line-div">
                        <span class="col-8 d-flex justify-content-center">${value.name}</span>
                        <span class="col-4 d-flex justify-content-center bulk-order-status ${value.error == '200' ? 'record-success' : 'record-failed'}">${value.msg}</span>
                    </div>`;
            
            
        });
    }
    $("#bulkUpload_container").html(html);
}

$(document).on('click', '.bulkupload-reset', function (e) {

    let form = $('#uploadBulk_form');
    form.trigger("reset");
	    
    $("#filename1").text('Click here to upload file');  
    $("#bulkUpload_container").html('');

    $("#uploadBulkIcon").addClass('bulk-upload-width');
    $("#uploadBulkIcon").addClass('border');
    $("#uploadBulkIcon").removeClass('bulk-upload-selected-width');
    $("#uploadBulk_submit").prop('disabled', true);
});

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


document.getElementById('uploadIcon').addEventListener('click', function() {
    // Trigger click event on the input field
    document.getElementById('uploadFile').click();
});
document.getElementById('uploadFile').addEventListener('change', function() {
    if (this.files.length > 0) {
        // Get the filename of the selected file
        var filename = this.files[0].name;
        // Update the content of the <span> element with the filename
        document.getElementById('filename').innerText = filename;
    } else {
        // No file selected, reset the content of the <span> element
        document.getElementById('filename').innerText = 'Click here to upload file';
    }
});

document.getElementById('uploadBulkIcon').addEventListener('click', function() {
    // Trigger click event on the input field
    document.getElementById('uploadBilkFile').click();
});
document.getElementById('uploadBilkFile').addEventListener('change', function() {
    if (this.files.length > 0) {
        // Get the filename of the selected file
        var filename = this.files[0].name;
        // Update the content of the <span> element with the filename
        document.getElementById('filename1').innerText = filename;
        
        $("#uploadBulkIcon").removeClass('bulk-upload-width');
        $("#uploadBulkIcon").removeClass('border');
        $("#uploadBulkIcon").addClass('bulk-upload-selected-width');
        $("#uploadBulk_submit").prop('disabled', false);
    } else {
        // No file selected, reset the content of the <span> element
        document.getElementById('filename1').innerText = 'Click here to upload file';
        
        $("#uploadBulkIcon").addClass('bulk-upload-width');
        $("#uploadBulkIcon").addClass('border');
        $("#uploadBulkIcon").removeClass('bulk-upload-selected-width');
        $("#uploadBulk_submit").prop('disabled', true);
    }
    
});