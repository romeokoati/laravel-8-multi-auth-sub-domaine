@extends('layouts.app-login')

@section('content')
    <div class="container">
        <div class="row">
            <div style="text-align:center;">
                <h3> </h3>
            </div>
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                    <form class=" login100-form form-horizontal" method="POST" action="{{ route('password.email') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="wrap-login100">
                            <span class="login100-form-logo"><img src="{{asset(\App\Constantes::LOGO)}}"></span>
                            <span class="login100-form-title p-b-34 p-t-27">{{trans('blog.recuperation_compte')}}</span>
                            <div class="{{ $errors->has('email') ? ' has-error' : '' }}  wrap-input100 validate-input ">
                                <input id="email" type="email" class="input100" name="email" value="{{ old('email') }}"
                                       placeholder="{{ trans('blog.username') }}">
                                <span class="focus-input100" data-placeholder="&#xf207;"></span>
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block" style="color:red;"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                       {{trans('blog.suivant')}}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

            </div>
        </div>
    </div>
@endsection
