<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title') | keMakassar
    </title>
    {{-- Bootstrap CSS --}}
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- Custom CSS --}}
    @yield('css')
</head>
<body>
    <header>
        @yield('header')
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        @yield('footer')
    </footer>

    {{-- Bootstrap JS --}}
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

    @yield('scripts')
</body>
</html>
