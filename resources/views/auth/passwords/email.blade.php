@extends('layouts.app')

@section('content')

    <div class="register-box">
        <div class="register-logo">
            <a href="/"><b>My</b>Blog</a>
        </div>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="register-box-body">
            <p class="login-box-msg">Reset Password</p>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group{{ $errors->has('email') ? ' is-invalid' : '' }} has-feedback">
                    <input id="email" type="email" class="form-control" placeholder="Email"  name="email" value="{{ old('email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif

                </div>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-8">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Send Password Reset Link</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->


@endsection
