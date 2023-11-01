@extends('layouts.app')

@section('content-page')
<body class="dashboard topnav">
	<!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top bg-dark-red">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
                <div class="navbar-brand" style="margin-left: -10px;" name="home_logo">
                <img src="{{ asset('asset/img/logo.png') }}" class="img-circle" alt="logo" style="float: left;margin-top: -10px;" width="45px"/>
                 <b style="float: left;margin-left: 4px;">E-Parking</b>
                </div>

              <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span>Admin</span></li>
                  <li class="dropdown avatar-dropdown">
                   <img src="{{ asset('asset/img/avatar-admin.png') }}" class="img-circle avatar" alt="username" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer;" />
                   {{-- <ul class="dropdown-menu user-dropdown">
                     <li>
                      <ul>
                        <li>hhh</li>
                        <a href="{{ route('admin.logout') }}">
                          <li style="float: left;"><span class="fa fa-power-off "></span></li>
                          <li style="color: black; float: left;margin-left: 10px">Log Out</li>
                        </a>
                      </ul>
                    </li>
                  </ul> --}}
                </li>
                <li><a href="{{ route('admin.logout') }}">Log Out</a></li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->

	<!-- Content-Admin -->
	<div id="content">
		<!-- Input Petugas Baru -->
            <div class="col-md-6" style="margin-top: 30px">
                <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading bg-dark-red">
                      <h4 style="color: white;font-size: 20pt;">Form Petugas Baru</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                        <div class="col-md-12">
                            @error('username')
                                <div class="alert alert-danger">{{ $username }}</div>
                            @enderror
                            <form method="post" action="{{ route('admin.new-petugas') }}">
                                @csrf
                                <div class="col-md-12" style="margin-top: -30px;">
                                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                        <input type="text" class="form-text" name="nama" value="" required>
                                        <span class="bar"></span>
                                        <label>Nama</label>
                                    </div>
                                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="text" class="form-text" name="username" value="" required>
                                    <span class="bar"></span>
                                    <label>Username</label> 
                                    </div>

                                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="password" class="form-text" id="validate_password" name="password" required>
                                    <span class="bar"></span>
                                    <label>Password</label>
                                    </div>

                                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                        <input type="radio" name="posisi" id="posisi" value="1" checked> Petugas Masuk
                                        <input type="radio" name="posisi" id="posisi" value="2"> Petugas Keluar
                                    <span class="bar"></span>
                                    </div>

                                    <input class="submit btn btn-warning col-md-5 right" type="submit" style="height: 40px" value="Submit" name="btn_baru">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading bg-dark-red">
                      <h4 style="color: white;font-size: 20pt;">Form Type Baru</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                        <div class="col-md-12">
                            @error('nama')
                                <div class="alert alert-danger">{{ $nama }}</div>
                            @enderror
                            <form method="post" action="{{ route('admin.new-type') }}">
                                @csrf
                                <div class="col-md-12" style="margin-top: -30px;">
                                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                        <input type="text" class="form-text" name="nama" value="" required>
                                        <span class="bar"></span>
                                        <label>Nama</label>
                                    </div>
                                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="text" class="form-text" name="ket" value="" >
                                    <span class="bar"></span>
                                    <label>Keterangan</label> 
                                    </div>

                                    <input class="submit btn btn-warning col-md-5 right" type="submit" style="height: 40px" value="Submit" name="btn_baru">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
              <!-- End:Input Petugas Baru -->

              <!-- Daftar Petugas Parkir -->          
                <div class="col-md-6 col-sm-12 col-x-12" style="margin-top: 30px;">
                  <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading bg-dark-red">
                      <h4 style="color: white;font-size: 20pt;">Daftar Petugas</h4>
                    </div>
                    <div class="panel-body">
                    <div class="table-responsive col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-hover col-md-12 col-sm-12 col-xs-12" width="100%" cellspacing="0" style="margin-top: 30px;">
                      @foreach ($petugas as $item)
                      <tr style="font-size: 12pt">
                        <td align="center">{{ $item->nama }}</td>
                        <td align="center">{{ $item->jabatan }}</td>
                        <td align="center"><a href="{{ route('admin.delete-petugas', $item->id) }}">Hapus</a></td>
                      </tr>
                      @endforeach
                  </table>
                  </div>
                  {{ $petugas->links('pagination::bootstrap-4') }}
                  </div>
                  </div>

                  <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading bg-dark-red">
                      <h4 style="color: white;font-size: 20pt;">Daftar Type</h4>
                    </div>
                    <div class="panel-body">
                    <div class="table-responsive col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-hover col-md-12 col-sm-12 col-xs-12" width="100%" cellspacing="0" style="margin-top: 30px;">
                      @foreach ($type as $item)
                      <tr style="font-size: 12pt">
                        <td align="center">{{ $item->name }}</td>
                        <td align="center">{{ $item->desc }}</td>
                        <td align="center"><a href="{{ route('admin.delete-type', $item->id) }}">Hapus</a></td>
                      </tr>
                      @endforeach
                  </table>
                  </div>
                  {{ $type->links('pagination::bootstrap-4') }}
                  </div>
                  </div>
                </div>
              <!-- end:Daftar Petugas Parkir --> 

              
              <form method="post" action="{{ route('admin.delete-all-parkir') }}">
                @csrf
              <div class="col-md-12 col-sm-12 col-x-12" style="margin-top: 30px;">
                <div class="col-md-12 panel">
                  <div class="col-md-12 panel-heading bg-dark-red">
                    <h4 style="color: white;font-size: 20pt;">Aktivitas Parkir</h4>
                  </div>
                  <div class="panel-body">
                  <div class="table-responsive col-md-12 col-sm-12 col-xs-12">
                  <input class="submit btn btn-warning col-md-2" type="submit" style="height: 40px;margin-top: 20px;" value="Delete All" onclick="return confirm('Apakah Anda Yakin Menghapus Semuanya?')" name="btn_delete">
                  <table class="table table-hover col-md-12 col-sm-12 col-xs-12" width="100%" cellspacing="0" style="margin-top: 5px;">
                  <thead>
                   <tr style="font-size: 13pt">
                      <th>Petugas</th>
                      <th>jenis</th>
                      <th>Masuk</th>
                      <th>keluar</th>
                      <th>Jumlah Jam</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($parkir as $item)
                      <tr style="font-size: 12pt">
                          <td>{{ $item['username'] }}</td>
                          <td>{{ $item['jenis'] }}</td>
                          <td>{{ $item->masuk }}</td>
                          <td>{{ $item->keluar }}</td>
                          <td>{{ $item->hitung_jam_masuk }} jam</td>
                          <td class="bg-{{ $item->status == 1 ? 'success' : 'danger' }}">{{ $item->status_parkir }}</td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
                </div>

                {{ $parkir->links('pagination::bootstrap-4') }}
                </div>
                </div>
              </div>
              </form>
              <!-- Aktivitas Petugas Parkir -->
              <form method="post" action="{{ route('admin.delete-all-log') }}">
                @csrf
                <div class="col-md-12 col-sm-12 col-x-12" style="margin-top: 30px;">
                  <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading bg-dark-red">
                      <h4 style="color: white;font-size: 20pt;">Aktivitas Petugas</h4>
                    </div>
                    <div class="panel-body">
                    <div class="table-responsive col-md-12 col-sm-12 col-xs-12">
                    <input class="submit btn btn-warning col-md-2" type="submit" style="height: 40px;margin-top: 20px;" value="Delete All" onclick="return confirm('Apakah Anda Yakin Menghapus Semuanya?')" name="btn_delete">
                    <table class="table table-hover col-md-12 col-sm-12 col-xs-12" width="100%" cellspacing="0" style="margin-top: 5px;">
                    <thead>
                     <tr style="font-size: 13pt">
                        <th>Username</th>
                        <th>Keterangan</th>
                        <th>Jam Login</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($activity as $item)
                        <tr style="font-size: 12pt">
                            <td>{{ $item['username'] }}</td>
                            <td>{{ $item['keterangan'] }}</td>
                            <td>{{ $item->login }}</td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                  </div>

                  {{ $activity->links('pagination::bootstrap-4') }}
                  </div>
                  </div>
                </div>
              </form>
              <!-- End: Aktivitas Petugas Parkir  -->
        </div>

      
  </div>
	<!-- end: Content-Admin -->
</body>
@endsection