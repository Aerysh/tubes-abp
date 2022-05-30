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
                </div>
                <div class="card my-3">
                    <div class="card-body">
                        <h3 class="card-title">Ulasan</h3>
                        <div class="row my-3">
                            <div class="col-md-6">
                                @if (Auth::check())
                                    <form action="{{ route('tempatWisata.ulasan.store', $tempatWisata->id) }}"
                                        method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="tempat_wisata_id" id="tempat_wisata_id" value="{{ $tempatWisata->id }}">
                                        <div class="mb-3">
                                            <label for="rating">Rating</label>
                                            <select class="form-control" id="rating" name="rating">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="comment">Comment</label>
                                            <textarea class="form-control" id="comment" name="comment" rows="2"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>

                                    </form>
                                @else
                                    <p>Silahkan login untuk memberikan ulasan</p>
                                @endif
                            </div>
                            <div class="col-md-6">
                                @foreach ($comments as $comment)
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row my-3">
                                                <div class="col-md-12">
                                                    <p>{{ $comment->user->name }}</p>
                                                    <p class="text-muted">Rating : {{ $comment->rating }}</p>

                                                    <div class="my-3">
                                                        <p>{{ $comment->comment }}</p>
                                                    </div>

                                                    <p class="text-muted">{{ date('d-M-Y', strtotime($comment->created_at)) }}</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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
