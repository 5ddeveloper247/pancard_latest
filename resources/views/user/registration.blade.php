<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LOGIN</title>
    <link rel="stylesheet" href="{{ asset('assets_admin/plugins/bootstrap/bootstrap.min.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets_admin/plugins/fonts/fonts.google.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets_user/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_admin/plugins/toastr/toastr.min.css') }}"/>
</head>

<body>
    <header>
        <svg width="100%" height="36vh" viewBox="0 0 1200 295" preserveAspectRatio="none" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M0 0H1200V295C751.666 195.473 497.978 198.823 0 295V0Z" fill="#003EDE" width="100%" />
        </svg>
        <img src="{{ asset('assets_user/images/main logo-01 3.png') }}" width="120" alt="" />
    </header>

    <div class="d-flex align-items-center justify-content-center">
        <div class="container py-3 py-md-0">
            <div class="register-heading d-md-grid align-items-center justify-content-center">
                <h1>Register</h1>
                <span> Kindly enter your details to get started </span>
            </div>


            <form class="row g-3 register pt-4" id="registration_form" novalidate="">
                <div class="form-floating col-6 col-md-4">
                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Name" />
                    <label class="ps-4" for="InputUsername">Name</label>
                </div>


                <div class="form-floating col-6 col-md-4">
                    <input type="text" class="form-control" id="username_auto" name="username_auto" value="{{$username_auto}}" readonly/>
                    <label class="ps-4" for="UserName_AutoGen">Username (Auto generated)</label>
                </div>

                <div class="form-floating col-6 col-md-4">
                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" />
                    <label class="ps-4" for="floatingInputUsername">Company Name</label>
                </div>


                <div class="form-floating col-6 col-md-4">
                    <input type="number" class="form-control" id="user_phone" name="user_phone" placeholder="123" />
                    <label class="ps-4" for="userPhoneNum">Mobile No</label>
                </div>

                <div class="form-floating col-6 col-md-4">
                    <input type="email" class="form-control" id="user_email" name="user_email" placeholder="name@example.com" />
                    <label class="ps-4" for="Username_email">Email</label>
                </div>


                <div class="form-floating col-6 col-md-4">
                    <input type="text" class="form-control" id="user_pin" name="user_pin" placeholder="Password" />
                    <label class="ps-4" for="UserName_shopPin">Shop Pin Code</label>
                </div>

                <div class="form-floating col-6 col-md-4">
                    <label class="visually-hidden" for="user_state"></label>
                    <select class="form-select" id="user_state" name="user_state" onchange="getCitiesLovData();">
                        <option value="">Choose State</option>
                        @foreach($states as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-floating col-6 col-md-4">
                    <label class="visually-hidden" for="user_city"></label>
                    <select class="form-select" id="user_city" name="user_city" onchange="getAreasLovData();">
                        <option value="">Choose City</option>
                    </select>
                </div>


                <div class="form-floating col-6 col-md-4">
                    <label class="visually-hidden" for="user_area"></label>
                    <select class="form-select" id="user_area" name="user_area">
                        <option value="">Choose Area</option>
                    </select>
                </div>


                <div class="form-floating col-6 col-md-4">
                    <input type="text" class="form-control" id="user_landmark" name="user_landmark" placeholder="123" />
                    <label class="ps-4" for="user_landmark">Landmark</label>
                </div>


                <div class="form-floating col-6 col-md-4">
                    <div id="cameraIcon" class="upload px-4 d-flex align-items-center justify-content-between">
                        <span id="picturename" style="max-width: 88% !important; overflow: hidden; text-overflow: ellipsis;">Upload Picture</span>
                        <input type="file" accept="image/*" capture="camera" id="upload_picture" name="upload_picture" multiple="false" style="display: none;">
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


                <div class="form-floating col-6 col-md-4">
                    <div id="aadharUploadIcon" class="upload px-4 d-flex align-items-center justify-content-between">
                        <span id="filename" style="max-width: 88% !important; overflow: hidden; text-overflow: ellipsis;">Upload Aadhar</span>
                        <input type="file" id="upload_aadhar" name="upload_aadhar" multiple="false" style="display: none;">
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


                <div class="row g-0 gap-3 px-2">
                    <div id="retailer" class="form-floating col-12 col-md-6 my-3">
                        <input type="email" readonly class="form-control-plaintext fw-bolder"
                            id="floatingPlaintextInput" placeholder="Retailer (₹499)" value="Retailer (₹499)">
                        <label class="ps-4" for="floatingPlaintextInput">User Type</label>
                    </div>

                    <div class="col d-none d-md-block py-3">
                        <button type="button" id="" class="payment-btn w-100 py-3 register_form_submit">
                            Pay and Submit
                        </button>
                    </div>
                </div>

                <span class="fw-normal">
                    By continuing, you agree to LifeLink <span class="terms">Terms of use </span> and <span
                        class="privacy"> Privacy Policy</span>
                </span>

                <div class="login-btn-hidden d-block d-md-none py-3">
                    <button type="button" id="" class="payment-btn w-100 mx-auto py-3 register_form_submit">
                        Pay and Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

	

    <script src="{{ asset('assets_user/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets_user/plugins/popper/popper.min.js') }}" crossorigin="anonymous"></script>
	<script src="{{ asset('assets_user/plugins/bootstrap/bootstrap.min.js') }}" crossorigin="anonymous"></script>
	<script src="{{ asset('assets_user/plugins/toastr/toastr.min.js') }}"></script>
	<script src="{{ asset('assets_user/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets_user/js/main.js') }}"></script>
    <script src="{{ asset('assets_user/customjs/common.js') }}"></script>
    <script src="{{ asset('assets_user/customjs/script_registration.js') }}"></script>
    <script>
     
        
    </script>
	
</body>

</html>