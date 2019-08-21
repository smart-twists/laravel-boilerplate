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
                <h4 class="mb-4">
                    {{ __('Reset your password') }}
                </h4>

                <form method="post" action="{{ url('/password/reset') }}">
                    {!! csrf_field() !!}
                    
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="input-group input-group rounded mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 42px">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input type="text" name="email" value="{{ old('email') }}" 
                        placeholder="{{__('Email') }}" class="form-control" >
                        @if ($errors->has('email'))
                        <span class="help-block">
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
                        <input type="text" name="password" value="{{ old('password') }}" 
                        placeholder="{{ __('Password') }}" class="form-control" >
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-refresh"></i> {{ __("Reset Password") }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection