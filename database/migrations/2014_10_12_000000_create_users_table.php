<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Menjalankan migration untuk membuat tabel users.
     * Sesuai standar BKPM Acara 11.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary Key [cite: 429]
            $table->string('name'); // Nama Lengkap [cite: 430]
            $table->string('username')->unique(); // Tambahan Kolom Username 
            $table->string('email')->unique(); // Email Unique [cite: 432, 433]
            $table->timestamp('email_verified_at')->nullable();// [cite: 434]
            $table->string('password');// [cite: 435]
            $table->rememberToken();// [cite: 436]
            $table->timestamps();// [cite: 437]
        });
    }

    /**
     * Membatalkan migration (Menghapus tabel).
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}