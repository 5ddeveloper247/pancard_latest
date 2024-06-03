@extends('layouts.master.admin_template.master')

@push('css')
@endpush

@section('content')
<section class="admin-order-section">
    <!-- =====ORDER-SUB-TABS====== -->
    <ul class="nav nav-pills d-flex flex-nowrap align-items-center justify-content-between gap-0 gap-md-1 my-3" id="pills-tab" role="tablist">
        <li class="nav-item px-1" role="presentation">
            <button id="nav-sub-links" class="nav-link text-nowrap px-2 px-md-3 active d-flex flex-column align-items-center justify-content-center" data-bs-toggle="pill" data-bs-target="#pills-pending" type="button" role="tab" aria-controls="pills-pending" aria-selected="true">
                Pending
            </button>
        </li>
        <li class="nav-item px-1" role="presentation">
            <button id="nav-sub-links" class="nav-link text-nowrap px-2 px-md-3  d-flex flex-column align-items-center justify-content-center" data-bs-toggle="pill" data-bs-target="#pills-order-history" type="button" role="tab" aria-controls="pills-order-history" aria-selected="false">
                Order History
            </button>
        </li>
        <li class="nav-item px-1" role="presentation">
            <button id="nav-sub-links" class="nav-link text-nowrap px-2 px-md-3  d-flex flex-column align-items-center justify-content-center bulkupload-reset" data-bs-toggle="pill" data-bs-target="#pills-bulk-upload" type="button" role="tab" aria-controls="pills-bulk-upload" aria-selected="false">
                Bulk Upload
            </button>
        </li>
        <form class="d-flex order-search-bar px-1" role="search" action="javascript:;">
            <input class="form-control search-form" type="text" id="searchInListing" placeholder="Search" aria-label="Search">
            <button class="order-search-btn p-0" type="submit">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 13L10.1047 10.1047M10.1047 10.1047C10.6 9.60945 10.9928 9.0215 11.2608 8.37442C11.5289 7.72734 11.6668 7.0338 11.6668 6.33341C11.6668 5.63302 11.5289 4.93948 11.2608 4.2924C10.9928 3.64532 10.6 3.05737 10.1047 2.56212C9.60945 2.06687 9.0215 1.67401 8.37442 1.40598C7.72734 1.13795 7.0338 1 6.33341 1C5.63302 1 4.93948 1.13795 4.2924 1.40598C3.64532 1.67401 3.05737 2.06687 2.56212 2.56212C1.56191 3.56233 1 4.9189 1 6.33341C1 7.74792 1.56191 9.10449 2.56212 10.1047C3.56233 11.1049 4.9189 11.6668 6.33341 11.6668C7.74792 11.6668 9.10449 11.1049 10.1047 10.1047Z" stroke="#D9D9D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </form>
    </ul>
    <!-- =====ORDER-SUB-TABS-CONTENT====== -->
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab" tabindex="0">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pendingPuc_container" role="tabpanel" aria-labelledby="pills-all-tab" tabindex="0">

                    <!-- PENDING PUC LISTING HTML -->

                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-order-history" role="tabpanel" aria-labelledby="pills-order-history-tab" tabindex="0">
            <!-- =====PENDING-ORDERS-TABS====== -->
            <ul class="nav nav-pills d-flex flex-nowrap align-items-center justify-content-between gap-0 gap-md-1 my-3" id="pills-tab" role="tablist">
                <li class="nav-item px-1" role="presentation">
                    <button id="nav-sub-links-for-days" class="nav-link text-nowrap px-3 filter-btns filter_today d-flex flex-column align-items-center justify-content-center" data-bs-toggle="pill" data-bs-target="#pills-today" type="button" role="tab" aria-controls="pills-today" aria-selected="true">
                        Today
                    </button>
                </li>
                <li class="nav-item px-1" role="presentation">
                    <button id="nav-sub-links-for-days" class="nav-link text-nowrap px-3 d-flex filter-btns filter_yesterday flex-column align-items-center justify-content-center" data-bs-toggle="pill" data-bs-target="#pills-yesterday" type="button" role="tab" aria-controls="pills-yesterday" aria-selected="false">
                        Yesterday
                    </button>
                </li>
                <li class="nav-item px-1" role="presentation">
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
                <li class="nav-item px-1" role="presentation">
                    <!-- <button id="nav-sub-links-for-days"
                            class="nav-link text-nowrap px-4 px-md-5  d-flex flex-column align-items-center justify-content-center"
                            id="pills-date-range-tab" data-bs-toggle="pill" data-bs-target="#pills-date-range"
                            type="button" role="tab" aria-controls="pills-date-range" aria-selected="false">
                            Date Range
                        </button> -->
                    <input type="text" id="filter_dateRange" class="form-control" placeholder="Choose Range" readonly style="display:block;font-size:12px;padding: .485rem .75rem;" />
                </li>
            </ul>
            <!-- =====PENDING-ORDERS-TABS-CONTENT====== -->
            <div id="orderHistory_container">

                <!-- ORDER HISTORY HTML -->

            </div>



        </div>
        <div class="tab-pane fade bulk-upload" id="pills-bulk-upload" role="tabpanel" aria-labelledby="pills-bulk-upload-tab" tabindex="0">
            <!-- =====BULK-UPLOAD-UNSELECTED====== -->
            <div id="bulk-upload-unselected">
                <form id="uploadBulk_form" enctype="multipart/form-data">
                    <div class="d-flex justify-content-between">
                        <div id="uploadBulkIcon" class="upload bulk-upload-width px-md-4 px-2 d-flex align-items-center justify-content-between border">
                            <span id="filename1" style="max-width: 88% !important; overflow: hidden; text-overflow: ellipsis;">Click here to upload file</span>
                            <input type="file" accept="application/pdf" id="uploadBilkFile" name="uploadFile[]" multiple style="display: none;">
                            <i class="fa fa-"></i>
                            <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.7143 12.8857V1M10.7143 1L13.6286 4.2M10.7143 1L7.80005 4.2" stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M6.82857 19.2857H14.6C17.3472 19.2857 18.7218 19.2857 19.5747 18.483C20.4286 17.6784 20.4286 16.3865 20.4286 13.8V12.8857C20.4286 10.3001 20.4286 9.00734 19.5747 8.20368C18.8286 7.50151 17.6843 7.41283 15.5714 7.40186M5.85714 7.40186C3.74429 7.41283 2.59994 7.50151 1.85389 8.20368C1 9.00734 1 10.3001 1 12.8857V13.8C1 16.3865 1 17.6793 1.85389 18.483C2.14531 18.7573 2.49697 18.9374 2.94286 19.0563" stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                        <button type="button" class="btn text-white bulk-upload-btn transfer-now-btn px-3 ms-2" id="uploadBulk_submit" disabled>Upload Submit</button>
                    </div>
                </form>
                <span>Click all files rename to vehicle registration No.</span>
                <div class="bulk-order-table">
                    <div class="d-flex flex-column bulk-order-table-structure">
                        <div class="row justify-content-around table-head">
                            <span class="col-8 d-flex justify-content-center">File Name</span>
                            <span class="col-4 d-flex justify-content-center bulk-order-status">Status</span>
                        </div>
                        <div id="bulkUpload_container">
                            <!-- <div class="row justify-content-around line-div">
                                    <span class="col-8 d-flex justify-content-center">AS24AC2594</span>
                                    <span
                                        class="col-4 d-flex justify-content-center bulk-order-status record-success">Success</span>
                                </div>
                                <div class="row justify-content-around">
                                    <span class="col-8 d-flex justify-content-center">AS11H2536</span>
                                    <span
                                        class="col-4 d-flex justify-content-center bulk-order-status record-success">Success</span>
                                </div>
                                <div class="row justify-content-around">
                                    <span class="col-8 d-flex justify-content-center">AS24S1254</span>
                                    <span class="col-4 d-flex justify-content-center bulk-order-status record-failed">Not
                                        Found</span>
                                </div> -->
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

