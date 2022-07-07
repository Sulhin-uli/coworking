<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipe_pemesanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_tipe')->nullable();
            $table->string('nama_tipe')->nullable();
            $table->string('harga')->nullable();
            $table->string('fasilitas')->nullable();
            $table->string('gambar_tempat')->nullable();
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
        Schema::dropIfExists('tipe_pemesanans');
    }
}
