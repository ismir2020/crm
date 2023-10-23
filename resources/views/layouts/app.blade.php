<!-- app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Additional Styles -->
    @stack('styles')
</head>
<body>
    <div id="app">
        @include('layouts.header') <!-- Include the header -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Additional Scripts -->
    @stack('scripts')
</body>
</html>