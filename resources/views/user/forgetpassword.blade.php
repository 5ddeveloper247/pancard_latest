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
    <header>
        <svg width="100%" height="36vh" viewBox="0 0 1200 295" preserveAspectRatio="none" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M0 0H1200V295C751.666 195.473 497.978 198.823 0 295V0Z" fill="#003EDE" width="100%" />
        </svg>
        <img src="{{ asset('assets_user/images/main logo-01 3.png') }}" width="120" alt="" />
    </header>

    <div class="d-grid align-items-center justify-content-center">
        <div class="form-heading d-grid align-items-center justify-content-center pt-lg-4">
            <h1>Password Reset-</h1>
            <span>Please put your registered e-mail for OTP</span>
        </div>

        <div class="container px-4 pt-0">
            <form class="row g-3 login-form pt-md-0" id="forgetpassword_form" novalidate="">
                <div class="form-floating">
                    <input type="email" class="form-control" id="registered_email" name="registered_email" placeholder="name@example.com" maxlength="50"/>
                    <label class="ps-4" for="registered_email">Registered Email</label>
                    <a class="otp-code fs-5" href="javascript:;" id="otp_btn" onclick="getOtpCode()">Get Code</a>
                </div>


                <div id="user_OTP" class="form-floating">
                    <input type="text" class="form-control" id="one_time_password" name="one_time_password" placeholder="Password" />
                    <label class="px-4 d-flex align-items-center justify-content-between" for="one_time_password">Enter OTP</label>
                    <a class="verify-otp fs-5" href="javascript:;" id="verify_otp_btn" onclick="verifyOtpCode()">Verify OTP</a>
                </div>


                <div id="verify-otp" class="form-floating">
                    <input type="text" class="form-control" id="new_password" name="new_password" placeholder="Password" />
                    <label class="px-4 d-flex align-items-center justify-content-between" for="new_password">New Password</label>
                    
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