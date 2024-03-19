<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{asset('bootstrap-5.2.3/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>Beranda</title>
</head>

<body class="bg-light">

    <div class="cotainer">

        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-white bg-white p-3">
                <h5>e-BOOM</h5>
                <h3 class="m-auto text-primary">Hotel Panorama Bengkalis</h3>
                <a href="{{route('traveler.travelerProfile')}}" class="btn btn-white text-primary border border-primary" style="margin-right: 25px">Profil Saya</a>
                <a href="{{route('logout')}}" class="btn btn-primary text-white">Logout</a>
            </nav>
        </div>

        <div class="container">
            <div class="navbar navbar-expand-lg navbar-white bg-light p-3">
                <a href="#infoUmum" class="text-secondary" style="text-decoration: none; font-size: 14pt">Info Umum</a>
                <a href="#lokasi" class="text-secondary"
                    style="text-decoration: none; font-size: 14pt; margin-left: 50pt">Lokasi</a>
                <a href="#kamar" class="text-secondary"
                    style="text-decoration: none; font-size: 14pt; margin-left: 50pt">Kamar</a>
                <a href="#akomodasi" class="text-secondary"
                    style="text-decoration: none; font-size: 14pt; margin-left: 50pt">Akomodasi</a>
                <a href="#fasilitas" class="text-secondary"
                    style="text-decoration: none; font-size: 14pt; margin-left: 50pt">Fasilitas</a>
                <a href="#penilaian" class="text-secondary"
                    style="text-decoration: none; font-size: 14pt; margin-left: 50pt">Penilaian</a>
                <a href="{{route('traveler.travelerBooking')}}" class="text-secondary"
                    style="text-decoration: none; font-size: 14pt; margin-left: 50pt">Booking Kamar</a>
            </div>
        </div>

        <div class="container" id="infoUmum">
            <div class="container mt-4 bg-white">
                <div class="row">
                    <div class="col-3 mt-3">
                        <h5 class="text-black">Hotel</h5>
                        <h4 class="text-primary">Panorama Bengkalis</h4>
                        <h5 class="text-secondary">Rating 5/5</h5>
                        <p>Jl. Ahmad Yani No.9, Bengkalis Kota
                            Kec. Bengkalis, Kabupaten Bengkalis
                            Kepulauan Riau 28713</p>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-3 mt-3">
                        <h6 class="text-secondary text-end">Mulai Dari</h6>
                        <h4 class="text-danger text-end">Rp. 200.000</h4>
                        <h6 class="text-secondary text-end">per kamar dan per malam</h6>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <a href="#kamar" class="btn btn-primary mt-3">Lihat kamar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <br>

        <div class="container" id="lokasi">
            <div class="container mt-4 bg-white">
                <div class="row">
                    <div class="col-3 mt-3">
                        <h5 class="text-black">Info Lokasi</h5>
                        <p><i class="bi bi-geo-alt text-primary"></i>Jl. Ahmad Yani No.9, Bengkalis Kota, Kec. Bengkalis
                            Kabupaten Bengkalis, Kepulauan Riau 28713</p>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-3 mt-3">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.505171809051!2d102.10797761426508!3d1.470042561588172!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d15d35909539e7%3A0x7ef9dfa4d570ddf9!2sHotel%20Panorama%20Bengkalis!5e0!3m2!1sen!2sid!4v1669870187611!5m2!1sen!2sid" class="ratio mt-1" style="--bs-aspect-ratio: 50%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div><br>
            </div>
        </div> <br>

        <div class="container" id="kamar">
            <div class="container mt-4 bg-white">
                <div class="row">
                    @foreach ($list as $item)
                    <div class="col-3 mt-3">
                        <img src="{{asset('img/'.$item->gambar)}}" alt="Kamar" class="img-thumbnail" width="200px">
                    </div>
                    <div class="col-3 mt-3">
                        <h4 class="text-danger text-start">Rp. {{$item->harga}}</h4>
                        <h6 class="text-secondary text-start">per kamar dan per malam</h6>
                        <a href="{{route('traveler.travelerBooking')}}" class="btn btn-primary mt-3">Pesan Kamar</a>
                    </div>
                    <div class="col-3"></div>
                    <div class="col-3 mt-3">
                        <h6 class="text-secondary text-end">Info Kamar</h6>
                        <h4 class="text-primary text-end">Kamar Kelas {{$item->jenKamar}}</h4>
                        <h6 class="text-secondary text-end">Fasilitas Kamar</h6>
                        <p class="mt-3 text-end">{{$item->fasilitas}}</p>
                    </div>
                    @endforeach
                </div> <br>
            </div>
        </div> <br>

        <div class="container" id="akomodasi">
            <div class="container mt-4 bg-white">
                <div class="row">
                    <div class="col-3 mt-3">
                        <h5 class="text-black">Tentang Akomodasi Hotel</h5>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-3 mt-3">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        <h6 class="text-secondary">Waktu check-in dan check-out</h6>
                    </div>
                    <div class="col-3">
                        <h6 class="text-secondary">Waktu Check In : 8:00 - 22:59 WIB</h6>
                    </div>
                    <div class="col-5">
                        <h6 class="text-secondary text-center">Waktu Check Out : 8:00 - 22:59 WIB</h6>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        <h6 class="text-secondary">Kebijakan Hotel</h6>
                    </div>
                    <div class="col-8">
                        <h6 class="text-black">Pengunjung</h6>
                        <div class="row">
                            <div lass="col">
                                <p class="text-secondary">Pengunjung yang diperbolehkan menginap di hotel adalah yang berusia diatas 18 tahun atau jika sudah menikah, dan tidak diperbolehkan
                                    menginap pria dan wanita dengan status perkawinan masih single atau belum menikah</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-4"></div>
                    <div class="col-8">
                        <h6 class="text-black">Peraturan</h6>
                        <div class="row">
                            <div lass="col">
                                <p class="text-secondary">Pengunjung dilarang mengganggu pengunjung lainnya selama berada di dalam hotel, tidak boleh merokok di dalam hotel, tidak boleh
                                    membawa minuman, obat obatan terlarang dan barang illegal lainnya ke dalam hotel dan tidak diperkenankan membawa hewan
                                    perliharaan ke dalam hotel</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <br>

        <div class="container" id="fasilitas">
            <div class="container mt-4 bg-white">
                <div class="row">
                    <div class="col-3 mt-3">
                        <h5 class="text-black">Fasilitas Hotel</h5>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <p class="text-secondary"><i class="bi bi-router m"></i> Free wifi</p>
                    </div>
                    <div class="col-4">
                        <p class="text-secondary"><i class="bi bi-cup-hot"></i> Cafe</p>
                    </div>
                    <div class="col-4">
                        <p class="text-secondary"><i class="bi bi-fan"></i> Air Conditioner</p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <p class="text-secondary"><i class="bi bi-clock-history"></i> Pelayanan 24 jam</p>
                    </div>
                    <div class="col-4">
                        <p class="text-secondary"><i class="bi bi-egg-fried"></i> Restaurant</p>
                    </div>
                    <div class="col-4">
                        <p class="text-secondary"><i class="bi bi-p-circle"></i> Parking Area</p>
                    </div>
                </div>
            </div>
        </div> <br>

        <div class="container" id="penilaian">
            <div class="container mt-4 bg-white">
                <div class="row">
                    <div class="col-3 mt-3">
                        <h5 class="text-black">Penilaian Hotel</h5>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-3 mt-3">
                    </div>
                </div>
                @foreach ($row as $komentar)
                <hr>
                <div class="row mt-5">
                    <div class="col-6">
                        <h6 class="text-secondary"><img src="{{asset('img/user.png')}}" alt="profil" width="50px"> {{$komentar->nama}}</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="text-end text-secondary">{{$komentar->created_at}}</h6>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <h6 class="text-secondary">Rating {{$komentar->rating}}/5</h6>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <p>{{$komentar->komentar}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div> <br> <br>

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

        <script src="{{asset('bootstrap-5.2.3/js/bootstrap.bundle.min.js')}}"></script>
    </div>
</body>
</html>