<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PANCARD</title>
	<link rel="stylesheet" href="{{ asset('assets_admin/plugins/bootstrap/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_admin/plugins/toastr/toastr.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets_admin/plugins/fonts/fonts.google.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets_admin/css/style.css') }}" />
</head>

<body class="">
    @include('layouts.master.admin_template.header')
    
        @yield('content')

	@include('layouts.master.admin_template.footer')

</body>

</html>




