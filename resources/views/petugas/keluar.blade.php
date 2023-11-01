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
        <div class="col-md-5" style="margin-top: 30px">
          <div class="col-md-10 panel">
            <div class="col-md-12 panel-heading bg-teal">
              <h4 style="color: white;font-size: 20pt;">Keluar Parkir</h4>
            </div>
            <div class="col-md-12 panel-body" style="padding-bottom:25px;">
              <div class="col-md-12">
                <form class="cmxform" method="POST" action="{{ route('parkir.keluar-detail') }}">
                  @csrf
                  <div class="col-md-12">
                    <div class="form-group form-animate-text" style="margin-top:25px !important;">
                      <input type="text" class="form-text" name="kode" id="kode_keluar" required>
                      <span class="bar"></span>
                      <label>Masukan Kode</label>
                    </div>
                  </div>
                  <input class="btn btn-primary col-md-12" type="submit" value="Go" style="height: 40px" id="btnKeluar" style="height: 40px">
                  
              </form>
            </div>
          </div>
          </div>
        </div>
          <!-- end:Masuk Parkir -->
          <div class="col-md-7" style="margin-top: 30px">
            <div class="col-md-10 panel">
              <div class="col-md-12 panel-heading bg-teal">
                <h4 style="color: white;font-size: 20pt;">Detail Parkir</h4>
              </div>
              <div class="col-md-12 panel-body" style="padding-bottom:25px;">
                <div class="col-md-12">
                  @if ($parkirDetail)
                  <form class="cmxform" method="POST" action="{{ route('parkir.keluar-detail-submit') }}">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control android" name="kode_bayar" id="kode_bayar" value="{{ $parkirDetail->kode }}">
                    <!-- Modal -->
                    <div class="col-md-12">
                          <h3 id="plat"></h3>
                            <div class="form-group"><label class="col-sm-2 control-label text-right" style="font-size:14pt">Total</label>
                              <div class="col-sm-10">
                                {{ number_format($bayar) }}
                                <input type="hidden" class="form-control android" name="total" id="total" readonly value="{{ $bayar }}">
                              </div>
                            </div>
                            <div class="form-group" style="margin-top: 14%;">
                              <label class="col-sm-2 control-label text-right" style="font-size:14pt">Bayar</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control android" name="bayar" id="bayar">
                              </div>
                            </div>
                          <input class="btn btn-primary" type="button"  value="Hintung" name="btn_hitung" id="hitung" style="margin: 20px 17px 20px 0; width: 180px; height: 40px; font-weight: bold; ">
                          <div class="form-group"><label class="col-sm-2 control-label text-right" style="font-size:14pt">Kembali</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control android" name="kembali" id="kembali" readonly>
                              </div>
                          </div>
                          <input class="btn btn-primary" type="submit"  value="Go" name="btn_keluar" style="margin: 20px 17px 0 0; height: 40px; font-weight: bold;">
                        </div>
                      <!-- end:Modal -->
                </form>
                      
                @endif
              </div>
            </div>
            </div>
          </div>
          <!-- end:Keluar Parkir -->

          <!-- Daftar Kendaraan Yang Parkir -->          
            <div class="col-md-12 col-sm-12 col-x-12" style="margin-top: 20px;">
              <div class="col-md-12 panel">
                <div class="col-md-12 panel-heading bg-teal">
                  <h4 style="color: white;font-size: 20pt;">Daftar Kendaraan <span class="right" style="color : #9B2335; font-weight: bold; text-align: right; padding-right: 10px;">Keluar : {{ $jmlParkir }}</span></h4>
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