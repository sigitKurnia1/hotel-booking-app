<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('admin_dashbaord-_hotel_bootstrap5-main/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_dashbaord-_hotel_bootstrap5-main/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_dashbaord-_hotel_bootstrap5-main/assets/plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_dashbaord-_hotel_bootstrap5-main/assets/css/feathericon.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_dashbaord-_hotel_bootstrap5-main/assets/plugins/datatables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_dashbaord-_hotel_bootstrap5-main/assets/plugins/morris/morris.css')}}">
    <link rel="stylesheet" type="text/css"href="{{asset('admin_dashbaord-_hotel_bootstrap5-main/assets/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_dashbaord-_hotel_bootstrap5-main/assets/css/style.css')}}">
    <title>Tambah Pegawai</title>
</head>
<body>

    <div class="header">
        <div class="header-left">
            <a href="{{route('admin.dashboard')}}" class="logo"> <img src="{{asset('img/user.png')}}" width="50" height="70" alt="logo"> <span class="logoclass">ADMIN</span> </a>
            <a href="{{route('admin.dashboard')}}" class="logo logo-small"> <img src="{{asset('img/user.png')}}" alt="Logo" width="30" height="30"> </a>
        </div>
        <a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
        <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
        <ul class="nav user-menu">
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img"><img class="rounded-circle" src="{{asset('img/user.png')}}" width="31" alt="Admin"></span> </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                        <div class="avatar avatar-sm"> <img src="{{asset('img/user.png')}}" alt="User Image" class="avatar-img rounded-circle"> </div>
                        <div class="user-text">
                            <h6>Admin</h6>
                            <p class="text-muted mb-0">{{$LoggedUserInfo->nama}}</p>
                        </div>
                    </div> <a class="dropdown-item" href="{{route('admin.adminProfile')}}">My Profile</a>  <a class="dropdown-item" href="{{route('adminLogout')}}">Logout</a> </div>
                </div>
            </li>
        </ul>
    </div>

    <div class="page-wrapper mt-3">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Tambah Pegawai</h3>
                    </div>
                </div>
            </div>

            <div class="container mt-3">
                @if (Session::get('gagal'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{Session::get('gagal')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <form action="{{route('admin.storePegawai')}}" method="post">
                        @csrf
                        <div class="row formtype">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input name="nama" class="form-control" type="text" autofocus required value="{{old ('nama')}}"/>
                                    <span class="text-danger">@error ('nama') {{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" class="form-control" type="email" required value="{{old ('email')}}">
                                    <span class="text-danger">@error ('email') {{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <select name="role" class="form-control" required value="{{old ('role')}}">
                                        <option>Staff Hotel</option>
                                        <option>Manager Hotel</option>
                                    </select>
                                    <span class="text-danger">@error ('role') {{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input name="tgl_lahir" type="date" class="form-control" required value="{{old ('tgl_lahir')}}">
                                    <span class="text-danger">@error ('tgl_lahir') {{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenKel" class="form-control" required value="{{old ('jenKel')}}">
                                        <option>Laki laki</option>
                                        <option>Perempuan</option>
                                    </select>
                                    <span class="text-danger">@error ('jenKel') {{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nomor Kontak</label>
                                    <input name="kontak" type="text" class="form-control" required value="{{old ('kontak')}}"/>
                                    <span class="text-danger">@error ('kontak') {{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input name="alamat" type="text" class="form-control" required value="{{old ('alamat')}}"/>
                                    <span class="text-danger">@error ('alamat') {{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="password" type="password" class="form-control" required/>
                                    <span class="text-danger">@error ('password') {{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary buttonedit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="sidebar" id="sidebar">
        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 100%; height: 597px;"><div class="sidebar-inner slimscroll" style="overflow: hidden; width: 100%; height: 597px;">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li> <a href="{{route('admin.dashboard')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
                    <li class="list-divider"></li>
                    <li class="submenu"> <a href="#"><i class="fas fa-suitcase"></i> <span> Booking </span> <span class="menu-arrow"></span></a>
                        <ul class="submenu_class" style="display: none;">
                            <li><a href="{{route('admin.adminBooking')}}"> Semua Booking </a></li>
                        </ul>
                    </li>
                    <li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span> Pegawai </span> <span class="menu-arrow"></span></a>
                        <ul class="submenu_class" style="display: none;">
                            <li><a href="{{route('admin.adminPegawai')}}"> Semua Pegawai </a></li>
                            <li><a class="active" href="{{route('admin.adminAddPegawai')}}"> Tambah Pegawai </a></li>
                        </ul>
                    </li>
                    <li class="submenu"> <a href="#"><i class="fas fa-key"></i> <span> Kamar </span> <span class="menu-arrow"></span></a>
                        <ul class="submenu_class" style="display: none;">
                            <li><a href="{{route('admin.adminKamar')}}">Semua Kamar </a></li>
                            <li><a href="{{route('admin.adminAddKamar')}}"> Tambah Kamar </a></li>
                        </ul>
                    </li>
                    <li class="submenu"> <a href="#"><i class="fas fa-book"></i> <span> Komentar </span> <span class="menu-arrow"></span></a>
                        <ul class="submenu_class" style="display: none;">
                            <li><a href="{{route('admin.adminKomentar')}}">Semua Komentar </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><div class="slimScrollBar" style="background: rgb(204, 204, 204); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 283.765px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
    </div>

    <script src="{{asset('admin_dashbaord-_hotel_bootstrap5-main/assets/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('admin_dashbaord-_hotel_bootstrap5-main/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('admin_dashbaord-_hotel_bootstrap5-main/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin_dashbaord-_hotel_bootstrap5-main/assets/js/moment.min.js')}}"></script>
    <script src="{{asset('admin_dashbaord-_hotel_bootstrap5-main/assets/js/select2.min.js')}}"></script>
    <script src="{{asset('admin_dashbaord-_hotel_bootstrap5-main/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('admin_dashbaord-_hotel_bootstrap5-main/assets/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('admin_dashbaord-_hotel_bootstrap5-main/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin_dashbaord-_hotel_bootstrap5-main/assets/plugins/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('admin_dashbaord-_hotel_bootstrap5-main/assets/js/script.js')}}"></script>
</body>
</html>