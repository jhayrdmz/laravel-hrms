@extends('auth.main')

@section('content')

<div class="container jumbo-container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="app-logo-inner text-center">
                <img src="http://coderpixel.com/demo/advanced-hrm/assets/img/logo.png" alt="logo" class="bar-logo">
            </div>
            <div class="panel panel-30">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Signin to your account</h3>
                </div>
                <div class="panel-body">
                    @if ($errors->has('email') || $errors->has('password'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Error!</strong> Invalid login credentials.
                        </div>
                    @endif
                    <form method="post" action="{{ route('login') }}" autocomplete="off">
                        <div class="form-group form-group-default required">
                            <label for="el1">Email</label>
                            <input type="email" id="el1" class="form-control" required autofocus name="email">
                        </div>
                        <div class="form-group form-group-default required">
                            <label for="el2">Password</label>
                            <input type="password" id="el2" class="form-control" required name="password">
                        </div>
                        <div class="form-group m-t-20 m-b-20">
                            <div class="coder-checkbox">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span class="co-check-ui"></span>
                                <label>Remember Me</label>
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary btn-block btn-lg" value="Login">
                    </form>
                </div>
            </div>
            <div class="panel-other-acction">
                <div class="text-sm text-center">
                    <a href="{{ route('password.request') }}">Forget Password?</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
