<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Atribut yang dapat diisi melalui mass assignment.
     * Sudah menyertakan 'username' sesuai panduan Acara 11.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * Atribut yang harus disembunyikan saat serialisasi array/JSON.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Atribut yang harus dikonversi ke tipe data asli (casting).
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}