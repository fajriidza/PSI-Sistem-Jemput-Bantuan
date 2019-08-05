<?php

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

Route::get('/', 'HomeController@index')->name('utama');


Auth::routes();


//User
Route::get('/daftar', 'Auth\UserRegisterController@showRegistrationForm')->name('user.register')->middleware('guest');
Route::post('/daftar/{kirim}', 'Auth\UserRegisterController@store')->name('daftar');
Route::get('/donatur/donasi', 'DonasiController@donasiSekarang')->middleware('auth:web');
Route::get('/login', 'Auth\UserLoginController@showLoginForm')->name('user.login')->middleware('guest');
Route::post('/login', 'Auth\UserLoginController@login')->name('user.login.submit');
Route::get('/donatur', 'UserController@index')->name('dashboarduser');
Route::post('/donatur/edit/{id}', 'UserController@editProfil')->name('editProfile');
Route::get('/donatur/riwayat/{id}', 'UserController@riwayatDonasi');
Route::post('/donatur/riwayat/{id}', 'UserController@riwayatDonasi')->name('riwayatDonasi');
Route::put('/donatur/edit/{id}', 'UserController@updateProfil')->name('profil.update');
Route::get('/bencana','HomeController@daftarBencana');
Route::get('/detail/{id}','HomeController@detailbencana')->name('detail.bencana');
Route::get('/donatur/donasi/{id}','DonasiController@donasibencana')->name('donasi.bencana')->middleware('auth:web');
Route::post('/donatur/donasi', 'DonasiController@storeDonasi')->name('tambah.donasi')->middleware('auth:web');



//admin

Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login')->middleware('guest');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin/verifikasi','AdminController@verifikasi')->name('verif.donasi')->middleware('auth:admin');;
Route::get('/admin/verifikasi/{id}','AdminController@editVerifikasi')->name('verif.edit')->middleware('auth:admin');;
Route::get('/admin/jemput', 'AdminController@jemput')->name('jemput.donasi');
Route::get('/admin/jemput/{id}','AdminController@editJemput')->name('jemput.edit')->middleware('auth:admin');;
Route::patch('/admin/verifikasi/{id_donasi}','AdminController@verifikasiDonasi')->name('verifikasi.donasi');
Route::get('/admin/donatur', 'AdminController@dataDonatur');
Route::get('/admin/donatur/{id_donasi}', 'AdminController@detaildataDonatur')->name('detail.donatur');
Route::get('/admin/gudang', 'AdminController@gudang')->name('gudang.donasi');
Route::patch('/admin/distribusi/{id_donasi}','AdminController@distribusiDonasi')->name('distribusi');
Route::put('/admin/jemput/{id}','AdminController@atur_jadwal')->name('admin.atur_jadwal');
Route::patch('/admin/verifikasi{id}','AdminController@simpanVerifikasi')->name('simpan.verifikasi');
Route::get('/admin/infoDonasi', function () {
    return view('Admin.infDonasi');
});
Route::get('/coba','AdminController@rekomendasi');

Route::get('/admin/kurir','AdminController@showKurir');
Route::post('/admin/kurir', 'AdminController@storekurir');
Route::patch('/admin/kurir/{kirim}','AdminController@updateKurir')->name('kurir.update');
Route::delete('/admin/kurir/{hapus}', 'AdminController@destroykurir')->name('kurir.destroy');
//Route::get('/admin/rekomendasi','AdminController@rekomendasi');
Route::post('select-ajax-kategori', ['as'=>'select-ajax-kategori','uses'=>'DonasiController@selectAjax']);

//admin Bencana
Route::post('/admin/bencana', 'AdminController@store')->name('bencana.store');
Route::get('/admin/bencana', 'AdminController@bencana')->name('infobencana')->middleware('auth:admin');
Route::get('admin/bencana/{id}', 'AdminController@editBencana')->name('bencana.edit');
Route::put('/admin/bencana/{id}','AdminController@updateBencana')->name('bencana.update');
Route::delete('/admin/bencana/{hapus}', 'AdminController@destroyBencana')->name('bencana.destroy');
Route::post('select-ajax', ['as'=>'select-ajax','uses'=>'LokasiController@selectAjax']);

Route::get('/admin/statistik','AdminController@statistik');
Route::get('/admin/statistik/donasi','AdminController@statistikDonasi');
Route::post('/admin/statistik/donasi/filter','AdminController@filter_statistikDonasi')->name('statistik.donasi');
Route::get('/admin/pakar','AdminController@pakar');
Route::patch('/admin/pakar','AdminController@simpanpakar');
Route::get('/panduan', function () {
    return view('User.panduanDonasi');
});