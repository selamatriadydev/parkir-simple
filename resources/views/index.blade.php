@extends('layouts.app')

@section('content-page')
<div class="panel container col-lg-4 col-md-6 col-sm-6 col-xs-12" style="position: relative; margin: auto; box-shadow: 0 7px 16px #00655b, 0 4px 5px #006f64;">
    <div class="panel-body">
      <div style="float: left; margin-left:20px;">
        <img src="asset/img/logo.png" width="100px" class="animated fadeInDown">
      </div>
      <div style="float: left;">
        <h1 class="animated fadeInLeft" id="jam" style="margin-left: 40px; font-size: 62pt">{{ $dateNow->format('H:i') }}</h1>
        <p class="animated fadeInRight" style="margin-left: 85px; font-size: 14pt;">{{ $dateNow->format('D, d M Y') }}</p>
      </div>
    </div>
    <div class="panel-heading bg-teal">
        <h4 style="color: white" class="animated zoomIn">Login Petugas Parkir</h4>
    </div>
    <div class="col-md-12 panel-body" style="padding-bottom:400px;">
                  <div class="col-md-11">
                    <form class="cmxform" method="POST" action="{{ route('login.post') }}">
                        @csrf
                        <div class="form-group form-animate-text" style="margin-top:50px !important;">
                          <input type="text" class="form-text" id="validate_username" name="username" required>
                          <span class="bar"></span>
                          <label>Username</label>
                        </div>

                        <div class="form-group form-animate-text" style="margin-top:20px !important;">
                          <input type="password" class="form-text" id="validate_password" name="password" required>
                          <span class="bar"></span>
                          <label>Password</label>
                        </div>

                        <input class="submit btn btn-success col-md-5 col-sm-5 col-xs-12" style="margin-top: 10px; margin-left: 10px;height: 40px;" type="submit" value="Login" name="login">
                        </form>
                    </div>                       
    </div>
</div>
@endsection