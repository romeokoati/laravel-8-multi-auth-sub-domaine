@extends('layouts.app-login')

@section('content')
    <form class=" login100-form form-horizontal" method="POST" action="{{ route('password.request') }}">
        @if (session('status'))
            <div class="alert alert-success">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('status') }}
            </div>
        @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="wrap-login100">
            <span class="login100-form-logo"><img src="{{asset(\App\Constantes::LOGO)}}"></span>
            <span class="login100-form-title p-b-34 p-t-27">{{ trans('blog.compterecuperation') }}</span>
            <div class="{{ $errors->has('email') ? ' has-error' : '' }}  wrap-input100 validate-input ">
                <input id="email" type="email" class="input100" name="email" value="{{ old('email') }}"
                       placeholder="{{ trans('blog.username') }}">
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>
            @if ($errors->has('email'))
                <span class="help-block" style="color:red;"><strong>{{ $errors->first('email') }}</strong></span>
            @endif
            <div class="{{ $errors->has('password') ? ' has-error' : '' }} wrap-input100 validate-input ">
                <input id="password" type="password" class=" input100"
                       name="password" placeholder="{{ trans('blog.password') }}">
                <span class="focus-input100" data-placeholder="&#xf191;"></span>
            </div>
            @if ($errors->has('password'))
                <span class="help-block" style="color:red;"><strong>{{ $errors->first('password') }}</strong></span>
            @endif

            <div class="{{ $errors->has('password_confirmation') ? ' has-error' : '' }} wrap-input100 validate-input">
                <input id="password-confirm" type="password" class="input100" name="password_confirmation"
                       type="password" placeholder="{{ trans('blog.passwordconfirm') }}" required>
                <span class="focus-input100" data-placeholder="&#xf191;"></span>
            </div>
            @if ($errors->has('password_confirmation'))
                <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
            @endif

            <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn">
                    {{ trans('blog.suivant') }}
                </button>
            </div>
        </div>
    </form>
@endsection
