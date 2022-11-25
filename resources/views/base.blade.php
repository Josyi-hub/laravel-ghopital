<!DOCTYPE html>
<html lang="en">
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Laravel 6 & MySQL CRUD Tutorial</title>
 <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet" type="text/css" />
 @viteReactRefresh
 @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
 <div class="container">
 @yield('main')
 </div>
 <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>
