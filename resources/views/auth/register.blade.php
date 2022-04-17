@extends('template.master')

@section('title', 'Register')

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

    .form-registration input {
        border-radius: 0;
        margin-bottom: -1px;
    }
</style>
@endsection

@section('content')

<section name="hero  d-flex align-items-center">
    <div id="hero" class="px-4 d-flex align-items-center text-center">
        <div class="col-md-3 mx-auto">
            <div class="row justify-content-center">
                <main class="form-registration">
                    <h1 class="h3 mb-3 fw-bold text-light">Registration</h1>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-floating">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating">
                            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control rounded-bottom" id="password" placeholder="Password">
                            <label for="password">Password</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password_confirmation" class="form-control rounded-bottom" id="password" placeholder="Password">
                            <label for="password">Password Confirmation</label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                    </form>
                    <small class="d-block text-center text-light mt-3"> Already registered? <a href="/login">Login</a> </small>
                </main>
            </div>
        </div>
    </div>
</section>
@endsection
