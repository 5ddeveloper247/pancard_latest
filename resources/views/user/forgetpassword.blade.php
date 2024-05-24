<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LOGIN</title>
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/bootstrap.min.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fonts/fonts.google.css') }}"/>
	<link rel="stylesheet" href="{{ asset('assets_user/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}"/>
    
</head>
<script>
    var base_url = "{{url('/')}}";
</script>
<body>
    <div id="uiBlocker" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(0,0,0,0.5); z-index:9999;">
        <div style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%);">
            <img src="{{ asset('assets_user/images/loading-spinner.gif') }}" alt="Loading..." style="height:150px; width:150px;"/>
        </div>
    </div>
    <div class="d-flex flex-column justify-content-center px-4 pt-md-5 pt-3">
        <div class="d-flex align-items-center justify-content-md-center">
            <img class="img-fluid" src="{{ asset('assets_user/images/NewLogo.png') }}" />
            <img class="img-fluid px-1" src="{{ asset('assets_user/images/PUCZONE.png') }}" />
        </div>
        <div class="form-heading d-grid align-items-center justify-content-md-center pt-lg-5">
            <h1 class="mt-2">Password Reset</h1>
        </div>
    </div>
    <div class="d-grid align-items-center justify-content-center">
        <div class="container px-4 pt-0">
            <form class="row g-3 login-form pt-5" id="forgetpassword_form" novalidate="">
                <div class="form-floating">
                    <input type="email" class="form-control" id="registered_email" name="registered_email" placeholder="name@example.com" maxlength="50"/>
                    <label class="ms-2" for="registered_email">Registered Email</label>
                    <a class="otp-code fs-5 me-2" href="javascript:;" id="otp_btn" onclick="getOtpCode()">Get Code</a>
                </div>


                <div id="user_OTP" class="form-floating">
                    <input type="text" class="form-control" id="one_time_password" name="one_time_password" placeholder="Password" />
                    <label class="ms-2 d-flex align-items-center justify-content-between" for="one_time_password">Enter OTP</label>
                    <a class="verify-otp fs-5 me-2" href="javascript:;" id="verify_otp_btn" onclick="verifyOtpCode()">Verify OTP</a>
                </div>


                <div id="verify-otp" class="form-floating">
                    <input type="text" class="form-control" id="new_password" name="new_password" placeholder="Password" />
                    <label class="ms-2 d-flex align-items-center justify-content-between" for="new_password">New Password</label>
                    
                </div>

                <button type="button" class="login-btn py-3 d-none d-md-block forget_form_submit" disabled>
                    Reset Password
                </button>

                <div class="login-btn-hidden d-block d-md-none py-3">
                    <button type="button" class=" w-100 mx-auto py-3 forget_form_submit" disabled>
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/popper/popper.min.js') }}" crossorigin="anonymous"></script>
	<script src="{{ asset('assets/plugins/bootstrap/bootstrap.min.js') }}" crossorigin="anonymous"></script>
	<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets_user/js/main.js') }}"></script>
    <script src="{{ asset('assets_user/customjs/common.js') }}"></script>
    <script src="{{ asset('assets_user/customjs/script_forgetpassword.js') }}"></script>

</body>


    
    <script>
        function tologin() {
            
            window.location.href = "{{route('login')}}";
            
        }
    </script>
	

</html>