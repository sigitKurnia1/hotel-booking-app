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
    <title>Profile</title>
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
                    </div> <a class="dropdown-item" href="{{route('admin.adminProfile')}}">My Profile</a> <a class="dropdown-item" href="{{route('adminLogout')}}">Logout</a> </div>
                </div>
            </li>
        </ul>
    </div>

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header mt-5">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Profile</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-header">
                        <div class="row align-items-center">
                            <div class="col-auto profile-image">
                                <a href="#"> <img class="rounded-circle" alt="User Image" src="{{asset('img/user.png')}}"> </a>
                            </div>
                            <div class="col ml-md-n2 profile-user-info">
                                <h4 class="user-name mb-3">{{$LoggedUserInfo->nama}}</h4>
                                <h6 class="text-muted mt-1">{{$LoggedUserInfo->role}}</h6>
                                <div class="user-Location mt-1"><i class="fas fa-map-marker-alt"></i>{{$LoggedUserInfo->alamat}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-menu">
                        <ul class="nav nav-tabs nav-tabs-solid">
                            <li class="nav-item">
                                <a class="nav-link active" href="#personalDetail">About</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content profile-tab-cont">
                        <div class="tab-pane fade show active" id="personalDetail">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title d-flex justify-content-between">
                                                <span>Personal Details</span>
                                                </h5>
                                            <div class="row mt-5">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Name</p>
                                                <p class="col-sm-9">{{$LoggedUserInfo->nama}}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Date of Birth</p>
                                                <p class="col-sm-9">{{$LoggedUserInfo->tgl_lahir}}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Email ID </p>
                                                <p class="col-sm-9">{{$LoggedUserInfo->email}}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Mobile</p>
                                                <p class="col-sm-9">{{$LoggedUserInfo->kontak}}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-sm-right mb-0">Address</p>
                                                <p class="col-sm-9 mb-0">{{$LoggedUserInfo->alamat}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sidebar" id="sidebar">
        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 100%; height: 597px;"><div class="sidebar-inner slimscroll" style="overflow: hidden; width: 100%; height: 597px;">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="active"> <a href="{{route('admin.dashboard')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
                    <li class="list-divider"></li>
                    <li class="submenu"> <a href="#"><i class="fas fa-suitcase"></i> <span> Booking </span> <span class="menu-arrow"></span></a>
                        <ul class="submenu_class" style="display: none;">
                            <li><a href="{{route('admin.adminBooking')}}"> Semua Booking </a></li>
                        </ul>
                    </li>
                    <li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span> Pegawai </span> <span class="menu-arrow"></span></a>
                        <ul class="submenu_class" style="display: none;">
                            <li><a href="{{route('admin.adminPegawai')}}"> Semua Pegawai </a></li>
                            <li><a href="{{route('admin.adminAddPegawai')}}"> Tambah Pegawai </a></li>
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