<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('bootstrap-5.2.3/css/bootstrap.min.css')}}">
    <title>Login</title>
</head>
<body class="bg-light">

    <div class="container">

        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-white bg-white p-3">
                <h5>e-BOOM</h5>
                <h3 class="m-auto text-primary">Hotel Panorama Bengkalis</h3>
                <a href="{{route('auth.loginAdmin')}}" class="btn btn-primary text-white" style="margin-right: 25px">Masuk Pegawai Hotel</a>
                <a href="{{route('auth.register')}}" class="btn btn-white text-primary border border-primary">Daftar</a>
            </nav>
        </div>

        <div class="container mt-3">
            @if (Session::get('gagal'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{Session::get('gagal')}}
                </div>
            @endif
        </div>

        <div class="container mt-5">
            <div class="row">
                <div class="col-8 p-4">
                    <h2 class="text-center">e-BOOM</h2>
                    <h6 class="text-center mt-2 text-primary">Booking Hotel Dengan Mudah Hanya Dengan Beberapa Klik Anda
                        Dapat Menikmati Kenyamanan Selama Menginap</h6>
                    <img src="{{asset('img/Hotel Booking Vector.jpg')}}" alt="vector" class="mt-4" style="width: 700px;">
                </div>
                <div class="col-4">
                    <div class="container">
                        <div class="card">
                            <div class="card-body bg-white">
                                <h5 class="text-primary">Masuk</h4>
                                    <div class="conatiner mt-5">
                                        <form action="{{route('auth.checkTraveler')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label class="text-secondary mb-1">Email Anda</label>
                                                <input type="email" class="form-control border border-primary" name="email" autofocus required value="{{old('email')}}"><br>    
                                                <span class="text-danger">@error('email') {{$message}}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-secondary mb-1">Password Anda</label>
                                                <input type="password" class="form-control border border-primary" name="password" required> <br>
                                                <span class="text-danger">@error('password') {{$message}}@enderror</span>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-4 form-control">Masuk</button> <br> <br>
                                            <a href="{{route('auth.forgetPassword')}}" class="text-right">Lupa Password?</a>
                                        </form>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <div class="container bg-primary mt-5 p-1">
                <div class="conttainer mt-3">
                    <p class="text-center text-white">Created By Polythecnic State Of Bengkalis</p>
                    <p class="text-center text-white">Terms of Use | Privacy Rights & Requests | Indonesia | Report an
                        Error</p>
                    <p class="text-center text-white">© 2022 Hotel Panorama Bengkalis. All rights reserved</p>
                </div>
            </div>
        </footer>

    </div>
    
    <script src="{{asset('bootstrap-5.2.3/js/bootstrap.min.js')}}"></script>
</body>
</html>