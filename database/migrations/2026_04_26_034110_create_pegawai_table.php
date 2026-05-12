<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('pegawai', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('nama');
        $table->string('nip');
        $table->text('alamat');
        $table->timestamps(); // Ini akan membuat created_at dan updated_at
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
