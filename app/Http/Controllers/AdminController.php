<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Room;
use App\Models\Comment;

class AdminController extends Controller
{
    public function storePegawai (Request $request) {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email:dns',
            'role' => 'required',
            'tgl_lahir' => 'required',
            'jenKel' => 'required',
            'kontak' => 'required',
            'alamat' => 'required',
            'password' => 'required|min:5|max:20'
        ]);

        $pegawai = new Admin;

        $pegawai->nama = $request->nama;   
        $pegawai->email = $request->email;   
        $pegawai->role = $request->role;   
        $pegawai->tgl_lahir = $request->tgl_lahir;   
        $pegawai->jenKel = $request->jenKel;   
        $pegawai->kontak = $request->kontak;   
        $pegawai->alamat = $request->alamat;   
        $pegawai->password = Hash::make($request->password);   

        $save = $pegawai->save();

        if ($save) {
            return redirect('/admin/pegawai')->with('berhasil', 'Pegawai berhasil ditambahkan ke dalam database!');
        } else {
            return back()->with('gagal', 'Terjadi kesalahan, silahkan coba lagi beberapa saat!');
        }
    }

    public function updatePegawai (Request $request) {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email:dns',
            'role' => 'required',
            'tgl_lahir' => 'required',
            'jenKel' => 'required',
            'kontak' => 'required',
            'alamat' => 'required'
        ]);

        $updating = DB::table('admins')
                    ->where('id', $request->input('cid'))
                    ->update([
                        'nama' => $request->input('nama'),
                        'email' => $request->input('email'),
                        'role' => $request->input('role'),
                        'tgl_lahir' => $request->input('tgl_lahir'),
                        'jenKel' => $request->input('jenKel'),
                        'kontak' => $request->input('kontak'),
                        'alamat' => $request->input('alamat')
                    ]);

        if ($updating) {
            return redirect('/admin/pegawai')->with('berhasil', 'Pegawai berhasil di update di database!');
        } else {
            return back()->with('gagal', 'Terjadi kesalahan, silahkan coba lagi beberapa saat!');
        }
    }

    public function deletePegawai ($id) {
        $deleting = DB::table('admins')
                    ->where('id', $id)
                    ->delete();

        if ($deleting) {
            return back()->with('berhasil', 'Data pegawai berhasil di hapus dari database!');
        } else {
            return back()->with('gagal', 'Terjadi kesalahan, silahkan coba lagi beberapa saat!');
        }            
    }

    public function updateBooking (Request $request) {
        $request->validate([
            'nama' => 'required',
            'kontak' => 'required',
            'email' => 'required|email:dns',
            'status' => 'required',
            'statusNikah' => 'required',
            'checkIn' => 'required',
            'checkOut' => 'required',
            'jenPembayaran' => 'required',
            'bank' => 'required',
            'jenKamar' => 'required'
        ]);

        $updating = DB::table('bookings')
                    ->where('id', $request->input('cid'))
                    ->update([
                        'nama' => $request->input('nama'),
                        'kontak' => $request->input('kontak'),
                        'email' => $request->input('email'),
                        'status' => $request->input('status'),
                        'statusNikah' => $request->input('statusNikah'),
                        'checkIn' => $request->input('checkIn'),
                        'checkOut' => $request->input('checkOut'),
                        'jenPembayaran' => $request->input('jenPembayaran'),
                        'bank' => $request->input('bank'),
                        'jenKamar' => $request->input('jenKamar')
                    ]);
            
        if ($updating) {
            return redirect('/admin/booking')->with('berhasil', 'Data booking berhasil di update di database!');
        } else {
            return back()->with('gagal', 'Terjadi kesalahan, silahkan coba lagi beberapa saat!');
        }            
    }

    public function storeKamar (Request $request) {
        $request->validate([
            'jenKamar' => 'required',
            'harga' => 'required',
            'fasilitas' => 'required',
            'gambar' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $input = $request->all();

        if($image = $request->file('gambar')){
            $destinationPath = 'img/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['gambar'] = "$profileImage";
        }

        $save = Room::create($input);

        if ($save) {
            return redirect('/admin/kamar')->with('berhasil', 'Data akamar berhasil di simpan di database!');
        } else {
            return back()->with('gagal', 'Terjadi kesalahan, silahkan coba lagi beberapa saat!');
        }
    }

    public function updateKamar (Request $request) {
        $request->validate([
            'jenKamar' => 'required',
            'harga' => 'required',
            'fasilitas' => 'required'
        ]);

        $updating = DB::table('rooms')
                    ->where('id', $request->input('cid'))
                    ->update([
                        'jenKamar' => $request->input('jenKamar'),
                        'harga' => $request->input('harga'),
                        'fasilitas' => $request->input('fasilitas')
                    ]);

        if ($updating) {
        return redirect('/admin/kamar')->with('berhasil', 'Data kamar berhasil di update di database!');
        } else {
        return back()->with('gagal', 'Terjadi kesalahan, silahkan coba lagi beberapa saat!');
        }      
    }

    public function deleteKamar ($id) {
        $deleting = DB::table('rooms')
                    ->where('id', $id)
                    ->delete();

        if ($deleting) {
            return back()->with('berhasil', 'Data kamar berhasil di hapus dari database!');
        } else {
            return back()->with('gagal', 'Terjadi kesalahan, silahkan coba lagi beberapa saat!');
        }  
    }

    public function updateKomentar (Request $request) {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email:dns',
            'rating' => 'required',
            'statPubilkasi' => 'required'
        ]);

        $updating = DB::table('comments')
                    ->where('id', $request->input('cid'))
                    ->update([
                        'nama' => $request->input('nama'),
                        'email' => $request->input('email'),
                        'rating' => $request->input('rating'),
                        'statPubilkasi' => $request->input('statPubilkasi')
                    ]);
                   
        if ($updating) {
            return redirect('/admin/komentar')->with('berhasil', 'Data komentar berhasil di update di database!');
        } else {
            return back()->with('gagal', 'Terjadi kesalahan, silahkan coba lagi beberapa saat!');
        }               
    }

    public function deleteKomentar ($id) {
        $deleting = DB::table('comments')
                    ->where('id', $id)
                    ->delete();

        if ($deleting) {
            return back()->with('berhasil', 'Data komentar berhasil di hapus dari database!');
        } else {
            return back()->with('gagal', 'Terjadi kesalahan, silahkan coba lagi beberapa saat!');
        }  
    }
}