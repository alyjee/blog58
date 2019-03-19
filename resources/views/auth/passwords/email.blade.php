@extends('eadmin.layouts.login')

@section('content')
<section id="wrapper" class="login-register">
    <div class="login-box">
        <div class="white-box">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group ">
                    <div class="col-xs-12">
                        <h3>{{ __('Recover Password') }}</h3>
                        <p class="text-muted">{{ __('Enter your Email and instructions will be sent to you!') }} </p>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">{{ __('Reset') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
