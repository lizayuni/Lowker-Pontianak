<?php

Route::get('/', 'PagesController@index')->name('front.beranda');
Route::get('/pilihan-login', 'PagesController@pilihanlogin')->name('front.pilihanlogin');

Route::get('/tentang-kami', 'PagesController@tentang')->name('front.tentang');

Route::resource('/kirim/{id}/pesan', 'PesanController');
Route::get('/pesan-saya', 'PesanController@pesanSaya')->name('front.pesanSaya');

Route::resource('/lowongan-pekerjaan', 'LowkerController');
Route::get('/lowongan-pekerjaan/filter/{id}/tipe-pekerjaan', 'LowkerController@filterTipePekerjaan')->name('lowongan-pekerjaan.filterTipePekerjaan');
Route::get('/lowongan-pekerjaan/filter/{id}/tipe-berkas', 'LowkerController@filterTipeBerkas')->name('lowongan-pekerjaan.filterTipeBerkas');
Route::get('/pencarian', 'LowkerController@cari')->name('lowongan-pekerjaan.cari');

Route::get('/jobfair', 'PagesController@jobfair')->name('front.jobfair');
Route::get('/jobfair/{id}', 'PagesController@jobfairDetail')->name('front.jobfairDetail');

Route::get('/kontak-kami', 'PagesController@kontak')->name('front.kontak');
Route::post('/kontak-kami', 'PagesController@kontakCreate')->name('front.kontak-create');

Route::resource('/lowker/{id}/lamaran', 'LamaranController');

Route::resource('/profil', 'ProfileController');
Route::post('/profil/ubahprofil', 'ProfileController@ubahProfil')->name('front.ubahProfil');
Route::get('/lamaran-saya', 'ProfileController@lamaranSaya')->name('front.lamaranSaya');
Route::get('/lowker-saya', 'ProfileController@lowkerSaya')->name('front.lowkerSaya');
Route::get('/lowker-saya/{id}/lamaran', 'ProfileController@lamaranDiLowkerSaya')->name('front.lamaranDiLowkerSaya');
Route::get('/lowker-saya/{id}/lamaran/{user_id}', 'ProfileController@lamaranDetail')->name('front.lamaranDetail');

Route::resource('/user/{id}/komentar', 'KomentarController');

Route::put('/notifikasi/done', 'NotifikasiController@done')->name('front.notifikasiDone');
Route::resource('/notifikasi', 'NotifikasiController');
Route::get('/lowker-saya/{id}/notifikasi/{user_id}', 'NotifikasiController@lamaranDiterima')->name('front.lamaranDiterima');
Route::post('/lowker-saya/{id}/notifikasi/{user_id}', 'NotifikasiController@lamaranDiterimaPost')->name('front.lamaranDiterimaPost');
Route::post('/tolak/lowker-saya/{id}/notifikasi/{user_id}', 'NotifikasiController@lamaranDitolakPost')->name('front.lamaranDitolak');

Auth::routes();

Route::put('/admin/notifikasi/done', 'NotifikasiController@adminDone')->name('front.adminNotifikasiDone');
Route::resource('/admin/kelola-lowker', 'AdminLowkerController');
Route::get('/admin/tambahan-user', 'AdminLowkerController@tambahanUser')->name('admin.lowker.tambahanUser');
Route::put('/admin/tambahan-user/{id}/terima', 'AdminLowkerController@terima')->name('admin.lowker.terima');
Route::put('/admin/tambahan-user/{id}/tolak', 'AdminLowkerController@tolak')->name('admin.lowker.tolak');

Route::resource('/admin/kelola-jobfair', 'AdminJobfairController');

Route::resource('/admin/kelola-pengaduan', 'AdminPengaduanController');

Route::get('/admin/kelola-user', 'AdminPagesController@kelolaUser');
Route::delete('/admin/kelola-user/{id}/delete', 'AdminPagesController@userDestroy')->name('admin.userDestroy');

Route::get('/admin', 'AdminPagesController@index')->name('admin.beranda');
