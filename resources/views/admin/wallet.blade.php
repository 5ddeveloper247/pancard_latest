@extends('layouts.master.admin_template.master')

@section('content')
    <!-- =====WALLET-TAB====== -->
    <section>
        <ul class="nav nav-pills d-flex flex-nowrap align-items-center justify-content-between gap-0 gap-md-1 my-3 tab-padding"
            id="pills-tab" role="tablist">
            <li class="nav-item px-1" role="presentation">
                <button id="nav-sub-links" id="wallet-pending"
                    class="wallet-pending nav-link text-nowrap px-2 px-md-3 active d-flex flex-column align-items-center justify-content-center"
                    id="pills-wallet-pending-tab" data-bs-toggle="pill" data-bs-target="#pills-wallet-pending"
                    type="button" role="tab" aria-controls="pills-wallet-pending" aria-selected="true">
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
            <form class="d-flex order-search-bar px-1" role="search">
                <input class="form-control search-form" type="search" placeholder="Search" aria-label="Search">
                <button class="order-search-btn p-0" type="submit">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13 13L10.1047 10.1047M10.1047 10.1047C10.6 9.60945 10.9928 9.0215 11.2608 8.37442C11.5289 7.72734 11.6668 7.0338 11.6668 6.33341C11.6668 5.63302 11.5289 4.93948 11.2608 4.2924C10.9928 3.64532 10.6 3.05737 10.1047 2.56212C9.60945 2.06687 9.0215 1.67401 8.37442 1.40598C7.72734 1.13795 7.0338 1 6.33341 1C5.63302 1 4.93948 1.13795 4.2924 1.40598C3.64532 1.67401 3.05737 2.06687 2.56212 2.56212C1.56191 3.56233 1 4.9189 1 6.33341C1 7.74792 1.56191 9.10449 2.56212 10.1047C3.56233 11.1049 4.9189 11.6668 6.33341 11.6668C7.74792 11.6668 9.10449 11.1049 10.1047 10.1047Z"
                            stroke="#D9D9D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </form>
        </ul>
        <div id="wallet-pending-content">
            <div class="home-card py-1 px-2 mb-2 mx-md-0 px-md-4">
                <div class="d-flex align-items-center justify-content-between ">
                    <div class="d-flex flex-column">
                        <span class="fw-bold text-dark">
                            Minhaz Uddin
                        </span>
                        <span class="text-dark d-flex ">Date: 02/03/2024</span>
                        <span class="text-dark">
                            Bank Account: Axis Bank
                        </span>
                        <span class="text-dark d-flex align-items-center utr-code-bg px-1">
                            UTR: 912211213012 <span class="ps-2"> <svg width="10" height="11" viewBox="0 0 10 11"
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
                            <button type="button" class="modal-btn-neutral py-1 px-2">
                                <svg width="17" height="21" viewBox="0 0 17 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.26403 0.163832C6.3436 0.0150705 7.25136 0.675594 7.68089 1.53412L8.73741 3.64664C9.32355 4.81893 8.98674 6.19445 8.09836 7.05979C7.5735 7.5705 7.04603 8.15402 6.74012 8.66893C6.71986 8.70563 6.71354 8.74841 6.72231 8.7894C7.00517 10.3221 8.04388 11.8364 8.9705 12.9223C9.01711 12.974 9.07793 13.0109 9.14537 13.0283C9.21282 13.0458 9.2839 13.0429 9.34974 13.0202L11.4319 12.3696C11.9928 12.1943 12.595 12.2033 13.1505 12.3952C13.7059 12.5871 14.1852 12.9519 14.5182 13.4361L16.0252 15.6283C16.4337 16.2228 16.6406 17.0295 16.3274 17.8052C16.0477 18.4982 15.5066 19.4976 14.5224 20.1624C13.5009 20.8517 12.1018 21.1136 10.2711 20.4861C8.22565 19.7842 6.29331 18.0242 4.69098 15.7734C3.07922 13.5084 1.75241 10.6793 0.947838 7.72921C0.187267 4.94412 0.646124 3.06888 1.72622 1.8615C2.76808 0.696547 4.26093 0.301594 5.26403 0.163832ZM6.50912 2.11974C6.26974 1.6415 5.84284 1.40526 5.44212 1.46026C4.55112 1.58283 3.43541 1.9144 2.7026 2.73417C2.00803 3.51098 1.52717 4.87917 2.21022 7.38455C2.9776 10.1964 4.24103 12.8835 5.75746 15.0138C7.28331 17.1578 9.01712 18.6716 10.6954 19.2473C12.1909 19.7601 13.1521 19.5065 13.789 19.077C14.4626 18.6218 14.877 17.8985 15.1127 17.3149C15.2206 17.0478 15.174 16.7021 14.9456 16.37L13.4386 14.1784C13.2642 13.9247 13.0132 13.7336 12.7223 13.633C12.4314 13.5324 12.1159 13.5277 11.8221 13.6195L9.73998 14.27C9.11769 14.4644 8.41684 14.291 7.97422 13.7724C7.00989 12.6425 5.78103 10.9098 5.43374 9.02669C5.36736 8.67377 5.43139 8.30875 5.61393 7.9995C6.01098 7.33217 6.63955 6.65174 7.18379 6.12164C7.71546 5.60412 7.86631 4.83412 7.56565 4.23226L6.50912 2.11974Z"
                                        fill="#515C6F" />
                                </svg>
                            </button>
                            <button type="button" class="modal-btn-price py-1 px-2 ms-2">
                                ₹2,000
                            </button>
                        </div>

                    </div>
                </div>
                <div class="d-flex flex-nowrap justify-content-between">
                    <div>
                        <span class="diff-bg px-2 py-1 mx-md-3 mr-1 my-1 text-primary text-nowrap">
                            <b>PZ70001</b>(Computer zone)
                        </span>
                    </div>
                    <div class="d-flex flex-nowrap">
                        <span class="states-btns mx-md-3 ms-1 my-1 text-white text-nowrap">
                            <button type="button" class="btn action-btns btn-danger px-2 py-0">
                                Reject
                            </button>
                        </span>
                        <span class="states-btns mx-md-3 ms-1 my-1 text-white text-nowrap">
                            <button type="button" class="btn action-btns btn-primary px-2 py-0" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Complete
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div id="wallet-history-content" style="display: none;">
            <ul class="nav nav-pills d-flex flex-nowrap align-items-center justify-content-between gap-0 gap-md-1 my-3"
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
                        id="pills-date-range-tab" data-bs-toggle="pill" data-bs-target="#pills-date-range" type="button"
                        role="tab" aria-controls="pills-date-range" aria-selected="false">
                        Date Range
                    </button>
                </li>
            </ul>
            <div class="d-flex justify-content-between border rounded-2 my-2">
                <div class="d-flex align-items-center pt-3 ps-3 pb-2">
                    <svg width="68" height="68" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.5" y="0.5" width="37" height="37" rx="4.5" fill="#FBFBFB" stroke="#F0F0F0" />
                        <path d="M23.1666 19.5834H24.5555V20.9723H23.1666V19.5834Z" fill="#727C8E" />
                        <path
                            d="M27.5714 13.5556H10.4286V11.4222H26.1429V10H10.4286C10.0497 10 9.68633 10.1498 9.41842 10.4166C9.15051 10.6833 9 11.045 9 11.4222V26.3556C9 26.7328 9.15051 27.0945 9.41842 27.3612C9.68633 27.6279 10.0497 27.7778 10.4286 27.7778H27.5714C27.9503 27.7778 28.3137 27.6279 28.5816 27.3612C28.8495 27.0945 29 26.7328 29 26.3556V14.9778C29 14.6006 28.8495 14.2388 28.5816 13.9721C28.3137 13.7054 27.9503 13.5556 27.5714 13.5556ZM10.4286 26.3556V14.9778H27.5714V17.1111H21.8571C21.4783 17.1111 21.1149 17.261 20.847 17.5277C20.5791 17.7944 20.4286 18.1561 20.4286 18.5333V22.8C20.4286 23.1772 20.5791 23.5389 20.847 23.8057C21.1149 24.0724 21.4783 24.2222 21.8571 24.2222H27.5714V26.3556H10.4286ZM27.5714 18.5333V22.8H21.8571V18.5333H27.5714Z"
                            fill="#515C6F" />
                    </svg>
                    <div class="d-flex flex-column">
                        <h6 class="m-0">
                            You added
                        </h6>
                        <small>18 Dec 21, 08:22 PM</small>
                        <span class="diff-bg px-2 py-1 mx-md-3 mr-1 my-1 text-primary text-nowrap">
                            <b>PZ70001</b>(Computer zone)
                        </span>
                    </div>
                </div>
                <div class="pt-3 pe-3 pb-2 d-flex flex-column align-items-end">
                    <span class="fw-bolder text-success"> + ₹1250</span>
                    <span class="fw-bold text-success">Pending</span>
                    <button type="button" class="btn added-by-admin px-2 py-0 mt-1">
                        Added by admin
                    </button>

                </div>

            </div>
            <div class="d-flex justify-content-between border rounded-2 my-2">
                <div class="d-flex align-items-center pt-3 ps-3 pb-2">
                    <svg width="68" height="68" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.5" y="0.5" width="37" height="37" rx="4.5" fill="#FBFBFB" stroke="#F0F0F0" />
                        <path d="M23.1666 19.5834H24.5555V20.9723H23.1666V19.5834Z" fill="#727C8E" />
                        <path
                            d="M27.5714 13.5556H10.4286V11.4222H26.1429V10H10.4286C10.0497 10 9.68633 10.1498 9.41842 10.4166C9.15051 10.6833 9 11.045 9 11.4222V26.3556C9 26.7328 9.15051 27.0945 9.41842 27.3612C9.68633 27.6279 10.0497 27.7778 10.4286 27.7778H27.5714C27.9503 27.7778 28.3137 27.6279 28.5816 27.3612C28.8495 27.0945 29 26.7328 29 26.3556V14.9778C29 14.6006 28.8495 14.2388 28.5816 13.9721C28.3137 13.7054 27.9503 13.5556 27.5714 13.5556ZM10.4286 26.3556V14.9778H27.5714V17.1111H21.8571C21.4783 17.1111 21.1149 17.261 20.847 17.5277C20.5791 17.7944 20.4286 18.1561 20.4286 18.5333V22.8C20.4286 23.1772 20.5791 23.5389 20.847 23.8057C21.1149 24.0724 21.4783 24.2222 21.8571 24.2222H27.5714V26.3556H10.4286ZM27.5714 18.5333V22.8H21.8571V18.5333H27.5714Z"
                            fill="#515C6F" />
                    </svg>
                    <div class="d-flex flex-column">
                        <h6 class="m-0">
                            You added
                        </h6>
                        <small>18 Dec 21, 08:22 PM</small>
                        <span class="diff-bg px-2 py-1 mx-md-3 mr-1 my-1 text-primary text-nowrap">
                            <b>PZ70001</b>(Computer zone)
                        </span>
                    </div>
                </div>
                <div class="pt-3 pe-3 pb-2 d-flex flex-column align-items-end">
                    <span class="fw-bolder text-success"> + ₹1250</span>
                    <span class="fw-bold text-success">Pending</span>
                    <button type="button" class="btn added-by-admin px-2 py-0 mt-1">
                        Added by admin
                    </button>

                </div>

            </div>
            <div class="d-flex justify-content-between border rounded-2 my-2">
                <div class="d-flex align-items-center pt-3 ps-3 pb-2">
                    <svg width="68" height="68" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.5" y="0.5" width="37" height="37" rx="4.5" fill="#FBFBFB" stroke="#F0F0F0" />
                        <path d="M23.1666 19.5834H24.5555V20.9723H23.1666V19.5834Z" fill="#727C8E" />
                        <path
                            d="M27.5714 13.5556H10.4286V11.4222H26.1429V10H10.4286C10.0497 10 9.68633 10.1498 9.41842 10.4166C9.15051 10.6833 9 11.045 9 11.4222V26.3556C9 26.7328 9.15051 27.0945 9.41842 27.3612C9.68633 27.6279 10.0497 27.7778 10.4286 27.7778H27.5714C27.9503 27.7778 28.3137 27.6279 28.5816 27.3612C28.8495 27.0945 29 26.7328 29 26.3556V14.9778C29 14.6006 28.8495 14.2388 28.5816 13.9721C28.3137 13.7054 27.9503 13.5556 27.5714 13.5556ZM10.4286 26.3556V14.9778H27.5714V17.1111H21.8571C21.4783 17.1111 21.1149 17.261 20.847 17.5277C20.5791 17.7944 20.4286 18.1561 20.4286 18.5333V22.8C20.4286 23.1772 20.5791 23.5389 20.847 23.8057C21.1149 24.0724 21.4783 24.2222 21.8571 24.2222H27.5714V26.3556H10.4286ZM27.5714 18.5333V22.8H21.8571V18.5333H27.5714Z"
                            fill="#515C6F" />
                    </svg>
                    <div class="d-flex flex-column">
                        <h6 class="m-0">
                            You added
                        </h6>
                        <small>18 Dec 21, 08:22 PM</small>
                        <span class="diff-bg px-2 py-1 mx-md-3 mr-1 my-1 text-primary text-nowrap">
                            <b>PZ70001</b>(Computer zone)
                        </span>
                    </div>
                </div>
                <div class="pt-3 pe-3 pb-2 d-flex flex-column align-items-end">
                    <span class="fw-bolder text-success"> + ₹1250</span>
                    <span class="fw-bold text-success">Pending</span>
                    <button type="button" class="btn added-by-admin px-2 py-0 mt-1">
                        Added by admin
                    </button>

                </div>

            </div>
            <div class="d-flex justify-content-between border rounded-2 my-2">
                <div class="d-flex align-items-center pt-3 ps-3 pb-2">
                    <svg width="68" height="68" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.5" y="0.5" width="37" height="37" rx="4.5" fill="#FBFBFB" stroke="#F0F0F0" />
                        <path d="M23.1666 19.5834H24.5555V20.9723H23.1666V19.5834Z" fill="#727C8E" />
                        <path
                            d="M27.5714 13.5556H10.4286V11.4222H26.1429V10H10.4286C10.0497 10 9.68633 10.1498 9.41842 10.4166C9.15051 10.6833 9 11.045 9 11.4222V26.3556C9 26.7328 9.15051 27.0945 9.41842 27.3612C9.68633 27.6279 10.0497 27.7778 10.4286 27.7778H27.5714C27.9503 27.7778 28.3137 27.6279 28.5816 27.3612C28.8495 27.0945 29 26.7328 29 26.3556V14.9778C29 14.6006 28.8495 14.2388 28.5816 13.9721C28.3137 13.7054 27.9503 13.5556 27.5714 13.5556ZM10.4286 26.3556V14.9778H27.5714V17.1111H21.8571C21.4783 17.1111 21.1149 17.261 20.847 17.5277C20.5791 17.7944 20.4286 18.1561 20.4286 18.5333V22.8C20.4286 23.1772 20.5791 23.5389 20.847 23.8057C21.1149 24.0724 21.4783 24.2222 21.8571 24.2222H27.5714V26.3556H10.4286ZM27.5714 18.5333V22.8H21.8571V18.5333H27.5714Z"
                            fill="#515C6F" />
                    </svg>
                    <div class="d-flex flex-column">
                        <h6 class="m-0">
                            You added
                        </h6>
                        <small>18 Dec 21, 08:22 PM</small>
                        <span class="diff-bg px-2 py-1 mx-md-3 mr-1 my-1 text-primary text-nowrap">
                            <b>PZ70001</b>(Computer zone)
                        </span>
                    </div>
                </div>
                <div class="pt-3 pe-3 pb-2 d-flex flex-column align-items-end">
                    <span class="fw-bolder text-success"> + ₹1250</span>
                    <span class="fw-bold text-success">Pending</span>
                    <button type="button" class="btn added-by-admin px-2 py-0 mt-1">
                        Added by admin
                    </button>

                </div>

            </div>



        </div>
        <div id="add-list-option" style="display: none;">
            <ul class="nav nav-pills d-flex flex-nowrap align-items-center justify-content-between gap-0 gap-md-1 my-3"
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
                        id="pills-date-range-tab" data-bs-toggle="pill" data-bs-target="#pills-date-range" type="button"
                        role="tab" aria-controls="pills-date-range" aria-selected="false">
                        Date Range
                    </button>
                </li>
            </ul>
            <div class="border rounded-2 px-2">
                <p class="py-1 bank-details-heading">Add bank Account</p>
                <form class="row g-3 register mb-2" novalidate="">
                    <div class="form-floating col-6 col-md-4 my-2">
                        <label class="visually-hidden" for="bankAccount"></label>
                        <select class="form-select py-0 bank-details-inputs" id="bankAccount">
                            <option selected="">Bank Account</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="form-floating col-6 col-md-4 my-1">
                        <input type="text" class="form-control bank-details-inputs form-control-sm" id="InputUsername"
                            placeholder="Bank Name">
                        <label class="ps-4 d-flex align-items-center" for="InputUsername">Bank Name</label>
                    </div>
                    <div class="form-floating col-6 col-md-4 my-1">
                        <input type="text" class="form-control bank-details-inputs form-control-sm" id="InputUsername"
                            placeholder="Holder Name">
                        <label class="ps-4 d-flex align-items-center" for="InputUsername">Holder Name</label>
                    </div>
                    <div class="form-floating col-6 col-md-4 my-1">
                        <input type="text" class="form-control bank-details-inputs form-control-sm" id="InputUsername"
                            placeholder="A/C No">
                        <label class="ps-4 d-flex align-items-center" for="InputUsername">A/C No</label>
                    </div>
                    <div class="form-floating col-6 col-md-4 my-1">
                        <input type="text" class="form-control bank-details-inputs form-control-sm" id="InputUsername"
                            placeholder="IFSC Code">
                        <label class="ps-4 d-flex align-items-center" for="InputUsername">IFSC Code</label>
                    </div>
                    <div class="form-floating col-6 col-md-4 my-1">
                        <button type="button" class="btn add-bank-account-btn w-100">Primary</button>
                    </div>
                </form>
            </div>
            <div class="mx-2">
                <p class="bank-list-heading py-1">List of Bank accounts & UPI’s</p>
                <div
                    class="d-flex align-items-center justify-content-between border rounded-2 px-2 bank-account-lists my-2">
                    <div class="py-1">
                        <p class="mb-1">Bank Name</p>
                        <p class="mb-1">Holder Name</p>
                        <p class="mb-1">A/C No</p>
                        <p class="mb-1">IFSC Code</p>
                    </div>
                    <div class="py-1">
                        <span class="mb-1 px-1 text-start bank-account-details-bg">Axis Bank</span><br>
                        <span class="mb-1 px-1 text-start bank-account-details-bg">PUC Zone</span><br>
                        <span class="mb-1 px-1 text-start bank-account-details-bg">918010028645992</span><br>
                        <span class="mb-1 px-1 text-start bank-account-details-bg">UTIB0001870</span>
                    </div>
                    <div class="pe-1"><button type="button" class="modal-btn-neutral py-2 px-2">
                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21.9375 6.5H18.6875V4.46875C18.6875 3.57246 17.9588 2.84375 17.0625 2.84375H8.9375C8.04121 2.84375 7.3125 3.57246 7.3125 4.46875V6.5H4.0625C3.61309 6.5 3.25 6.86309 3.25 7.3125V8.125C3.25 8.23672 3.34141 8.32812 3.45312 8.32812H4.98672L5.61387 21.6074C5.65449 22.4732 6.37051 23.1562 7.23633 23.1562H18.7637C19.632 23.1562 20.3455 22.4758 20.3861 21.6074L21.0133 8.32812H22.5469C22.6586 8.32812 22.75 8.23672 22.75 8.125V7.3125C22.75 6.86309 22.3869 6.5 21.9375 6.5ZM9.14062 4.67188H16.8594V6.5H9.14062V4.67188ZM18.5682 21.3281H7.43184L6.81738 8.32812H19.1826L18.5682 21.3281Z"
                                    fill="#515C6F" />
                            </svg>
                        </button></div>
                </div>
                <div
                    class="d-flex align-items-center justify-content-between border rounded-2 px-2 bank-account-lists my-2">
                    <div class="py-1">
                        <p class="mb-1">Bank Name</p>
                        <p class="mb-1">Holder Name</p>
                        <p class="mb-1">A/C No</p>
                        <p class="mb-1">IFSC Code</p>
                    </div>
                    <div class="py-1">
                        <span class="mb-1 px-1 text-start bank-account-details-bg">Axis Bank</span><br>
                        <span class="mb-1 px-1 text-start bank-account-details-bg">PUC Zone</span><br>
                        <span class="mb-1 px-1 text-start bank-account-details-bg">918010028645992</span><br>
                        <span class="mb-1 px-1 text-start bank-account-details-bg">UTIB0001870</span>
                    </div>
                    <div class="pe-1"><button type="button" class="modal-btn-neutral py-2 px-2">
                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21.9375 6.5H18.6875V4.46875C18.6875 3.57246 17.9588 2.84375 17.0625 2.84375H8.9375C8.04121 2.84375 7.3125 3.57246 7.3125 4.46875V6.5H4.0625C3.61309 6.5 3.25 6.86309 3.25 7.3125V8.125C3.25 8.23672 3.34141 8.32812 3.45312 8.32812H4.98672L5.61387 21.6074C5.65449 22.4732 6.37051 23.1562 7.23633 23.1562H18.7637C19.632 23.1562 20.3455 22.4758 20.3861 21.6074L21.0133 8.32812H22.5469C22.6586 8.32812 22.75 8.23672 22.75 8.125V7.3125C22.75 6.86309 22.3869 6.5 21.9375 6.5ZM9.14062 4.67188H16.8594V6.5H9.14062V4.67188ZM18.5682 21.3281H7.43184L6.81738 8.32812H19.1826L18.5682 21.3281Z"
                                    fill="#515C6F" />
                            </svg>
                        </button></div>
                </div>
                <div
                    class="d-flex align-items-center justify-content-between border rounded-2 px-2 bank-account-lists my-2">
                    <div class="py-1">
                        <p class="mb-1">Bank Name</p>
                        <p class="mb-1">Holder Name</p>
                        <p class="mb-1">A/C No</p>
                        <p class="mb-1">IFSC Code</p>
                    </div>
                    <div class="py-1">
                        <span class="mb-1 px-1 text-start bank-account-details-bg">Axis Bank</span><br>
                        <span class="mb-1 px-1 text-start bank-account-details-bg">PUC Zone</span><br>
                        <span class="mb-1 px-1 text-start bank-account-details-bg">918010028645992</span><br>
                        <span class="mb-1 px-1 text-start bank-account-details-bg">UTIB0001870</span>
                    </div>
                    <div class="pe-1"><button type="button" class="modal-btn-neutral py-2 px-2">
                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21.9375 6.5H18.6875V4.46875C18.6875 3.57246 17.9588 2.84375 17.0625 2.84375H8.9375C8.04121 2.84375 7.3125 3.57246 7.3125 4.46875V6.5H4.0625C3.61309 6.5 3.25 6.86309 3.25 7.3125V8.125C3.25 8.23672 3.34141 8.32812 3.45312 8.32812H4.98672L5.61387 21.6074C5.65449 22.4732 6.37051 23.1562 7.23633 23.1562H18.7637C19.632 23.1562 20.3455 22.4758 20.3861 21.6074L21.0133 8.32812H22.5469C22.6586 8.32812 22.75 8.23672 22.75 8.125V7.3125C22.75 6.86309 22.3869 6.5 21.9375 6.5ZM9.14062 4.67188H16.8594V6.5H9.14062V4.67188ZM18.5682 21.3281H7.43184L6.81738 8.32812H19.1826L18.5682 21.3281Z"
                                    fill="#515C6F" />
                            </svg>
                        </button></div>
                </div>
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
                        id="pills-date-range-tab" data-bs-toggle="pill" data-bs-target="#pills-date-range" type="button"
                        role="tab" aria-controls="pills-date-range" aria-selected="false">
                        Date Range
                    </button>
                </li>
            </ul>
            <form class="d-flex order-search-bar" role="search">
                <input class="form-control search-form" type="search" placeholder="Search" aria-label="Search">
                <button class="search-in-pending-search-btn p-0" type="submit">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
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

    @endsection
