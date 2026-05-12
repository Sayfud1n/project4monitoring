<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengalamanKerja extends Model
{
    protected $table = 'pengalaman_kerja'; 

    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'jabatan', 'tahun', 'keterangan'];
}