<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Traveler;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;

class MainController extends Controller
{
    //View Function
    public function mainDashboard () {
        $comment = array(
            'row' => DB::table('comments')
                    ->where('statPubilkasi', '=', 'Tampil')
                    ->get()
        );
        $data = array(
            'list' => DB::table('rooms')->get()
        );
        return view('mainDashboard', $data, $comment);
    }

    public function login () {
        return view('auth.login');
    }

    public function register () {
        return view('auth.register');
    }

    public function forgetPassword() {
        return view('auth.forgetPassword');
    }

    public function travelerDashboard () {
        $comment = array(
            'row' => DB::table('comments')
                    ->where('statPubilkasi', '=', 'Tampil')
                    ->get()
        );
        $data = array(
            'list' => DB::table('rooms')->get()
        );
        return view('traveler.dashboard', $data, $comment);
    }

    public function travelerBooking () {
        $data = array(
            'list' => DB::table('rooms')->get()
        );
        return view('traveler.booking', $data);
    }

    public function travelerBookingPribadi () {
        $dataKamar = array(
            'list' => DB::table('rooms')->get()
        );
        $data = ['LoggedUserInfo'=>traveler::where('id','=', session('LoggedUser'))->first()];
        return view('traveler.bookingPribadi', $data, $dataKamar);
    }

    public function travelerProfile () {
        $data = ['LoggedUserInfo'=>traveler::where('id','=', session('LoggedUser'))->first()];
        return view('traveler.profile', $data);
    }

    public function editProfile () {
        $data = ['LoggedUserInfo'=>traveler::where('id','=', session('LoggedUser'))->first()];
        return view('traveler.editProfile', $data);
    }

