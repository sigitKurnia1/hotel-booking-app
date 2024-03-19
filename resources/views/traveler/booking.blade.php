<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('bootstrap-5.2.3/css/bootstrap.min.css')}}">
    <title>Booking</title>
</head>
<body class="bg-light">

    <div class="container">

        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-white bg-white p-3">
                <h5>e-BOOM</h5>
                <h3 class="m-auto text-primary">Hotel Panorama Bengkalis</h3>
                <a href="{{route('traveler.travelerProfile')}}" class="btn btn-white text-primary border border-primary">Profil Saya</a>
            </nav>
        </div>

        <div class="container">
            <div class="navbar navbar-expand-lg navbar-white bg-light p-3">
                <a href="{{route('traveler.travelerDashboard')}}" class="text-secondary" style="text-decoration: none; font-size: 14pt">Beranda</a>
                <a href="#pesanan" class="text-secondary" style="text-decoration: none; font-size: 14pt; margin-left: 50pt">Detail Pesanan</a>
                <a href="#pembayaran" class="text-secondary" style="text-decoration: none; font-size: 14pt; margin-left: 50pt">Detail Pembayaran</a>
                <a href="#infoKamar" class="text-secondary" style="text-decoration: none; font-size: 14pt; margin-left: 50pt">Informasi Kamar</a>
                <a href="#pesanan" class="text-secondary" style="text-decoration: none; font-size: 14pt; margin-left: 50pt">Detail Pesanan</a>    
                <a href="{{route('traveler.travelerBookingPribadi')}}" class="text-secondary" style="text-decoration: none; font-size: 14pt; margin-left: 50pt">Booking Sendiri</a>
            </div>
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

        <div class="container">
            <form action="{{route('traveler.makeBooking')}}" method="post">
                @csrf
                <div class="container bg-white">
                    <h4 class="p-3" id="pesanan">Detail Pesanan</h4>
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <input type="text" class="form-control border border-primary text-secondary" name="nama" placeholder="Nama Lengkap" required autofocus value="{{old('nama')}}">
                                <p class="text-black" style="font-size: 10pt">Nama Sesuai Dengan Identitas / KTP</p>
                            </div>
                            <div class="col-4">
                                <input type="date" class="form-control border border-primary text-secondary" name="checkIn" placeholder="Check In" value="{{old('checkin')}}">
                                <p class="text-black" style="font-size: 10pt">Tanggal Check In</p>
                            </div>
                            <div class="col-4">
                                <input type="email" class="form-control text-secondary border border-primary" name="email" placeholder="Email" value="{{old('email')}}">
                                <p class="text-black" style="font-size: 10pt">Email Aktif Anda</p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4">
                                <input type="tel" class="form-control border border-primary text-secondary" name="kontak" placeholder="Nomor Telepon Aktif" required value="{{old('kontak')}}">
                            </div>
                            <div class="col-4">
                                <input type="date" class="form-control border border-primary text-secondary" name="checkOut" placeholder="Check Out" value="{{old('checkout')}}">
                                <p class="text-black" style="font-size: 10pt">Tanggal Check Out</p>
                            </div>
                            <div class="col-4">
                                <select class="form-control border border-primary text-secondary" name="statusNikah" required value="{{old('statusNikah')}}">
                                    <option value="Sudah Menikah">Sudah Menikah</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                </select>
                                <p class="text-black" style="font-size: 10pt">Status Perkawinan</p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-4">
                                <select class="form-control border border-primary text-secondary" name="jenKamar" required value="{{old('jenKamar')}}">
                                    <option value="Deluxe">Deluxe</option>
                                    <option value="VIP">VIP</option>
                                    <option value="Ekonomi">Ekonomi</option>
                                    <option value="Standard">Stadard</option>
                                    <option value="Biasa">Biasa</option>
                                </select>
                                <p class="text-black" style="font-size: 10pt">Pilih Jenis Kamar</p>
                            </div>
                        </div>
                    </div> <br>
                </div>
                <div class="container bg-white mt-4">
                    <h4 class="p-3" id="pembayaran">Detail Pembayaran</h4>
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <select class="form-control border border-primary text-secondary" name="jenPembayaran" required value="{{old('pembayaran')}}">
                                    <option value="Transfer Bank">Transfer Bank</option>
                                    <option value="Datang Ke Tempat">Datang Ke Tempat</option>
                                </select>
                                <p class="text-black" style="font-size: 10pt">Bentuk Pembayaran</p>
                            </div>
                            <div class="col-3"></div>
                            <div class="col-3"></div>
                            <div class="col-3"></div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-4">
                                <select class="form-control border border-primary text-secondary" name="bank">
                                    <option value="BRI">BRI</option>
                                    <option value="BNI">BNI</option>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                </select>
                                <p class="text-black" style="font-size: 10pt">Pilih Nama Bank</p>
                            </div>
                            <div class="col-3">
                                <p class="text-secondary" style="font-size: 10pt">Pilih Tidak Ada, Jika Bentuk Pembayaran Tidak Menggunakan Bank</p>
                            </div>
                            <div class="col-3"></div>
                            <div class="col-3"></div>
                        </div>
                    </div>
                </div> <br>
                <div class="container bg-white mt-4">
                    <h4 class="p-3" id="infoKamar">Informasi Kamar Yang Tersedia</h4>
                    <div class="container border">
                        @foreach ($list as $item)
                        <div class="row">
                            <div class="col-3 mt-3">
                                <img src="{{asset('img/'.$item->gambar)}}" alt="Kamar" class="img-thumbnail" width="200px">
                            </div>
                            <div class="col-3 mt-3">
                                <h4 class="text-danger text-start">Rp. {{$item->harga}}</h4>
                                <h6 class="text-secondary text-start">per kamar dan per malam</h6>
                            </div>
                            <div class="col-3"></div>
                            <div class="col-3 mt-3">
                                <h6 class="text-secondary text-end">Jenis Kamar</h6>
                                <h4 class="text-primary text-end">Kamar Kelas {{$item->jenKamar}}</h4>
                                <h6 class="text-secondary text-end">Fasilitas Kamar</h6>
                                <p class="mt-3 text-end">{{$item->fasilitas}}</p>
                            </div>
                        </div> <br>
                        @endforeach
                    </div> <br>
                </div> <br> <br>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <button type="submit" class="form-control btn btn-primary">Booking Sekarang</button>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="container">
            <footer>
                <div class="container bg-primary mt-5 p-1">
                    <div class="conttainer mt-3">
                        <p class="text-center text-white">Created By Polythecnic State Of Bengkalis</p>
                        <p class="text-center text-white">Terms of Use | Privacy Rights & Requests | Indonesia | Report an Error
                        </p>
                        <p class="text-center text-white">© 2022 Hotel Panorama Bengkalis. All rights reserved</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{asset('bootstrap-5.2.3/js/bootstrap.min.js')}}"></script>
</body>
</html>