<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        
    </head>
    <body class="antialiased">
        <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="excel_file">
            <button type="submit">Upload</button>
        </form>
    </body>
</html>
