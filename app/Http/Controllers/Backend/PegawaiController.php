<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pegawai; // Pastikan Model Pegawai sudah ada
use Session;    // Tambahkan ini untuk menggunakan fitur Session

class PegawaiController extends Controller
{
    public function index() {
        $pegawai = Pegawai::all();
        return view('backend.pegawai.index', compact('pegawai'));
    }

    public function create() {
        return view('backend.pegawai.create');
    }

    public function store(Request $request)
    {
    $request->validate([
        'nama' => 'required|min:3',
        'nip' => 'required|numeric',
        'alamat' => 'required',
    ]);
    
    // Kode simpan di bawahnya tidak akan dieksekusi jika validasi gagal
    Pegawai::create($request->all());
    return redirect()->route('pegawai.index');
    }
}