@extends('eadmin.layouts.login')

@section('content')
<section id="wrapper" class="login-register">
    <div class="login-box">
        <div class="white-box">
            <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('password.request') }}">
                @csrf
                <h3 class="box-title m-b-20">{{ __('Reset Password') }}</h3>

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input class="form-control" type="email" name="email" required="" placeholder="Email">
                        @if ($errors->has('email'))
                            <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="password" required="" placeholder="Password">
                        @if ($errors->has('password'))
                            <div class="form-control-feedback">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="password_confirmation" required="" placeholder="Confirm Password">
                        @if ($errors->has('password_confirmation'))
                            <div class="form-control-feedback">{{ $errors->first('password_confirmation') }}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">{{ __('Reset Password') }}</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>
@endsection
