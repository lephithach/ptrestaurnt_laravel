<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PT Restaurant</title>
    @vite(['resources/css/app.css', 'resources/scss/index.css'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
</head>
<body>
    @include('admin.include.menu-left')
    
    <div class="container">
        @yield('root')
    </div>
    @vite(['resources/js/app.js'])
</body>
</html>