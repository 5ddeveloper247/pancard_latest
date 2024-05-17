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
                <button id="nav-sub-links"
                    class="user-pending sub-tabs-user nav-link text-nowrap px-2 px-md-3 active d-flex flex-column align-items-center justify-content-center"
                    data-bs-toggle="pill" data-bs-target="#pills-user-pending" type="button"
                    role="tab" aria-controls="pills-user-pending" aria-selected="true">
                    Pending
                </button>
            </li>
            <li class="nav-item px-1" role="presentation">
                <button id="nav-sub-links" 
                    class="user-list sub-tabs-user nav-link text-nowrap px-2 px-md-3  d-flex flex-column align-items-center justify-content-center"
                    data-bs-toggle="pill" data-bs-target="#pills-user-list" type="button"
                    role="tab" aria-controls="pills-user-list" aria-selected="false">
                    Users List
                </button>
            </li>
            <li class="nav-item px-1" role="presentation">
                <button id="nav-sub-links"
                    class="create-user sub-tabs-user nav-link text-nowrap px-2 px-md-3  d-flex flex-column align-items-center justify-content-center"
                    data-bs-toggle="pill" data-bs-target="#pills-user-list" type="button"
                    role="tab" aria-controls="pills-user-list" aria-selected="false">
                    Create Users
                </button>
            </li>
            <li class="nav-item px-1" role="presentation">
                <button id="nav-sub-links"
                    class="transfer-user sub-tabs-user nav-link text-nowrap px-2 px-md-3  d-flex flex-column align-items-center justify-content-center"
                    data-bs-toggle="pill" data-bs-target="#pills-transfer-user"
                    type="button" role="tab" aria-controls="pills-transfer-user" aria-selected="false">
                    Transfer Users
                </button>
            </li>
        </ul>
        <div class="sub-tabs" id="user-pending-content">
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
        <div class="sub-tabs" id="user-list" style="display: none;">
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
            <div id="active_user_container">

                <!-- ---- ACTIVE USER LIST HTML ---- -->

            </div>
        </div>

        <div class="sub-tabs" id="user-approve-block" style="display: none;">
            <form class="row g-3 register my-0" id="registration_form" novalidate="">
                <input type="hidden" id="user_id" name="user_id" value="">
                <div class="form-floating col-6 col-md-4 my-2">
                    <input type="text" class="form-control users-details-inputs form-control-sm" id="user_name" name="user_name"
                        placeholder="Name" maxlength="50">
                    <label class="ms-2 d-flex align-items-center" for="user_name">Name</label>
                </div>
 
                <div class="form-floating col-6 col-md-4 my-2">
                    <input type="text" class="form-control users-details-inputs form-control-sm"
                        id="username_auto" name="username_auto" value="{{$username_auto}}" readonly placeholder="Username (Auto generate)">
                    <label class="ms-2 d-flex align-items-center" for="username_auto">Username (Auto
                        generate)</label>
                </div>
                
                <div class="form-floating col-6 col-md-4 my-2">
                    <input type="text" class="form-control users-details-inputs form-control-sm" id="company_name" name="company_name"
                        placeholder="Shop/Center Name" maxlength="50">
                    <label class="ms-2 d-flex align-items-center" for="company_name">Shop/Center Name</label>
                </div>
                <div class="form-floating col-6 col-md-4 my-2">
                    <input type="number" class="form-control users-details-inputs form-control-sm" id="user_phone" name="user_phone"
                        placeholder="Mobile No"maxlength="15">
                    <label class="ms-2 d-flex align-items-center" for="user_phone">Mobile No</label>
                </div>
                <div class="form-floating col-6 col-md-4 my-2">
                    <input type="email" class="form-control users-details-inputs form-control-sm" id="user_email" name="user_email"
                        placeholder="Email" maxlength="50">
                    <label class="ms-2 d-flex align-items-center" for="user_email">Email</label>
                </div>
                <div class="form-floating col-6 col-md-4 my-2">
                    <input type="email" class="form-control users-details-inputs form-control-sm" id="user_pin" name="user_pin"
                        placeholder="Shop PIN Code" maxlength="10">
                    <label class="ms-2 d-flex align-items-center" for="user_pin">Shop PIN Code</label>
                </div>
                <div class="form-floating col-6 col-md-4 my-2">
                    <select class="form-select users-details-inputs pb-2" id="user_state" name="user_state" onchange="getCitiesLovData();">
                        <option value="">Choose State</option>
                        @foreach($states as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                    <label class="ms-2 d-flex align-items-center" for="user_state">State</label>
                </div>
                <div class="form-floating col-6 col-md-4 my-2">
                    <select class="form-select users-details-inputs pb-2" id="user_city" name="user_city" onchange="getAreasLovData();">
                        <option value="">Choose City</option>
                    </select>
                    <label class="ms-2 d-flex align-items-center" for="user_city">City</label>
                </div>
                <div class="form-floating col-6 col-md-4 my-2">
                    <select class="form-select users-details-inputs pb-2" id="user_area" name="user_area">
                        <option value="">Choose Area</option>
                    </select>
                    <label class="ms-2 d-flex align-items-center" for="user_area">Area</label>
                </div>
                <div class="form-floating col-6 col-md-4 my-2">
                    <input type="text" class="form-control users-details-inputs form-control-sm" id="user_landmark" name="user_landmark"
                        placeholder="Landmark">
                    <label class="ms-2 d-flex align-items-center" for="user_landmark">Landmark</label>
                </div>
               
                <div class="form-floating col-6 col-md-4 my-2">
                    <div id="cameraIcon" class="upload px-4 d-flex align-items-center justify-content-between py-3">
                        <span id="picturename" style="max-width: 88% !important; overflow: hidden; text-overflow: ellipsis;">Upload Selfie</span>
                        <input type="file" accept="image/*" capture="camera" id="upload_picture" name="upload_picture" multiple="false" style="display: none;">
                        <svg class="click-your-selfie-svg" width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.5" d="M0 8C0 9.64 0.425 10.191 1.275 11.296C2.972 13.5 5.818 16 10 16C14.182 16 17.028 13.5 18.725 11.296C19.575 10.192 20 9.639 20 8C20 6.36 19.575 5.809 18.725 4.704C17.028 2.5 14.182 0 10 0C5.818 0 2.972 2.5 1.275 4.704C0.425 5.81 0 6.361 0 8Z" fill="#515C6F"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.25 7.75C6.25 6.75544 6.64509 5.80161 7.34835 5.09835C8.05161 4.39509 9.00544 4 10 4C10.9946 4 11.9484 4.39509 12.6517 5.09835C13.3549 5.80161 13.75 6.75544 13.75 7.75C13.75 8.74456 13.3549 9.69839 12.6517 10.4017C11.9484 11.1049 10.9946 11.5 10 11.5C9.00544 11.5 8.05161 11.1049 7.34835 10.4017C6.64509 9.69839 6.25 8.74456 6.25 7.75ZM7.75 7.75C7.75 7.15326 7.98705 6.58097 8.40901 6.15901C8.83097 5.73705 9.40326 5.5 10 5.5C10.5967 5.5 11.169 5.73705 11.591 6.15901C12.0129 6.58097 12.25 7.15326 12.25 7.75C12.25 8.34674 12.0129 8.91903 11.591 9.34099C11.169 9.76295 10.5967 10 10 10C9.40326 10 8.83097 9.76295 8.40901 9.34099C7.98705 8.91903 7.75 8.34674 7.75 7.75Z" fill="#515C6F"></path>
                        </svg>
                    </div>
                </div>
                <div class="form-floating col-6 col-md-4 my-2">
                    <div id="aadharUploadIcon" class="upload px-4 d-flex align-items-center justify-content-between py-3">
                        <span id="filename" style="max-width: 88% !important; overflow: hidden; text-overflow: ellipsis;">Upload Aadhar</span>
                        <input type="file" id="upload_aadhar" name="upload_aadhar" multiple="false" style="display: none;">
                        <svg class="click-your-selfie-svg" width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.5" d="M0 8C0 9.64 0.425 10.191 1.275 11.296C2.972 13.5 5.818 16 10 16C14.182 16 17.028 13.5 18.725 11.296C19.575 10.192 20 9.639 20 8C20 6.36 19.575 5.809 18.725 4.704C17.028 2.5 14.182 0 10 0C5.818 0 2.972 2.5 1.275 4.704C0.425 5.81 0 6.361 0 8Z" fill="#515C6F"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.25 7.75C6.25 6.75544 6.64509 5.80161 7.34835 5.09835C8.05161 4.39509 9.00544 4 10 4C10.9946 4 11.9484 4.39509 12.6517 5.09835C13.3549 5.80161 13.75 6.75544 13.75 7.75C13.75 8.74456 13.3549 9.69839 12.6517 10.4017C11.9484 11.1049 10.9946 11.5 10 11.5C9.00544 11.5 8.05161 11.1049 7.34835 10.4017C6.64509 9.69839 6.25 8.74456 6.25 7.75ZM7.75 7.75C7.75 7.15326 7.98705 6.58097 8.40901 6.15901C8.83097 5.73705 9.40326 5.5 10 5.5C10.5967 5.5 11.169 5.73705 11.591 6.15901C12.0129 6.58097 12.25 7.15326 12.25 7.75C12.25 8.34674 12.0129 8.91903 11.591 9.34099C11.169 9.76295 10.5967 10 10 10C9.40326 10 8.83097 9.76295 8.40901 9.34099C7.98705 8.91903 7.75 8.34674 7.75 7.75Z" fill="#515C6F"></path>
                        </svg>
                    </div>
                </div>
                <div class="form-floating col-6 col-md-4 my-2">
                    <select class="form-select users-details-inputs pb-2" id="user_type" name="user_type">
                        <option value="">Choose Type</option>
                        <option value="retailer">Retailer</option>
                        <option value="distributor">Distributor</option>
                        <option value="supdistributor">Super Distributor</option>
                    </select>
                    <label class="ms-2 d-flex align-items-center" for="user_type">User Type</label>
                </div>

                @foreach($puc_types as $type)
                <div class="form-floating col-3 col-md-3 my-2">
                    <input type="hidden" class="" id="" name="puc_type_ids[]" value="{{$type->id}}">
                    <input type="number" class="form-control users-details-inputs form-control-sm rmv-arrow" id="puc_type_{{$type->id}}" name="puc_type_rate[]"
                        placeholder="{{$type->name}}" maxlength="10">
                    <label class="ms-2 d-flex align-items-center" for="puc_type_{{$type->id}}">{{$type->name}}</label>
                </div>
                @endforeach
               
                <div class="d-flex align-items-around col-12 my-2">
                    <div class="form-floating col-6 col-md-4 ">
                        <input type="number" class="form-control users-details-inputs form-control-sm rmv-arrow" id="user_challan_amount" name="challan_amount" placeholder="Challan Amount" maxlength="10">
                        <label class="ms-2 d-flex align-items-center" for="user_challan_amount">Challan Amount</label>
                    </div>
                    <span
                        class="d-flex flex-column justify-content-center users-details-inputs upload-options challan ms-2 px-2">
                        <label for="userState" class="text-nowrap">
                            Upload option
                        </label>
                        <div class="form-floating">
                            <select class="custom-select" id="upload_option" name="upload_option" class="form-select px-2 py-0">
                                <option value="1">ON</option>
                                <option value="0">OFF</option>
                            </select>
                        </div>
                    </span>
                    <button type="button"
                        class="btn add-bank-account-btn users-details-inputs w-100 ms-2 px-5 register_form_submit">Approve</button>
                </div>

                <div class="form-floating col-12 my-2">
                    <button type="button"
                        class="btn bg-primary text-white users-details-inputs w-100 px-5 block_user_btn">Block User</button>

                </div>
            </form>
        </div>
        
        <div class="sub-tabs" id="transfer-users" style="display: none;">
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
<script>
    var username_auto = '{{$username_auto}}';
</script>
	
@endpush
