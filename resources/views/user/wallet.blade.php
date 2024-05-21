
@extends('layouts.master.user_template.master')

@push('css')
@endpush

@section('content')
<section>
        <div class="container-fluid wallet-tab-container">
            <div class="avail-balance d-flex align-items-center justify-content-between flex-nowrap px-2">
                <h5 class="text-center m-0">
                    Wallet
                </h5>
                <span>
                    Available Balance <b class="text-primary">₹{{@$user->balance}}</b>
                </span>
            </div>
            <ul id="nav-wallet-tab" class="nav nav-pills pt-3 d-flex align-items-center justify-content-between"
                id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <form id="add_transaction_form">
                        <input type="hidden" name="selected_bank_id" id="selected_bank_id">
                   <input type="number" class="form-control" name="transaction_amount" maxlength="6" id="transaction_amount" style="width:120px; height:52px;" placeholder="₹ 500" >
                   
                </li>
                <li class="nav-item" role="presentation">
                    <button id="wallet-tab-bg-color" class="nav-link active py-3" id="pills-online-tab"
                        data-bs-toggle="pill" data-bs-target="#pills-online" type="button" role="tab"
                        aria-controls="pills-online" aria-selected="true">Online</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="wallet-tab-bg-color" class="nav-link py-3" id="pills-manual-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-manual" type="button" role="tab" aria-controls="pills-manual"
                        aria-selected="false">Manual Transfer</button>
                </li>
            </ul>


            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-online" role="tabpanel"
                    aria-labelledby="pills-online-tab" tabindex="0">
                    <p class="pt-3">0% charge only on upi payments otherwise 3% charge will be deduct from wallet
                    </p>
                    <div class="py-3 text-center">
                        <a href="javascript:;" type="submit"
                            class="vehicle-info-btn w-100 py-3 fw-bolder fs-5">
                            Add ₹0 to your wallet
                        </a>
                    </div>
                    <h5>
                        Transaction History
                    </h5>

                    <div id="transactionhistorydiv">
                        
                    </div>

                    
                    

                    
                </div>
                <div class="tab-pane fade" id="pills-manual" role="tabpanel" aria-labelledby="pills-manual-tab"
                    tabindex="0">
                    <div class="row gy-3 m-0">
                        <div class="form-floating col-6 ps-0">
                            <input type="text" class="form-control" id="utr_no" name="utr_no"
                                />
                            <label class="ps-4" for="utr_no">UTR No</label>
                        </div>


                        <div class="form-floating col-6 pe-0">
                            <input type="date" class="form-control" name="transaction_date" id="transaction_date" placeholder="123" />
                            <label class="ps-4" for="transaction_date">Transaction Date</label>
                        </div>
                    </div>


                    <div class="dropdown">
                        <div class="dropdown-toggle pay-detail d-flex align-items-center justify-content-between my-3 border border-dark rounded-2 px-3" data-bs-toggle="dropdown" aria-expanded="false" id="selected_bank_details">

                            <div class="d-flex flex-column">
                                <span>Bank Name</span>
                                <span>Holder Name</span>
                                <span>A/C No</span>
                                <span>IFSC Code</span>
                            </div>
                            <div class="d-flex flex-column">
                                <h6 class="fw-bolder m-0">----------</h6>
                                <h6 class="fw-bolder m-0">----------</h6>
                                <h6 class="fw-bolder m-0">----------</h6>
                                <h6 class="fw-bolder m-0">----------</h6>
                            </div>
                            <!-- <svg width="15" height="7" viewBox="0 0 15 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.5 7L0.138785 0.25L14.8612 0.250001L7.5 7Z" fill="#D7D7D7" />
                            </svg> -->
                        </div>
                        <ul class="dropdown-menu" style="width:100%;">
                        @foreach ($banks as $bank )
                        @if ($bank->bank_type == 1)
                        <li><span class="dropdown-item select_bank cursor-pointer " data-id="{{$bank->id}}" >{{$bank->upi_id}}</span></li>
                        @endif
                        @if ($bank->bank_type == 2)
                        <li><span class="dropdown-item select_bank cursor-pointer" data-id="{{$bank->id}}" >{{$bank->bank_name}}</span></li>     
                        @endif
                        
                            
                        @endforeach
                        </ul>
                    </div>












                    <div class="py-3 text-center">
                        <button type="submit"
                            class="vehicle-info-btn w-100 py-3 fw-bolder fs-5 add_transaction_btn">
                            Add to your wallet
                        </button>
                    </div>
                </form>

                    <h6>
                        Bank account and UPI Details
                    </h6>


                    @foreach ($banks as $bank )
                        @if ($bank->bank_type == 2)
                            <div class="edit-pay-detail d-flex align-items-center justify-content-between my-3 border border-dark rounded-2 px-3">
                                <div class="d-flex flex-column">
                                    <span>Bank Name</span>
                                    <span>Holder Name</span>
                                    <span>A/C No</span>
                                    <span>IFSC Code</span>

                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="fw-bolder mt-2">
                                        {{$bank->bank_name}}
                                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.0312 2.52344H6.53125C6.41315 2.52344 6.29988 2.57035 6.21637 2.65387C6.13285 2.73738 6.08594 2.85065 6.08594 2.96875V6.08594H2.96875C2.85065 6.08594 2.73738 6.13285 2.65387 6.21637C2.57035 6.29988 2.52344 6.41315 2.52344 6.53125V16.0312C2.52344 16.1494 2.57035 16.2626 2.65387 16.3461C2.73738 16.4296 2.85065 16.4766 2.96875 16.4766H12.4688C12.5869 16.4766 12.7001 16.4296 12.7836 16.3461C12.8671 16.2626 12.9141 16.1494 12.9141 16.0312V12.9141H16.0312C16.1494 12.9141 16.2626 12.8671 16.3461 12.7836C16.4296 12.7001 16.4766 12.5869 16.4766 12.4688V2.96875C16.4766 2.85065 16.4296 2.73738 16.3461 2.65387C16.2626 2.57035 16.1494 2.52344 16.0312 2.52344ZM12.0234 15.5859H3.41406V6.97656H12.0234V15.5859ZM15.5859 12.0234H12.9141V6.53125C12.9141 6.41315 12.8671 6.29988 12.7836 6.21637C12.7001 6.13285 12.5869 6.08594 12.4688 6.08594H6.97656V3.41406H15.5859V12.0234Z"
                                                fill="black" />
                                        </svg>
                                    </h6>
                                    <h6 class="fw-bolder mt-2">
                                    {{$bank->holder_name}}
                                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.0312 2.52344H6.53125C6.41315 2.52344 6.29988 2.57035 6.21637 2.65387C6.13285 2.73738 6.08594 2.85065 6.08594 2.96875V6.08594H2.96875C2.85065 6.08594 2.73738 6.13285 2.65387 6.21637C2.57035 6.29988 2.52344 6.41315 2.52344 6.53125V16.0312C2.52344 16.1494 2.57035 16.2626 2.65387 16.3461C2.73738 16.4296 2.85065 16.4766 2.96875 16.4766H12.4688C12.5869 16.4766 12.7001 16.4296 12.7836 16.3461C12.8671 16.2626 12.9141 16.1494 12.9141 16.0312V12.9141H16.0312C16.1494 12.9141 16.2626 12.8671 16.3461 12.7836C16.4296 12.7001 16.4766 12.5869 16.4766 12.4688V2.96875C16.4766 2.85065 16.4296 2.73738 16.3461 2.65387C16.2626 2.57035 16.1494 2.52344 16.0312 2.52344ZM12.0234 15.5859H3.41406V6.97656H12.0234V15.5859ZM15.5859 12.0234H12.9141V6.53125C12.9141 6.41315 12.8671 6.29988 12.7836 6.21637C12.7001 6.13285 12.5869 6.08594 12.4688 6.08594H6.97656V3.41406H15.5859V12.0234Z"
                                                fill="black" />
                                        </svg>
                                    </h6>
                                    <h6 class="fw-bolder mt-2">
                                    {{$bank->account_number}}
                                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.0312 2.52344H6.53125C6.41315 2.52344 6.29988 2.57035 6.21637 2.65387C6.13285 2.73738 6.08594 2.85065 6.08594 2.96875V6.08594H2.96875C2.85065 6.08594 2.73738 6.13285 2.65387 6.21637C2.57035 6.29988 2.52344 6.41315 2.52344 6.53125V16.0312C2.52344 16.1494 2.57035 16.2626 2.65387 16.3461C2.73738 16.4296 2.85065 16.4766 2.96875 16.4766H12.4688C12.5869 16.4766 12.7001 16.4296 12.7836 16.3461C12.8671 16.2626 12.9141 16.1494 12.9141 16.0312V12.9141H16.0312C16.1494 12.9141 16.2626 12.8671 16.3461 12.7836C16.4296 12.7001 16.4766 12.5869 16.4766 12.4688V2.96875C16.4766 2.85065 16.4296 2.73738 16.3461 2.65387C16.2626 2.57035 16.1494 2.52344 16.0312 2.52344ZM12.0234 15.5859H3.41406V6.97656H12.0234V15.5859ZM15.5859 12.0234H12.9141V6.53125C12.9141 6.41315 12.8671 6.29988 12.7836 6.21637C12.7001 6.13285 12.5869 6.08594 12.4688 6.08594H6.97656V3.41406H15.5859V12.0234Z"
                                                fill="black" />
                                        </svg>
                                    </h6>
                                    <h6 class="fw-bolder mt-2 ">
                                    {{$bank->ifsc_code}}
                                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.0312 2.52344H6.53125C6.41315 2.52344 6.29988 2.57035 6.21637 2.65387C6.13285 2.73738 6.08594 2.85065 6.08594 2.96875V6.08594H2.96875C2.85065 6.08594 2.73738 6.13285 2.65387 6.21637C2.57035 6.29988 2.52344 6.41315 2.52344 6.53125V16.0312C2.52344 16.1494 2.57035 16.2626 2.65387 16.3461C2.73738 16.4296 2.85065 16.4766 2.96875 16.4766H12.4688C12.5869 16.4766 12.7001 16.4296 12.7836 16.3461C12.8671 16.2626 12.9141 16.1494 12.9141 16.0312V12.9141H16.0312C16.1494 12.9141 16.2626 12.8671 16.3461 12.7836C16.4296 12.7001 16.4766 12.5869 16.4766 12.4688V2.96875C16.4766 2.85065 16.4296 2.73738 16.3461 2.65387C16.2626 2.57035 16.1494 2.52344 16.0312 2.52344ZM12.0234 15.5859H3.41406V6.97656H12.0234V15.5859ZM15.5859 12.0234H12.9141V6.53125C12.9141 6.41315 12.8671 6.29988 12.7836 6.21637C12.7001 6.13285 12.5869 6.08594 12.4688 6.08594H6.97656V3.41406H15.5859V12.0234Z"
                                                fill="black" />
                                        </svg>
                                    </h6>
                                </div>
                            </div>
                        @elseif($bank->bank_type == 1)
                            <div class="edit-pay-detail d-flex align-items-center justify-content-between my-3 border border-dark rounded-2 px-3">
                                <div class="d-flex flex-column">
                                    <span>UPI ID</span>
                                    <span>Holder Name</span>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="fw-bolder mt-2">
                                    {{$bank->upi_id}}
                                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.0312 2.52344H6.53125C6.41315 2.52344 6.29988 2.57035 6.21637 2.65387C6.13285 2.73738 6.08594 2.85065 6.08594 2.96875V6.08594H2.96875C2.85065 6.08594 2.73738 6.13285 2.65387 6.21637C2.57035 6.29988 2.52344 6.41315 2.52344 6.53125V16.0312C2.52344 16.1494 2.57035 16.2626 2.65387 16.3461C2.73738 16.4296 2.85065 16.4766 2.96875 16.4766H12.4688C12.5869 16.4766 12.7001 16.4296 12.7836 16.3461C12.8671 16.2626 12.9141 16.1494 12.9141 16.0312V12.9141H16.0312C16.1494 12.9141 16.2626 12.8671 16.3461 12.7836C16.4296 12.7001 16.4766 12.5869 16.4766 12.4688V2.96875C16.4766 2.85065 16.4296 2.73738 16.3461 2.65387C16.2626 2.57035 16.1494 2.52344 16.0312 2.52344ZM12.0234 15.5859H3.41406V6.97656H12.0234V15.5859ZM15.5859 12.0234H12.9141V6.53125C12.9141 6.41315 12.8671 6.29988 12.7836 6.21637C12.7001 6.13285 12.5869 6.08594 12.4688 6.08594H6.97656V3.41406H15.5859V12.0234Z"
                                                fill="black" />
                                        </svg>
                                    </h6>
                                    <h6 class="fw-bolder mt-2">
                                    {{$bank->holder_name}}
                                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.0312 2.52344H6.53125C6.41315 2.52344 6.29988 2.57035 6.21637 2.65387C6.13285 2.73738 6.08594 2.85065 6.08594 2.96875V6.08594H2.96875C2.85065 6.08594 2.73738 6.13285 2.65387 6.21637C2.57035 6.29988 2.52344 6.41315 2.52344 6.53125V16.0312C2.52344 16.1494 2.57035 16.2626 2.65387 16.3461C2.73738 16.4296 2.85065 16.4766 2.96875 16.4766H12.4688C12.5869 16.4766 12.7001 16.4296 12.7836 16.3461C12.8671 16.2626 12.9141 16.1494 12.9141 16.0312V12.9141H16.0312C16.1494 12.9141 16.2626 12.8671 16.3461 12.7836C16.4296 12.7001 16.4766 12.5869 16.4766 12.4688V2.96875C16.4766 2.85065 16.4296 2.73738 16.3461 2.65387C16.2626 2.57035 16.1494 2.52344 16.0312 2.52344ZM12.0234 15.5859H3.41406V6.97656H12.0234V15.5859ZM15.5859 12.0234H12.9141V6.53125C12.9141 6.41315 12.8671 6.29988 12.7836 6.21637C12.7001 6.13285 12.5869 6.08594 12.4688 6.08594H6.97656V3.41406H15.5859V12.0234Z"
                                                fill="black" />
                                        </svg>
                                    </h6>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    


                    
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="{{ asset('assets_user/customjs/script_wallet.js') }}"></script>
	
@endpush
