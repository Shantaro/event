@extends('auth.master')

@section('content')
<!-- /.login-logo -->

<h4>New here?</h4>
<h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
<form class="pt-3" action="{{route('register')}}" method="post">
    @csrf

    <div class="form-group">
        <div class="input-group">
            <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name"
                value="{{old('name')}}" placeholder="Name" required autocomplete="name" autofocus>
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="ti-id-badge"></i>
                </span>
            </div>
        </div>
    </div>
    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <div class="form-group">
        <div class="input-group">
            <input id="username" type="text" class="form-control form-control-lg @error('username') is-invalid @enderror" name="username"
                value="{{old('username')}}" placeholder="Username" required autocomplete="username" autofocus>
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="ti-user"></i>
                </span>
            </div>
        </div>
    </div>
    @error('username')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <div class="form-group">
        <div class="input-group">
            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                placeholder="Password" name="password" required autocomplete="current-password">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="ti-lock"></i>
                </span>
            </div>
        </div>
    </div>
    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <div class="form-group">
        <div class="input-group">
            <input id="password-confirm" type="password" class="form-control form-control-lg"
                placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="ti-lock"></i>
                </span>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-bold font-weight-medium auth-form-btn">{{ __('REGISTER') }}</button>
    </div>
</form>

@if (Route::has('login'))
<div class="text-center mt-4 font-weight-light">
    Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
</div>
@endif

@endsection