<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('bootstrap-5.2.3/css/bootstrap.min.css')}}">
    <title>Daftar</title>
</head>
<body class="bg-light">
    
    <div class="container">

    <div class="container">
            <nav class="navbar navbar-expand-lg navbar-white bg-white p-3">
                <h5>e-BOOM</h5>
                <h3 class="m-auto text-primary">Hotel Panorama Bengkalis</h3>
                <a href="{{route('auth.login')}}" class="btn btn-white text-primary border border-primary">Masuk</a>
            </nav>
        </div>

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

        <div class="container mt-5">
            <div class="row">
                <div class="col-8 p-4">
                    <h2 class="text-center">e-BOOM</h2>
                    <h6 class="text-center mt-2 text-primary">Booking Hotel Dengan Mudah Hanya Dengan Beberapa Klik Anda Dapat Menikmati Kenyamanan Selama Menginap</h6>
                    <img src="{{asset('img/Hotel Booking Vector.jpg')}}" alt="vector" class="mt-4" style="width: 700px;">
                </div>
                <div class="col-4">
                    <div class="container">
                        <div class="card">
                            <div class="card-body bg-white">
                                <h5 class="text-primary">Daftar Akun</h5>
                                <p class="text-secondary">Kenyamanan Anda Adalah Prioritas Kami</p>
                                <div class="conatiner mt-5">
                                    <form action="{{route('auth.registTraveler')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label class="text-secondary">Nama Lengkap</label>
                                            <input type="text" class="form-control border border-primary" name="nama" autofocus required value="{{old ('nama')}}">
                                            <span class="text-danger">@error ('nama') {{$message}} @enderror</span>
                                        </div> <br>
                                        <div class="form-group">
                                            <label class="text-secondary">Alamat</label>
                                            <input type="text" class="form-control border border-primary" name="alamat" required value="{{old ('alamat')}}">
                                            <span class="text-danger">@error ('alamat') {{$message}} @enderror</span>
                                        </div> <br>
                                        <div class="form-group">
                                            <label class="text-secondary">Email</label>
                                            <input type="email" class="form-control border border-primary" name="email" required value="{{old ('email')}}">
                                            <span class="text-danger">@error ('email') {{$message}} @enderror</span>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="text-secondary">Username</label>
                                            <input type="text" class="form-control border border-primary" name="username" required value="{{old ('username')}}">
                                            <span class="text-danger">@error ('username') {{$message}} @enderror</span>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="text-secondary">No. Kontak</label>
                                            <input type="tel" class="form-control border border-primary" name="kontak" required value="{{old ('kontak')}}">     
                                            <span class="text-danger">@error ('kontak') {{$message}} @enderror</span>
                                        </div><br>
                                        <div class="form-group">
                                            <label class="text-secondary">Kata Sandi</label>
                                            <input type="password" class="form-control border border-primary" name="password" required>     
                                            <span class="text-danger">@error ('password') {{$message}} @enderror</span>
                                        </div><br>
                                        <button type="submit" class="btn btn-primary form-control mt-4">Daftar</button><br>
                                        <p style="font-size: 10pt;" class="text-center text-primary">Dengan Klik Daftar, Anda Setuju Dengan Ketentuan Dan Kebijakan Kami!</p>
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
                    <p class="text-center text-white">Terms of Use | Privacy Rights & Requests | Indonesia | Report an Error</p>
                    <p class="text-center text-white">© 2022 Hotel Panorama Bengkalis. All rights reserved</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>