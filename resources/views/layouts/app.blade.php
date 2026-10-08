<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
        <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    </head>
    <body class="d-flex flex-column h-100 bg-light">
        <main class="flex-shrink-0" id="app">
            <div class="container mt-5">
                @yield('content')
            </div>
            @yield('modal')
        </main>

        @include('layouts.footer')

        @yield('scripts')
    </body>
</html>