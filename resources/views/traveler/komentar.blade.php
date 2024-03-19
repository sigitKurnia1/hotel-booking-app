<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{asset('bootstrap-5.2.3/css/bootstrap.min.css')}}">
    <title>Profile</title>
</head>
<body class="bg-light">

    <div class="container">

        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-white bg-white p-3">
                <h5>e-BOOM</h5>
                <h3 class="m-auto text-primary">Hotel Panorama Bengkalis</h3>
                <a href="{{route('logout')}}" class="btn btn-primary text-white border border-primary">Logout</a>
            </nav>
        </div>

        <div class="container">
            <div class="navbar navbar-expand-lg navbar-white bg-light p-3">
                <a href="{{route('traveler.travelerDashboard')}}" class="text-secondary" style="text-decoration: none; font-size: 14pt">Beranda</a>
                <a href="{{route('traveler.travelerProfile')}}" class="text-secondary" style="text-decoration: none; font-size: 14pt; margin-left: 50pt">Profil Saya</a>
                <a href="{{route('traveler.travelerBooking')}}" class="text-secondary" style="text-decoration: none; font-size: 14pt; margin-left: 50pt">Booking Kamar</a>
            </div>
        </div>

        <div class="container">
            <div class="container mt-3">
                @if (Session::get('berhasil'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session::get('berhasil')}}
                    </div>
                @endif
    
                @if (Session::get('gagal'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{Session::get('gagal')}}
                    </div>
                @endif
            </div>
        </div>

            <div class="container">
                <div class="container mt-4">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <form action="{{route('traveler.travelerStoreKomentar')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="email" value="{{$LoggedUserInfo['email']}}">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Nama Lengkap</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" name="nama" class="form-control" required value="{{old('nama')}}">
                                            </div>
                                        </div> <br>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Komentar Anda</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <textarea name="komentar" class="form-control" cols="30" rows="10"></textarea>
                                            </div>
                                        </div> <br>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Rating</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <select name="rating" class="form-control">
                                                    <option value="5">5</option>
                                                    <option value="4">4</option>
                                                    <option value="3">3</option>
                                                    <option value="2">2</option>
                                                    <option value="1">1</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary form-control">Buat Komentar</button>
                                            </div>
                                            <div class="col-md-4"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <a href="{{route('traveler.travelerProfile')}}" class="btn btn-white text-primary border border-primary d-flex justify-content-center">Kembali</a>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>

            <div class="container">
                <footer>
                    <div class="container bg-primary mt-5 p-1">
                        <div class="conttainer mt-3">
                            <p class="text-center text-white">Created By Polythecnic State Of Bengkalis</p>
                            <p class="text-center text-white">Terms of Use | Privacy Rights & Requests | Indonesia | Report an Error</p>
                            <p class="text-center text-white">© 2022 Hotel Panorama Bengkalis. All rights reserved</p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    <script src="{{asset('bootstrap-5.2.3/js/bootstrap.min.js')}}"></script>
</body>

</html>