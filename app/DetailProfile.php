<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailProfile extends Model
{
    protected $table = 'detail_profile';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'alamat', 'nomor_hp', 'foto'];
}