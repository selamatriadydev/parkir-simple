<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Simple-Parking</title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/bootstrap.min.css') }}">

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/plugins/font-awesome.min.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/plugins/animate.min.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/plugins/nouislider.min.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/plugins/select2.min.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/plugins/ionrangeslider/ion.rangeSlider.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/plugins/ionrangeslider/ion.rangeSlider.skinFlat.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/plugins/bootstrap-material-datetimepicker.css') }}"/>
  <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
  <!-- end: Css -->
  <link rel="shortcut icon" href="{{ asset('asset/img/logo.png') }}">

</head>
@php
    $isLogin = Auth::check();
@endphp
<body @class([
    'dashboard topnav' => $isLogin,
    'bg-teal' => !$isLogin
]) style="overflow-y: hidden;">
    @yield('content-page')
</body>
</body>
</html>