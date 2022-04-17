<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | keMakassar Admin</title>
    {{-- bootstrap css --}}
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="{{ route('admin.index') }}">keMakassar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle Navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarAdmin">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}"
                                href="{{ route('admin.index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.tempatWisata.*') ? 'active' : '' }}"
                                href="{{ route('admin.tempatWisata.index') }}">Tempat Wisata</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}"
                                href="{{ route('admin.kategori.index') }}">Kategori</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        @yield('footer')
    </footer>

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- bootstrap js --}}
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @yield('scripts')
</body>

</html>
