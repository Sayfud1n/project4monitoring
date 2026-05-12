<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\DetailProfile;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('backend.profile.index', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'alamat' => 'required',
            'nomor_hp' => 'required|numeric',
        ]);

        // Mencari data detail berdasarkan nama user yang sedang login
        $detail = DetailProfile::where('nama', Auth::user()->name)->first();

        // Jika data belum ada di tabel detail_profile, kita buat baru (Create)
        // Jika sudah ada, kita Update
        if (!$detail) {
            DetailProfile::create([
                'nama' => Auth::user()->name,
                'alamat' => $request->alamat,
                'nomor_hp' => $request->nomor_hp,
            ]);
        } else {
            $detail->update($request->all());
        }

        return redirect()->route('profile.index')
                         ->with('success', 'Profil berhasil diperbarui!');
    }
}