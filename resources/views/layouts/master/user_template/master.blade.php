<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PANCARD</title>
	<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/plugins/fonts/fonts.google.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets_user/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}" />
</head>

<body class="">
    @include('layouts.master.user_template.header')
    
        @yield('content')

	@include('layouts.master.user_template.footer')

</body>

</html>




