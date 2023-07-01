@extends('AuthPage.layout')
@section('title', 'Kalyani Aura Login')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-lg-4">
            <div class="card shadow ">
                <div class="card-header ">
                   <h2 class="fw-bold text-secondary">Login</h2>  
                </div>
                <div class="card-body p-5">
                    <form method="POST" action="#" id="login-form">
                        @csrf
                        <div class="mb-3">
                            <input type="email" name="email" id="email" class="form-control rounded-0" placeholder="E-mail">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" id="password" class="form-control rounded-0" placeholder="Password">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <a class="text-decoration-none" href="#">Forgot Password</a>
                        </div>
                        <div class="mb-3 d-grid">
                                <input type="submit" value="Login" class="btn btn-dark rounded-0" id="login_btn">
                        </div>
                        <div>Dont't have an account
                            <a class="text-decoration-none" href="#">Register Here</a>
                        </div>
                      </form>
                </div>
            </div> <!-- .card -->
        </div> <!-- .col-12 -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
@endsection

@section('scripts')
@endsection
