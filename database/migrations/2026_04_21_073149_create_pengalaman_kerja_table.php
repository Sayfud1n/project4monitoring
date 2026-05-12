<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengalamanKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('pengalaman_kerja', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('nama');      // Tambahkan baris ini
        $table->string('jabatan');   // Tambahkan baris ini
        $table->string('tahun');     // Tambahkan baris ini
        $table->text('keterangan');  // Tambahkan baris ini
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
        Schema::dropIfExists('pengalaman_kerja');
    }
}
