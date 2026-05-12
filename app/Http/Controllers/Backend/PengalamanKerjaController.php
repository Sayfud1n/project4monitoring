<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PengalamanKerja; // Tambahkan ini agar tidak perlu menulis \App\ terus menerus

class PengalamanKerjaController extends Controller
{
    public function index()
    {
        // Mengambil semua data pengalaman kerja
        $pengalaman_kerja = PengalamanKerja::all();
        return view('backend.pengalaman_kerja.index', compact('pengalaman_kerja'));
    }

    public function create()
    {
        // Menampilkan form tambah data
        return view('backend.pengalaman_kerja.create');
    }

    public function store(Request $request)
    {
    // Validasi super ketat
    $request->validate([
        // 'alpha_spaces' memastikan hanya huruf dan spasi (tidak boleh angka)
        // Jika Laravel 6 belum support alpha_spaces, kita gunakan regex:
        'nama' => ['required', 'regex:/^[a-zA-Z\s]+$/'], 
        
        // 'digits:4' memastikan input harus tepat 4 angka (Contoh: 2024)
        'tahun' => 'required|digits:4|numeric',
        
        'jabatan' => 'required',
        'keterangan' => 'required',
    ], [
        // Pesan error custom dalam bahasa Indonesia
        'nama.regex' => 'Nama perusahaan hanya boleh berisi huruf!',
        'tahun.digits' => 'Tahun harus berupa 4 digit angka (Contoh: 2026)!',
        'tahun.numeric' => 'Tahun harus berupa angka!',
    ]);

    \App\PengalamanKerja::create($request->all());

    return redirect()->route('pengalaman_kerja.index')
                     ->with('success', 'Data Pengalaman Kerja berhasil disimpan.');
    }

    public function show($id)
    {
        // Kosongkan dulu sesuai instruksi BKPM
    }

    public function edit($id)
    {
        // Biasanya dikerjakan di Acara berikutnya
    }

    public function update(Request $request, $id)
    {
        // Biasanya dikerjakan di Acara berikutnya
    }

    public function destroy($id)
    {
        // Biasanya dikerjakan di Acara berikutnya
    }
}