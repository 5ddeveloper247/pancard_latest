@extends('layouts.master.admin_template.master')

@push('css')
@endpush

@section('content')
	
<!-- =====ANALYTICS-TAB====== -->
<section>
    <ul class="nav nav-pills d-flex flex-md-nowrap flex-wrap align-items-center justify-content-md-between justify-content-start gap-0 gap-md-1 mt-3 mb-2 px-2 tab-padding"
        id="pills-tab" role="tablist">
        <li class="nav-item px-1 my-1" role="presentation">
            <button id="nav-sub-links" id="settings-general"
                class="settings-general nav-link text-nowrap px-3 px-md-3 d-flex flex-column align-items-center justify-content-center active"
                id="pills-settings-general-tab" data-bs-toggle="pill" data-bs-target="#pills-settings-general"
                type="button" role="tab" aria-controls="pills-settings-general" aria-selected="true">
                General
            </button>
        </li>
        <li class="nav-item px-1 my-1" role="presentation">
            <button id="nav-sub-links" id="settings-pg"
                class="settings-pg nav-link text-nowrap px-3 px-md-3  d-flex flex-column align-items-center justify-content-center"
                id="pills-settings-pg-tab" data-bs-toggle="pill" data-bs-target="#pills-settings-pg" type="button"
                role="tab" aria-controls="pills-settings-pg" aria-selected="false">
                PG
            </button>
        </li>
        <li class="nav-item px-1 my-1" role="presentation">
            <button id="nav-sub-links"
                class="settings-notifications nav-link text-nowrap px-3 px-md-3  d-flex flex-column align-items-center justify-content-center"
                id="pills-settings-notifications-tab" data-bs-toggle="pill"
                data-bs-target="#pills-settings-notifications" type="button" role="tab"
                aria-controls="pills-settings-notifications" aria-selected="false">
                Notification
            </button>
        </li>
        <li class="nav-item px-1 my-1" role="presentation">
            <button id="nav-sub-links"
                class="settings-tutorials nav-link text-nowrap px-3 px-md-3  d-flex flex-column align-items-center justify-content-center"
                id="pills-settings-tutorials-tab" data-bs-toggle="pill" data-bs-target="#pills-settings-tutorials"
                type="button" role="tab" aria-controls="pills-settings-tutorials" aria-selected="false">
                Tutorials
            </button>
        </li>
        <li class="nav-item px-1 my-1" role="presentation">
            <!-- <a id="nav-sub-links" href="{{route('admin.logout')}}"
                class="settings-api nav-link text-nowrap px-3 px-md-3  d-flex flex-column align-items-center justify-content-center"
                id="pills-settings-api-tab" data-bs-toggle="pill" data-bs-target="#pills-settings-api" type="button"
                role="tab" aria-controls="pills-settings-api" aria-selected="false">
                API’S
            </a> -->
            <a id="nav-sub-links" href="{{route('admin.logout')}}"
                class="settings-api nav-link text-nowrap px-3 px-md-3  d-flex flex-column align-items-center justify-content-center">
                
                Logout
            </a>
        </li>
    </ul>
    <!-- =====GENERAL-SETTINGS-TAB====== -->
    <div id="general-setting-tab" >
        <form  class="row g-3 register my-0 mx-md-0" id="general_settings_form"><!-- method="POST" action="{{ route('admin.storeGeneralSettings') }}" -->
            <div class="form-floating col-6 col-md-4 my-2">
                <input type="text" class="form-control users-details-inputs form-control-sm" 
                        id="company" name="company" placeholder="Company" required maxlength="100" value="">
                <label class="ms-2 d-flex align-items-center" for="company">Company</label>
            </div>
            
            <div class="form-floating col-6 col-md-4 my-2">
                <input type="text" class="form-control users-details-inputs form-control-sm" 
                        id="websiteTitle" name="websiteTitle" placeholder="Website Title" required maxlength="100" value="">
                <label class="ms-2 d-flex align-items-center" for="websiteTitle">Website Title</label>
            </div>
            <div class="form-floating col-6 col-md-4 my-2">
                <input type="number" class="form-control users-details-inputs form-control-sm" 
                        id="retailerRate" name="retailerRate" placeholder="Retailer ID Rate" required maxlength="6" value="">
                <label class="ms-2 d-flex align-items-center" for="retailerRate">Retailer ID Rate</label>
            </div>
            <div class="form-floating col-6 col-md-4 my-2">
                <input type="number" class="form-control users-details-inputs form-control-sm" 
                        id="distributorRate" name="distributorRate" placeholder="Distributor ID Rate" required maxlength="6" value="">
                <label class="ms-2 d-flex align-items-center" for="distributorRate">Distributor ID Rate</label>
            </div>
            <div class="form-floating col-6 col-md-4 my-2">
                <input type="number" class="form-control users-details-inputs form-control-sm" 
                        id="supDistributorRate" name="supDistributorRate" placeholder="Super Distributor ID Rate" required maxlength="6" value="">
                <label class="ms-2 d-flex align-items-center" for="supDistributorRate">Super Distributor ID Rate</label>
            </div>
            <div class="form-floating col-6 col-md-4 my-2">
                <input type="number" class="form-control users-details-inputs form-control-sm" 
                        id="apiRate" name="apiRate" placeholder="Super API Rate" required maxlength="6" value="">
                <label class="ms-2 d-flex align-items-center" for="apiRate">Super API Rate</label>
            </div>
            <h5 class="m-0">Helpline Info</h5>
            <div class="form-floating col-6 col-md-4 my-2">
                <input type="email" class="form-control users-details-inputs form-control-sm" 
                        id="helplineEmail" name="helplineEmail" placeholder="Helpline Email" required maxlength="100" value="">
                <label class="ms-2 d-flex align-items-center" for="helplineEmail">Helpline Email</label>
            </div>
            <div class="form-floating col-6 col-md-4 my-2">
                <input type="number" class="form-control users-details-inputs form-control-sm" 
                        id="helplineNumber" name="helplineNumber" placeholder="WhatsApp Helpline No" required maxlength="10" value="">
                <label class="ms-2 d-flex align-items-center" for="whatsapp-helpline-no">WhatsApp Helpline No</label>
            </div>
            <h5 class="m-0">Option disable</h5>
            <div class="form-floating col-4 col-md-4 my-2">
                <select class="form-select users-details-inputs pb-2" id="pucType" name="pucType" required value="">
                    <option value="">Choose</option>
                    <option value="1000">Challan</option>
                    @foreach($puc_types as $value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach
                </select>
                <!-- <label class="ms-2 d-flex align-items-center" for="pucType">PUC Type</label> -->
            </div>
            <div class="form-floating col-4 col-md-4 my-2" role="presentation">
                <button class="nav-link text-nowrap users-details-inputs w-100 px-2 px-md-3 active d-flex flex-column align-items-center justify-content-center"
                            id="pills-for-everyone-btn-tab" data-bs-toggle="pill" data-bs-target="#pills-for-everyone-btn"
                            type="button" role="tab" aria-controls="pills-for-everyone-btn" aria-selected="true">
                    For everyone
                </button>
            </div>
            <div class="form-floating col-4 col-md-4 my-2">
                <select class="form-select users-details-inputs pb-2" id="disableUser" name="disableUser">
                    <option value="">Search user ID</option>
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                <!-- <label class="ms-2 d-flex align-items-center" for="disableUser">User</label> -->
            </div>

            <div class="form-floating col-12 my-2">
                <button type="button" id="general_form_submit" class="btn text-white users-details-inputs transfer-now-btn w-100 px-5">Save</button>

            </div>
        </form>
    </div>
    <!-- =====PG-SETTINGS-TAB====== -->
    <div id="pg-setting-tab" style="display:none;">
        <h5>Payment Gateway API Credentials</h5>
        <form  class="row g-3 register my-0 " id="pg_settings_form" novalidate=""><!--method="POST" action="{{ route('admin.storeApiSettings') }}" -->
            <div class="form-floating col-6 my-2">
                <input type="text" class="form-control users-details-inputs form-control-sm" id="merchatId"
                        name="merchatId" placeholder="Merchant ID" value="">
                <label class="ms-2 d-flex align-items-center" for="merchat-id">Merchant ID</label>
            </div>
            <div class="form-floating col-6 my-2">
                <input type="text" class="form-control users-details-inputs form-control-sm" id="merchantKey"
                        name="merchantKey" placeholder="Merchant Key" value="">
                <label class="ms-2 d-flex align-items-center" for="merchant-key">Merchant Key</label>
            </div>
            <div class="form-floating col-6 my-2">
                <input type="number" class="form-control users-details-inputs form-control-sm" id="convinceFee"
                        name="convinceFee" placeholder="Convenience Fee %" value="">
                <label class="ms-2 d-flex align-items-center" for="convince-fee">Convenience Fee %</label>
            </div>
            <div class="form-floating col-6 my-2">
                <input type="text" class="form-control users-details-inputs form-control-sm status" id=""
                        name=""placeholder="Status" disabled style="background-color:transparent;">
                <label class="ms-2 d-flex align-items-center" for="status">Status</label>
                <div class="form-check form-switch radio-btn-status">
                    <input class="form-check-input" name="apiStatus" type="checkbox" role="switch" id="apiStatus" >
                </div>
            </div>

            <div class="form-floating col-12 my-2">
                <button type="button" id="pg_form_submit" class="btn text-white users-details-inputs transfer-now-btn w-100 px-5">Save</button>

            </div>
        </form>
    </div>
    <div id="notifications" style="display: none;">
        <form class="row g-3 register my-0 px-1" id="notif_settings_form" novalidate="">
            <input type="hidden" id="notification_id" name="notification_id" value="">
            <div class="form-floating col-12 my-2">
                <input type="text" class="form-control users-details-inputs form-control-sm"
                    id="notification_title" name="notification_title" placeholder="Notification Title">
                <label class="ms-2 d-flex align-items-center" for="notification_title">Notification Title</label>
            </div>
            <div class="form-floating col-12 my-2">
                <input type="text" class="form-control users-details-inputs form-control-sm" 
                    id="notification_url" name="notification_url" placeholder="URL (optional)">
                <label class="ms-2 d-flex align-items-center" for="notification_url">URL (optional)</label>
            </div>
            <div class="form-floating col-12 my-2">
                <textarea class="form-control leave-message-form" placeholder="Leave a comment here"
                    id="notification_text" name="notification_text"></textarea>
                <label for="notification_text">Message</label>
            </div>
            <div class="form-floating col-12 my-2">
                <button type="button" id="notif_form_submit" class="btn text-white users-details-inputs transfer-now-btn w-100 px-5">Publish</button>
            </div>
        </form>
        <h5>Notifications List</h5>
        <div id="notif_list_container">

            <!-- Notification HTML Section -->
        
        </div> 
    </div>
    <div id="tutorial" style="display: none;">
        <h5>Add Video</h5>
        <form class="row g-3 register my-0 mx-md-0" id="tutorial_settings_form" novalidate="">
            <input type="hidden" id="tutorial_id" name="tutorial_id" value="">
            <div class="form-floating col-6 my-2">
                <input type="text" class="form-control users-details-inputs form-control-sm" 
                    id="tutorial_title" name="tutorial_title" placeholder="Video Title">
                <label class="ms-2 d-flex align-items-center" for="tutorialTitle">Video Title</label>
            </div>
            <div class="form-floating col-6 my-2">
                <input type="text" class="form-control users-details-inputs form-control-sm" 
                        id="tutorial_url" name="tutorial_url" placeholder="URL">
                <label class="ms-2 d-flex align-items-center" for="video-url">URL</label>
            </div>
            <div class="form-floating col-6 my-2">
                <div id="cameraIcon" class="upload px-md-4 px-2 d-flex align-items-center justify-content-between users-details-inputs border rounded-2">
                    <span id="filename" style="max-width: 88% !important; overflow: hidden; text-overflow: ellipsis;">Upload Thumbnail</span>
                    <input type="file" accept="image/*" capture="camera" id="uploadThumbnail" name="uploadThumbnail" multiple="false" style="display: none;">
                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg" >
                        <path
                            d="M11 14C12.6569 14 14 12.6569 14 11C14 9.34315 12.6569 8 11 8C9.34315 8 8 9.34315 8 11C8 12.6569 9.34315 14 11 14Z"
                            stroke="#727C8E" stroke-width="1.5"></path>
                        <path
                            d="M1 11.364C1 8.29905 1 6.76705 1.749 5.66705C2.07416 5.1887 2.49085 4.77949 2.975 4.46305C3.695 3.99005 4.597 3.82105 5.978 3.76105C6.637 3.76105 7.204 3.27105 7.333 2.63605C7.43158 2.17092 7.68773 1.75408 8.05815 1.456C8.42857 1.15791 8.89055 0.996855 9.366 1.00005H12.634C13.622 1.00005 14.473 1.68505 14.667 2.63605C14.796 3.27105 15.363 3.76105 16.022 3.76105C17.402 3.82105 18.304 3.99105 19.025 4.46305C19.51 4.78105 19.927 5.19005 20.251 5.66705C21 6.76705 21 8.29905 21 11.364C21 14.428 21 15.96 20.251 17.061C19.9253 17.5389 19.5087 17.948 19.025 18.265C17.904 19 16.343 19 13.222 19H8.778C5.657 19 4.096 19 2.975 18.265C2.49154 17.9477 2.07529 17.5382 1.75 17.06C1.53326 16.7361 1.3733 16.3777 1.277 16M18 8.00005H17"
                            stroke="#727C8E" stroke-width="1.5" stroke-linecap="round"></path>
                    </svg>
                </div>
            </div>
            <div class="form-floating col-6 my-2">
                <input type="text" class="form-control users-details-inputs form-control-sm status" placeholder="Status" disabled style="background-color:transparent;">
                <label class="ms-2 d-flex align-items-center" for="status">Status</label>
                <div class="form-check form-switch radio-btn-status">
                    <input class="form-check-input" type="checkbox" id="tutorial_status" name="tutorial_status" role="switch" id="flexSwitchCheckChecked">
                </div>
            </div>

            <div class="form-floating col-12 my-2">
                <button type="button" id="tutorial_form_submit"
                    class="btn text-white users-details-inputs transfer-now-btn w-100 px-5">Save</button>
            </div>
            <h5>Tutorials List</h5>
            <div id="tutorial_list_container">
                <div class="d-flex justify-content-between border rounded-2 my-2">
                    <div class="d-flex align-items-center py-2">
                        <img src="{{ asset('assets_admin/images/tutorial-img.svg') }}" alt="">
                        <div class="d-flex flex-column ps-2">
                            <h6 class="m-0">
                                How to make new PUC
                            </h6>
                            <small>12 may 2023</small>
                            <span class="notifications-list-date px-2">05:30 </span>
                        </div>
                    </div>
                    <div class="pt-3 pe-3 pb-2 d-flex align-items-center">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6 19C6 20.1 6.9 21 8 21H16C17.1 21 18 20.1 18 19V9C18 7.9 17.1 7 16 7H8C6.9 7 6 7.9 6 9V19ZM18 4H15.5L14.79 3.29C14.61 3.11 14.35 3 14.09 3H9.91C9.65 3 9.39 3.11 9.21 3.29L8.5 4H6C5.45 4 5 4.45 5 5C5 5.55 5.45 6 6 6H18C18.55 6 19 5.55 19 5C19 4.45 18.55 4 18 4Z"
                                fill="black" />
                        </svg>
                    </div>

                </div>
            </div>
        </form>
    </div>
</section>

	
@endsection

@push('script')
<script src="{{ asset('assets_admin/customjs/script_settings.js') }}"></script>
    
	
@endpush
