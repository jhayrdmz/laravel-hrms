<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Google Fonts- -->
  <!-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'> -->

  <!-- Styles -->
  <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/css/bootstrap-toggle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/css/alertify.css') }}" rel="stylesheet">
  <link href="{{ asset('public/css/alertify-bootstrap-3.css') }}" rel="stylesheet">
  <link href="{{ asset('public/css/bootstrap-select.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/css/datatables.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('public/css/admin.css') }}" rel="stylesheet">
  <link href="{{ asset('public/css/responsive.css') }}" rel="stylesheet">
  @yield('css-styles')
</head>
<body class="has-left-bar has-top-bar left-bar-open">
  
  @include('layouts.sidebar')

  <main id="wrapper" class="wrapper">
    @include('layouts.header')
    @yield('content')
  </main>

  <!-- Scripts -->
  <script src="{{ asset('public/js/jquery-1.10.2.min.js') }}"></script>
  <script src="{{ asset('public/js/jquery.slimscroll.min.js') }}"></script>
  <script src="{{ asset('public/js/moment.js') }}"></script>
  <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('public/js/bootstrap-toggle.min.js') }}"></script>
  <script src="{{ asset('public/js/bootstrap-datetimepicker.min.js') }}"></script>
  <script src="{{ asset('public/js/bootstrap-select.min.js') }}"></script>
  <script src="{{ asset('public/js/initial.min.js') }}"></script>
  <script src="{{ asset('public/js/app.js') }}"></script>
  @yield('footer-scripts')
</body>
</html>
