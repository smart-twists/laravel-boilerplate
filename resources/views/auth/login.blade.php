@extends('layouts.app')
@push('css')
<style>
    html,
    body,
    #app,
    #login-wrapper {
        height: 100%;
        width: 100%;
    }

    .row {
        width: 100%;
    }

    body {
        background: url('{{ asset('images/login-bg.jpg') }}') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .login-box {
        background-color: rgba(0, 0, 0, 0.5);
        width: 100%;
        height: 100%;
        color: white;
    }

    a {
        color: #b1c0ea;
    }
</style>
@endpush
@section('content')
<div class="d-flex flex-column align-items-center justify-content-center" id="login-wrapper">
    <div class="row rtl">
        <div class="col-sm-4 offset-sm-4">
            <div class="login-box rounded p-3">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h2 class="mb-4">
                        {{ __('Login') }}
                    </h2>
                    @include('adminlte-templates::common.errors')
                    <div class="input-group input-group rounded mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 42px">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input type="text" name="email" placeholder="{{__('Email') }}" class="form-control">

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="input-group input-group rounded mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 42px">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input type="password" name="password" placeholder="{{__('Password') }}" class="form-control">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" name="remember" type="checkbox" value="1" id="remember-me">
                        <label class="form-check-label" for="remember-me">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <button class="btn btn-primary pull-left" type="submit">
                        {{ __('Login') }}
                    </button>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="text-center">
                        {{ __("Don't have an account?") }}
                        <a href="{{ url('register') }}">{{ __('Sign Up') }}</a>
                        <br>
                        <a href="{{ url('password/reset') }}">{{ __('Forgot Your Password?') }}</a>
                        </span>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
