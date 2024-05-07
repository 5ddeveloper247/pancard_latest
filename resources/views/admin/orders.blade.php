@extends('layouts.master.admin_template.master')

@push('css')
@endpush

@section('content')
	<section class="admin-order-section">
        <!-- =====ORDER-SUB-TABS====== -->
        <ul class="nav nav-pills d-flex flex-nowrap align-items-center justify-content-between gap-0 gap-md-1 my-3"
            id="pills-tab" role="tablist">
            <li class="nav-item px-1" role="presentation">
                <button id="nav-sub-links"
                    class="nav-link text-nowrap px-2 px-md-3 active d-flex flex-column align-items-center justify-content-center"
                    id="pills-pending-tab" data-bs-toggle="pill" data-bs-target="#pills-pending" type="button"
                    role="tab" aria-controls="pills-pending" aria-selected="true">
                    Pending
                </button>
            </li>
            <li class="nav-item px-1" role="presentation">
                <button id="nav-sub-links"
                    class="nav-link text-nowrap px-2 px-md-3  d-flex flex-column align-items-center justify-content-center"
                    id="pills-order-history-tab" data-bs-toggle="pill" data-bs-target="#pills-order-history"
                    type="button" role="tab" aria-controls="pills-order-history" aria-selected="false">
                    Order History
                </button>
            </li>
            <li class="nav-item px-1" role="presentation">
                <button id="nav-sub-links"
                    class="nav-link text-nowrap px-2 px-md-3  d-flex flex-column align-items-center justify-content-center"
                    id="pills-bulk-upload-tab" data-bs-toggle="pill" data-bs-target="#pills-bulk-upload" type="button"
                    role="tab" aria-controls="pills-bulk-upload" aria-selected="false">
                    Bulk Upload
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
        <!-- =====ORDER-SUB-TABS-CONTENT====== -->
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-pending" role="tabpanel"
                aria-labelledby="pills-pending-tab" tabindex="0">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-all" role="tabpanel"
                        aria-labelledby="pills-all-tab" tabindex="0">
                        <div class="home-card py-1 px-2 mb-2 mx-md-0 px-md-4">
                            <div class="d-flex align-items-center justify-content-between ">
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
                                    <div class="d-flex justify-content-md-center justify-content-between">
                                    </div>

                                </div>

                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="modal-btn-neutral py-1 px-2">
                                            <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.6654 13.1353L19.49 7.35834L19.5638 7.27345C19.6731 7.12545 19.7258 6.94267 19.7122 6.75865C19.6987 6.57463 19.6198 6.40172 19.49 6.27165L13.6654 0.497273L13.5851 0.428048C13.1188 0.0753947 12.4323 0.414987 12.4323 1.04062V3.82266L12.1409 3.84226C7.52604 4.21058 4.82292 7.15589 4.1779 12.4979C4.095 13.1837 4.87473 13.6134 5.37986 13.1588C7.23332 11.4896 9.14895 10.4525 11.1371 10.0372C11.4557 9.97059 11.7756 9.91965 12.0982 9.88439L12.4323 9.85435V12.592L12.4388 12.6991C12.5165 13.2908 13.2276 13.569 13.6654 13.1353ZM12.2355 5.14446L13.7275 5.04389V2.38854L18.1909 6.81369L13.7275 11.2414V8.42414L11.9712 8.58349H11.9609C9.75511 8.82251 7.67369 9.71328 5.70885 11.1983C6.09482 9.44945 6.75409 8.13418 7.62059 7.19246C8.69562 6.02348 10.1981 5.30903 12.2355 5.14446ZM3.52381 1.5918C2.66503 1.5918 1.84142 1.93583 1.23417 2.54819C0.626917 3.16056 0.285767 3.9911 0.285767 4.85711V15.3061C0.285767 16.1721 0.626917 17.0027 1.23417 17.615C1.84142 18.2274 2.66503 18.5714 3.52381 18.5714H13.8856C14.7443 18.5714 15.568 18.2274 16.1752 17.615C16.7825 17.0027 17.1236 16.1721 17.1236 15.3061V14C17.1236 13.8268 17.0554 13.6607 16.9339 13.5382C16.8125 13.4157 16.6478 13.3469 16.476 13.3469C16.3042 13.3469 16.1395 13.4157 16.0181 13.5382C15.8966 13.6607 15.8284 13.8268 15.8284 14V15.3061C15.8284 15.8257 15.6237 16.324 15.2593 16.6915C14.895 17.0589 14.4008 17.2653 13.8856 17.2653H3.52381C3.00854 17.2653 2.51438 17.0589 2.15003 16.6915C1.78567 16.324 1.58098 15.8257 1.58098 15.3061V4.85711C1.58098 4.33751 1.78567 3.83918 2.15003 3.47176C2.51438 3.10434 3.00854 2.89793 3.52381 2.89793H7.40947C7.58122 2.89793 7.74595 2.82912 7.8674 2.70665C7.98885 2.58418 8.05708 2.41807 8.05708 2.24487C8.05708 2.07166 7.98885 1.90556 7.8674 1.78308C7.74595 1.66061 7.58122 1.5918 7.40947 1.5918H3.52381Z"
                                                    fill="#515C6F" />
                                            </svg>
                                        </button>
                                        <button type="button" class="modal-btn-completed py-1 px-2 ms-1"
                                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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
                                        <button type="button" class="modal-btn-completed py-1 px-2 ms-1">
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
                            <div class="d-flex flex-nowrap justify-content-md-center justify-content-around">
                                <div>
                                    <span class="diff-bg px-2 py-1 mx-md-3 mr-1 my-1 text-primary text-nowrap">
                                        <b>PZ70001</b>(Computer zone)
                                    </span>
                                </div>
                                <div class="d-flex flex-nowrap">
                                    <select class="form-select pending-dropdown py-0 my-1 ms-2" id="userCity">
                                        <option selected="">Photo not clear</option>
                                        <option value="1">Vehicle Not found</option>
                                        <option value="2">Fine not paid</option>
                                        <option value="3">Wrong vehicle selected</option>
                                    </select>
                                    <span class="states-btns mx-md-3 ms-1 my-1 text-white text-nowrap">
                                        <button type="button" class="btn action-btns btn-danger px-2 py-0">
                                            Reject
                                        </button>
                                    </span>
                                    <span class="states-btns mx-md-3 ms-1 my-1 text-white text-nowrap">
                                        <button type="button" class="btn action-btns btn-primary px-2 py-0"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Complete
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="home-card py-1 px-2 mb-2 mx-md-0 px-md-4">
                            <div class="d-flex align-items-center justify-content-between ">
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
                                    <div class="d-flex justify-content-md-center justify-content-between">
                                    </div>

                                </div>

                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <!-- Button trigger modal -->

                                        <button type="button" class="modal-btn-completed py-1 px-2 ms-1"
                                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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
                                        <button type="button" class="modal-btn-completed py-1 px-2 ms-1"
                                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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
                                        <button type="button" class="modal-btn-completed py-1 px-2 ms-1">
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
                            <div class="d-flex flex-nowrap justify-content-md-center justify-content-around">
                                <div>
                                    <span class="diff-bg px-2 py-1 mx-md-3 mr-1 my-1 text-primary text-nowrap">
                                        <b>PZ70001</b>(Computer zone)
                                    </span>
                                </div>
                                <div class="d-flex flex-nowrap">
                                    <select class="form-select pending-dropdown py-0 my-1 ms-2" id="userCity">
                                        <option selected="">Photo not clear</option>
                                        <option value="1">Vehicle Not found</option>
                                        <option value="2">Fine not paid</option>
                                        <option value="3">Wrong vehicle selected</option>
                                    </select>
                                    <span class="states-btns mx-md-3 ms-1 my-1 text-white text-nowrap">
                                        <button type="button" class="btn action-btns btn-danger px-2 py-0">
                                            Reject
                                        </button>
                                    </span>
                                    <span class="states-btns mx-md-3 ms-1 my-1 text-white text-nowrap">
                                        <button type="button" class="btn action-btns btn-primary px-2 py-0"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Complete
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="home-card py-1 px-2 mb-2 mx-md-0 px-md-4">
                            <div class="d-flex align-items-center justify-content-between ">
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
                                    <div class="d-flex justify-content-md-center justify-content-between">
                                    </div>

                                </div>

                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <!-- Button trigger modal -->

                                        <button type="button" class="modal-btn-completed py-1 px-2 ms-1"
                                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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
                                        <button type="button" class="modal-btn-completed py-1 px-2 ms-1"
                                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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
                                        <button type="button" class="modal-btn-completed py-1 px-2 ms-1">
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
                            <div class="d-flex flex-nowrap justify-content-md-center justify-content-around">
                                <div>
                                    <span class="diff-bg px-2 py-1 mx-md-3 mr-1 my-1 text-primary text-nowrap">
                                        <b>PZ70001</b>(Computer zone)
                                    </span>
                                </div>
                                <div class="d-flex flex-nowrap">
                                    <select class="form-select pending-dropdown py-0 my-1 ms-2" id="userCity">
                                        <option selected="">Photo not clear</option>
                                        <option value="1">Vehicle Not found</option>
                                        <option value="2">Fine not paid</option>
                                        <option value="3">Wrong vehicle selected</option>
                                    </select>
                                    <span class="states-btns mx-md-3 ms-1 my-1 text-white text-nowrap">
                                        <button type="button" class="btn action-btns btn-danger px-2 py-0">
                                            Reject
                                        </button>
                                    </span>
                                    <span class="states-btns mx-md-3 ms-1 my-1 text-white text-nowrap">
                                        <button type="button" class="btn action-btns btn-primary px-2 py-0"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Complete
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab"
                        tabindex="0">...</div>
                    <div class="tab-pane fade" id="pills-complete" role="tabpanel" aria-labelledby="pills-complete-tab"
                        tabindex="0">...</div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-order-history" role="tabpanel"
                aria-labelledby="pills-order-history-tab" tabindex="0">
                <!-- =====PENDING-ORDERS-TABS====== -->
                <ul class="nav nav-pills d-flex flex-nowrap align-items-center justify-content-between gap-0 gap-md-1 my-3"
                    id="pills-tab" role="tablist">
                    <li class="nav-item px-1" role="presentation">
                        <button id="nav-sub-links-for-days"
                            class="nav-link text-nowrap px-3 active d-flex flex-column align-items-center justify-content-center"
                            id="pills-today-tab" data-bs-toggle="pill" data-bs-target="#pills-today" type="button"
                            role="tab" aria-controls="pills-today" aria-selected="true">
                            Today
                        </button>
                    </li>
                    <li class="nav-item px-1" role="presentation">
                        <button id="nav-sub-links-for-days"
                            class="nav-link text-nowrap px-3 d-flex flex-column align-items-center justify-content-center"
                            id="pills-yesterday-tab" data-bs-toggle="pill" data-bs-target="#pills-yesterday"
                            type="button" role="tab" aria-controls="pills-yesterday" aria-selected="false">
                            Yesterday
                        </button>
                    </li>
                    <li class="nav-item px-1" role="presentation">
                        <select class="form-select months-dropdown">
                            <option selected="">January</option>
                            <option value="1">February</option>
                            <option value="2">March</option>
                            <option value="3">April</option>
                        </select>
                    </li>
                    <li class="nav-item px-1" role="presentation">
                        <button id="nav-sub-links-for-days"
                            class="nav-link text-nowrap px-4 px-md-5  d-flex flex-column align-items-center justify-content-center"
                            id="pills-date-range-tab" data-bs-toggle="pill" data-bs-target="#pills-date-range"
                            type="button" role="tab" aria-controls="pills-date-range" aria-selected="false">
                            Date Range
                        </button>
                    </li>
                </ul>
                <!-- =====PENDING-ORDERS-TABS-CONTENT====== -->
                <div class="home-card py-1 px-2 mb-2 mx-md-0 px-md-4">
                    <div class="d-flex align-items-center justify-content-between ">
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
                            <div class="d-flex justify-content-md-center justify-content-between"></div>

                        </div>

                        <div class="d-flex flex-column">
                            <div class="d-flex align-items-center justify-content-end">
                                <!-- Button trigger modal -->
                                <button type="button" class="modal-btn-neutral py-1 px-2">
                                    <svg width="22" height="21" viewBox="0 0 22 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
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
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.6654 13.1353L19.49 7.35834L19.5638 7.27345C19.6731 7.12545 19.7258 6.94267 19.7122 6.75865C19.6987 6.57463 19.6198 6.40172 19.49 6.27165L13.6654 0.497273L13.5851 0.428048C13.1188 0.0753947 12.4323 0.414987 12.4323 1.04062V3.82266L12.1409 3.84226C7.52604 4.21058 4.82292 7.15589 4.1779 12.4979C4.095 13.1837 4.87473 13.6134 5.37986 13.1588C7.23332 11.4896 9.14895 10.4525 11.1371 10.0372C11.4557 9.97059 11.7756 9.91965 12.0982 9.88439L12.4323 9.85435V12.592L12.4388 12.6991C12.5165 13.2908 13.2276 13.569 13.6654 13.1353ZM12.2355 5.14446L13.7275 5.04389V2.38854L18.1909 6.81369L13.7275 11.2414V8.42414L11.9712 8.58349H11.9609C9.75511 8.82251 7.67369 9.71328 5.70885 11.1983C6.09482 9.44945 6.75409 8.13418 7.62059 7.19246C8.69562 6.02348 10.1981 5.30903 12.2355 5.14446ZM3.52381 1.5918C2.66503 1.5918 1.84142 1.93583 1.23417 2.54819C0.626917 3.16056 0.285767 3.9911 0.285767 4.85711V15.3061C0.285767 16.1721 0.626917 17.0027 1.23417 17.615C1.84142 18.2274 2.66503 18.5714 3.52381 18.5714H13.8856C14.7443 18.5714 15.568 18.2274 16.1752 17.615C16.7825 17.0027 17.1236 16.1721 17.1236 15.3061V14C17.1236 13.8268 17.0554 13.6607 16.9339 13.5382C16.8125 13.4157 16.6478 13.3469 16.476 13.3469C16.3042 13.3469 16.1395 13.4157 16.0181 13.5382C15.8966 13.6607 15.8284 13.8268 15.8284 14V15.3061C15.8284 15.8257 15.6237 16.324 15.2593 16.6915C14.895 17.0589 14.4008 17.2653 13.8856 17.2653H3.52381C3.00854 17.2653 2.51438 17.0589 2.15003 16.6915C1.78567 16.324 1.58098 15.8257 1.58098 15.3061V4.85711C1.58098 4.33751 1.78567 3.83918 2.15003 3.47176C2.51438 3.10434 3.00854 2.89793 3.52381 2.89793H7.40947C7.58122 2.89793 7.74595 2.82912 7.8674 2.70665C7.98885 2.58418 8.05708 2.41807 8.05708 2.24487C8.05708 2.07166 7.98885 1.90556 7.8674 1.78308C7.74595 1.66061 7.58122 1.5918 7.40947 1.5918H3.52381Z"
                                            fill="#515C6F" />
                                    </svg>
                                </button>
                                <button type="button" class="modal-btn-completed py-1 px-2 ms-1" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
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
                                    <svg class="tick-icon" width="12" height="12" viewBox="0 0 12 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.56667 6.13333L5.76667 7.96667L8.7 4.3M6.13333 11.2667C5.45921 11.2667 4.7917 11.1339 4.16889 10.8759C3.54609 10.6179 2.98019 10.2398 2.50352 9.76315C2.02684 9.28647 1.64873 8.72058 1.39075 8.09777C1.13278 7.47497 1 6.80745 1 6.13333C1 5.45921 1.13278 4.7917 1.39075 4.16889C1.64873 3.54609 2.02684 2.98019 2.50352 2.50352C2.98019 2.02684 3.54609 1.64873 4.16889 1.39075C4.7917 1.13278 5.45921 1 6.13333 1C7.49478 1 8.80046 1.54083 9.76315 2.50352C10.7258 3.46621 11.2667 4.77189 11.2667 6.13333C11.2667 7.49478 10.7258 8.80046 9.76315 9.76315C8.80046 10.7258 7.49478 11.2667 6.13333 11.2667Z"
                                            stroke="#0D9E00" />
                                    </svg>
                                </button>
                                <button type="button" class="modal-btn-completed py-1 px-2 ms-1">
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

                                    <svg class="tick-icon" width="12" height="12" viewBox="0 0 12 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.56667 6.13333L5.76667 7.96667L8.7 4.3M6.13333 11.2667C5.45921 11.2667 4.7917 11.1339 4.16889 10.8759C3.54609 10.6179 2.98019 10.2398 2.50352 9.76315C2.02684 9.28647 1.64873 8.72058 1.39075 8.09777C1.13278 7.47497 1 6.80745 1 6.13333C1 5.45921 1.13278 4.7917 1.39075 4.16889C1.64873 3.54609 2.02684 2.98019 2.50352 2.50352C2.98019 2.02684 3.54609 1.64873 4.16889 1.39075C4.7917 1.13278 5.45921 1 6.13333 1C7.49478 1 8.80046 1.54083 9.76315 2.50352C10.7258 3.46621 11.2667 4.77189 11.2667 6.13333C11.2667 7.49478 10.7258 8.80046 9.76315 9.76315C8.80046 10.7258 7.49478 11.2667 6.13333 11.2667Z"
                                            stroke="#0D9E00" />
                                    </svg>
                                </button>
                            </div>

                        </div>
                    </div>
                    <div class="d-flex flex-nowrap justify-content-md-center justify-content-around">
                        <div>
                            <span class="diff-bg px-2 py-1 mx-md-3 mr-1 my-1 text-primary text-nowrap">
                                <b>PZ70001</b>(Computer zone)
                            </span>
                        </div>
                        <div class="d-flex flex-nowrap">
                            <select class="form-select pending-dropdown py-0 my-1 ms-2" id="userCity">
                                <option selected="">Photo not clear</option>
                                <option value="1">Vehicle Not found</option>
                                <option value="2">Fine not paid</option>
                                <option value="3">Wrong vehicle selected</option>
                            </select>
                            <span class="states-btns mx-md-3 ms-1 my-1 text-white text-nowrap">
                                <button type="button" class="btn action-btns btn-danger px-2 py-0">
                                    Reject
                                </button>
                            </span>
                            <span class="states-btns mx-md-3 ms-1 my-1 text-white text-nowrap">
                                <button type="button" class="btn action-btns btn-primary px-2 py-0"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Complete
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex flex-nowrap justify-content-between">
                        <div> <span class="diff-bg-date px-2 my-1">
                                26/03/2023 to 26/03/2024
                            </span>
                        </div>
                        <div>
                            <span class="diff-bg-date px-2 my-1">50 days remaining</span>
                        </div>
                    </div>
                </div>
                <div class="home-card py-1 px-2 mb-2 mx-md-0 px-md-4">
                    <div class="d-flex align-items-center justify-content-between ">
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
                            <div class="d-flex justify-content-md-center justify-content-between"></div>

                        </div>

                        <div class="d-flex flex-column">
                            <div class="d-flex align-items-center justify-content-end">
                                <!-- Button trigger modal -->
                                <button type="button" class="modal-btn-neutral py-1 px-2">
                                    <svg width="22" height="21" viewBox="0 0 22 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11 7.82864L11 19.7144M11 19.7144L8.08567 16.5144M11 19.7144L13.9142 16.5144"
                                            stroke="#515C6F" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M14.8857 1.42861L7.11423 1.42861C4.36703 1.42861 2.99246 1.42862 2.13955 2.23136C1.28566 3.03593 1.28566 4.32782 1.28566 6.91433L1.28566 7.82862C1.28566 10.4142 1.28566 11.707 2.13955 12.5107C2.8856 13.2128 4.02995 13.3015 6.1428 13.3125M15.8571 13.3125C17.9699 13.3015 19.1143 13.2128 19.8603 12.5107C20.7142 11.707 20.7142 10.4142 20.7142 7.82861L20.7142 6.91433C20.7142 4.32781 20.7142 3.03501 19.8603 2.23136C19.5689 1.95707 19.2173 1.77696 18.7714 1.6581"
                                            stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </button>
                                <button type="button" class="modal-btn-completed py-1 px-2 ms-1" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.6654 13.1353L19.49 7.35834L19.5638 7.27345C19.6731 7.12545 19.7258 6.94267 19.7122 6.75865C19.6987 6.57463 19.6198 6.40172 19.49 6.27165L13.6654 0.497273L13.5851 0.428048C13.1188 0.0753947 12.4323 0.414987 12.4323 1.04062V3.82266L12.1409 3.84226C7.52604 4.21058 4.82292 7.15589 4.1779 12.4979C4.095 13.1837 4.87473 13.6134 5.37986 13.1588C7.23332 11.4896 9.14895 10.4525 11.1371 10.0372C11.4557 9.97059 11.7756 9.91965 12.0982 9.88439L12.4323 9.85435V12.592L12.4388 12.6991C12.5165 13.2908 13.2276 13.569 13.6654 13.1353ZM12.2355 5.14446L13.7275 5.04389V2.38854L18.1909 6.81369L13.7275 11.2414V8.42414L11.9712 8.58349H11.9609C9.75511 8.82251 7.67369 9.71328 5.70885 11.1983C6.09482 9.44945 6.75409 8.13418 7.62059 7.19246C8.69562 6.02348 10.1981 5.30903 12.2355 5.14446ZM3.52381 1.5918C2.66503 1.5918 1.84142 1.93583 1.23417 2.54819C0.626917 3.16056 0.285767 3.9911 0.285767 4.85711V15.3061C0.285767 16.1721 0.626917 17.0027 1.23417 17.615C1.84142 18.2274 2.66503 18.5714 3.52381 18.5714H13.8856C14.7443 18.5714 15.568 18.2274 16.1752 17.615C16.7825 17.0027 17.1236 16.1721 17.1236 15.3061V14C17.1236 13.8268 17.0554 13.6607 16.9339 13.5382C16.8125 13.4157 16.6478 13.3469 16.476 13.3469C16.3042 13.3469 16.1395 13.4157 16.0181 13.5382C15.8966 13.6607 15.8284 13.8268 15.8284 14V15.3061C15.8284 15.8257 15.6237 16.324 15.2593 16.6915C14.895 17.0589 14.4008 17.2653 13.8856 17.2653H3.52381C3.00854 17.2653 2.51438 17.0589 2.15003 16.6915C1.78567 16.324 1.58098 15.8257 1.58098 15.3061V4.85711C1.58098 4.33751 1.78567 3.83918 2.15003 3.47176C2.51438 3.10434 3.00854 2.89793 3.52381 2.89793H7.40947C7.58122 2.89793 7.74595 2.82912 7.8674 2.70665C7.98885 2.58418 8.05708 2.41807 8.05708 2.24487C8.05708 2.07166 7.98885 1.90556 7.8674 1.78308C7.74595 1.66061 7.58122 1.5918 7.40947 1.5918H3.52381Z"
                                            fill="#515C6F" />
                                    </svg>
                                    <svg class="tick-icon" width="12" height="12" viewBox="0 0 12 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.56667 6.13333L5.76667 7.96667L8.7 4.3M6.13333 11.2667C5.45921 11.2667 4.7917 11.1339 4.16889 10.8759C3.54609 10.6179 2.98019 10.2398 2.50352 9.76315C2.02684 9.28647 1.64873 8.72058 1.39075 8.09777C1.13278 7.47497 1 6.80745 1 6.13333C1 5.45921 1.13278 4.7917 1.39075 4.16889C1.64873 3.54609 2.02684 2.98019 2.50352 2.50352C2.98019 2.02684 3.54609 1.64873 4.16889 1.39075C4.7917 1.13278 5.45921 1 6.13333 1C7.49478 1 8.80046 1.54083 9.76315 2.50352C10.7258 3.46621 11.2667 4.77189 11.2667 6.13333C11.2667 7.49478 10.7258 8.80046 9.76315 9.76315C8.80046 10.7258 7.49478 11.2667 6.13333 11.2667Z"
                                            stroke="#0D9E00" />
                                    </svg>
                                </button>
                                <button type="button" class="modal-btn-completed py-1 px-2 ms-1" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
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
                                    <svg class="tick-icon" width="12" height="12" viewBox="0 0 12 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.56667 6.13333L5.76667 7.96667L8.7 4.3M6.13333 11.2667C5.45921 11.2667 4.7917 11.1339 4.16889 10.8759C3.54609 10.6179 2.98019 10.2398 2.50352 9.76315C2.02684 9.28647 1.64873 8.72058 1.39075 8.09777C1.13278 7.47497 1 6.80745 1 6.13333C1 5.45921 1.13278 4.7917 1.39075 4.16889C1.64873 3.54609 2.02684 2.98019 2.50352 2.50352C2.98019 2.02684 3.54609 1.64873 4.16889 1.39075C4.7917 1.13278 5.45921 1 6.13333 1C7.49478 1 8.80046 1.54083 9.76315 2.50352C10.7258 3.46621 11.2667 4.77189 11.2667 6.13333C11.2667 7.49478 10.7258 8.80046 9.76315 9.76315C8.80046 10.7258 7.49478 11.2667 6.13333 11.2667Z"
                                            stroke="#0D9E00" />
                                    </svg>
                                </button>
                                <button type="button" class="modal-btn-completed py-1 px-2 ms-1">
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

                                    <svg class="tick-icon" width="12" height="12" viewBox="0 0 12 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.56667 6.13333L5.76667 7.96667L8.7 4.3M6.13333 11.2667C5.45921 11.2667 4.7917 11.1339 4.16889 10.8759C3.54609 10.6179 2.98019 10.2398 2.50352 9.76315C2.02684 9.28647 1.64873 8.72058 1.39075 8.09777C1.13278 7.47497 1 6.80745 1 6.13333C1 5.45921 1.13278 4.7917 1.39075 4.16889C1.64873 3.54609 2.02684 2.98019 2.50352 2.50352C2.98019 2.02684 3.54609 1.64873 4.16889 1.39075C4.7917 1.13278 5.45921 1 6.13333 1C7.49478 1 8.80046 1.54083 9.76315 2.50352C10.7258 3.46621 11.2667 4.77189 11.2667 6.13333C11.2667 7.49478 10.7258 8.80046 9.76315 9.76315C8.80046 10.7258 7.49478 11.2667 6.13333 11.2667Z"
                                            stroke="#0D9E00" />
                                    </svg>
                                </button>
                            </div>

                        </div>
                    </div>
                    <div class="d-flex flex-nowrap justify-content-md-center justify-content-around">
                        <div>
                            <span class="diff-bg px-2 py-1 mx-md-3 mr-1 my-1 text-primary text-nowrap">
                                <b>PZ70001</b>(Computer zone)
                            </span>
                        </div>
                        <div class="d-flex flex-nowrap">
                            <select class="form-select pending-dropdown py-0 my-1 ms-2" id="userCity">
                                <option selected="">Photo not clear</option>
                                <option value="1">Vehicle Not found</option>
                                <option value="2">Fine not paid</option>
                                <option value="3">Wrong vehicle selected</option>
                            </select>
                            <span class="states-btns mx-md-3 ms-1 my-1 text-white text-nowrap">
                                <button type="button" class="btn action-btns btn-danger px-2 py-0">
                                    Reject
                                </button>
                            </span>
                            <span class="states-btns mx-md-3 ms-1 my-1 text-white text-nowrap">
                                <button type="button" class="btn action-btns btn-primary px-2 py-0"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Complete
                                </button>
                            </span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade bulk-upload" id="pills-bulk-upload" role="tabpanel"
                aria-labelledby="pills-bulk-upload-tab" tabindex="0">
                <!-- =====BULK-UPLOAD-UNSELECTED====== -->
                <div id="bulk-upload-unselected" style="display: none;">
                    <div class="d-flex justify-content-between">
                        <div
                            class="upload bulk-upload-width px-md-4 px-2 d-flex align-items-center justify-content-between border">
                            Upload Click here to upload file
                            <svg width="22" height="21" viewBox="0 0 22 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.7143 12.8857V1M10.7143 1L13.6286 4.2M10.7143 1L7.80005 4.2"
                                    stroke="#515C6F" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M6.82857 19.2857H14.6C17.3472 19.2857 18.7218 19.2857 19.5747 18.483C20.4286 17.6784 20.4286 16.3865 20.4286 13.8V12.8857C20.4286 10.3001 20.4286 9.00734 19.5747 8.20368C18.8286 7.50151 17.6843 7.41283 15.5714 7.40186M5.85714 7.40186C3.74429 7.41283 2.59994 7.50151 1.85389 8.20368C1 9.00734 1 10.3001 1 12.8857V13.8C1 16.3865 1 17.6793 1.85389 18.483C2.14531 18.7573 2.49697 18.9374 2.94286 19.0563"
                                    stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                        <button type="button" class="btn text-white bulk-upload-btn px-3 ms-2">Upload
                            Submit</button>
                    </div>
                    <span>Click all files rename to vehicle registration No.</span>
                    <div class="bulk-order-table">
                        <div class="row justify-content-around">
                            <span class="col-8 d-flex justify-content-center">File Name</span>
                            <span class="col-4 d-flex justify-content-center bulk-order-status">Status</span>
                        </div>
                    </div>
                </div>
                <!-- =====BULK-UPLOAD-SELECTED====== -->
                <div id="bulk-upload-selected">
                    <div class="d-flex justify-content-between">
                        <div
                            class="upload bulk-upload-selected-width px-md-4 px-2 d-flex align-items-center justify-content-between">
                            Files has been uploaded (95)
                            <svg width="22" height="21" viewBox="0 0 22 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.7143 12.8857V1M10.7143 1L13.6286 4.2M10.7143 1L7.80005 4.2"
                                    stroke="#0D9E00" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M6.82857 19.2857H14.6C17.3472 19.2857 18.7218 19.2857 19.5747 18.483C20.4286 17.6784 20.4286 16.3865 20.4286 13.8V12.8857C20.4286 10.3001 20.4286 9.00734 19.5747 8.20368C18.8286 7.50151 17.6843 7.41283 15.5714 7.40186M5.85714 7.40186C3.74429 7.41283 2.59994 7.50151 1.85389 8.20368C1 9.00734 1 10.3001 1 12.8857V13.8C1 16.3865 1 17.6793 1.85389 18.483C2.14531 18.7573 2.49697 18.9374 2.94286 19.0563"
                                    stroke="#0D9E00" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                        <button type="button" class="btn text-white bulk-upload-btn transfer-now-btn px-3 ms-2">Upload
                            Submit</button>
                    </div>
                    <span>Click all files rename to vehicle registration No.</span>
                    <div class="bulk-order-table">
                        <div class="d-flex flex-column bulk-order-table-structure">
                            <div class="row justify-content-around table-head">
                                <span class="col-8 d-flex justify-content-center">File Name</span>
                                <span class="col-4 d-flex justify-content-center bulk-order-status">Status</span>
                            </div>
                            <div class="row justify-content-around">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

	<!-- ====================================POPUPS=================================== -->
    <!-- Complete Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog completed-modal">
            <div class="modal-content completed-modal-content">

                <div class="modal-body">
                    <h4 class="text-center complete-popup-text"> Are you sure you will complete it?</h4>
                    <p class="text-center m-0"><b>AS24A2590,</b> Pulsar 150</p>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn border-0" data-bs-dismiss="modal">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="29" height="29" rx="4.5" fill="#EC1C34" fill-opacity="0.1"
                                    stroke="#EC1C34" />
                                <path d="M6.85718 22.2857L22.2857 6.85712M6.85718 6.85712L22.2857 22.2857"
                                    stroke="#EC1C34" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </button>
                        <button type="button" class="btn border-0">
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

    <!--Upload Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog h-75 d-flex align-items-center justify-content-center">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h2 class="modal-title fs-4 text-dark fw-bolder" id="staticBackdropLabel">Uploaded Files</h2>
                    <div class="d-flex">
                        <button type="button" class="border-0 mx-1" data-bs-dismiss="modal" aria-label="Close">
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
                <div class="modal-body d-flex gap-3 align-items-center justify-content-center">
                    <div class="border rounded-4 w-100 p-2">
                        <div class="d-flex justify-content-between align-items-center pb-1 px-2">
                            <span class="text-start"><small>Vehicle Photo</small></span>
                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.37497 5.2L7.37498 13M7.37498 13L5.46248 10.9M7.37498 13L9.28748 10.9"
                                    stroke="#515C6F" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M9.925 0.999968L4.825 0.999968C3.02215 0.999968 2.12009 0.999969 1.56036 1.52677C1 2.05477 1 2.90257 1 4.59997L1 5.19997C1 6.89677 1 7.74517 1.56036 8.27257C2.04996 8.73337 2.80094 8.79157 4.1875 8.79877M10.5625 8.79877C11.9491 8.79157 12.7 8.73337 13.1896 8.27257C13.75 7.74517 13.75 6.89677 13.75 5.19997L13.75 4.59997C13.75 2.90257 13.75 2.05417 13.1896 1.52677C12.9984 1.34677 12.7676 1.22857 12.475 1.15057"
                                    stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" />
                            </svg>

                        </div>
                        <div class="vehicle-photo d-flex align-items-center justify-content-center">
                            <img src="images/bike 1.png" alt="">
                        </div>
                    </div>
                    <div class="border rounded-4 w-100 p-2">
                        <div class="d-flex justify-content-between align-items-center pb-1 px-2">
                            <span class="text-start"><small>challan SS</small></span>
                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.37497 5.2L7.37498 13M7.37498 13L5.46248 10.9M7.37498 13L9.28748 10.9"
                                    stroke="#515C6F" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M9.925 0.999968L4.825 0.999968C3.02215 0.999968 2.12009 0.999969 1.56036 1.52677C1 2.05477 1 2.90257 1 4.59997L1 5.19997C1 6.89677 1 7.74517 1.56036 8.27257C2.04996 8.73337 2.80094 8.79157 4.1875 8.79877M10.5625 8.79877C11.9491 8.79157 12.7 8.73337 13.1896 8.27257C13.75 7.74517 13.75 6.89677 13.75 5.19997L13.75 4.59997C13.75 2.90257 13.75 2.05417 13.1896 1.52677C12.9984 1.34677 12.7676 1.22857 12.475 1.15057"
                                    stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" />
                            </svg>

                        </div>
                        <div class="challan-photo d-flex align-items-center justify-content-center">
                            <img src="images/bike 1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <!-- <script src="{{ asset('customjs/web/register/common.js') }}?v={{time()}}"></script> -->
    
	
@endpush
