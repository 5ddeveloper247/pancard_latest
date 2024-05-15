@extends('layouts.master.admin_template.master')

@push('css')
@endpush

@section('content')
	
<!-- =====ANALYTICS-TAB====== -->

<section>
    <ul class="nav nav-pills d-flex flex-nowrap align-items-center justify-content-between gap-0 gap-md-3 my-3 tab-padding"
        id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button id="nav-sub-links-for-days" type="button" data-filter="today"
                class="nav-link text-nowrap px-3 filter-btns filter_today d-flex flex-column align-items-center justify-content-center" >
                Today
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button id="nav-sub-links-for-days" type="button" data-filter="yesterday"
                class="nav-link text-nowrap px-3 d-flex filter-btns filter_yesterday flex-column align-items-center justify-content-center">
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
        <li class="nav-item" role="presentation">
            <!-- <button id="nav-sub-links-for-days"
                class="nav-link text-nowrap px-4 px-md-5  d-flex flex-column align-items-center justify-content-center"
                id="pills-date-range-tab" data-bs-toggle="pill" data-bs-target="#pills-date-range" type="button"
                role="tab" aria-controls="pills-date-range" aria-selected="false">
                Date Range
            </button> -->
            <input type="text" id="filter_dateRange" class="form-control" placeholder="Choose Range" readonly style="display:block;font-size:12px;padding: .485rem .75rem;"/>
        </li>
    </ul>
    <div class="analytics-container">

        <div class="analytics-card-content px-4 py-2 d-flex flex-column align-items-center ">
            <span class="analytics-card-content-heading" id="c_pending_user">0</span>
            <p class="text-center m-0 analytics-card-content-paragraph pt-2">Pending Users</p>
        </div>

        <div class="analytics-card-content px-4 py-2 d-flex flex-column align-items-center ">
            <span class="analytics-card-content-heading" id="c_active_user">0</span>
            <p class="text-center m-0 analytics-card-content-paragraph pt-2">Active Users</p>
        </div>
        
        <div class="analytics-card-content px-4 py-2 d-flex flex-column align-items-center ">
            <span class="analytics-card-content-heading" id="c_puc_2w">0</span>
            <p class="text-center m-0 analytics-card-content-paragraph pt-2">2w PUC</p>
        </div>

        <div class="analytics-card-content px-4 py-2 d-flex flex-column align-items-center ">
            <span class="analytics-card-content-heading" id="c_puc_2w_fine">0</span>
            <p class="text-center m-0 analytics-card-content-paragraph pt-2">2w PUC with fine</p>
        </div>

        <div class="analytics-card-content px-4 py-2 d-flex flex-column align-items-center ">
            <span class="analytics-card-content-heading" id="c_puc_3w">0</span>
            <p class="text-center m-0 analytics-card-content-paragraph pt-2">3w+ PUC</p>
        </div>

        <div class="analytics-card-content px-4 py-2 d-flex flex-column align-items-center ">
            <span class="analytics-card-content-heading" id="c_puc_3w_fine">0</span>
            <p class="text-center m-0 analytics-card-content-paragraph pt-2">3w+ PUC with fine</p>
        </div>

        <div class="analytics-card-content px-4 py-2 d-flex flex-column align-items-center ">
            <span class="analytics-card-content-heading" id="c_puc_4w">0</span>
            <p class="text-center m-0 analytics-card-content-paragraph pt-2">4w+ PUC</p>
        </div>

        <div class="analytics-card-content px-4 py-2 d-flex flex-column align-items-center ">
            <span class="analytics-card-content-heading" id="c_puc_4w_fine">0</span>
            <p class="text-center m-0 analytics-card-content-paragraph pt-2">4w+ PUC with fine</p>
        </div>

        <div class="analytics-card-content px-4 py-2 d-flex flex-column align-items-center ">
            <span class="analytics-card-content-heading" id="c_challans_pay">0</span>
            <p class="text-center m-0 analytics-card-content-paragraph pt-2">Challan Payment</p>
        </div>

        <div class="analytics-card-content px-4 py-2 d-flex flex-column align-items-center ">
            <span class="analytics-card-content-heading" id="c_puc_2w_am">₹0</span>
            <p class="text-center m-0 analytics-card-content-paragraph pt-2">2w PUC</p>
        </div>

        <div class="analytics-card-content px-4 py-2 d-flex flex-column align-items-center ">
            <span class="analytics-card-content-heading" id="c_puc_2w_fine_am">₹0</span>
            <p class="text-center m-0 analytics-card-content-paragraph pt-2">2w+ PUC with fine</p>
        </div>

        <div class="analytics-card-content px-4 py-2 d-flex flex-column align-items-center ">
            <span class="analytics-card-content-heading" id="c_puc_3w_am">₹0</span>
            <p class="text-center m-0 analytics-card-content-paragraph pt-2">3w+ PUC</p>
        </div>

        <div class="analytics-card-content px-4 py-2 d-flex flex-column align-items-center ">
            <span class="analytics-card-content-heading" id="c_challan_amount">₹0</span>
            <p class="text-center m-0 analytics-card-content-paragraph pt-2">Challan Amount</p>
        </div>

        <div class="analytics-card-content px-4 py-2 d-flex flex-column align-items-center ">
            <span class="analytics-card-content-heading" id="c_puc_3w_fine_am">₹0</span>
            <p class="text-center m-0 analytics-card-content-paragraph pt-2">3w+ PUC with fine</p>
        </div>

        <div class="analytics-card-content px-4 py-2 d-flex flex-column align-items-center ">
            <span class="analytics-card-content-heading" id="c_puc_4w_am">₹0</span>
            <p class="text-center m-0 analytics-card-content-paragraph pt-2">4w+ PUC</p>
        </div>

        <div class="analytics-card-content px-4 py-2 d-flex flex-column align-items-center ">
            <span class="analytics-card-content-heading" id="c_puc_4w_fine_am">₹0</span>
            <p class="text-center m-0 analytics-card-content-paragraph pt-2">4w+ PUC with fine</p>
        </div>

    </div>
</section>
@endsection

@push('script')
    
    <script src="{{ asset('assets_admin/customjs/script_adminanalytics.js') }}"></script>
    
@endpush
