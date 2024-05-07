@extends('layouts.master.admin_template.master')

@push('css')
@endpush

@section('content')
	
<!-- =====USERS-TAB====== -->
    <section>
        <!-- =====CREATE-USERS-APPROVE/BLOCK====== -->
        <ul class="nav nav-pills d-flex flex-nowrap align-items-center justify-content-between gap-0 gap-md-1 mt-3 mb-2 px-2 tab-padding"
            id="pills-tab" role="tablist">
            <li class="nav-item px-1" role="presentation">
                <button id="nav-sub-links" id="user-pending"
                    class="user-pending nav-link text-nowrap px-2 px-md-3 active d-flex flex-column align-items-center justify-content-center"
                    id="pills-user-pending-tab" data-bs-toggle="pill" data-bs-target="#pills-user-pending" type="button"
                    role="tab" aria-controls="pills-user-pending" aria-selected="true">
                    Pending
                </button>
            </li>
            <li class="nav-item px-1" role="presentation">
                <button id="nav-sub-links" id="user-list"
                    class="user-list nav-link text-nowrap px-2 px-md-3  d-flex flex-column align-items-center justify-content-center"
                    id="pills-user-list-tab" data-bs-toggle="pill" data-bs-target="#pills-user-list" type="button"
                    role="tab" aria-controls="pills-user-list" aria-selected="false">
                    Users List
                </button>
            </li>
            <li class="nav-item px-1" role="presentation">
                <button id="nav-sub-links" id="create-user"
                    class="create-user nav-link text-nowrap px-2 px-md-3  d-flex flex-column align-items-center justify-content-center"
                    id="pills-user-list-tab" data-bs-toggle="pill" data-bs-target="#pills-user-list" type="button"
                    role="tab" aria-controls="pills-user-list" aria-selected="false">
                    Create Users
                </button>
            </li>
            <li class="nav-item px-1" role="presentation">
                <button id="nav-sub-links" id="transfer-user"
                    class="transfer-user nav-link text-nowrap px-2 px-md-3  d-flex flex-column align-items-center justify-content-center"
                    id="pills-transfer-user-tab" data-bs-toggle="pill" data-bs-target="#pills-transfer-user"
                    type="button" role="tab" aria-controls="pills-transfer-user" aria-selected="false">
                    Transfer Users
                </button>
            </li>
        </ul>
        <div id="user-pending-content">
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
            <div id="pending_user_container">
                
                <!-- ---- PENDING USER LIST HTML ---- -->

            </div>
        </div>
        <div id="user-list" style="display: none;">
            <ul class="nav nav-pills d-flex flex-nowrap align-items-center justify-content-between gap-0 gap-md-3 my-3"
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
            <div id="active_user_container">

                <!-- ---- ACTIVE USER LIST HTML ---- -->

            </div>
        </div>

        <div id="user-approve-block" style="display: none;">
            <form class="row g-3 register my-0" id="user-approve-block-form" novalidate="">
                <div class="form-floating col-6 col-md-4 my-2">
                    <input type="text" class="form-control users-details-inputs form-control-sm" id="UsersFormUsername"
                        placeholder="Name">
                    <label class="ms-2 d-flex align-items-center" for="UsersFormUsername">Name</label>
                </div>
                <div class="form-floating col-6 col-md-4 my-2">
                    <input type="text" class="form-control users-details-inputs form-control-sm"
                        id="UsernameAutoGenerated" placeholder="Username (Auto generate)">
                    <label class="ms-2 d-flex align-items-center" for="UsernameAutoGenerated">Username (Auto
                        generate)</label>
                </div>
                <div class="form-floating col-6 col-md-4 my-2">
                    <input type="text" class="form-control users-details-inputs form-control-sm" id="InputShopname"
                        placeholder="Shop/Center Name">
                    <label class="ms-2 d-flex align-items-center" for="InputShopname">Shop/Center Name</label>
                </div>
                <div class="form-floating col-6 col-md-4 my-2">
                    <input type="number" class="form-control users-details-inputs form-control-sm" id="MobileNumber"
                        placeholder="Mobile No">
                    <label class="ms-2 d-flex align-items-center" for="MobileNumber">Mobile No</label>
                </div>
                <div class="form-floating col-6 col-md-4 my-2">
                    <input type="email" class="form-control users-details-inputs form-control-sm" id="userEmail"
                        placeholder="Email">
                    <label class="ms-2 d-flex align-items-center" for="userEmail">Email</label>
                </div>
                <div class="form-floating col-6 col-md-4 my-2">
                    <input type="email" class="form-control users-details-inputs form-control-sm" id="ShopPinCode"
                        placeholder="Shop PIN Code">
                    <label class="ms-2 d-flex align-items-center" for="ShopPinCode">Shop PIN Code</label>
                </div>
                <div class="form-floating col-6 col-md-4 my-2">
                    <select class="form-select users-details-inputs pb-2" id="userSelectedState">
                        <option selected>Assam</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label class="ms-2 d-flex align-items-center" for="userSelectedState">State</label>
                </div>
                <div class="form-floating col-6 col-md-4 my-2">
                    <select class="form-select users-details-inputs pb-2" id="userSelectedCity">
                        <option selected>Chahar</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label class="ms-2 d-flex align-items-center" for="userSelectedCity">City</label>
                </div>
                <div class="form-floating col-6 col-md-4 my-2">
                    <select class="form-select users-details-inputs pb-2" id="userSelectedArea">
                        <option selected>Ramnagar</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label class="ms-2 d-flex align-items-center" for="userSelectedArea">Area</label>
                </div>
                <div class="form-floating col-6 col-md-4 my-2">
                    <input type="email" class="form-control users-details-inputs form-control-sm" id="userLandMark"
                        placeholder="Landmark">
                    <label class="ms-2 d-flex align-items-center" for="userLandMark">Landmark</label>
                </div>
                <div class="form-floating col-6 col-md-4 my-2">
                    <input type="email" class="form-control users-details-inputs form-control-sm click-your-selfie"
                        id="clickSelfie" placeholder="Click your Selfie" value="Click to re-upload">
                    <label class="ms-2 d-flex align-items-center" for="clickSelfie">Click your Selfie</label>
                    <svg class="click-your-selfie-svg" width="20" height="16" viewBox="0 0 20 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5"
                            d="M0 8C0 9.64 0.425 10.191 1.275 11.296C2.972 13.5 5.818 16 10 16C14.182 16 17.028 13.5 18.725 11.296C19.575 10.192 20 9.639 20 8C20 6.36 19.575 5.809 18.725 4.704C17.028 2.5 14.182 0 10 0C5.818 0 2.972 2.5 1.275 4.704C0.425 5.81 0 6.361 0 8Z"
                            fill="#515C6F" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M6.25 7.75C6.25 6.75544 6.64509 5.80161 7.34835 5.09835C8.05161 4.39509 9.00544 4 10 4C10.9946 4 11.9484 4.39509 12.6517 5.09835C13.3549 5.80161 13.75 6.75544 13.75 7.75C13.75 8.74456 13.3549 9.69839 12.6517 10.4017C11.9484 11.1049 10.9946 11.5 10 11.5C9.00544 11.5 8.05161 11.1049 7.34835 10.4017C6.64509 9.69839 6.25 8.74456 6.25 7.75ZM7.75 7.75C7.75 7.15326 7.98705 6.58097 8.40901 6.15901C8.83097 5.73705 9.40326 5.5 10 5.5C10.5967 5.5 11.169 5.73705 11.591 6.15901C12.0129 6.58097 12.25 7.15326 12.25 7.75C12.25 8.34674 12.0129 8.91903 11.591 9.34099C11.169 9.76295 10.5967 10 10 10C9.40326 10 8.83097 9.76295 8.40901 9.34099C7.98705 8.91903 7.75 8.34674 7.75 7.75Z"
                            fill="#515C6F" />
                    </svg>
                </div>
                <div class="form-floating col-6 col-md-4 my-2">
                    <input type="email" class="form-control users-details-inputs form-control-sm click-your-selfie"
                        id="clickSelfie" placeholder="Upload Aadhar" value="Click to re-upload">
                    <label class="ms-2 d-flex align-items-center" for="clickSelfie">Upload Aadhar</label>
                    <svg class="click-your-selfie-svg" width="20" height="16" viewBox="0 0 20 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5"
                            d="M0 8C0 9.64 0.425 10.191 1.275 11.296C2.972 13.5 5.818 16 10 16C14.182 16 17.028 13.5 18.725 11.296C19.575 10.192 20 9.639 20 8C20 6.36 19.575 5.809 18.725 4.704C17.028 2.5 14.182 0 10 0C5.818 0 2.972 2.5 1.275 4.704C0.425 5.81 0 6.361 0 8Z"
                            fill="#515C6F" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M6.25 7.75C6.25 6.75544 6.64509 5.80161 7.34835 5.09835C8.05161 4.39509 9.00544 4 10 4C10.9946 4 11.9484 4.39509 12.6517 5.09835C13.3549 5.80161 13.75 6.75544 13.75 7.75C13.75 8.74456 13.3549 9.69839 12.6517 10.4017C11.9484 11.1049 10.9946 11.5 10 11.5C9.00544 11.5 8.05161 11.1049 7.34835 10.4017C6.64509 9.69839 6.25 8.74456 6.25 7.75ZM7.75 7.75C7.75 7.15326 7.98705 6.58097 8.40901 6.15901C8.83097 5.73705 9.40326 5.5 10 5.5C10.5967 5.5 11.169 5.73705 11.591 6.15901C12.0129 6.58097 12.25 7.15326 12.25 7.75C12.25 8.34674 12.0129 8.91903 11.591 9.34099C11.169 9.76295 10.5967 10 10 10C9.40326 10 8.83097 9.76295 8.40901 9.34099C7.98705 8.91903 7.75 8.34674 7.75 7.75Z"
                            fill="#515C6F" />
                    </svg>
                </div>
                <div class="form-floating col-6 col-md-4 my-2">
                    <input type="email" class="form-control users-details-inputs form-control-sm" id="userType"
                        placeholder="User Type:">
                    <label class="ms-2 d-flex align-items-center" for="userType">User Type:</label>
                </div>
                <div class="d-flex align-items-around col-6 col-md-4 my-2">
                    <button id="nav-sub-links-for-days"
                        class="form-control users-details-inputs small-w-rates form-control-sm py-0 px-1"
                        id="pills-today-tab" data-bs-toggle="pill" data-bs-target="#pills-today" type="button"
                        role="tab" aria-controls="pills-today" aria-selected="true">
                        2w rate
                    </button>
                    <button id="nav-sub-links-for-days"
                        class="form-control users-details-inputs large-w-rates form-control-sm py-0 px-1 ms-2"
                        id="pills-today-tab" data-bs-toggle="pill" data-bs-target="#pills-today" type="button"
                        role="tab" aria-controls="pills-today" aria-selected="true">
                        2w with fine
                    </button>
                </div>
                <div class="d-flex align-items-around col-6 col-md-6 my-2">
                    <button id="nav-sub-links-for-days"
                        class="form-control users-details-inputs small-w-rates form-control-sm py-0 px-1"
                        id="pills-today-tab" data-bs-toggle="pill" data-bs-target="#pills-today" type="button"
                        role="tab" aria-controls="pills-today" aria-selected="true">
                        3w+ rate </button>
                    <button id="nav-sub-links-for-days"
                        class="form-control users-details-inputs large-w-rates form-control-sm py-0 px-1 ms-2"
                        id="pills-today-tab" data-bs-toggle="pill" data-bs-target="#pills-today" type="button"
                        role="tab" aria-controls="pills-today" aria-selected="true">
                        3w+ with fine </button>
                </div>
                <div class="d-flex align-items-around col-6 col-md-6 my-2">
                    <button id="nav-sub-links-for-days"
                        class="form-control users-details-inputs small-w-rates form-control-sm py-0 px-1"
                        id="pills-today-tab" data-bs-toggle="pill" data-bs-target="#pills-today" type="button"
                        role="tab" aria-controls="pills-today" aria-selected="true">
                        4w+ rate </button>
                    <button id="nav-sub-links-for-days"
                        class="form-control users-details-inputs large-w-rates form-control-sm py-0 px-1 ms-2"
                        id="pills-today-tab" data-bs-toggle="pill" data-bs-target="#pills-today" type="button"
                        role="tab" aria-controls="pills-today" aria-selected="true">
                        4w+ with fine
                    </button>
                </div>
                <div class="d-flex align-items-around col-12 my-2">
                    <button id="nav-sub-links-for-days"
                        class="form-control users-details-inputs large-w-rates form-control-sm py-0 px-1"
                        id="pills-today-tab" data-bs-toggle="pill" data-bs-target="#pills-today" type="button"
                        role="tab" aria-controls="pills-today" aria-selected="true">
                        Challan
                    </button>
                    <span
                        class="d-flex flex-column justify-content-center users-details-inputs upload-options challan ms-2 px-2">
                        <label for="userState" class="text-nowrap">
                            Upload option
                        </label>
                        <div class="form-floating">
                            <select id="Challan-form" class="form-select px-2 py-0">
                                <option selected="">ON</option>
                                <option value="1">OFF</option>
                            </select>
                        </div>
                    </span>
                    <button type="button"
                        class="btn add-bank-account-btn users-details-inputs w-100 ms-2 px-5">Approve</button>
                </div>

                <div class="form-floating col-12 my-2">
                    <button type="button"
                        class="btn bg-primary text-white users-details-inputs w-100 px-5">Approve</button>

                </div>
            </form>
        </div>
        
        <div id="transfer-users" style="display: none;">
            <form class="row g-3 register my-0 mx-md-0" id="user-approve-block-form" novalidate="">
                <div class="form-floating col-12 my-2">
                    <input type="text" class="form-control users-details-inputs form-control-sm" id="fromUsers"
                        placeholder="Name">
                    <label class="ms-2 d-flex align-items-center" for="fromUsers">From User</label>
                </div>
                <div class="form-floating col-12 my-2">
                    <input type="text" class="form-control users-details-inputs form-control-sm" id="toUsers"
                        placeholder="to User">
                    <label class="ms-2 d-flex align-items-center" for="toUsers">To User</label>
                </div>
                <div class="form-floating col-12 my-2">
                    <button type="button"
                        class="btn text-white users-details-inputs transfer-now-btn w-100 px-5">Transfer
                        Now</button>

                </div>
            </form>
        </div>
    </section>

	
@endsection

@push('script')
<script src="{{ asset('assets_admin/customjs/script_users.js') }}"></script>
    
	
@endpush
