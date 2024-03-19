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
    <title>Booking</title>
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
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12 mt-5">
                        <h3 class="page-title mt-3">Semua Booking</h3>
                    </div>
                </div>
            </div>

            <div class="container mt-3">
                @if (Session::get('berhasil'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session::get('berhasil')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
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
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body booking_card">
                            <div class="table-responsive">
                                <table class="table table-stripped table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Kontak</th>
                                            <th>Email</th>
                                            <th>Status Pernikahan</th>
                                            <th>Tanggal Check-In</th>
                                            <th>Tanggal Check-Out</th>
                                            <th>Bentuk Pembayaran</th>
                                            <th>Nama Bank</th>
                                            <th>Jenis Kamar</th>
                                            <th>Status Booking</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $item)
                                        <tr>
                                            <td><h2 class="table-avatar">{{$item->nama}}</h2></td>
                                            <td>{{$item->kontak}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->statusNikah}}</td>
                                            <td>{{$item->checkIn}}</td>
                                            <td>{{$item->checkOut}}</td>
                                            <td>{{$item->jenPembayaran}}</td>
                                            <td>{{$item->bank}}</td>
                                            <td>{{$item->jenKamar}}</td>
                                            <td>
                                                <div class="btn btn-sm bg-success-light mr-2">
                                                    {{$item->status}}
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action"> 
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right"> 
                                                        <a class="dropdown-item" href="/admin/editBooking/{{$item->id}}"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
                    <li> <a href="{{route('admin.dashboard')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
                    <li class="list-divider"></li>
                    <li class="submenu"> <a href="#"><i class="fas fa-suitcase"></i> <span> Booking </span> <span class="menu-arrow"></span></a>
                        <ul class="submenu_class" style="display: none;">
                            <li><a class="active" href="{{route('admin.adminBooking')}}"> Semua Booking </a></li>
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