</section>

<!-- ====================================POPUPS=================================== -->
<!-- Complete Modal -->
<div class="modal fade" id="completeConfirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog completed-modal">
        <div class="modal-content completed-modal-content">

            <div class="modal-body">
                <h4 class="text-center complete-popup-text"> Are you sure you will complete it?</h4>
                <p class="text-center m-0" id="approvePucModelName_txt"></p>
                <div class="d-flex justify-content-center ">
                    <button type="button" class="btn border-0 closeConfirmModal">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.5" y="0.5" width="29" height="29" rx="4.5" fill="#EC1C34" fill-opacity="0.1" stroke="#EC1C34" />
                            <path d="M6.85718 22.2857L22.2857 6.85712M6.85718 6.85712L22.2857 22.2857" stroke="#EC1C34" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </button>
                    <button type="button" class="btn border-0" onclick="changePucStatus('4')">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.5" y="0.5" width="29" height="29" rx="4.5" fill="#0D9E00" fill-opacity="0.1" stroke="#0D9E00" />
                            <g clip-path="url(#clip0_817_821)">
                                <path d="M10.3999 15L14.3428 18.2858L19.5999 11.7143M14.9999 24.2C13.7918 24.2 12.5954 23.9621 11.4792 23.4997C10.363 23.0374 9.34884 22.3597 8.49454 21.5054C7.64025 20.6511 6.96258 19.6369 6.50024 18.5207C6.03789 17.4045 5.79993 16.2082 5.79993 15C5.79993 13.7919 6.03789 12.5956 6.50024 11.4794C6.96258 10.3632 7.64025 9.34897 8.49454 8.49467C9.34884 7.64037 10.363 6.9627 11.4792 6.50036C12.5954 6.03801 13.7918 5.80005 14.9999 5.80005C17.4399 5.80005 19.78 6.76933 21.5053 8.49467C23.2306 10.22 24.1999 12.5601 24.1999 15C24.1999 17.44 23.2306 19.7801 21.5053 21.5054C19.78 23.2308 17.4399 24.2 14.9999 24.2Z" stroke="#0D9E00" />
                            </g>
                            <defs>
                                <clipPath id="clip0_817_821">
                                    <rect width="19.7143" height="19.7143" fill="white" transform="translate(5.14282 5.14288)" />
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="uploadPdfModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog h-100 d-flex align-items-center justify-content-center">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h2 class="modal-title fs-4 text-dark fw-bolder" id="staticBackdropLabel">Upload PDF</h2>
                <div class="d-flex">
                    <!-- <button type="button" class="border-0 mx-1" data-bs-dismiss="modal" aria-label="Close">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.5" y="0.5" width="29" height="29" rx="4.5" fill="#0D9E00" fill-opacity="0.1" stroke="#0D9E00" />
                            <g clip-path="url(#clip0_817_821)">
                                <path d="M10.3999 15L14.3428 18.2858L19.5999 11.7143M14.9999 24.2C13.7918 24.2 12.5954 23.9621 11.4792 23.4997C10.363 23.0374 9.34884 22.3597 8.49454 21.5054C7.64025 20.6511 6.96258 19.6369 6.50024 18.5207C6.03789 17.4045 5.79993 16.2082 5.79993 15C5.79993 13.7919 6.03789 12.5956 6.50024 11.4794C6.96258 10.3632 7.64025 9.34897 8.49454 8.49467C9.34884 7.64037 10.363 6.9627 11.4792 6.50036C12.5954 6.03801 13.7918 5.80005 14.9999 5.80005C17.4399 5.80005 19.78 6.76933 21.5053 8.49467C23.2306 10.22 24.1999 12.5601 24.1999 15C24.1999 17.44 23.2306 19.7801 21.5053 21.5054C19.78 23.2308 17.4399 24.2 14.9999 24.2Z" stroke="#0D9E00" />
                            </g>
                            <defs>
                                <clipPath id="clip0_817_821">
                                    <rect width="19.7143" height="19.7143" fill="white" transform="translate(5.14282 5.14288)" />
                                </clipPath>
                            </defs>
                        </svg>
                    </button> -->
                    <button type="button" class="border-0 mx-1" data-bs-dismiss="modal" aria-label="Close"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.5" y="0.5" width="29" height="29" rx="4.5" fill="#EC1C34" fill-opacity="0.1" stroke="#EC1C34" />
                            <path d="M6.85718 22.2857L22.2857 6.85712M6.85718 6.85712L22.2857 22.2857" stroke="#EC1C34" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div>
                    <p style="font-size: 12px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                        <span><b>Uploaded File: </b></span>
                        <span id="certificateFile_txt"></span>
                    </p>
                </div>
                <div class="border rounded-4 w-100 p-2">
                    <form id="uploadPdf_form">
                        <div class="d-flex justify-content-between">
                            <div id="uploadIcon" class="upload bulk-upload-width px-md-4 px-2 d-flex align-items-center justify-content-between border">
                                <span id="filename" style="max-width: 88% !important; overflow: hidden; text-overflow: ellipsis;">Click here to upload file</span>
                                <input type="file" accept="application/pdf" capture="camera" id="uploadFile" name="uploadFile" multiple="false" style="display: none;">
                                <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.7143 12.8857V1M10.7143 1L13.6286 4.2M10.7143 1L7.80005 4.2" stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.82857 19.2857H14.6C17.3472 19.2857 18.7218 19.2857 19.5747 18.483C20.4286 17.6784 20.4286 16.3865 20.4286 13.8V12.8857C20.4286 10.3001 20.4286 9.00734 19.5747 8.20368C18.8286 7.50151 17.6843 7.41283 15.5714 7.40186M5.85714 7.40186C3.74429 7.41283 2.59994 7.50151 1.85389 8.20368C1 9.00734 1 10.3001 1 12.8857V13.8C1 16.3865 1 17.6793 1.85389 18.483C2.14531 18.7573 2.49697 18.9374 2.94286 19.0563" stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </div>
                            <button type="button" id="uploadPdf_submit" class="btn text-white bulk-upload-btn transfer-now-btn px-3 ms-2">Upload Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!--Upload Modal -->
