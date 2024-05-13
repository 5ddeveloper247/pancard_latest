@extends('layouts.master.user_template.master')

@push('css')
@endpush

@section('content')
<section>
        <div class="container-fluid order-tab-container">
            <ul id="nav-order-tab" class="nav nav-pills d-flex align-items-center justify-content-between
                 flex-nowrap gap-2 px-0 px-md-5 mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <button id="tab-bg-color" class="nav-link filter_orders active" data-filter="all">All</button><!--  data-bs-toggle="pill"
                        data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all"
                        aria-selected="true" -->
                </li>
                <li class="nav-item">
                    <button id="tab-bg-color" class="nav-link filter_orders" data-filter="pending" >Pending</button><!-- data-bs-toggle="pill"
                        data-bs-target="#pills-pending" type="button" role="tab" aria-controls="pills-pending"
                        aria-selected="false" -->
                </li>
                <li class="nav-item">
                    <button id="tab-bg-color" class="nav-link filter_orders" data-filter="completed">Completed</button><!--  data-bs-toggle="pill"
                        data-bs-target="#pills-completed" type="button" role="tab" aria-controls="pills-completed"
                        aria-selected="false" -->
                </li>
                <form class="d-flex order-search-bar" action="javascript:;">
                    <input class="form-control me-2" type="search" placeholder="Search" style="width:220px;">
                    <button class="order-search-btn p-0 filter_search" type="button">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="30" height="30" rx="5" fill="#F7F7F7" />
                            <path
                                d="M21 21L18.1047 18.1047M18.1047 18.1047C18.6 17.6094 18.9928 17.0215 19.2608 16.3744C19.5289 15.7273 19.6668 15.0338 19.6668 14.3334C19.6668 13.633 19.5289 12.9395 19.2608 12.2924C18.9928 11.6453 18.6 11.0574 18.1047 10.5621C17.6094 10.0669 17.0215 9.67401 16.3744 9.40598C15.7273 9.13795 15.0338 9 14.3334 9C13.633 9 12.9395 9.13795 12.2924 9.40598C11.6453 9.67401 11.0574 10.0669 10.5621 10.5621C9.56191 11.5623 9 12.9189 9 14.3334C9 15.7479 9.56191 17.1045 10.5621 18.1047C11.5623 19.1049 12.9189 19.6668 14.3334 19.6668C15.7479 19.6668 17.1045 19.1049 18.1047 18.1047Z"
                                stroke="#515C6F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </form>
            </ul>
            <ul id="nav-order-tab" class="nav nav-pills d-flex align-items-center justify-content-between
                 flex-nowrap gap-2 px-0 px-md-5 mb-3" role="tablist">
                
                 <li class="nav-item" role="presentation">
                    <button type="button" id="tab-bg-color" class="nav-link filter1_orders" data-filter="today">Today</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button type="button" id="tab-bg-color" class="nav-link filter1_orders" data-filter="yesterday">Yesterday</button>
                </li>
                <form action="javascript:;">
                    <input class="form-control me-2" data-filter="3" id="filter_dateRange" type="text" placeholder="Choose Range" readonly style="width:220px;">
                    <!-- <button class="order-search-btn p-0" type="button">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="30" height="30" rx="5" fill="#F7F7F7" />
                            <path
                                d="M21 21L18.1047 18.1047M18.1047 18.1047C18.6 17.6094 18.9928 17.0215 19.2608 16.3744C19.5289 15.7273 19.6668 15.0338 19.6668 14.3334C19.6668 13.633 19.5289 12.9395 19.2608 12.2924C18.9928 11.6453 18.6 11.0574 18.1047 10.5621C17.6094 10.0669 17.0215 9.67401 16.3744 9.40598C15.7273 9.13795 15.0338 9 14.3334 9C13.633 9 12.9395 9.13795 12.2924 9.40598C11.6453 9.67401 11.0574 10.0669 10.5621 10.5621C9.56191 11.5623 9 12.9189 9 14.3334C9 15.7479 9.56191 17.1045 10.5621 18.1047C11.5623 19.1049 12.9189 19.6668 14.3334 19.6668C15.7479 19.6668 17.1045 19.1049 18.1047 18.1047Z"
                                stroke="#515C6F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </button> -->
                </form>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pucOrders_container" tabindex="0"><!--  role="tabpanel" aria-labelledby="pills-all-tab" -->
                    <!-- <div class="home-card d-flex align-items-center justify-content-between py-3 px-3 mb-4 mx-md-5 px-md-4">
                        <div class="d-flex flex-column">
                            <span class="fw-bold text-dark">
                                Abul Hussain Mazumder
                            </span>
                            <span class="text-dark d-flex ">2w with fine - <b>AS24A2590 </b></span>
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
                    </div>


                    <div class="home-card d-flex align-items-center justify-content-between py-3 px-3 mb-4
                        mx-md-5 px-md-4">
                        <div class="d-flex flex-column">
                            <span class="fw-bold text-dark">
                                Abul Hussain Mazumder
                            </span>
                            <span class="text-dark d-flex ">2w with fine - <b>AS24A2590 </b></span>
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
                            <span class="text-end bg-r ms-2 ms-sm-5 pe-2">
                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_887_44)">
                                        <path opacity="0.5"
                                            d="M9.56963 1.08337H3.43038C3.26246 1.08337 3.17904 1.08337 3.10862 1.08987C2.32321 1.16192 1.70029 1.81571 1.63096 2.63958C1.625 2.71379 1.625 2.80208 1.625 2.97758V10.9742C1.625 11.4465 2.19863 11.6475 2.46892 11.2689C2.51082 11.2082 2.56682 11.1586 2.6321 11.1244C2.69739 11.0901 2.77002 11.0722 2.84375 11.0722C2.91748 11.0722 2.99011 11.0901 3.0554 11.1244C3.12069 11.1586 3.17668 11.2082 3.21858 11.2689L3.45313 11.5971C3.52122 11.6958 3.61226 11.7764 3.7184 11.8321C3.82454 11.8878 3.94263 11.9169 4.0625 11.9169C4.18237 11.9169 4.30046 11.8878 4.4066 11.8321C4.51274 11.7764 4.60378 11.6958 4.67188 11.5971C4.73997 11.4985 4.83101 11.4178 4.93715 11.3621C5.04329 11.3064 5.16138 11.2773 5.28125 11.2773C5.40112 11.2773 5.51921 11.3064 5.62535 11.3621C5.73149 11.4178 5.82253 11.4985 5.89063 11.5971C5.95872 11.6958 6.04976 11.7764 6.1559 11.8321C6.26204 11.8878 6.38013 11.9169 6.5 11.9169C6.61987 11.9169 6.73796 11.8878 6.8441 11.8321C6.95024 11.7764 7.04128 11.6958 7.10938 11.5971C7.17747 11.4985 7.26851 11.4178 7.37465 11.3621C7.48079 11.3064 7.59888 11.2773 7.71875 11.2773C7.83862 11.2773 7.95671 11.3064 8.06285 11.3621C8.16899 11.4178 8.26003 11.4985 8.32813 11.5971C8.39622 11.6958 8.48726 11.7764 8.5934 11.8321C8.69954 11.8878 8.81763 11.9169 8.9375 11.9169C9.05737 11.9169 9.17546 11.8878 9.2816 11.8321C9.38774 11.7764 9.47878 11.6958 9.54688 11.5971L9.78142 11.2694C9.82332 11.2087 9.87932 11.1592 9.9446 11.1249C10.0099 11.0906 10.0825 11.0728 10.1563 11.0728C10.23 11.0728 10.3026 11.0906 10.3679 11.1249C10.4332 11.1592 10.4892 11.2087 10.5311 11.2694C10.8019 11.6475 11.375 11.4465 11.375 10.9742V2.97758C11.375 2.80208 11.375 2.71379 11.369 2.63958C11.3003 1.81571 10.6773 1.16192 9.89192 1.08987C9.82042 1.08337 9.737 1.08337 9.56963 1.08337Z"
                                            stroke="#FF0000" stroke-width="1.5" />
                                        <path
                                            d="M4.0625 8.39587H8.9375M7.58333 4.33337L5.41667 6.50004M5.41667 4.33337L7.58333 6.50004"
                                            stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_887_44">
                                            <rect width="13" height="13" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                Reason: Photo is Not clear
                            </span>
                        </div>
                    </div>


                    <div class="home-card d-flex align-items-center justify-content-between py-3 px-3 mb-4
                        mx-md-5 px-md-4">
                        <div class="d-flex flex-column">
                            <span class="fw-bold text-dark">
                                Abul Hussain Mazumder
                            </span>
                            <span class="text-dark d-flex ">2w with fine - <b>AS24A2590 </b></span>
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
                                <svg width="74" height="71" viewBox="0 0 74 71" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_954_149)">
                                        <rect x="5" y="3" width="63.0769" height="61" rx="5" fill="white" />
                                    </g>
                                    <path
                                        d="M42.3185 38.2812L51.5034 29.4713L51.6198 29.3419C51.7922 29.1162 51.8753 28.8374 51.8539 28.5568C51.8325 28.2762 51.7081 28.0125 51.5034 27.8141L42.3185 19.0082L42.1918 18.9026C41.4565 18.3648 40.374 18.8827 40.374 19.8368V24.0794L39.9145 24.1093C32.6372 24.671 28.3746 29.1626 27.3574 37.3092C27.2267 38.3549 28.4563 39.0102 29.2528 38.3171C32.1756 35.7715 35.1964 34.19 38.3316 33.5566C38.834 33.455 39.3385 33.3773 39.8471 33.3235L40.374 33.2777V37.4526L40.3842 37.616C40.5068 38.5183 41.6281 38.9425 42.3185 38.2812ZM40.0636 26.0952L42.4165 25.9418V21.8924L49.4548 28.6407L42.4165 35.3931V31.0967L39.6469 31.3397H39.6306C36.1523 31.7042 32.87 33.0626 29.7716 35.3273C30.3803 32.6603 31.4199 30.6545 32.7863 29.2184C34.4815 27.4357 36.8508 26.3461 40.0636 26.0952ZM26.326 20.6773C24.9718 20.6773 23.673 21.202 22.7154 22.1358C21.7578 23.0697 21.2198 24.3363 21.2198 25.6569V41.5917C21.2198 42.9123 21.7578 44.1789 22.7154 45.1128C23.673 46.0466 24.9718 46.5713 26.326 46.5713H42.6657C44.0199 46.5713 45.3187 46.0466 46.2763 45.1128C47.2339 44.1789 47.7718 42.9123 47.7718 41.5917V39.5998C47.7718 39.3357 47.6642 39.0824 47.4727 38.8956C47.2812 38.7088 47.0214 38.6039 46.7506 38.6039C46.4797 38.6039 46.22 38.7088 46.0285 38.8956C45.837 39.0824 45.7294 39.3357 45.7294 39.5998V41.5917C45.7294 42.3841 45.4066 43.144 44.832 43.7043C44.2575 44.2646 43.4782 44.5794 42.6657 44.5794H26.326C25.5135 44.5794 24.7342 44.2646 24.1596 43.7043C23.5851 43.144 23.2623 42.3841 23.2623 41.5917V25.6569C23.2623 24.8645 23.5851 24.1046 24.1596 23.5443C24.7342 22.984 25.5135 22.6692 26.326 22.6692H32.4534C32.7242 22.6692 32.984 22.5643 33.1755 22.3775C33.367 22.1907 33.4746 21.9374 33.4746 21.6733C33.4746 21.4091 33.367 21.1558 33.1755 20.969C32.984 20.7823 32.7242 20.6773 32.4534 20.6773H26.326Z"
                                        fill="#515C6F" />
                                    <defs>
                                        <filter id="filter0_d_954_149" x="0" y="0" width="73.0769" height="71"
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
                                                result="effect1_dropShadow_954_149" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_954_149"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                                <svg width="74" height="71" viewBox="0 0 74 71" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_954_141)">
                                        <rect x="5.69232" y="3" width="63.0769" height="61" rx="5" fill="white" />
                                    </g>
                                    <path
                                        d="M37.2309 28.4456L37.2309 46.5713M37.2309 46.5713L32.6353 41.6913M37.2309 46.5713L41.8265 41.6913"
                                        stroke="#515C6F" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M43.3583 18.6854L31.1033 18.6854C26.7712 18.6854 24.6036 18.6854 23.2586 19.9096C21.9121 21.1366 21.9121 23.1067 21.9121 27.0511L21.9121 28.4454C21.9121 32.3885 21.9121 34.36 23.2586 35.5856C24.4351 36.6564 26.2397 36.7916 29.5715 36.8084M44.8902 36.8084C48.222 36.7916 50.0265 36.6564 51.203 35.5856C52.5495 34.36 52.5495 32.3885 52.5495 28.4454L52.5495 27.0511C52.5495 23.1067 52.5495 21.1352 51.203 19.9096C50.7434 19.4913 50.1889 19.2166 49.4858 19.0354"
                                        stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" />
                                    <defs>
                                        <filter id="filter0_d_954_141" x="0.692322" y="0" width="73.0769" height="71"
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
                                                result="effect1_dropShadow_954_141" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_954_141"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
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
                            <span class="text-end bg-r ms-2 ms-sm-5 pe-3">
                                . 50 days remaining
                            </span>
                        </div>
                    </div>


                    <div class="home-card d-flex align-items-center justify-content-between py-3 px-3 mb-4
                        mx-md-5 px-md-4">
                        <div class="d-flex flex-column">
                            <span class="fw-bold text-dark">
                                Abul Hussain Mazumder
                            </span>
                            <span class="text-dark d-flex ">2w with fine - <b>AS24A2590 </b></span>
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
                                <svg width="74" height="71" viewBox="0 0 74 71" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_954_149)">
                                        <rect x="5" y="3" width="63.0769" height="61" rx="5" fill="white" />
                                    </g>
                                    <path
                                        d="M42.3185 38.2812L51.5034 29.4713L51.6198 29.3419C51.7922 29.1162 51.8753 28.8374 51.8539 28.5568C51.8325 28.2762 51.7081 28.0125 51.5034 27.8141L42.3185 19.0082L42.1918 18.9026C41.4565 18.3648 40.374 18.8827 40.374 19.8368V24.0794L39.9145 24.1093C32.6372 24.671 28.3746 29.1626 27.3574 37.3092C27.2267 38.3549 28.4563 39.0102 29.2528 38.3171C32.1756 35.7715 35.1964 34.19 38.3316 33.5566C38.834 33.455 39.3385 33.3773 39.8471 33.3235L40.374 33.2777V37.4526L40.3842 37.616C40.5068 38.5183 41.6281 38.9425 42.3185 38.2812ZM40.0636 26.0952L42.4165 25.9418V21.8924L49.4548 28.6407L42.4165 35.3931V31.0967L39.6469 31.3397H39.6306C36.1523 31.7042 32.87 33.0626 29.7716 35.3273C30.3803 32.6603 31.4199 30.6545 32.7863 29.2184C34.4815 27.4357 36.8508 26.3461 40.0636 26.0952ZM26.326 20.6773C24.9718 20.6773 23.673 21.202 22.7154 22.1358C21.7578 23.0697 21.2198 24.3363 21.2198 25.6569V41.5917C21.2198 42.9123 21.7578 44.1789 22.7154 45.1128C23.673 46.0466 24.9718 46.5713 26.326 46.5713H42.6657C44.0199 46.5713 45.3187 46.0466 46.2763 45.1128C47.2339 44.1789 47.7718 42.9123 47.7718 41.5917V39.5998C47.7718 39.3357 47.6642 39.0824 47.4727 38.8956C47.2812 38.7088 47.0214 38.6039 46.7506 38.6039C46.4797 38.6039 46.22 38.7088 46.0285 38.8956C45.837 39.0824 45.7294 39.3357 45.7294 39.5998V41.5917C45.7294 42.3841 45.4066 43.144 44.832 43.7043C44.2575 44.2646 43.4782 44.5794 42.6657 44.5794H26.326C25.5135 44.5794 24.7342 44.2646 24.1596 43.7043C23.5851 43.144 23.2623 42.3841 23.2623 41.5917V25.6569C23.2623 24.8645 23.5851 24.1046 24.1596 23.5443C24.7342 22.984 25.5135 22.6692 26.326 22.6692H32.4534C32.7242 22.6692 32.984 22.5643 33.1755 22.3775C33.367 22.1907 33.4746 21.9374 33.4746 21.6733C33.4746 21.4091 33.367 21.1558 33.1755 20.969C32.984 20.7823 32.7242 20.6773 32.4534 20.6773H26.326Z"
                                        fill="#515C6F" />
                                    <defs>
                                        <filter id="filter0_d_954_149" x="0" y="0" width="73.0769" height="71"
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
                                                result="effect1_dropShadow_954_149" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_954_149"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                                <svg width="74" height="71" viewBox="0 0 74 71" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_954_141)">
                                        <rect x="5.69232" y="3" width="63.0769" height="61" rx="5" fill="white" />
                                    </g>
                                    <path
                                        d="M37.2309 28.4456L37.2309 46.5713M37.2309 46.5713L32.6353 41.6913M37.2309 46.5713L41.8265 41.6913"
                                        stroke="#515C6F" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M43.3583 18.6854L31.1033 18.6854C26.7712 18.6854 24.6036 18.6854 23.2586 19.9096C21.9121 21.1366 21.9121 23.1067 21.9121 27.0511L21.9121 28.4454C21.9121 32.3885 21.9121 34.36 23.2586 35.5856C24.4351 36.6564 26.2397 36.7916 29.5715 36.8084M44.8902 36.8084C48.222 36.7916 50.0265 36.6564 51.203 35.5856C52.5495 34.36 52.5495 32.3885 52.5495 28.4454L52.5495 27.0511C52.5495 23.1067 52.5495 21.1352 51.203 19.9096C50.7434 19.4913 50.1889 19.2166 49.4858 19.0354"
                                        stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" />
                                    <defs>
                                        <filter id="filter0_d_954_141" x="0.692322" y="0" width="73.0769" height="71"
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
                                                result="effect1_dropShadow_954_141" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_954_141"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
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
                            <span class="text-end bg-r ms-2 ms-sm-5 pe-3">
                                . 10 days remaining
                            </span>
                        </div>
                    </div> -->
                </div>
                <div class="tab-pane fade" id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab"
                    tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-complete" role="tabpanel" aria-labelledby="pills-complete-tab"
                    tabindex="0">...</div>
            </div>
        </div>
    </section>

    <!-- ====================================POPUP=================================== -->
    <div class="modal fade bottom-to-top" id="uploadsModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="uploadsModalLabel" aria-hidden="true">
        <div class="modal-dialog h-75 d-flex align-items-center justify-content-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-4 text-dark fw-bolder" id="staticBackdropLabel">Uploaded Files</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex gap-3 align-items-center justify-content-center">
                    <div class="border rounded-4 w-100 p-2">
                        <span class="text-start fw-semibold">Vehicle Photo</span>
                        <div class="vehicle-photo d-flex align-items-center justify-content-center">
                            <img id="puc_vehicle_img" src="{{ asset('assets_user/images/bike 1.png') }}" alt="">
                        </div>
                    </div>
                    <div class="border rounded-4 w-100 p-2">
                        <span class="text-start fw-semibold">challan SS</span>
                        <div class="challan-photo d-flex align-items-center justify-content-center">
                            <img id="puc_challan_img" src="{{ asset('assets_user/images/bike 1.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    
    <script src="{{ asset('assets_user/customjs/script_orders.js') }}"></script>
	
@endpush
