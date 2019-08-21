@extends('layouts.app')
@push('css')
<style>
    html, body, #app, #login-wrapper{
        height: 100%;
        width: 100%;
    }
    .row{
        width: 100%;
    }
    body { 
        background: url('{{ asset('images/login-bg.jpg') }}') no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }
      .login-box{
        background-color:rgba(0, 0, 0, 0.5);
        width: 100%;
        height: 100%;
        color: white;
      }

      a{
          color: #b1c0ea;
      }
</style>
@endpush
@section('content')
    <div class="d-flex flex-column align-items-center justify-content-center" id="login-wrapper">
        <div class="row rtl">
            <div class="col-sm-4 offset-sm-4">
                <div class="login-box rounded p-3">
                    <h2 class="mb-4">
                        {{ __('Register') }}
                    </h2>

                    <div class="input-group input-group rounded mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 42px">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input type="text" name="name" placeholder="{{__('Name') }}" class="form-control">
                    </div>

                    <div class="input-group input-group rounded mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 42px">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input type="text" name="email" placeholder="{{__('Email') }}" class="form-control">
                    </div>

                    <div class="input-group input-group rounded mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 42px">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input type="text" name="username" placeholder="{{__('Username') }}" class="form-control">
                    </div>

                    <div class="input-group input-group rounded mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 42px">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input type="password" name="password" placeholder="{{__('Password') }}" class="form-control">
                    </div>
                    
                    <div class="input-group input-group rounded mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 42px">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input type="password" name="password_confirmation" placeholder="{{__('Confirm Password') }}" class="form-control">
                    </div>

                    <button class="btn btn-primary pull-left">
                        {{ __('Register') }}
                    </button>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="text-center">
                        {{ __("Do you have an account?") }}
                        <a href="{{ url('login') }}">{{ __('Login') }}</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection