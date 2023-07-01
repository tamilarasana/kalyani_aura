@extends('AuthPage.layout')
@section('title')
    Kalyani Aura Login
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
                    <form method="POST" action="{{ route('auth.login') }}"  id="example-form" class=" mt-4">
                      @csrf
                        {{-- {{ csrf_field() }} --}}
                        @if (Session::has('fail'))
                            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            
                        @endif
                        <div>
                            <div class="form-group">
                                <label for="inputEmail">Email address *</label>
                                <input id="inputEmail" name="email" type="email"
                                    class="form-control " placeholder="Email address" id="email" value="{{ old('email') }}"  required
                                    autofocus>
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            <div class="form-group">
                                <label for="password">Password *</label>
                                <input id="password" name="password" type="password"
                                    class="form-control required" placeholder="Password" required>
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            <button class="btn btn-secondary btn-block " type="submit"
                                data-dismiss="modal">Login</button>
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