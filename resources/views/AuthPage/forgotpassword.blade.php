@extends('AuthPage.layout')
@section('title')
    Kalyani Aura Register Page
@endsection 
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card my-4 ">
                <div class="card-body ">
                    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                        <img src="{{ asset('assets/images/LOGO BLACK.png') }}" width="30%" alt="Img">
                    </a>
                    <form  id="example-form" class=" mt-4">
                      @csrf
                        <div class="col">
                            <div class="form-group">
                                <label for="inputUsername">User Name *</label>
                                <input id="inputUsername" name="username" type="text"
                                    class="form-control required" placeholder="User Name" required>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Email address *</label>
                                <input id="inputEmail" name="email" type="email"
                                    class="form-control required" placeholder="Email address" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password *</label>
                                <input id="password" name="password" type="password"
                                    class="form-control required" placeholder="Password" required>
                            </div>
                            <button class="btn btn-secondary btn-block " type="submit"
                                data-dismiss="modal">Register</button>
                            <p class="mt-4 mb-3 text-muted mx-auto  flex-fill text-center">Copyright ©
                                kalyaniaura</p>
                        </div>
                    </form>
                </div> <!-- .card-body -->
            </div> <!-- .card -->
        </div> <!-- .col-12 -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
@endsection

@section('scripts')
@endsection