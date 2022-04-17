@extends('template.master')

@section('title')
    {{ $tempatWisata->name }}
@endsection

@section('css')
    {{-- Import CSS Disini --}}
@endsection

@section('header')
    <h1>Example</h1>
@endsection

@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col-md-12">
                <h1>{{ $tempatWisata->name }}</h1>
                <p class="text-muted">{{ $tempatWisata->categories }}</p>
                <div class="row my-3">
                    <div class="col-md-6">
                        <div class="card h-100 shadow">
                            <div class="card-body">
                                <h3>Tentang</h3>
                                <p>{{ $tempatWisata->description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @foreach ($tempatWisata->images as $image)
                            <img src="{{ asset('images/' . $image->image) }}" class="img-fluid"
                                alt="{{ $tempatWisata->name }}">
                        @endforeach
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-6">
                        <div class="card h-100 shadow">
                            <div class="card-body">
                                <h3>Alamat</h3>
                                <p>{{ $tempatWisata->address }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 shadow">
                            <div class="card-body">
                                <h3>Ulasan</h3>
                                {{-- check if user authenticated --}}
                                @if (Auth::check())

                                @else
                                    <p>Silahkan login untuk memberikan ulasan</p>
                                @endif
                            </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        {{-- on load add bg-dark to .navbar --}}
        <script>
            $(function() {
                var navbar = $('.navbar');
                navbar.addClass('bg-dark');
                navbar.removeClass('fixed-top');
            });
        </script>
    @endsection
