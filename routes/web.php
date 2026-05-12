<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirect root ke halaman home
Route::get('/', function () {
    return redirect('/home');
});

// Authentication Routes (Login, Register, dll)
Auth::routes();

// Halaman depan (Frontend)
Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Acara 19: File Upload & Manipulasi Gambar
| (Controller berada di folder app/Http/Controllers)
|--------------------------------------------------------------------------
*/
// Route untuk menampilkan form upload
Route::get('/upload', 'UploadController@upload')->name('upload');

// Route untuk proses upload dasar
Route::post('/upload/proses', 'UploadController@proses_upload')->name('upload.proses');

// Route untuk proses upload dengan resize (manipulasi gambar)
Route::post('/upload/resize', 'UploadController@resize_upload')->name('upload.resize');

// Route Acara 20 - Image
Route::get('/dropzone', 'UploadController@dropzone')->name('dropzone');
Route::post('/dropzone/store', 'UploadController@dropzone_store')->name('dropzone.store');

// Route Acara 20 - PDF (Halaman 17) [cite: 446, 447]
Route::get('/pdf_upload', 'UploadController@pdf_upload')->name('pdf.upload');
Route::post('/pdf/store', 'UploadController@pdf_store')->name('pdf.store');
/*
|--------------------------------------------------------------------------
| Admin Area (Backend)
| (Controller berada di folder app/Http/Controllers/Backend)
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'Backend', 'middleware' => ['auth']], function () {
    
    Route::resource('dashboard', 'DashboardController');
    Route::resource('pengalaman_kerja', 'PengalamanKerjaController');
    Route::resource('profile', 'ProfileController');
    Route::resource('pendidikan', 'PendidikanController'); 
    Route::resource('pegawai', 'PegawaiController');
    
    Route::get('/cobaerror', 'CobaController@index');
});