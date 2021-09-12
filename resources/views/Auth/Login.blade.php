@extends('Base.AuthTemp')
@section('content')
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
    style="background:url({{ asset('assets/images/costumelogin2.jpg') }} ) no-repeat center center; background-size: cover;">
    <div class="auth-box row">
        <div class="col-lg-7 col-md-5 modal-bg-img"
            style="background-image: url({{ asset('assets/images/costumelogin3.jpg') }});">
        </div>
        <div class="col-lg-5 col-md-7 bg-white">
            <div class="p-3">
                <div class="text-center">
                    <img style="height: 50px;" src="{{ asset('assets/images/customelogin1.png') }}" alt="wrapkit">
                </div>
                <h2 class="mt-3 text-center">Sign In</h2>
                <p class="text-center" style="font-size: 8pt;">Masukan username dan password anda untuk masuk ke
                    Dashboard Admin</p>
                @if (session('status'))
                <h6 class="text-warning">{{ session('status') }}</h6>
                @endif
                <form class="mt-4" action="{{route('check')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="text-dark" for="uname">Username</label>
                                <input class="form-control" autocomplete="off" name="username" id="uname" type="text"
                                    placeholder="Masukan username anda">
                                @error('username')
                                <p class="text-danger small">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="text-dark" for="pwd">Password</label>
                                <input class="form-control" name="password" id="pwd" type="password"
                                    placeholder="Masukan password anda">
                                @error('password')
                                <p class="text-danger small">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="btn btn-block btn-dark">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection