<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/bootstrap.min.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fonts/fonts.google.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets_admin/css/style.css') }}" />
</head>
<script>
    var base_url = "{{url('/')}}";
</script>
<body>
	<div class="container d-flex flex-column align-items-center justify-content-center h-100 text-center">
		<div class="px-4">
			<h1>Admin Login</h1>

			<div class="pt-md-5 pt-4">
				
				@if (session('error'))
					<div class="alert alert-danger">
						{{session('error')}}
					</div>
				@endif
				<form class="row g-3 pt-md-0" method="POST" action="{{ route('admin.loginSubmit') }}">
					@csrf
					<div class="form-floating p-0">
						<input id="email" type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="name@example.com"  required autofocus/>
						<label class="ps-4" for="email">Email</label>
					</div>
					<div class="form-floating p-0">
						<input id="password" type="password" name="password" class="form-control" placeholder="Password" required autocomplete/>
						<label class="ps-4" for="password">Password</label>
						<svg onclick="showPassword()" class="showPassword" id="showPassword" width="20" height="16" viewBox="0 0 20 16" zfill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path opacity="0.5"
								d="M0 8C0 9.64 0.425 10.191 1.275 11.296C2.972 13.5 5.818 16 10 16C14.182 16 17.028 13.5 18.725 11.296C19.575 10.192 20 9.639 20 8C20 6.36 19.575 5.809 18.725 4.704C17.028 2.5 14.182 0 10 0C5.818 0 2.972 2.5 1.275 4.704C0.425 5.81 0 6.361 0 8Z"
								fill="#515C6F" />
							<path fill-rule="evenodd" clip-rule="evenodd"
								d="M6.25 7.75C6.25 6.75544 6.64509 5.80161 7.34835 5.09835C8.05161 4.39509 9.00544 4 10 4C10.9946 4 11.9484 4.39509 12.6517 5.09835C13.3549 5.80161 13.75 6.75544 13.75 7.75C13.75 8.74456 13.3549 9.69839 12.6517 10.4017C11.9484 11.1049 10.9946 11.5 10 11.5C9.00544 11.5 8.05161 11.1049 7.34835 10.4017C6.64509 9.69839 6.25 8.74456 6.25 7.75ZM7.75 7.75C7.75 7.15326 7.98705 6.58097 8.40901 6.15901C8.83097 5.73705 9.40326 5.5 10 5.5C10.5967 5.5 11.169 5.73705 11.591 6.15901C12.0129 6.58097 12.25 7.15326 12.25 7.75C12.25 8.34674 12.0129 8.91903 11.591 9.34099C11.169 9.76295 10.5967 10 10 10C9.40326 10 8.83097 9.76295 8.40901 9.34099C7.98705 8.91903 7.75 8.34674 7.75 7.75Z"
								fill="#515C6F" />
						</svg>
					</div>
					<button type="submit" class="login-btn py-3 d-none d-md-block">
						Login
					</button>
					<div class="login-btn-hidden d-block d-md-none py-3">
						<button type="submit" class="w-100 mx-auto py-3">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

    
</body>

@push('script')
    
<script src="{{ asset('assets/plugins/popper/popper.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('assets/plugins/bootstrap/bootstrap.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('assets_admin/main.js') }}"></script>

@endpush

<script>
     document.getElementById('showPassword').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            const passwordFieldType = passwordField.getAttribute('type');
            if (passwordFieldType === 'password') {
                passwordField.setAttribute('type', 'text');
            } else {
                passwordField.setAttribute('type', 'password');
            }
        });
</script>

</html>