<?php

namespace App\Http\Controllers\Backend;

use App\Pendidikan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiPendidikanController extends Controller
{
    // Ambil Semua Data (Acara 21)
    public function getAll()
    {
        $pendidikan = Pendidikan::all();
        return response()->json($pendidikan, 200);
    }

    // Tambah Data (POST)
    public function createPen(Request $request)
    {
        Pendidikan::create($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Pendidikan berhasil ditambahkan!'
        ], 201);
    }

    // Update Data (PUT)
    public function updatePen(Request $request, $id)
    {
        $pendidikan = Pendidikan::find($id);
        if ($pendidikan) {
            $pendidikan->update($request->all());
            return response()->json([
                'status' => 'ok',
                'message' => 'Pendidikan berhasil diperbarui!'
            ], 200);
        }
        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }

    // Hapus Data (DELETE)
    public function deletePen($id)
    {
        $pendidikan = Pendidikan::find($id);
        if ($pendidikan) {
            $pendidikan->delete();
            return response()->json([
                'status' => 'ok',
                'message' => 'Pendidikan berhasil dihapus!'
            ], 200);
        }
        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }
}