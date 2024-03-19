<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $comment = array(
        'row' => DB::table('comments')
                ->where('statPubilkasi', '=', 'Tampil')
                ->get()
    );
    $data = array(
        'list' => DB::table('rooms')->get()
    );
    return view('mainDashboard', $data, $comment);
});



Route::get('/auth/loginAdmin', [MainController::class, 'loginAdmin'])->name('auth.loginAdmin');
Route::get('/auth/login', [MainController::class, 'login'])->name('auth.login');
Route::get('/auth/register', [MainController::class, 'register'])->name('auth.register');

//Logout
Route::get('/traveler/logout', [MainController::class, 'logout'])->name('logout');
Route::get('/admin/logout', [MainController::class, 'logout'])->name('adminLogout');

//Route::post for traveler
Route::post('/auth/registTraveler', [MainController::class, 'registTraveler'])->name('auth.registTraveler');
Route::post('/auth/checkTraveler', [MainController::class, 'checkTraveler'])->name('auth.checkTraveler');
Route::post('/auth/changePassword', [MainController::class, 'changePassword'])->name('auth.changePassword');
Route::post('/traveler/makeBooking', [MainController::class, 'makeBooking'])->name('traveler.makeBooking');
Route::post('/traveler/travelerEditProfile', [MainController::class, 'travelerEditProfile'])->name('traveler.travelerEditProfile');
Route::post('/traveler/travelerStoreKomentar', [MainController::class, 'travelerStoreKomentar'])->name('traveler.travelerStoreKomentar');
// End Route::post for traveler

//==Route::get kamar for admin==
Route::post('/admin/updateKomentar', [AdminController::class, 'updateKomentar'])->name('admin.adminUpdateKomentar');
//==Route::get kamar for admin==

//End Route::get for admin

//Route::post for admin
Route::post('/auth/checkAdmin', [MainController::class, 'checkAdmin'])->name('auth.checkAdmin');

//==Route::post CRUD pegawai for admin
Route::post('/admin/storePegawai', [AdminController::class, 'storePegawai'])->name('admin.storePegawai');
Route::post('/admin/updatePegawai', [AdminController::Class, 'updatePegawai'])->name('admin.updatePegawai');
//==Route::post CRUD pegawai for admin

//==Route::post CRUD booking for admin
Route::post('/admin/updateBooking', [AdminController::class, 'updateBooking'])->name('admin.updateBooking');
//==Route::post CRUD booking for admin

//==Route::post CRUD room for admin
Route::post('/admin/storeKamar', [AdminController::class, 'storeKamar'])->name('admin.storeKamar');
Route::post('/admin/updateKamar', [AdminController::class, 'updateKamar'])->name('admin.updateKamar');
//==Route::post CRUD room for admin

//End Route::post for admin

    //Route::get for traveler
    Route::get('/auth/forgetPassword', [MainController::class, 'forgetPassword'])->name('auth.forgetPassword');
    Route::get('/traveler/dashboard', [MainController::class, 'travelerDashboard'])->name('traveler.travelerDashboard');
    Route::get('/traveler/profile', [MainController::class, 'travelerProfile'])->name('traveler.travelerProfile');
    Route::get('/traveler/booking', [MainController::class, 'travelerBooking'])->name('traveler.travelerBooking');
    Route::get('/traveler/bookingPribadi', [MainController::class, 'travelerBookingPribadi'])->name('traveler.travelerBookingPribadi');
    Route::get('/traveler/editProfile', [MainController::class, 'editProfile'])->name('traveler.editProfile');
    Route::get('/traveler/travelerKomentar', [MainController::class, 'travelerKomentar'])->name('traveler.travelerKomentar');

    //==Route::post CRUD room for admin
    Route::get('/admin/deleteKamar/{id}', [AdminController::class, 'deleteKamar']);
    Route::get('/admin/detailKamar/{id}', [MainController::class, 'adminDetailKamar']);
    //==Route::post CRUD room for admin

    //==Route::post CRUD pegawai for admin
    Route::get('/admin/deletePegawai/{id}', [AdminController::class, 'deletePegawai']);
    //==Route::post CRUD pegawai for admin

    //Route::get for admin
    Route::get('/admin/dashboard', [MainController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('admin/profile', [MainController::class, 'adminProfile'])->name('admin.adminProfile');

    //==Route::get booking for admin==
    Route::get('/admin/booking', [MainController::class, 'adminBooking'])->name('admin.adminBooking');
    Route::get('/admin/editBooking/{id}', [MainController::class, 'adminEditBooking']);
    //==Route::get booking for admin==

    //==Route::get pegawai for admin==
    Route::get('/admin/pegawai', [MainController::class, 'adminPegawai'])->name('admin.adminPegawai');
    Route::get('/admin/addPegawai', [MainController::class, 'adminAddPegawai'])->name('admin.adminAddPegawai');
    Route::get('/admin/editPegawai/{id}', [MainController::class, 'adminEditPegawai']);
    //==Route::get pegawai for admin==

    //==Route::get kamar for admin==
    Route::get('/admin/kamar', [MainController::class, 'adminKamar'])->name('admin.adminKamar');
    Route::get('/admin/addKamar', [MainController::class, 'adminAddKamar'])->name('admin.adminAddKamar');
    Route::get('/admin/editKamar/{id}', [MainController::class, 'adminEditKamar']);
    //==Route::get kamar for admin==

    //==Route::get kamar for admin==
    Route::get('/admin/komentar', [MainController::Class, 'adminKomentar'])->name('admin.adminKomentar');
    Route::get('/admin/editKomentar/{id}', [MainController::class, 'adminEditKomentar']);
    //==Route::get kamar for admin==