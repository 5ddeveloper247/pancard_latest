@extends('layouts.master.admin_template.master')

@section('content')
<style>
    .copy-icon{
        cursor: pointer;
    }
</style>
    <!-- =====WALLET-TAB====== -->
    <section>
        <ul class="nav nav-pills d-flex flex-nowrap align-items-center justify-content-between gap-0 gap-md-1 my-3 tab-padding"
            id="pills-tab" role="tablist">
            <li class="nav-item px-1" role="presentation">
                <button id="nav-sub-links" id="wallet-pending"
                    class="wallet-pending nav-link text-nowrap px-2 px-md-3 active d-flex flex-column align-items-center justify-content-center"
                    id="pills-wallet-pending-tab" data-bs-toggle="pill" data-bs-target="#pills-wallet-pending" type="button"
                    role="tab" aria-controls="pills-wallet-pending" aria-selected="true">
                    Pending
                </button>
            </li>
            <li class="nav-item px-1" role="presentation">
                <button id="nav-sub-links" id="wallet-history"
                    class="wallet-history nav-link text-nowrap px-2 px-md-3  d-flex flex-column align-items-center justify-content-center"
                    id="pills-wallet-history-tab" data-bs-toggle="pill" data-bs-target="#pills-wallet-history"
                    type="button" role="tab" aria-controls="pills-wallet-history" aria-selected="false">
                    Wallet History
                </button>
            </li>
            <li class="nav-item px-1" role="presentation">
                <button id="nav-sub-links" id="add-list-option"
                    class="add-list-option nav-link text-nowrap px-2 px-md-3  d-flex flex-column align-items-center justify-content-center"
                    id="pills-list-options-tab" data-bs-toggle="pill" data-bs-target="#pills-list-options" type="button"
                    role="tab" aria-controls="pills-list-options" aria-selected="false">
                    Add/List option
                </button>
            </li>
            <form class="d-flex order-search-bar px-1" role="search"action="javascript:;">
                <input class="form-control search-form" type="search" id="searchInListing" placeholder="Search" aria-label="Search">
                <button class="order-search-btn p-0" type="submit">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13 13L10.1047 10.1047M10.1047 10.1047C10.6 9.60945 10.9928 9.0215 11.2608 8.37442C11.5289 7.72734 11.6668 7.0338 11.6668 6.33341C11.6668 5.63302 11.5289 4.93948 11.2608 4.2924C10.9928 3.64532 10.6 3.05737 10.1047 2.56212C9.60945 2.06687 9.0215 1.67401 8.37442 1.40598C7.72734 1.13795 7.0338 1 6.33341 1C5.63302 1 4.93948 1.13795 4.2924 1.40598C3.64532 1.67401 3.05737 2.06687 2.56212 2.56212C1.56191 3.56233 1 4.9189 1 6.33341C1 7.74792 1.56191 9.10449 2.56212 10.1047C3.56233 11.1049 4.9189 11.6668 6.33341 11.6668C7.74792 11.6668 9.10449 11.1049 10.1047 10.1047Z"
                            stroke="#D9D9D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </form>
        </ul>
        {{-- pending tab start --}}
        <div id="wallet-pending-content">
            
        </div>
        {{-- pending tab end --}}
        <div id="wallet-history-content" style="display: none;">
        <ul class="nav nav-pills d-flex flex-nowrap align-items-center justify-content-between gap-0 gap-md-3 my-3"
                id="" role="tablist">
                <li class="nav-item" role="presentation">
                    <button id="nav-sub-links-for-days"
                        class="nav-link filter-btns filter_today text-nowrap px-3 d-flex flex-column align-items-center justify-content-center"
                        data-bs-toggle="pill" data-bs-target="#pills-today" type="button"
                        role="tab" aria-controls="pills-today" aria-selected="true">
                        Today
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="nav-sub-links-for-days"
                        class="nav-link filter-btns filter_yesterday text-nowrap px-3 d-flex flex-column align-items-center justify-content-center"
                        data-bs-toggle="pill" data-bs-target="#pills-yesterday" type="button"
                        role="tab" aria-controls="pills-yesterday" aria-selected="false">
                        Yesterday
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <select class="form-select months-dropdown" id="filter_month">
                        <option value="">Choose Month</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </li>
                <li class="nav-item" role="presentation">
                    <!-- <button id="nav-sub-links-for-days"
                        class="dateRangePickerBtn nav-link text-nowrap px-4 px-md-5  d-flex flex-column align-items-center justify-content-center"
                        data-bs-toggle="pill" data-bs-target="#pills-date-range" type="button"
                        role="tab" aria-controls="pills-date-range" aria-selected="false">
                        Date Range
                    </button> -->
                    <input type="text" id="filter_dateRange" class="form-control" placeholder="Choose Range" readonly style="display:block;font-size:12px;padding: .485rem .75rem;"/>
                </li>
            </ul>
            <div id="walletHistoryDiv">

            </div>
            
            
            



        </div>
        <div id="add-list-option" style="display: none;">
            <!-- <ul class="nav nav-pills d-flex flex-nowrap align-items-center justify-content-between gap-0 gap-md-1 my-3"
                id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button id="nav-sub-links-for-days"
                        class="nav-link text-nowrap px-3 active d-flex flex-column align-items-center justify-content-center"
                        id="pills-today-tab" data-bs-toggle="pill" data-bs-target="#pills-today" type="button"
                        role="tab" aria-controls="pills-today" aria-selected="true">
                        Today
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="nav-sub-links-for-days"
                        class="nav-link text-nowrap px-3 d-flex flex-column align-items-center justify-content-center"
                        id="pills-yesterday-tab" data-bs-toggle="pill" data-bs-target="#pills-yesterday" type="button"
                        role="tab" aria-controls="pills-yesterday" aria-selected="false">
                        Yesterday
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <select class="form-select months-dropdown">
                        <option selected="">January</option>
                        <option value="1">February</option>
                        <option value="2">March</option>
                        <option value="3">April</option>
                    </select>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="nav-sub-links-for-days"
                        class="nav-link text-nowrap px-4 px-md-5  d-flex flex-column align-items-center justify-content-center"
                        id="pills-date-range-tab" data-bs-toggle="pill" data-bs-target="#pills-date-range"
                        type="button" role="tab" aria-controls="pills-date-range" aria-selected="false">
                        Date Range
                    </button>
                </li>
            </ul> -->
            <div class="border rounded-2 px-2">
                <p class="py-1 bank-details-heading">Add bank Account</p>
                <form class="row g-3 register mb-2" id="add_bank_form" novalidate="">
                    <div class="form-floating col-6 col-md-4 my-2">
                        <label class="visually-hidden" for="bankAccount"></label>
                        <select class="form-select py-0 bank-details-inputs" id="bank_type" name="bank_type">
                            <option value="" selected="">Choose Bank Type</option>
                            <option value="1">UPI</option>
                            <option value="2">Bank Account</option>
                            
                        </select>
                    </div>
                    <div class="form-floating col-6 col-md-4 my-1 upi_id_div">
                        <input type="text" class="form-control bank-details-inputs form-control-sm" id="upi_id"
                            name="upi_id" placeholder="UPI ID">
                        <label class="ps-4 d-flex align-items-center" for="upi_id">UPI ID</label>
                    </div>
                    <div class="form-floating col-6 col-md-4 my-1 bank_name_div">
                        <input type="text" class="form-control bank-details-inputs form-control-sm" id="bank_name"
                            name="bank_name" placeholder="Bank Name">
                        <label class="ps-4 d-flex align-items-center" for="bank_name">Bank Name</label>
                    </div>
                    
                    <div class="form-floating col-6 col-md-4 my-1 holder_name_div">
                        <input type="text" class="form-control bank-details-inputs form-control-sm" id="holder_name"
                            name="holder_name" placeholder="Holder Name">
                        <label class="ps-4 d-flex align-items-center" for="holder_name">Holder Name</label>
                    </div>
                    <div class="form-floating col-6 col-md-4 my-1 account_number_div">
                        <input type="text" class="form-control bank-details-inputs form-control-sm"
                            id="account_number" name="account_number" placeholder="A/C No">
                        <label class="ps-4 d-flex align-items-center" for="account_number">A/C No</label>
                    </div>
                    <div class="form-floating col-6 col-md-4 my-1 ifsc_code_div">
                        <input type="text" class="form-control bank-details-inputs form-control-sm" id="ifsc_code"
                            name="ifsc_code" placeholder="IFSC Code">
                        <label class="ps-4 d-flex align-items-center" for="ifsc_code">IFSC Code</label>
                    </div>
                    <div class="form-floating col-6 col-md-4 my-1">
                        <button type="button" class="btn add-bank-account-btn w-100" id="add_bank_btn">Add Bank
                            Account</button>
                    </div>
                </form>
            </div>
            <div class="mx-2" id="bankListDiv">

                
                
                
            </div>
        </div>
        <div id="search-in-pending" style="display: none;">
            <ul class="nav nav-pills d-flex flex-nowrap align-items-center justify-content-between gap-0 gap-md-4 my-3"
                id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button id="nav-sub-links-for-days"
                        class="nav-link text-nowrap px-3 active d-flex flex-column align-items-center justify-content-center"
                        id="pills-today-tab" data-bs-toggle="pill" data-bs-target="#pills-today" type="button"
                        role="tab" aria-controls="pills-today" aria-selected="true">
                        Today
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="nav-sub-links-for-days"
                        class="nav-link text-nowrap px-3 d-flex flex-column align-items-center justify-content-center"
                        id="pills-yesterday-tab" data-bs-toggle="pill" data-bs-target="#pills-yesterday" type="button"
                        role="tab" aria-controls="pills-yesterday" aria-selected="false">
                        Yesterday
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <select class="form-select months-dropdown">
                        <option selected="">January</option>
                        <option value="1">February</option>
                        <option value="2">March</option>
                        <option value="3">April</option>
                    </select>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="nav-sub-links-for-days"
                        class="nav-link text-nowrap px-4 px-md-5  d-flex flex-column align-items-center justify-content-center"
                        id="pills-date-range-tab" data-bs-toggle="pill" data-bs-target="#pills-date-range"
                        type="button" role="tab" aria-controls="pills-date-range" aria-selected="false">
                        Date Range
                    </button>
                </li>
            </ul>
            <form class="d-flex order-search-bar" role="search" action="javascript:;">
                <input class="form-control search-form" type="text" id="searchInListing" placeholder="Search" aria-label="Search">
                <button class="search-in-pending-search-btn p-0" type="submit">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13 13L10.1047 10.1047M10.1047 10.1047C10.6 9.60945 10.9928 9.0215 11.2608 8.37442C11.5289 7.72734 11.6668 7.0338 11.6668 6.33341C11.6668 5.63302 11.5289 4.93948 11.2608 4.2924C10.9928 3.64532 10.6 3.05737 10.1047 2.56212C9.60945 2.06687 9.0215 1.67401 8.37442 1.40598C7.72734 1.13795 7.0338 1 6.33341 1C5.63302 1 4.93948 1.13795 4.2924 1.40598C3.64532 1.67401 3.05737 2.06687 2.56212 2.56212C1.56191 3.56233 1 4.9189 1 6.33341C1 7.74792 1.56191 9.10449 2.56212 10.1047C3.56233 11.1049 4.9189 11.6668 6.33341 11.6668C7.74792 11.6668 9.10449 11.1049 10.1047 10.1047Z"
                            stroke="#D9D9D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </form>
            <div class="home-card py-1 px-2 mb-2 my-2">
                <div class="d-flex align-items-center justify-content-between ">
                    <div class="d-flex flex-column">
                        <span class="fw-bold text-dark d-flex">
                            Abul Hussain Mazumder <p class="fw-normal m-0">,PUC00045</p>
                        </span>
                        <span class="text-dark d-flex ">Computer Zone, 8720954378</span>
                        <span class="text-dark">
                            demoemail@gmail.com, 788165, Assam
                        </span>
                        <span class="text-dark">
                            Sunitpur, Kalakuchi, Near Gvt school
                        </span>
                    </div>

                    <div class="d-flex flex-column">
                        <div class="d-flex align-items-center justify-content-end">
                            <!-- Button trigger modal -->
                            <button type="button" class="modal-btn-neutral py-1 px-2">
                                <svg width="17" height="21" viewBox="0 0 17 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.264 0.163832C6.34357 0.0150705 7.25133 0.675594 7.68086 1.53412L8.73738 3.64664C9.32352 4.81893 8.98671 6.19445 8.09833 7.05979C7.57347 7.5705 7.046 8.15402 6.74009 8.66893C6.71983 8.70563 6.7135 8.74841 6.72228 8.7894C7.00514 10.3221 8.04385 11.8364 8.97047 12.9223C9.01708 12.974 9.0779 13.0109 9.14534 13.0283C9.21279 13.0458 9.28387 13.0429 9.34971 13.0202L11.4319 12.3696C11.9927 12.1943 12.595 12.2033 13.1504 12.3952C13.7058 12.5871 14.1852 12.9519 14.5181 13.4361L16.0251 15.6283C16.4337 16.2228 16.6406 17.0295 16.3274 17.8052C16.0477 18.4982 15.5066 19.4976 14.5223 20.1624C13.5009 20.8517 12.1018 21.1136 10.2711 20.4861C8.22562 19.7842 6.29328 18.0242 4.69095 15.7734C3.07919 13.5084 1.75238 10.6793 0.947808 7.72921C0.187236 4.94412 0.646093 3.06888 1.72619 1.8615C2.76805 0.696547 4.2609 0.301594 5.264 0.163832ZM6.50909 2.11974C6.26971 1.6415 5.84281 1.40526 5.44209 1.46026C4.55109 1.58283 3.43538 1.9144 2.70257 2.73417C2.008 3.51098 1.52714 4.87917 2.21019 7.38455C2.97757 10.1964 4.241 12.8835 5.75743 15.0138C7.28328 17.1578 9.01709 18.6716 10.6954 19.2473C12.1909 19.7601 13.152 19.5065 13.789 19.077C14.4626 18.6218 14.877 17.8985 15.1127 17.3149C15.2206 17.0478 15.174 16.7021 14.9456 16.37L13.4386 14.1784C13.2642 13.9247 13.0132 13.7336 12.7223 13.633C12.4314 13.5324 12.1159 13.5277 11.8221 13.6195L9.73995 14.27C9.11766 14.4644 8.41681 14.291 7.97419 13.7724C7.00985 12.6425 5.781 10.9098 5.43371 9.02669C5.36733 8.67377 5.43136 8.30875 5.6139 7.9995C6.01095 7.33217 6.63952 6.65174 7.18376 6.12164C7.71543 5.60412 7.86628 4.83412 7.56562 4.23226L6.50909 2.11974Z"
                                        fill="#515C6F" />
                                </svg>
                            </button>
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
            </div>
        </div>
    </section>

    	<!-- ====================================POPUPS=================================== -->
    <!-- delete bank Modal -->
    <div class="modal fade" id="deleteBankConfirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog completed-modal">
            <div class="modal-content completed-modal-content">

                <div class="modal-body">
                    <h4 class="text-center complete-popup-text"> Are you sure you will delete it?</h4>
                    <p class="text-center m-0" id="approvePucModelName_txt"></p>
                    <div class="d-flex justify-content-center ">
                        <button type="button" class="btn border-0" onclick="closedeletebankmodal()">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="29" height="29" rx="4.5" fill="#EC1C34" fill-opacity="0.1"
                                    stroke="#EC1C34" />
                                <path d="M6.85718 22.2857L22.2857 6.85712M6.85718 6.85712L22.2857 22.2857"
                                    stroke="#EC1C34" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </button>
                        <button type="button" class="btn border-0" onclick="deletebank()">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="29" height="29" rx="4.5" fill="#0D9E00" fill-opacity="0.1"
                                    stroke="#0D9E00" />
                                <g clip-path="url(#clip0_817_821)">
                                    <path
                                        d="M10.3999 15L14.3428 18.2858L19.5999 11.7143M14.9999 24.2C13.7918 24.2 12.5954 23.9621 11.4792 23.4997C10.363 23.0374 9.34884 22.3597 8.49454 21.5054C7.64025 20.6511 6.96258 19.6369 6.50024 18.5207C6.03789 17.4045 5.79993 16.2082 5.79993 15C5.79993 13.7919 6.03789 12.5956 6.50024 11.4794C6.96258 10.3632 7.64025 9.34897 8.49454 8.49467C9.34884 7.64037 10.363 6.9627 11.4792 6.50036C12.5954 6.03801 13.7918 5.80005 14.9999 5.80005C17.4399 5.80005 19.78 6.76933 21.5053 8.49467C23.2306 10.22 24.1999 12.5601 24.1999 15C24.1999 17.44 23.2306 19.7801 21.5053 21.5054C19.78 23.2308 17.4399 24.2 14.9999 24.2Z"
                                        stroke="#0D9E00" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_817_821">
                                        <rect width="19.7143" height="19.7143" fill="white"
                                            transform="translate(5.14282 5.14288)" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- complete transaction Modal -->
    <div class="modal fade" id="completeTransactionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog completed-modal">
            <div class="modal-content completed-modal-content">

                <div class="modal-body">
                    <h4 class="text-center complete-popup-text"> Are you sure to complete the transaction?</h4>
                    <p class="text-center m-0" id="approvePucModelName_txt"></p>
                    <div class="d-flex justify-content-center ">
                        <button type="button" class="btn border-0" onclick="closecompleteTransactionModal()">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="29" height="29" rx="4.5" fill="#EC1C34" fill-opacity="0.1"
                                    stroke="#EC1C34" />
                                <path d="M6.85718 22.2857L22.2857 6.85712M6.85718 6.85712L22.2857 22.2857"
                                    stroke="#EC1C34" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </button>
                        <button type="button" class="btn border-0" onclick="completeTransaction()">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="29" height="29" rx="4.5" fill="#0D9E00" fill-opacity="0.1"
                                    stroke="#0D9E00" />
                                <g clip-path="url(#clip0_817_821)">
                                    <path
                                        d="M10.3999 15L14.3428 18.2858L19.5999 11.7143M14.9999 24.2C13.7918 24.2 12.5954 23.9621 11.4792 23.4997C10.363 23.0374 9.34884 22.3597 8.49454 21.5054C7.64025 20.6511 6.96258 19.6369 6.50024 18.5207C6.03789 17.4045 5.79993 16.2082 5.79993 15C5.79993 13.7919 6.03789 12.5956 6.50024 11.4794C6.96258 10.3632 7.64025 9.34897 8.49454 8.49467C9.34884 7.64037 10.363 6.9627 11.4792 6.50036C12.5954 6.03801 13.7918 5.80005 14.9999 5.80005C17.4399 5.80005 19.78 6.76933 21.5053 8.49467C23.2306 10.22 24.1999 12.5601 24.1999 15C24.1999 17.44 23.2306 19.7801 21.5053 21.5054C19.78 23.2308 17.4399 24.2 14.9999 24.2Z"
                                        stroke="#0D9E00" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_817_821">
                                        <rect width="19.7143" height="19.7143" fill="white"
                                            transform="translate(5.14282 5.14288)" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- reject transaction Modal -->
    <div class="modal fade" id="rejectTransactionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog completed-modal">
            <div class="modal-content completed-modal-content">

                <div class="modal-body">
                    <h4 class="text-center complete-popup-text"> Are you sure to reject the transaction?</h4>
                    <p class="text-center m-0" id="approvePucModelName_txt"></p>
                    <div class="d-flex justify-content-center ">
                        <button type="button" class="btn border-0" onclick="closerejectTransactionModal()">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="29" height="29" rx="4.5" fill="#EC1C34" fill-opacity="0.1"
                                    stroke="#EC1C34" />
                                <path d="M6.85718 22.2857L22.2857 6.85712M6.85718 6.85712L22.2857 22.2857"
                                    stroke="#EC1C34" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </button>
                        <button type="button" class="btn border-0" onclick="rejectTransaction()">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="29" height="29" rx="4.5" fill="#0D9E00" fill-opacity="0.1"
                                    stroke="#0D9E00" />
                                <g clip-path="url(#clip0_817_821)">
                                    <path
                                        d="M10.3999 15L14.3428 18.2858L19.5999 11.7143M14.9999 24.2C13.7918 24.2 12.5954 23.9621 11.4792 23.4997C10.363 23.0374 9.34884 22.3597 8.49454 21.5054C7.64025 20.6511 6.96258 19.6369 6.50024 18.5207C6.03789 17.4045 5.79993 16.2082 5.79993 15C5.79993 13.7919 6.03789 12.5956 6.50024 11.4794C6.96258 10.3632 7.64025 9.34897 8.49454 8.49467C9.34884 7.64037 10.363 6.9627 11.4792 6.50036C12.5954 6.03801 13.7918 5.80005 14.9999 5.80005C17.4399 5.80005 19.78 6.76933 21.5053 8.49467C23.2306 10.22 24.1999 12.5601 24.1999 15C24.1999 17.44 23.2306 19.7801 21.5053 21.5054C19.78 23.2308 17.4399 24.2 14.9999 24.2Z"
                                        stroke="#0D9E00" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_817_821">
                                        <rect width="19.7143" height="19.7143" fill="white"
                                            transform="translate(5.14282 5.14288)" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- user detail modal  -->

    <div class="modal fade" id="userDetailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg h-75 d-flex align-items-center justify-content-center">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h2 class="modal-title fs-4 text-dark fw-bolder" id="staticBackdropLabel">User Details</h2>
                    <div class="d-flex">
                        <button type="button" class="border-0 mx-1" data-bs-dismiss="modal" aria-label="Close"><svg
                                width="30" height="30" viewBox="0 0 30 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="29" height="29" rx="4.5" fill="#EC1C34" fill-opacity="0.1"
                                    stroke="#EC1C34" />
                                <path d="M6.85718 22.2857L22.2857 6.85712M6.85718 6.85712L22.2857 22.2857"
                                    stroke="#EC1C34" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-2 col-4">
                            <label><b>Name:</b></label>
                        </div>
                        <div class="col-sm-4 col-8">
                            <span id="user_name"></span>
                        </div>

                        <div class="col-sm-2 col-4">
                            <label><b>Username:</b></label>
                        </div>
                        <div class="col-sm-4 col-8">
                            <span id="username"></span>
                        </div>

                        <div class="col-sm-2 col-4">
                            <label><b>Company Name:</b></label>
                        </div>
                        <div class="col-sm-4 col-8">
                            <span id="company_name"></span>
                        </div>

                        <div class="col-sm-2 col-4">
                            <label><b>Email:</b></label>
                        </div>
                        <div class="col-sm-4 col-8">
                            <span id="user_email"></span>
                        </div>

                        <div class="col-sm-2 col-4">
                            <label><b>Phone Number:</b></label>
                        </div>
                        <div class="col-sm-4 col-8">
                            <span id="user_phone"></span>
                        </div>

                        <div class="col-sm-2 col-4">
                            <label><b>State:</b></label>
                        </div>
                        <div class="col-sm-4 col-8">
                            <span id="user_state"></span>
                        </div>

                        <div class="col-sm-2 col-4">
                            <label><b>Balance:</b></label>
                        </div>
                        <div class="col-sm-4 col-8">
                            <span id="user_balance"></span>
                        </div>

                        <div class="col-sm-2 col-4">
                            <label><b>Area:</b></label>
                        </div>
                        <div class="col-sm-4 col-8">
                            <span id="user_area"></span>
                        </div>

                        <div class="col-sm-2 col-4">
                            <label><b>Landmark:</b></label>
                        </div>
                        <div class="col-sm-4 col-8">
                            <span id="user_landmark"></span>
                        </div>

                        <div class="col-sm-2 col-4">
                            <label><b>City:</b></label>
                        </div>
                        <div class="col-sm-4 col-8">
                            <span id="user_city"></span>
                        </div>

                        <div class="col-sm-2 col-4">
                            <label><b>User Type:</b></label>
                        </div>
                        <div class="col-sm-4 col-8">
                            <span id="user_usertype"></span>
                        </div>

                        <div class="col-sm-2 col-4">
                            <label><b>Status:</b></label>
                        </div>
                        <div class="col-sm-4 col-8">
                            <span id="user_status"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
@push('script')
    <script src="{{ asset('assets_admin/customjs/script_adminwallet.js') }}"></script>
@endpush
