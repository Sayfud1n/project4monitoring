<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Rute bawaan Laravel untuk User
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// --- ACARA 21 & 22 ---
// Mengelompokkan rute API di dalam namespace Backend
Route::group(['namespace' => 'Backend'], function () {
    
    // Ambil semua data
    Route::get('api_pendidikan', 'ApiPendidikanController@getAll');
    
    // Ambil satu data berdasarkan ID
    Route::get('api_pendidikan/{id}', 'ApiPendidikanController@getPen');
    
    // Tambah data baru
    Route::post('api_pendidikan', 'ApiPendidikanController@createPen');
    
    // Update data
    Route::put('api_pendidikan/{id}', 'ApiPendidikanController@updatePen');
    
    // Hapus data
    Route::delete('api_pendidikan/{id}', 'ApiPendidikanController@deletePen');
});