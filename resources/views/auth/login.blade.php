@extends('auth.master')

@section('content')
<!-- /.login-logo -->

<h4>Hello! let's get started</h4>
<h6 class="font-weight-light">Sign in to continue.</h6>
<form class="pt-3" action="{{route('login')}}" method="post">
    @csrf

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
    <div class="mt-3">
        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-bold font-weight-medium auth-form-btn">{{ __('SIGN IN') }}</button>
    </div>
    @if (Route::has('register'))
    <div class="text-center mt-4 font-weight-light">
        Don't have an account? <a href="{{ route('register') }}" class="text-primary">Create</a>
    </div>
    @endif
</form>
@endsection