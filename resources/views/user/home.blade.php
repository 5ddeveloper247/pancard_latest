@extends('layouts.master.user_template.master')

@push('css')
@endpush

@section('content')
    <div class="tab-content" id="pills-tabContent">
        <!-- =================================HOME-SECTION-TAB========================= -->
        <section>
            <div class="container-fluid main-home-page g-0" id="main_section">
                <div class="d-flex align-items-center justify-content-center">
                    <button type="button" id="makeNewPuc_btn"
                        class="make-new-btn d-flex align-items-center justify-content-center gap-3 py-2 mb-4">
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.35428 22.0629V31.8686L9.80571 34.32H31.8686L34.32 31.8686V9.80572L33.6091 8.0652L26.2548 0.710914L24.5143 0H19.6114V2.45143H24.5143L31.8686 9.80572V31.8686H9.80571V22.0629H7.35428ZM26.9657 12.2571H22.0629V7.35429H19.6114V12.2571H14.7086V14.7086H19.6114V19.6114H22.0629V14.7086H26.9657V12.2571ZM14.7086 24.5143H26.9657V26.9657H14.7086V24.5143Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M17.3071 6.99638L12.0488 12.2571L10.3156 10.524L13.4829 7.35429H6.12857C5.15333 7.35429 4.21804 7.7417 3.52844 8.4313C2.83884 9.1209 2.45143 10.0562 2.45143 11.0314C2.45143 12.0067 2.83884 12.942 3.52844 13.6316C4.21804 14.3212 5.15333 14.7086 6.12857 14.7086H7.35429V17.16H6.12857C4.50317 17.16 2.94435 16.5143 1.79502 15.365C0.645687 14.2157 0 12.6568 0 11.0314C0 9.40603 0.645687 7.84721 1.79502 6.69788C2.94435 5.54855 4.50317 4.90286 6.12857 4.90286H13.4829L10.3132 1.73316L12.0463 0L17.3095 5.26077V6.99638H17.3071Z"
                                fill="white" />
                        </svg>
                        Make new PUC
                    </button>
                </div>

                <div class="diff-bg d-flex align-items-center justify-content-between py-3 px-3 mb-4 px-md-5">
                    <span class="fw-bold">
                        <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.25 7.20833C17.7688 7.20833 19 5.87452 19 4.22917C19 2.58382 17.7688 1.25 16.25 1.25C14.7312 1.25 13.5 2.58382 13.5 4.22917C13.5 5.87452 14.7312 7.20833 16.25 7.20833Z"
                                stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M9.5 1.25H7.4C5.16 1.25 4.04 1.25 3.184 1.72233C2.43139 2.13778 1.81949 2.80067 1.436 3.616C1 4.54333 1 5.75667 1 8.18333V13.8167C1 16.2433 1 17.4567 1.436 18.384C1.81949 19.1993 2.43139 19.8622 3.184 20.2777C4.04 20.75 5.16 20.75 7.4 20.75H12.6C14.84 20.75 15.96 20.75 16.816 20.2777C17.5686 19.8622 18.1805 19.1993 18.564 18.384C19 17.4567 19 16.2433 19 13.8167V11.5417"
                                stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Notifications
                    </span>
                    <button type="button" class="view-btn py-1 px-3" id="viewAllNotif_btn">
                        View All
                    </button>
                </div>

                @foreach($notifications_limited as $value)
                    <div class="home-card py-3 px-3 mb-4 mx-3 mx-md-5 px-md-4">
                        @if($value->url != null)
                            <h5><a href="{{$value->url}}" target="_blank">{{$value->title}}</a></h5>
                        @else
                            <h5>{{$value->title}}</h5>
                        @endif
                        <p>
                        {{$value->message}}
                        </p>
                    </div>
                @endforeach

                <!-- <div class="diff-bg d-flex align-items-center justify-content-between py-3 px-3 mb-4 px-md-5">
                    <span class="fw-bold">
                        <svg width="21" height="29" viewBox="0 0 21 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.5 6.75008V10.6251L15.6667 5.45841L10.5 0.291748V4.16675C4.79084 4.16675 0.166672 8.79091 0.166672 14.5001C0.166672 16.528 0.760838 18.4138 1.76834 20.0026L3.65417 18.1167C3.05649 17.0052 2.7457 15.7621 2.75001 14.5001C2.75001 10.2247 6.22459 6.75008 10.5 6.75008ZM19.2317 8.99758L17.3458 10.8834C17.9142 11.9684 18.25 13.1955 18.25 14.5001C18.25 18.7755 14.7754 22.2501 10.5 22.2501V18.3751L5.33334 23.5417L10.5 28.7084V24.8334C16.2092 24.8334 20.8333 20.2092 20.8333 14.5001C20.8333 12.4722 20.2392 10.5863 19.2317 8.99758Z"
                                fill="#515C6F" />
                        </svg>
                        Renewals
                    </span>
                    <button type="button" class="view-btn py-1 px-3">
                        View All
                    </button>
                </div> -->

                <!-- <div id="edit-vehicle-details" class="home-card d-flex align-items-center justify-content-between py-3 px-3 mb-4 mx-3 
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
                            <svg width="74" height="71" viewBox="0 0 74 71" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d_954_152)">
                                    <rect x="5.38458" y="3" width="63.0769" height="61" rx="5" fill="white" />
                                </g>
                                <path opacity="0.5" d="M47.7363 29.4336H39.4762" stroke="#515C6F" stroke-width="1.5"
                                    stroke-linecap="round" />
                                <path opacity="0.5"
                                    d="M34.5201 18.2502H45.2582C46.0248 18.2502 46.4097 18.2502 46.7318 18.2918C47.8131 18.4297 48.8171 18.9086 49.5883 19.6544C50.3595 20.4002 50.8547 21.3712 50.9973 22.4168C51.0403 22.7284 51.0403 23.1006 51.0403 23.8419"
                                    stroke="#515C6F" stroke-width="1.5" />
                                <path
                                    d="M21.304 24.5608C21.304 23.1501 21.304 22.4456 21.4197 21.8576C21.6662 20.5953 22.3004 19.434 23.2396 18.5255C24.1788 17.6169 25.3793 17.0032 26.6846 16.7644C27.2942 16.6526 28.0244 16.6526 29.4815 16.6526C30.1192 16.6526 30.4397 16.6526 30.7469 16.6797C32.0703 16.7999 33.3254 17.3033 34.3483 18.124C34.5862 18.3141 34.8109 18.5314 35.2635 18.9691L36.1721 19.8478C37.5202 21.1515 38.1942 21.8033 39.0004 22.2363C39.4435 22.4751 39.9136 22.6638 40.4013 22.7986C41.2901 23.0431 42.2433 23.0431 44.1481 23.0431H44.7659C49.114 23.0431 51.2897 23.0431 52.7022 24.2732C52.8327 24.3851 52.9566 24.5049 53.0723 24.6311C54.3443 25.9971 54.3443 28.1011 54.3443 32.3061V35.824C54.3443 41.8486 54.3443 44.8617 52.4081 46.7326C50.4736 48.605 47.3579 48.605 41.1282 48.605H34.5201C28.2904 48.605 25.1747 48.605 23.2402 46.7326C21.304 44.8617 21.304 41.8486 21.304 35.824V24.5608Z"
                                    stroke="#515C6F" stroke-width="1.5" />
                                <defs>
                                    <filter id="filter0_d_954_152" x="0.384583" y="0" width="73.0769" height="71"
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
                                            result="effect1_dropShadow_954_152" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_954_152"
                                            result="shape" />
                                    </filter>
                                </defs>
                            </svg>
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
            <div class="main-home-page" id="notification_section" style="display:none;">
                <div class="diff-bg d-flex align-items-center justify-content-between py-3 px-3 mb-4 px-md-5">
                    <span class="fw-bold">
                        <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.25 7.20833C17.7688 7.20833 19 5.87452 19 4.22917C19 2.58382 17.7688 1.25 16.25 1.25C14.7312 1.25 13.5 2.58382 13.5 4.22917C13.5 5.87452 14.7312 7.20833 16.25 7.20833Z"
                                stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M9.5 1.25H7.4C5.16 1.25 4.04 1.25 3.184 1.72233C2.43139 2.13778 1.81949 2.80067 1.436 3.616C1 4.54333 1 5.75667 1 8.18333V13.8167C1 16.2433 1 17.4567 1.436 18.384C1.81949 19.1993 2.43139 19.8622 3.184 20.2777C4.04 20.75 5.16 20.75 7.4 20.75H12.6C14.84 20.75 15.96 20.75 16.816 20.2777C17.5686 19.8622 18.1805 19.1993 18.564 18.384C19 17.4567 19 16.2433 19 13.8167V11.5417"
                                stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Notifications
                    </span>
                    <button type="button" class="view-btn py-1 px-3" id="backToMainPage">
                        Back to profile
                    </button>
                </div>
                @foreach($notifications_all as $value)
                <div class="home-card py-3 px-3 mb-4 mx-3 mx-md-5 px-md-4">
                    @if($value->url != null)
                        <h5><a href="{{$value->url}}" target="_blank">{{$value->title}}</a></h5>
                    @else
                        <h5>{{$value->title}}</h5>
                    @endif
                    <p>
                    {{$value->message}}
                    </p>
                </div>
                @endforeach
                
                
            </div>
            <div class="container-fluid vehicle-details-container g-0" id="makePuc_section">
                <button type="button" class="view-btn py-1 px-3" id="backToMainPage">
                    <&nbsp;Back to profile
                </button>
                <form class="row g-3 register pt-4" id="puc_create_form" novalidate>
                    <div class="form-floating col-6 col-md-4">
                        <label class="visually-hidden" for="puc_type"></label>
                        <select class="form-select" id="puc_type" name="puc_type" onchange="getPucTypeRate()">
                            <option value="">PUC Type</option>
                            @foreach($userPucTypes as $rate)
                                <option value="{{$rate->puc_type_id}}">{{$rate->pucType->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-floating col-6 col-md-4">
                        <input type="text" class="form-control" id="registration_number" name="registration_number" maxlength="15" placeholder="DG5S8FU"/>
                        <label class="ps-4" for="registration_number">Registeration No</label>
                    </div>

                    <div class="form-floating col-6 col-md-4">
                        <input type="text" class="form-control" id="vehicle_model" name="vehicle_model" maxlength="20" placeholder="name@example.com" />
                        <label class="ps-4" for="vehicle_model">Vehicle model</label>
                    </div>

                    <div class="form-floating col-6 col-md-4">
                        <input type="text" class="form-control" id="puc_name" name="puc_name" maxlength="50" placeholder="123"/>
                        <label class="ps-4" for="puc_name">Name</label>
                    </div>

                    <div class="form-floating col-6 col-md-4">
                        <input type="number" class="form-control" id="mobile_number" name="mobile_number" maxlength="15" placeholder="name@example.com" />
                        <label class="ps-4" for="mobile_number">Mobile No</label>
                    </div>

                    <div class="form-floating col-6 col-md-4">
                        <div id="cameraIcon" class="upload px-4 d-flex align-items-center justify-content-between">
                            <span id="picturename" style="max-width: 88% !important; overflow: hidden; text-overflow: ellipsis;">Upload Vehicle Photo</span>
                            <input type="file" accept="image/*" {{@$user->upload_option == '0' ? "capture=camera" : ''}} id="upload_vehicle" name="upload_vehicle" multiple="false" style="display: none;">
                            <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11 14C12.6569 14 14 12.6569 14 11C14 9.34315 12.6569 8 11 8C9.34315 8 8 9.34315 8 11C8 12.6569 9.34315 14 11 14Z"
                                    stroke="#727C8E" stroke-width="1.5" />
                                <path
                                    d="M1 11.364C1 8.29905 1 6.76705 1.749 5.66705C2.07416 5.1887 2.49085 4.77949 2.975 4.46305C3.695 3.99005 4.597 3.82105 5.978 3.76105C6.637 3.76105 7.204 3.27105 7.333 2.63605C7.43158 2.17092 7.68773 1.75408 8.05815 1.456C8.42857 1.15791 8.89055 0.996855 9.366 1.00005H12.634C13.622 1.00005 14.473 1.68505 14.667 2.63605C14.796 3.27105 15.363 3.76105 16.022 3.76105C17.402 3.82105 18.304 3.99105 19.025 4.46305C19.51 4.78105 19.927 5.19005 20.251 5.66705C21 6.76705 21 8.29905 21 11.364C21 14.428 21 15.96 20.251 17.061C19.9253 17.5389 19.5087 17.948 19.025 18.265C17.904 19 16.343 19 13.222 19H8.778C5.657 19 4.096 19 2.975 18.265C2.49154 17.9477 2.07529 17.5382 1.75 17.06C1.53326 16.7361 1.3733 16.3777 1.277 16M18 8.00005H17"
                                    stroke="#727C8E" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                    </div>

                    <div class="row gy-2 gx-0 gap-2 pe-2">
                        <div class="col-2 challan ms-2 px-2 pb-2">
                            <label for="challan">
                                Challan
                            </label>
                            <div class="form-floating">
                                <select id="Challan-form" class="form-select" name="challan">
                                    <option value="">choose</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-floating col challan_opt_div" style="display:none;">
                            <input type="number" class="form-control" id="chassis_number" name="chassis_number" maxlength="5" placeholder="name@example.com" />
                            <label class="ps-4" for="chassis_number">Chasis last 5 digits</label>
                        </div>

                        <div class="form-floating col challan_opt_div" style="display:none;">
                            <input type="number" class="form-control" id="engine_number" name="engine_number" maxlength="20" placeholder="name@example.com" />
                            <label class="ps-4" for="engine_number">Engine last 5 digits</label>
                        </div>
                    </div>
                    

                    <div class="form-floating col-8 challan_opt_div" style="display:none;">
                        <div id="challanIcon" class="upload px-4 d-flex align-items-center justify-content-between">
                        <span id="challanName" style="max-width: 88% !important; overflow: hidden; text-overflow: ellipsis;">Upload challan Screenshot</span>
                            <input type="file" accept="image/*" capture="camera" id="upload_challan" name="upload_challan" multiple="false" style="display: none;">
                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.49995 11.4V1M9.49995 1L12.05 3.8M9.49995 1L6.94995 3.8" stroke="#515C6F"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M6.1 17H12.9C15.3038 17 16.5066 17 17.2529 16.2976C18 15.5936 18 14.4632 18 12.2V11.4C18 9.13756 18 8.00636 17.2529 7.30316C16.6001 6.68876 15.5988 6.61116 13.75 6.60156M5.25 6.60156C3.40125 6.61116 2.39995 6.68876 1.74715 7.30316C1 8.00636 1 9.13756 1 11.4V12.2C1 14.4632 1 15.5944 1.74715 16.2976C2.00215 16.5376 2.30985 16.6952 2.7 16.7992"
                                    stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                    </div>

                    <div class="form-floating col-4">
                        <div class="upload py-1 px-4">
                            Charges <br>
                            <b class="text-dark fs-5" id="puc_charges"></b>
                        </div>
                        <input type="hidden" id="puc_type_rate" name="puc_type_rate" value="0">
                    </div>

                    <div class="py-3 text-center">
                        <button type="button" id="puc_create_submit" class="vehicle-info-btn w-100 py-3">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@push('script')

    <script src="{{ asset('assets_user/customjs/script_home.js') }}"></script>
	<script>
        var upload_option = '{{@$user->upload_option}}';
    </script>
@endpush
