@extends('layouts.app_user')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default mt-3">
                <div class="card-header"><h2>Login</h2></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4"><a class="btn btn-primary btn-block" href="login/facebook">Facebook</a></div>
                        <div class="col-md-4"><a class="btn btn-info btn-block" href="login/twitter">Twitter</a></div>
                        <div class="col-md-4"><a class="btn-block" href="login/google"><img src="{{ asset('images/btn_google_signin_dark_normal_web@2x.png') }}" class="img-fluid"></a></div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}

                                <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 col-form-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 col-form-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Login
                                        </button>

                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-md-right"><a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
