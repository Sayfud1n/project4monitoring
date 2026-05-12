<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Image; // Wajib untuk fungsi resize_upload

class UploadController extends Controller
{
    public function upload(){
        return view('upload');
    }

    // Fungsi untuk Upload Dasar
    public function proses_upload(Request $request){
        $this->validate($request, [
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'keterangan' => 'required',
        ]);

        $file = $request->file('file');
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $file->getClientOriginalName());

        return redirect()->back()->with('success', 'File Berhasil Diupload');
    }

    // Fungsi untuk Resize Gambar (Bagian akhir Acara 19)
    public function resize_upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
            'keterangan' => 'required',
        ]);

        $path = public_path('img/logo');
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true);
        }

        $file = $request->file('file');
        $fileName = 'logo_' . uniqid() . '.' . $file->getClientOriginalExtension();

        $canvas = Image::canvas(200, 200);
        $resizeImage = Image::make($file)->resize(null, 200, function($constraint) {
            $constraint->aspectRatio();
        });
        $canvas->insert($resizeImage, 'center');
        
        if($canvas->save($path . '/' . $fileName)) {
            return redirect(route('upload'))->with('success', 'Data berhasil diresize dan disimpan!');
        } else {
            return redirect(route('upload'))->with('error', 'Gagal memproses gambar!');
        }
    }
    public function dropzone()
    {
    return view('dropzone');
    }

    public function dropzone_store(Request $request)
    {
    $image = $request->file('file');
    $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
    
    // Pastikan folder public/img/dropzone sudah dibuat
    $image->move(public_path('img/dropzone'), $imageName);
    
    return response()->json(['success' => $imageName]);
}

// Menampilkan view khusus upload PDF (Acara 20 poin 8)
    public function pdf_upload()
    {
        return view('pdf_upload');
    }

    // Proses simpan file PDF dari Dropzone (Acara 20 poin 8)
    public function pdf_store(Request $request)
    {
        $pdf = $request->file('file');
        $pdfName = 'pdf_' . time() . '.' . $pdf->getClientOriginalExtension();
        
        // Simpan ke folder public/pdf/dropzone
        $pdf->move(public_path('pdf/dropzone'), $pdfName);
        
        return response()->json(['success' => $pdfName]);
    }
}