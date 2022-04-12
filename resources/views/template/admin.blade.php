<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | keMakassar Admin</title>
    {{-- bootstrap css --}}
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="{{route('admin.index')}}">keMakassar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle Navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarAdmin">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.index')}}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarWisataDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tempat Wisata
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarWisataDropdown">
                                <li><a class="dropdown-item" href="#">Tambah Tempat Wisata</a></li>
                                <li><a class="dropdown-item" href="#">Daftar Tempat Wisata</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarKategoriDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Kategori
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarKategoriDropdown">
                                <li><a class="dropdown-item" href="#">Tambah Kategori</a></li>
                                <li><a class="dropdown-item" href="#">Daftar Kategori</a></li>
                            </ul>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- bootstrap js --}}
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    @yield('scripts')
</body>
</html>
