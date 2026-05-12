<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->bigIncrements('id'); // Baris 1 [cite: 40]
            $table->string('nama'); // Baris 2 [cite: 41]
            $table->tinyInteger('tingkatan'); // Baris 3 [cite: 59]
            $table->year('tahun_masuk'); // Baris 4 [cite: 51]
            $table->year('tahun_keluar'); // Baris 5 [cite: 53]
            $table->timestamps(); // Baris 6 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendidikan');
    }
}