    public function travelerEditProfile (Request $request) {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email:dns',
            'kontak' => 'required',
            'username' => 'required',
            'alamat' => 'required'
        ]);
        
        $updating = DB::table('travelers')
                    ->where('id', $request->input('cid'))
                    ->update([
                        'nama' => $request->input('nama'),
                        'email' => $request->input('email'),
                        'kontak' => $request->input('kontak'),
                        'username' => $request->input('username'),
                        'alamat' => $request->input('alamat')
                    ]);

        if ($updating) {
            return back()->with('berhasil', 'Akun anda sudah di update!');
        } else {
            return back()->with('gagal', 'Maaf, sepertinya terjadi kesalahan. Silahkan coba lagi beberapa saat');
        }
    }

    public function travelerKomentar () {
        $data = ['LoggedUserInfo'=>traveler::where('id','=', session('LoggedUser'))->first()];
        return view('traveler.komentar', $data);
    }

    public function loginAdmin() {
        return view('auth.loginAdmin');
    }

    public function adminDashboard () {
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        return view('admin.dashboard', $data);
    }

    public function adminBooking () {
        $admin = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        $data = array(
            'list' => DB::table('bookings')->get()
        );
        return view('admin.booking', $data, $admin);
    }

    public function adminEditBooking ($id) {
        $admin = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        $row = DB::table('bookings')
                ->where('id', $id)
                ->first();
        $data = [
            'info' => $row
        ];
        return view('admin.editBooking', $data, $admin);
    }

    public function adminPegawai () {
        $admin = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        $data = array(
            'list' => DB::table('admins')->get()
        );
        return view('admin.pegawai', $data, $admin);
    }

    public function adminAddPegawai () {
        $admin = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        return view('admin.addPegawai', $admin);
    }

    public function adminEditPegawai ($id) {
        $admin = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        $row = DB::table('admins')
                ->where('id', $id)
                ->first();
        $data = [
            'info' => $row
        ];
        return view('admin.editPegawai', $data, $admin);
    }

    public function adminKamar () {
        $admin = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        $data = array(
            'list' => DB::table('rooms')->get()
        );
        return view('admin.kamar', $data, $admin);
    }

    public function adminEditKamar ($id) {
        $admin = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        $row = DB::table('rooms')
                ->where('id', $id)
                ->first();
        $data = [
            'info' => $row
        ];
        return view('admin.editKamar', $data, $admin);
    }

    public function adminAddKamar () {
        $admin = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        return view('admin.addKamar', $admin);
    }

    public function adminProfile () {
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        return view('admin.profile', $data);
    }

    public function adminEditProfile () {
        $admin = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        return view('admin.editProfile', $admin);
    }

    public function adminDetailKamar ($id) {
        $admin = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        $row = DB::table('rooms')
                ->where('id', $id)
                ->first();
        $data = [
            'info' => $row
        ];
        return view('admin.detailKamar', $data, $admin);
    }

    public function adminKomentar () {
        $admin = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        $comment = array(
            'list' => DB::table('comments')->get()
        );
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        return view('admin.komentar', $data, $comment, $admin);
    }

    public function adminEditKomentar ($id) {
        $admin = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        $row = DB::table('comments')
                ->where('id', $id)
                ->first();
        $data = [
            'info' => $row
        ];
        return view('admin.editKomentar', $data, $admin);
    }

    //End Of View Function

    //Logic Function

    public function travelerStoreKomentar (Request $request) {
        $request->validate([
            'email' => 'required|email:dns',
            'nama' => 'required',
            'komentar' => 'required',
            'rating' => 'required'
        ]);
        
        $comment = new Comment;

        $comment->email = $request->email;
        $comment->nama = $request->nama;
        $comment->komentar = $request->komentar;
        $comment->rating = $request->rating;

        $save = $comment->save();

        if ($save) {
            return back()->with('berhasil', 'Komentar berhasil di buat!');
        } else {
            return back()->with('gagal', 'Maaf, sepertinya terjadi kesalahan. Silahkan coba lagi beberapa saat');
        }
    }

    public function logout () {
        if(session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }
    }

    public function registTraveler (Request $request) {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|email:dns',
            'username' => 'required|min:5|max:30',
            'kontak' => 'required',
            'password' => 'required|min:5|max:20'
        ]);

        $traveler = new Traveler;

        $traveler->nama = $request->nama;   
        $traveler->alamat = $request->alamat;   
        $traveler->email = $request->email;   
        $traveler->username = $request->username;   
        $traveler->kontak = $request->kontak;   
        $traveler->password = Hash::make($request->password);

        $save = $traveler->save();

        if ($save) {
            return back()->with('berhasil', 'Akun anda sudah dibuat, silahkan masuk');
        } else {
            return back()->with('gagal', 'Maaf, sepertinya terjadi kesalahan. Silahkan coba lagi beberapa saat');
        }
    }

    public function checkTraveler (Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:20'
        ]);

        $userInfo = Traveler::where('email','=',$request->email)->first();

        if (!$userInfo) {
            return back()->with('gagal', 'Tidak berhasil login, silahkan coba lagi');
        } else {
            if(Hash::check($request->password, $userInfo->password)) {
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('traveler/dashboard');
            }else {
                return back()->with('gagal', 'Tidak berhasil login, silahkan coba lagi');
            }
        }
    }

    public function makeBooking (Request $request) {
        $request->validate([
            'nama' => 'required',
            'kontak' => 'required',
            'email' => 'required|email:dns',
            'statusNikah' => 'required',
            'checkIn' => 'required',
            'checkOut' => 'required',
            'jenPembayaran' => 'required',
            'bank' => 'required',
            'jenKamar' => 'required'
        ]);

        $booking = new Booking;

        $booking->nama = $request->nama;
        $booking->kontak = $request->kontak;
        $booking->email = $request->email;
        $booking->statusNikah = $request->statusNikah;
        $booking->checkIn = $request->checkIn;
        $booking->checkOut = $request->checkOut;
        $booking->jenPembayaran = $request->jenPembayaran;
        $booking->bank = $request->bank;
        $booking->jenKamar = $request->jenKamar;

        $save = $booking->save();

        if ($save) {
            return back()->with('berhasil', 'Selamat, anda sudah booking kamar, silahkan tunggu pesan di email anda');
        } else {
            return back()->with('gagal', 'Maaf, sepertinya terjadi kesalahan. Silahkan coba lagi beberapa saat');
        }
    }

    public function checkAdmin (Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:20'
        ]);

        $userInfo = Admin::where('email','=',$request->email)->first();

        if (!$userInfo) {
            return back()->with('gagal', 'Tidak berhasil login, silahkan coba lagi');
        } else {
            if(Hash::check($request->password, $userInfo->password)) {
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('admin/dashboard');
            }else {
                return back()->with('gagal', 'Tidak berhasil login, silahkan coba lagi');
            }
        }
    }

    public function changePassword (Request $request) {
        $request->validate([
            'email' => 'required|email:dns',
            'newPassword' => 'required|min:5|max:20',
            'repeatPassword' => 'required|min:5|max:20'
        ]);

        $updating = DB::table('travelers')
                    ->where('email', $request->input('email'))
                    ->update([
                        'password' => Hash::make($request->input('newPassword'))
                    ]);

        if($updating) {
            return back()->with('berhasil', 'Password anda sudah diubah, silahkan login');
        } else {
            return back()->with('gagal', 'Terjadi keslahan, silahkan coba beberapa saat lagi');
        }
    }

    //End Of Logic Function
}