@extends('template.master')

@section('title', 'Home')

@section('css')
    <style>
        #hero{
            height: 100vh;
            background-image:url("{{ asset('background.png') }}");
            background-size:cover;
            background-color: rgba(0,0,0,0.5);
            background-blend-mode: overlay;
            background-position:center;
        }
        a.button {
            border: 1px solid #808080;
            background: #a0a0a0;
            display: inline-block;
            padding: 5px;
}
    </style>
@endsection

@section('content')
    <section name="hero  d-flex align-items-center">
        <div id="hero" class="px-4 d-flex align-items-center text-center">
            <div class="col-lg-6 mx-auto">
                <h1 class="display-5 fw-bold text-light">Welcome</h1>
                <p class="lead mb-4 text-light">keMakassar dapat membantu anda berwisata!</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <button type="button" class="btn btn-primary rounded-pill px-4 gap-3">Find Out More</button>
                </div>
            </div>
        </div>
    </section>
    <section name="topDestination">
        <div class="container my-5">
            <div class="row">
                <h2>Top Destination</h2>
                <div class="col-md-4">
                    <img src="{{asset('images/mal-phinisi.jpg')}}" class="img-fluid h-75" alt="Mal Phinisi Point">
                    <div class="my-3">
                        <a class="button" href="\resources\views\phinisi.blade.php" target="_blank"><h5>Mal Phinis Point</h5></a>
                        <p>Tempat Belanja</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="{{asset('images/trans-studio.jpg')}}" class="img-fluid h-75" alt="Trans Studio Makassar">
                    <div class="my-3">
                    <a class="button" href="\resources\views\trans.blade.php" target="_blank"><h5>Trans Studio Makassar</h5></a>
                        <p>Taman Hiburan</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="{{asset('images/pantai-losari.jpg')}} " class="img-fluid h-75" alt="Pantai Losari">
                    <div class="my-3">
                    <a class="button" href="\resources\views\losari.blade.php" target="_blank"><h5>Pantai Losari</h5></a>
                        <p>Pantai</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section name="covidWarning">
        <div class="container my-5">
            <div class="row">
                <div class="col-md-4 d-flex align-content-center flex-wrap">
                    <h2>Tolong Gunakan Masker</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum omnis perferendis assumenda!</p>
                    <a href="#" class="btn btn-primary">Lebih Lanjut</a>
                </div>
                <div class="col-md-8">
                    <img src="{{asset('covid.jpg')}}" class="img-fluid" alt="Covid-19">
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    <section name="footer" class="bg-secondary py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3 class="text-light">keMakassar</h3>
                    <p class="text-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum omnis perferendis assumenda!</p>
                    <p class="text-light">Copyright &copy; 2022</p>
                </div>
                <div class="col-md-4">
                    <h3 class="text-light">Link</h3>
                    <ul class="list-unstyled">
                        <li class="text-light ">
                            <a href="#" class="text-decoration-none link-light">Home</a>
                        </li>
                        <li class="text-light">
                            <a href="#" class="text-decoration-none link-light">About</a>
                        </li>
                        <li class="text-light">
                            <a href="#" class="text-decoration-none link-light">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    {{-- contact --}}
                    <h3 class="text-light">Contact</h3>
                    <ul class="list-unstyled">
                        <li class="text-light">
                            <a href="#" class="text-decoration-none link-light">0812-1234-1234</a>
                        </li>
                        <li class="text-light">
                            <a href="#" class="text-decoration-none link-light">
                                <i class="fab fa-instagram"></i>
                                @kemakassar
                            </a>
                        </li>
                        <li class="text-light">
                            <a href="#" class="text-decoration-none link-light">
                                <i class="fa-brands fa-facebook"></i>
                                kemakassar
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