<div class="modal fade" id="uploadsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog h-100 d-flex align-items-center justify-content-center">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h2 class="modal-title fs-4 text-dark fw-bolder" id="staticBackdropLabel">Uploaded Files</h2>
                <div class="d-flex">
                    <button type="button" class="border-0 mx-1 updateViewFlag_btn updateviewstatusbtn" data-id=""  data-flag-type="1" data-bs-dismiss="modal" aria-label="Close">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.5" y="0.5" width="29" height="29" rx="4.5" fill="#0D9E00" fill-opacity="0.1" stroke="#0D9E00" />
                            <g clip-path="url(#clip0_817_821)">
                                <path d="M10.3999 15L14.3428 18.2858L19.5999 11.7143M14.9999 24.2C13.7918 24.2 12.5954 23.9621 11.4792 23.4997C10.363 23.0374 9.34884 22.3597 8.49454 21.5054C7.64025 20.6511 6.96258 19.6369 6.50024 18.5207C6.03789 17.4045 5.79993 16.2082 5.79993 15C5.79993 13.7919 6.03789 12.5956 6.50024 11.4794C6.96258 10.3632 7.64025 9.34897 8.49454 8.49467C9.34884 7.64037 10.363 6.9627 11.4792 6.50036C12.5954 6.03801 13.7918 5.80005 14.9999 5.80005C17.4399 5.80005 19.78 6.76933 21.5053 8.49467C23.2306 10.22 24.1999 12.5601 24.1999 15C24.1999 17.44 23.2306 19.7801 21.5053 21.5054C19.78 23.2308 17.4399 24.2 14.9999 24.2Z" stroke="#0D9E00" />
                            </g>
                            <defs>
                                <clipPath id="clip0_817_821">
                                    <rect width="19.7143" height="19.7143" fill="white" transform="translate(5.14282 5.14288)" />
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                    <button type="button" class="border-0 mx-1" data-bs-dismiss="modal" aria-label="Close"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.5" y="0.5" width="29" height="29" rx="4.5" fill="#EC1C34" fill-opacity="0.1" stroke="#EC1C34" />
                            <path d="M6.85718 22.2857L22.2857 6.85712M6.85718 6.85712L22.2857 22.2857" stroke="#EC1C34" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="modal-body d-flex gap-3 align-items-center justify-content-center">
                <div class="border rounded-4 w-100 p-2">
                    <div class="d-flex justify-content-between align-items-center pb-1 px-2">
                        <span class="text-start"><small>Vehicle Photo</small></span>

                        <a id="puc_vehicle_img_down" href="" download>
                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.37497 5.2L7.37498 13M7.37498 13L5.46248 10.9M7.37498 13L9.28748 10.9" stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.925 0.999968L4.825 0.999968C3.02215 0.999968 2.12009 0.999969 1.56036 1.52677C1 2.05477 1 2.90257 1 4.59997L1 5.19997C1 6.89677 1 7.74517 1.56036 8.27257C2.04996 8.73337 2.80094 8.79157 4.1875 8.79877M10.5625 8.79877C11.9491 8.79157 12.7 8.73337 13.1896 8.27257C13.75 7.74517 13.75 6.89677 13.75 5.19997L13.75 4.59997C13.75 2.90257 13.75 2.05417 13.1896 1.52677C12.9984 1.34677 12.7676 1.22857 12.475 1.15057" stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </a>
                    </div>
                    <div class="vehicle-photo d-flex align-items-center justify-content-center">
                        <img id="puc_vehicle_img" class="clickable-img" src="" alt="">
                    </div>
                </div>
                <div class="border rounded-4 w-100 p-2" id="puc_challan_img_div">
                    <div class="d-flex justify-content-between align-items-center pb-1 px-2">
                        <span class="text-start"><small>challan SS</small></span>
                        <a id="puc_challan_img_down" href="" download>
                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.37497 5.2L7.37498 13M7.37498 13L5.46248 10.9M7.37498 13L9.28748 10.9" stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.925 0.999968L4.825 0.999968C3.02215 0.999968 2.12009 0.999969 1.56036 1.52677C1 2.05477 1 2.90257 1 4.59997L1 5.19997C1 6.89677 1 7.74517 1.56036 8.27257C2.04996 8.73337 2.80094 8.79157 4.1875 8.79877M10.5625 8.79877C11.9491 8.79157 12.7 8.73337 13.1896 8.27257C13.75 7.74517 13.75 6.89677 13.75 5.19997L13.75 4.59997C13.75 2.90257 13.75 2.05417 13.1896 1.52677C12.9984 1.34677 12.7676 1.22857 12.475 1.15057" stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </a>

                    </div>
                    <div class="challan-photo d-flex align-items-center justify-content-center">
                        <img id="puc_challan_img" class="clickable-img" src="" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Second Modal for Displaying Clicked Image -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-4 text-dark fw-bolder" id="imageModalLabel">Image Preview</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center justify-content-center">
                <img id="modalImage" src="" alt="" style="height: 13rem; width:100%">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="userDetailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg h-75 d-flex align-items-center justify-content-center">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h2 class="modal-title fs-4 text-dark fw-bolder" id="staticBackdropLabel">User Details</h2>
                <div class="d-flex">
                    <button type="button" class="border-0 mx-1" data-bs-dismiss="modal" aria-label="Close"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.5" y="0.5" width="29" height="29" rx="4.5" fill="#EC1C34" fill-opacity="0.1" stroke="#EC1C34" />
                            <path d="M6.85718 22.2857L22.2857 6.85712M6.85718 6.85712L22.2857 22.2857" stroke="#EC1C34" stroke-width="1.5" stroke-linecap="round" />
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

<script src="{{ asset('assets_admin/customjs/script_adminorders.js') }}"></script>

@endpush