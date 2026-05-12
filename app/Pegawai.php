<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    // Nama tabel di database (pastikan sesuai di phpMyAdmin)
    protected $table = 'pegawai'; 

    // Kolom yang boleh diisi
    protected $fillable = ['nama', 'nip', 'alamat'];
}