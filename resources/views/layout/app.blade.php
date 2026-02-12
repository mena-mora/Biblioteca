<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title',config('app.name', 'Biblioteca'))</title>
    @vite('resources/css/app.css')
    @stack('styles')
</head>
<body class="bg-gray-100">
    @yield('content')
    @vite('resources/js/app.js')
    @stack('scripts')
</body>
</html>