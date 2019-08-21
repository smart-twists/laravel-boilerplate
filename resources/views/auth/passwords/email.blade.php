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
                    {{ __('Enter Email to reset password') }}
                </h4>

                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                <form method="post" action="{{ url('/password/email') }}">
                    {!! csrf_field() !!}
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

                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-envelope"></i> {{ __('Send Password Reset Link') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection