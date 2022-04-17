@extends('template.admin')

@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Total Users</h5>
                        <h1 class="card-text text-center">{{ $usersCount }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Total Tempat Wisata</h5>
                        <h1 class="card-text text-center">{{ $tempatWisataCount }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Rata-rata Rating</h5>
                        <h1 class="card-text text-center">{{ $rataRating }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3 d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Komentar Terbaru</h5>
                        @foreach ($comments as $comment)
                            <p class="card-text">{{ $comment->user->name }}</p>
                            <p class="card-text text-muted">Rating : {{ $comment->rating }}</p>
                            <p class="card-text">{{ $comment->comment }}</p>
                            <hr>
                            <p class="card-text text-muted">{{ $comment->created_at }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
