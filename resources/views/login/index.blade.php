@extends('layouts.mainLogin')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-4">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
    </div>
</div>
<div class="container">
    <div class="d-flex justify-content-center h-100">

        <div class="card">
            <div class="card-header">
                <h3>Sign In</h3>
                <div class="d-flex justify-content-end social_icon">
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span>
                </div>
            </div>
            <div class="card-body">
                <form action="/login" method="post">
                    @csrf
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                            id="username" placeholder="username" value="{{ old('username') }}" required autofocus>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <span class="input-group-text"><i class="fas fa-eye"></i></span>
                        </div>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" id="password" placeholder="password" required>

                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row align-items-center remember">
                        <input type="checkbox">Remember Me
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    <a class="small" data-bs-toggle="modal" data-bs-target="#forgetPassword"
                        style="cursor: pointer; color:red"><b>Lupa Password?</b></a>
                </div>
                <div class="d-flex justify-content-center links">
                    Don't have an account?<a href="/register" style="text-decoration: none;">Register Now!</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Forget Passwprd Modal -->
<div class="modal fade" id="forgetPassword" tabindex="-1" aria-labelledby="deleteNote" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/api/notes/delete" method="POST" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Lupa Password?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tenang dan coba ingat kembali password anda.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thanks!</button>
            </div>
        </form>
    </div>
</div>


@endsection