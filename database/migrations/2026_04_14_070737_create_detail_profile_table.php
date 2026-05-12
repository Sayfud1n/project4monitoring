<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Nama tabel harus sinkron dengan file migration: detail_profile
        Schema::create('detail_profile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama'); // Akan dihubungkan ke 'name' di tabel users
            $table->string('alamat')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Nama tabel yang dihapus harus sama dengan yang dibuat di atas
        Schema::dropIfExists('detail_profile');
    }
}