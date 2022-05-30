@extends('template.master')

@section('title', 'Login')

@section('css')
<style>
    #hero {
        height: 100vh;
        background-image:url("{{ asset('background.png') }}");
        background-size: cover;
        background-color: rgba(0, 0, 0, 0.5);
        background-blend-mode: overlay;
        background-position: center;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>
@endsection

@section('content')
<section name="hero  d-flex align-items-center">
    <div id="hero" class="px-4 d-flex align-items-center text-center">
        <div class="col-md-3 mx-auto">
            <div class="row justify-content-center">

                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
                @endif

                @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('loginError')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
                @endif

                <main class="form-signin">
                    <h1 class="h3 mb-3 fw-bold text-light">Please Login</h1>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-floating">
                            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" autofocus required>
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                    </form>
                    <small class="d-block text-center text-light mt-3"> Not registered? <a href="/register">Register Now!</a> </small>
                </main>
            </div>
        </div>
    </div>
</section>
@endsection

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
