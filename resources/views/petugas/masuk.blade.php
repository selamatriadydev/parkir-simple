@extends('layouts.app')

@section('content-page')
<body style="overflow-x: hidden;" class="dashboard topnav">
  <!-- start: Header -->
    <nav class="navbar navbar-default header navbar-fixed-top bg-teal">
      <div class="col-md-12 nav-wrapper">
        <div class="navbar-header" style="width:100%;">
            <div class="navbar-brand" style="margin-left: -10px;" name="home_logo">
            <img src="asset/img/logo.png" class="img-circle" alt="logo" style="float: left;margin-top: -10px;" width="45px"/>
             <b style="float: left;margin-left: 4px;">E-Parking</b>
            </div>

          <ul class="nav navbar-nav search-nav" style="margin-left: 7%">
              <li class="active"><a style="font-size: 18pt">Home</a></li>
          </ul>

           <ul class="nav navbar-nav navbar-right user-nav">
            <li class="user-name"><span>{{ auth()->user()->username }}</span></li>
              {{-- <li class="dropdown avatar-dropdown">
               <img src="asset/img/petugas.png" class="img-circle avatar" alt="username" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer;" />
               <ul class="dropdown-menu user-dropdown">
                 <li>
                  <ul>
                    <a href="?nama={{ auth()->user()->username }}&logout">
                      <li style="float: left;"><span class="fa fa-power-off "></span></li>
                      <li style="color: black; float: left;margin-left: 10px">Log Out</li>
                    </a>
                  </ul>
                </li>
              </ul>
            </li> --}}
            <li><a href="{{ route('admin.logout') }}">Log Out</a></li>
          </ul>
        </div>
      </div>
    </nav>
  <!-- end: Header -->

  <!-- Content -->
  <div id="content">
        <!-- Masuk Parkir -->
            <div class="col-md-12" style="margin-top: 30px;">
              <div class="col-md-10 panel">
                <div class="col-md-12 panel-heading bg-teal">
                  <h4 style="color: white;font-size: 20pt;">Masuk Parkir <span class="right" style="color : #f6c700; font-weight: bold; text-align: right; padding-right: 10px;">Empty : {{ $sisaParkir }}</span></h4>
                </div>
                <div class="col-md-12 panel-body" style="padding-bottom:25px;">
                  <div class="col-md-12">
                    <form class="cmxform" method="POST" action="{{ route('parkir.masuk-new') }}">
                      @csrf
                      <div class="col-md-6">
                        <div class="form-group form-animate-text" style="margin-top:15px !important;">
                          <input type="text" class="form-text" name="plat_nomor" id="plat_nomor" required>
                          <span class="bar"></span>
                          <label>Plat Nomor</label>
                        </div>

                        <div class="form-group form-animate-text" style="margin-top:10px !important;">
                          <input type="text" class="form-text" name="merk" id="merk" required>
                          <span class="bar"></span>
                          <label>Merk Kendaraan</label>
                        </div>
                      </div>

                      <div class="col-md-6" style="padding-top: 10px">
                        <label><h4>Jenis Kendaraan</h4></label>
                      </div>

                      <div class="col-md-6" style="padding:5px 20px 0 25px" name="jenis_kendaraan">
                        @foreach ($jenis as $item)
                          <div class="form-animate-radio">
                            <label class="radio">
                              <input id="radio1" type="radio" name="jenis" value="{{ $item->id }}" required/>
                              <span class="outer">
                                <span class="inner"></span>
                              </span> {{ $item->name }}
                            </label>
                          </div>
                        @endforeach

                        {{-- <div class="form-animate-radio">
                          <label class="radio">
                            <input id="radio2" type="radio" name="jenis" value="Mobil" required/>
                            <span class="outer">
                              <span class="inner"></span>
                            </span> Mobil
                          </label>
                        </div>

                        <div class="form-animate-radio">
                          <label class="radio">
                            <input id="radio3" type="radio" name="jenis" value="Truk/Bus/Lainnya" required/>
                            <span class="outer">
                              <span class="inner"></span>
                            </span> Truk / Bus / Lainnya
                          </label>
                        </div> --}}
                      </div>
                      <input class="submit btn btn-primary col-md-12" type="submit" value="Submit" style="height: 40px" name="btn_masuk">
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- end:Masuk Parkir -->

          <!-- end:Keluar Parkir -->

          <!-- Daftar Kendaraan Yang Parkir -->          
            <div class="col-md-12 col-sm-12 col-x-12" style="margin-top: 20px;">
              <div class="col-md-12 panel">
                <div class="col-md-12 panel-heading bg-teal">
                  <h4 style="color: white;font-size: 20pt;">Daftar Kendaraan <span class="right" style="color : #9B2335; font-weight: bold; text-align: right; padding-right: 10px;">Terisi : {{ $jmlParkir }}</span></h4>
                </div>
                <div class="panel-body">
                <div class="table-responsive col-md-12 col-sm-12 col-xs-12">
                <table class="table table-hover col-md-12 col-sm-12 col-xs-12" width="100%" cellspacing="0">
                <thead>
                  <tr style="font-size: 13pt">
                    <th style="max-width: 120px;">Kode</th>
                    <th style="max-width: 250px;">Plat Nomor</th>
                    <th>Jenis</th>
                    <th>Merk</th>
                    <th style="max-width: 200px;">Jam Masuk</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($parkir as $item)
                    <tr style="font-size: 11pt">
                      <td>{{ $item->kode }}</td>
                      <td>{{ $item->plat_nomor }} </td>
                      <td>{{ $item->jenis }}</td>
                      <td>{{ $item->merk }}</td>
                      <td>{{ $item->jam_masuk }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              </div>
              </div>
              </div>
            </div>


          <!-- end:Daftar Kendaraan Yang Parkir -->              
  </div>
  <!-- end: Content -->

<script>
// var kodeKeluar = document.getElementById('kode_keluar');


$("#btnKeluar").click(function(){
// var kode = document.getElementById("kode")
var kode = $('#kode_keluar').val();
if($(kode).val() == "") $(kode).focus();
else{
$("#myModal").modal('show');
}
})

$("#btnKeluar").click(function(){
var kodeKeluar = $('#kode_keluar').val();
console.log(kodeKeluar);
$.ajax({
url : 'config/showdata.php',
type : 'POST',
data : "kode=" + kodeKeluar,
dataType : 'html',
success:function(hasil){
  if(hasil != 0){
    $("#total").val(hasil);
  }else{
    alert('hasil');
  }
},
});
});
</script>


</body>
@endsection