<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pendidikan; // Pastikan model Pendidikan sudah dibuat

class PendidikanController extends Controller
{
    /**
     * Menampilkan daftar semua data pendidikan (Acara 15)
     */
    public function index()
    {
        $pendidikan = Pendidikan::all();
        return view('backend.pendidikan.index', compact('pendidikan'));
    }

    /**
     * Menampilkan form untuk menambah data baru (Acara 15)
     */
    public function create()
    {
        $pendidikan = null; // Set null agar form create tidak error saat mengecek isset($pendidikan)
        return view('backend.pendidikan.create', compact('pendidikan'));
    }

    /**
     * Menyimpan data baru ke database (Acara 15)
     */
    public function store(Request $request)
    {
        // Validasi sederhana (opsional tapi disarankan)
        $request->validate([
            'nama' => 'required',
            'tingkatan' => 'required',
            'tahun_masuk' => 'required|numeric',
            'tahun_keluar' => 'required|numeric',
        ]);

        Pendidikan::create($request->all());

        return redirect()->route('pendidikan.index')
            ->with('success', 'Data Pendidikan baru telah berhasil disimpan.');
    }

    /**
     * Menampilkan form edit dengan data lama (Acara 16)
     */
    public function edit(Pendidikan $pendidikan)
    {
        // Parameter $pendidikan otomatis mengambil data berdasarkan ID (Route Model Binding)
        return view('backend.pendidikan.create', compact('pendidikan'));
    }

    /**
     * Memperbarui data di database (Acara 16)
     */
    public function update(Request $request, Pendidikan $pendidikan)
    {
        $request->validate([
            'nama' => 'required',
            'tingkatan' => 'required',
            'tahun_masuk' => 'required|numeric',
            'tahun_keluar' => 'required|numeric',
        ]);

        $pendidikan->update($request->all());

        return redirect()->route('pendidikan.index')
            ->with('success', 'Data Pendidikan berhasil diperbarui.');
    }

    /**
     * Menghapus data dari database (Acara 16)
     */
    public function destroy(Pendidikan $pendidikan)
    {
        $pendidikan->delete();

        return redirect()->route('pendidikan.index')
            ->with('success', 'Data Pendidikan berhasil dihapus.');
    }
}