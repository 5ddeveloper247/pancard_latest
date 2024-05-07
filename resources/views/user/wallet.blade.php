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
                    Available Balance <b class="text-primary">₹500</b>
                </span>
            </div>
            <ul id="nav-wallet-tab" class="nav nav-pills pt-3 d-flex align-items-center justify-content-between"
                id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button id="wallet-tab-bg-color" class="nav-link fw-bolder fs-3 text-dark" id="pills-disabled-tab"
                        data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab"
                        aria-controls="pills-disabled" aria-selected="false" disabled>₹ 1250</button>
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
                        <a href="payment-confirmation.html" type="submit"
                            class="vehicle-info-btn w-100 py-3 fw-bolder fs-5">
                            Add ₹1250 to your wallet
                        </a>
                    </div>
                    <h5>
                        Transection History
                    </h5>

                    <div class="d-flex justify-content-between border rounded-2">
                        <div class="d-flex pt-3 ps-3">
                            <svg width="68" height="68" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="37" height="37" rx="4.5" fill="#FBFBFB" stroke="#F0F0F0" />
                                <path d="M23.1666 19.5834H24.5555V20.9723H23.1666V19.5834Z" fill="#727C8E" />
                                <path
                                    d="M27.5714 13.5556H10.4286V11.4222H26.1429V10H10.4286C10.0497 10 9.68633 10.1498 9.41842 10.4166C9.15051 10.6833 9 11.045 9 11.4222V26.3556C9 26.7328 9.15051 27.0945 9.41842 27.3612C9.68633 27.6279 10.0497 27.7778 10.4286 27.7778H27.5714C27.9503 27.7778 28.3137 27.6279 28.5816 27.3612C28.8495 27.0945 29 26.7328 29 26.3556V14.9778C29 14.6006 28.8495 14.2388 28.5816 13.9721C28.3137 13.7054 27.9503 13.5556 27.5714 13.5556ZM10.4286 26.3556V14.9778H27.5714V17.1111H21.8571C21.4783 17.1111 21.1149 17.261 20.847 17.5277C20.5791 17.7944 20.4286 18.1561 20.4286 18.5333V22.8C20.4286 23.1772 20.5791 23.5389 20.847 23.8057C21.1149 24.0724 21.4783 24.2222 21.8571 24.2222H27.5714V26.3556H10.4286ZM27.5714 18.5333V22.8H21.8571V18.5333H27.5714Z"
                                    fill="#515C6F" />
                            </svg>
                            <div class="d-flex flex-column">
                                <h6>
                                    You added
                                </h6>
                                <small>18 Dec 21, 08:22 PM</small>
                            </div>
                        </div>
                        <div class="pt-3 pe-3">
                            <span class="fw-bolder text-success"> + ₹1250</span><br>
                            <span class="fw-bold text-warning">Pending</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between border mt-3 rounded-2">
                        <div class="d-flex pt-3 ps-3">
                            <svg width="68" height="68" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="37" height="37" rx="4.5" fill="#FBFBFB" stroke="#F0F0F0" />
                                <path d="M23.1666 19.5834H24.5555V20.9723H23.1666V19.5834Z" fill="#727C8E" />
                                <path
                                    d="M27.5714 13.5556H10.4286V11.4222H26.1429V10H10.4286C10.0497 10 9.68633 10.1498 9.41842 10.4166C9.15051 10.6833 9 11.045 9 11.4222V26.3556C9 26.7328 9.15051 27.0945 9.41842 27.3612C9.68633 27.6279 10.0497 27.7778 10.4286 27.7778H27.5714C27.9503 27.7778 28.3137 27.6279 28.5816 27.3612C28.8495 27.0945 29 26.7328 29 26.3556V14.9778C29 14.6006 28.8495 14.2388 28.5816 13.9721C28.3137 13.7054 27.9503 13.5556 27.5714 13.5556ZM10.4286 26.3556V14.9778H27.5714V17.1111H21.8571C21.4783 17.1111 21.1149 17.261 20.847 17.5277C20.5791 17.7944 20.4286 18.1561 20.4286 18.5333V22.8C20.4286 23.1772 20.5791 23.5389 20.847 23.8057C21.1149 24.0724 21.4783 24.2222 21.8571 24.2222H27.5714V26.3556H10.4286ZM27.5714 18.5333V22.8H21.8571V18.5333H27.5714Z"
                                    fill="#515C6F" />
                            </svg>
                            <div class="d-flex flex-column">
                                <h6>
                                    You added
                                </h6>
                                <small>18 Dec 21, 08:22 PM</small>
                            </div>
                        </div>
                        <div class="pt-3 pe-3">
                            <span class="fw-bolder text-danger">- ₹550</span><br>
                            <span class="fw-bold">Debited</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between border mt-3 rounded-2">
                        <div class="d-flex pt-3 ps-3">
                            <svg width="68" height="68" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="37" height="37" rx="4.5" fill="#FBFBFB" stroke="#F0F0F0" />
                                <path d="M23.1666 19.5834H24.5555V20.9723H23.1666V19.5834Z" fill="#727C8E" />
                                <path
                                    d="M27.5714 13.5556H10.4286V11.4222H26.1429V10H10.4286C10.0497 10 9.68633 10.1498 9.41842 10.4166C9.15051 10.6833 9 11.045 9 11.4222V26.3556C9 26.7328 9.15051 27.0945 9.41842 27.3612C9.68633 27.6279 10.0497 27.7778 10.4286 27.7778H27.5714C27.9503 27.7778 28.3137 27.6279 28.5816 27.3612C28.8495 27.0945 29 26.7328 29 26.3556V14.9778C29 14.6006 28.8495 14.2388 28.5816 13.9721C28.3137 13.7054 27.9503 13.5556 27.5714 13.5556ZM10.4286 26.3556V14.9778H27.5714V17.1111H21.8571C21.4783 17.1111 21.1149 17.261 20.847 17.5277C20.5791 17.7944 20.4286 18.1561 20.4286 18.5333V22.8C20.4286 23.1772 20.5791 23.5389 20.847 23.8057C21.1149 24.0724 21.4783 24.2222 21.8571 24.2222H27.5714V26.3556H10.4286ZM27.5714 18.5333V22.8H21.8571V18.5333H27.5714Z"
                                    fill="#515C6F" />
                            </svg>
                            <div class="d-flex flex-column">
                                <h6>
                                    You added
                                </h6>
                                <small>18 Dec 21, 08:22 PM</small>
                            </div>
                        </div>
                        <div class="pt-3 pe-3">
                            <span class="fw-bolder text-danger">- ₹130</span><br>
                            <span class="fw-bold">Debited</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between border mt-3 rounded-2">
                        <div class="d-flex pt-3 ps-3">
                            <svg width="68" height="68" viewBox="0 0 48 48" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="37" height="37" rx="4.5" fill="#FBFBFB" stroke="#F0F0F0" />
                                <path d="M23.1666 19.5834H24.5555V20.9723H23.1666V19.5834Z" fill="#727C8E" />
                                <path
                                    d="M27.5714 13.5556H10.4286V11.4222H26.1429V10H10.4286C10.0497 10 9.68633 10.1498 9.41842 10.4166C9.15051 10.6833 9 11.045 9 11.4222V26.3556C9 26.7328 9.15051 27.0945 9.41842 27.3612C9.68633 27.6279 10.0497 27.7778 10.4286 27.7778H27.5714C27.9503 27.7778 28.3137 27.6279 28.5816 27.3612C28.8495 27.0945 29 26.7328 29 26.3556V14.9778C29 14.6006 28.8495 14.2388 28.5816 13.9721C28.3137 13.7054 27.9503 13.5556 27.5714 13.5556ZM10.4286 26.3556V14.9778H27.5714V17.1111H21.8571C21.4783 17.1111 21.1149 17.261 20.847 17.5277C20.5791 17.7944 20.4286 18.1561 20.4286 18.5333V22.8C20.4286 23.1772 20.5791 23.5389 20.847 23.8057C21.1149 24.0724 21.4783 24.2222 21.8571 24.2222H27.5714V26.3556H10.4286ZM27.5714 18.5333V22.8H21.8571V18.5333H27.5714Z"
                                    fill="#515C6F" />
                            </svg>
                            <div class="d-flex flex-column">
                                <h6>
                                    You added
                                </h6>
                                <small>18 Dec 21, 08:22 PM</small>
                            </div>
                        </div>
                        <div class="pt-3 pe-3 text-end">
                            <span class="fw-bolder text-danger"> - ₹110+300</span><br>
                            <span class="fw-bold">Debited</span>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-manual" role="tabpanel" aria-labelledby="pills-manual-tab"
                    tabindex="0">
                    <div class="row gy-3 m-0">
                        <div class="form-floating col-6 ps-0">
                            <input type="email" class="form-control" id="vehicle-model"
                                placeholder="name@example.com" />
                            <label class="ps-4" for="vehicle-model">Vehicle model</label>
                        </div>


                        <div class="form-floating col-6 pe-0">
                            <input type="number" class="form-control" id="vehicle-name" placeholder="123" />
                            <label class="ps-4" for="vehicle-name">Name</label>
                        </div>
                    </div>


                    <div class="pay-detail d-flex align-items-center justify-content-between 
                        my-3 border border-dark rounded-2 px-3">
                        <div class="d-flex flex-column">
                            <span>Bank Name</span>
                            <span>Holder Name</span>
                            <span>A/C No</span>
                            <span>IFSC Code</span>

                        </div>
                        <div class="d-flex flex-column">
                            <h6 class="fw-bolder m-0">Axis Bank</h6>
                            <h6 class="fw-bolder m-0">PUC Zone</h6>
                            <h6 class="fw-bolder m-0">918010028645992</h6>
                            <h6 class="fw-bolder m-0"> UTIB0001870</h6>
                        </div>
                        <svg width="15" height="7" viewBox="0 0 15 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.5 7L0.138785 0.25L14.8612 0.250001L7.5 7Z" fill="#D7D7D7" />
                        </svg>
                    </div>


                    <div class="py-3 text-center">
                        <a href="payment-confirmation.html" type="submit"
                            class="vehicle-info-btn w-100 py-3 fw-bolder fs-5">
                            Add ₹1250 to your wallet
                        </a>
                    </div>

                    <h6>
                        Bank account and UPI Details
                    </h6>


                    <div class="edit-pay-detail d-flex align-items-center
                     justify-content-between my-3 border border-dark rounded-2 px-3">
                        <div class="d-flex flex-column">
                            <span>Bank Name</span>
                            <span>Holder Name</span>
                            <span>A/C No</span>
                            <span>IFSC Code</span>

                        </div>
                        <div class="d-flex flex-column">
                            <h6 class="fw-bolder mt-2">
                                Axis Bank
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.0312 2.52344H6.53125C6.41315 2.52344 6.29988 2.57035 6.21637 2.65387C6.13285 2.73738 6.08594 2.85065 6.08594 2.96875V6.08594H2.96875C2.85065 6.08594 2.73738 6.13285 2.65387 6.21637C2.57035 6.29988 2.52344 6.41315 2.52344 6.53125V16.0312C2.52344 16.1494 2.57035 16.2626 2.65387 16.3461C2.73738 16.4296 2.85065 16.4766 2.96875 16.4766H12.4688C12.5869 16.4766 12.7001 16.4296 12.7836 16.3461C12.8671 16.2626 12.9141 16.1494 12.9141 16.0312V12.9141H16.0312C16.1494 12.9141 16.2626 12.8671 16.3461 12.7836C16.4296 12.7001 16.4766 12.5869 16.4766 12.4688V2.96875C16.4766 2.85065 16.4296 2.73738 16.3461 2.65387C16.2626 2.57035 16.1494 2.52344 16.0312 2.52344ZM12.0234 15.5859H3.41406V6.97656H12.0234V15.5859ZM15.5859 12.0234H12.9141V6.53125C12.9141 6.41315 12.8671 6.29988 12.7836 6.21637C12.7001 6.13285 12.5869 6.08594 12.4688 6.08594H6.97656V3.41406H15.5859V12.0234Z"
                                        fill="black" />
                                </svg>
                            </h6>
                            <h6 class="fw-bolder mt-2">
                                PUC Zone
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.0312 2.52344H6.53125C6.41315 2.52344 6.29988 2.57035 6.21637 2.65387C6.13285 2.73738 6.08594 2.85065 6.08594 2.96875V6.08594H2.96875C2.85065 6.08594 2.73738 6.13285 2.65387 6.21637C2.57035 6.29988 2.52344 6.41315 2.52344 6.53125V16.0312C2.52344 16.1494 2.57035 16.2626 2.65387 16.3461C2.73738 16.4296 2.85065 16.4766 2.96875 16.4766H12.4688C12.5869 16.4766 12.7001 16.4296 12.7836 16.3461C12.8671 16.2626 12.9141 16.1494 12.9141 16.0312V12.9141H16.0312C16.1494 12.9141 16.2626 12.8671 16.3461 12.7836C16.4296 12.7001 16.4766 12.5869 16.4766 12.4688V2.96875C16.4766 2.85065 16.4296 2.73738 16.3461 2.65387C16.2626 2.57035 16.1494 2.52344 16.0312 2.52344ZM12.0234 15.5859H3.41406V6.97656H12.0234V15.5859ZM15.5859 12.0234H12.9141V6.53125C12.9141 6.41315 12.8671 6.29988 12.7836 6.21637C12.7001 6.13285 12.5869 6.08594 12.4688 6.08594H6.97656V3.41406H15.5859V12.0234Z"
                                        fill="black" />
                                </svg>
                            </h6>
                            <h6 class="fw-bolder mt-2">
                                918010028645992
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.0312 2.52344H6.53125C6.41315 2.52344 6.29988 2.57035 6.21637 2.65387C6.13285 2.73738 6.08594 2.85065 6.08594 2.96875V6.08594H2.96875C2.85065 6.08594 2.73738 6.13285 2.65387 6.21637C2.57035 6.29988 2.52344 6.41315 2.52344 6.53125V16.0312C2.52344 16.1494 2.57035 16.2626 2.65387 16.3461C2.73738 16.4296 2.85065 16.4766 2.96875 16.4766H12.4688C12.5869 16.4766 12.7001 16.4296 12.7836 16.3461C12.8671 16.2626 12.9141 16.1494 12.9141 16.0312V12.9141H16.0312C16.1494 12.9141 16.2626 12.8671 16.3461 12.7836C16.4296 12.7001 16.4766 12.5869 16.4766 12.4688V2.96875C16.4766 2.85065 16.4296 2.73738 16.3461 2.65387C16.2626 2.57035 16.1494 2.52344 16.0312 2.52344ZM12.0234 15.5859H3.41406V6.97656H12.0234V15.5859ZM15.5859 12.0234H12.9141V6.53125C12.9141 6.41315 12.8671 6.29988 12.7836 6.21637C12.7001 6.13285 12.5869 6.08594 12.4688 6.08594H6.97656V3.41406H15.5859V12.0234Z"
                                        fill="black" />
                                </svg>
                            </h6>
                            <h6 class="fw-bolder mt-2 ">
                                UTIB0001870
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.0312 2.52344H6.53125C6.41315 2.52344 6.29988 2.57035 6.21637 2.65387C6.13285 2.73738 6.08594 2.85065 6.08594 2.96875V6.08594H2.96875C2.85065 6.08594 2.73738 6.13285 2.65387 6.21637C2.57035 6.29988 2.52344 6.41315 2.52344 6.53125V16.0312C2.52344 16.1494 2.57035 16.2626 2.65387 16.3461C2.73738 16.4296 2.85065 16.4766 2.96875 16.4766H12.4688C12.5869 16.4766 12.7001 16.4296 12.7836 16.3461C12.8671 16.2626 12.9141 16.1494 12.9141 16.0312V12.9141H16.0312C16.1494 12.9141 16.2626 12.8671 16.3461 12.7836C16.4296 12.7001 16.4766 12.5869 16.4766 12.4688V2.96875C16.4766 2.85065 16.4296 2.73738 16.3461 2.65387C16.2626 2.57035 16.1494 2.52344 16.0312 2.52344ZM12.0234 15.5859H3.41406V6.97656H12.0234V15.5859ZM15.5859 12.0234H12.9141V6.53125C12.9141 6.41315 12.8671 6.29988 12.7836 6.21637C12.7001 6.13285 12.5869 6.08594 12.4688 6.08594H6.97656V3.41406H15.5859V12.0234Z"
                                        fill="black" />
                                </svg>
                            </h6>
                        </div>
                    </div>


                    <div class="edit-pay-detail d-flex align-items-center
                     justify-content-between my-3 border border-dark rounded-2 px-3">
                        <div class="d-flex flex-column">
                            <span>UPI ID</span>
                            <span>Holder Name</span>
                        </div>
                        <div class="d-flex flex-column">
                            <h6 class="fw-bolder mt-2">
                                digilann@ybl
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.0312 2.52344H6.53125C6.41315 2.52344 6.29988 2.57035 6.21637 2.65387C6.13285 2.73738 6.08594 2.85065 6.08594 2.96875V6.08594H2.96875C2.85065 6.08594 2.73738 6.13285 2.65387 6.21637C2.57035 6.29988 2.52344 6.41315 2.52344 6.53125V16.0312C2.52344 16.1494 2.57035 16.2626 2.65387 16.3461C2.73738 16.4296 2.85065 16.4766 2.96875 16.4766H12.4688C12.5869 16.4766 12.7001 16.4296 12.7836 16.3461C12.8671 16.2626 12.9141 16.1494 12.9141 16.0312V12.9141H16.0312C16.1494 12.9141 16.2626 12.8671 16.3461 12.7836C16.4296 12.7001 16.4766 12.5869 16.4766 12.4688V2.96875C16.4766 2.85065 16.4296 2.73738 16.3461 2.65387C16.2626 2.57035 16.1494 2.52344 16.0312 2.52344ZM12.0234 15.5859H3.41406V6.97656H12.0234V15.5859ZM15.5859 12.0234H12.9141V6.53125C12.9141 6.41315 12.8671 6.29988 12.7836 6.21637C12.7001 6.13285 12.5869 6.08594 12.4688 6.08594H6.97656V3.41406H15.5859V12.0234Z"
                                        fill="black" />
                                </svg>
                            </h6>
                            <h6 class="fw-bolder mt-2">
                                PUC Zone
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.0312 2.52344H6.53125C6.41315 2.52344 6.29988 2.57035 6.21637 2.65387C6.13285 2.73738 6.08594 2.85065 6.08594 2.96875V6.08594H2.96875C2.85065 6.08594 2.73738 6.13285 2.65387 6.21637C2.57035 6.29988 2.52344 6.41315 2.52344 6.53125V16.0312C2.52344 16.1494 2.57035 16.2626 2.65387 16.3461C2.73738 16.4296 2.85065 16.4766 2.96875 16.4766H12.4688C12.5869 16.4766 12.7001 16.4296 12.7836 16.3461C12.8671 16.2626 12.9141 16.1494 12.9141 16.0312V12.9141H16.0312C16.1494 12.9141 16.2626 12.8671 16.3461 12.7836C16.4296 12.7001 16.4766 12.5869 16.4766 12.4688V2.96875C16.4766 2.85065 16.4296 2.73738 16.3461 2.65387C16.2626 2.57035 16.1494 2.52344 16.0312 2.52344ZM12.0234 15.5859H3.41406V6.97656H12.0234V15.5859ZM15.5859 12.0234H12.9141V6.53125C12.9141 6.41315 12.8671 6.29988 12.7836 6.21637C12.7001 6.13285 12.5869 6.08594 12.4688 6.08594H6.97656V3.41406H15.5859V12.0234Z"
                                        fill="black" />
                                </svg>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <!-- <script src="{{ asset('customjs/web/register/common.js') }}?v={{time()}}"></script> -->
    
	
@endpush
