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
                    <h3 class="panel-title text-center">Reset your password</h3>
                </div>
                <div class="panel-body">
                    @if ($errors->has('username') || $errors->has('password'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Error!</strong> Invalid login credentials.
                        </div>
                    @endif
                    <form method="post" action="{{ route('login') }}" autocomplete="off">
                        <div class="form-group form-group-default required">
                            <label for="el1">email</label>
                            <input type="email" id="el1" class="form-control" required autofocus name="email">
                        </div>
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary btn-block btn-lg" value="Reset my password">
                    </form>
                </div>
            </div>
            <div class="panel-other-acction">
                <div class="text-sm text-center">
                    <a href="{{ route('login') }}">Back to login page</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
