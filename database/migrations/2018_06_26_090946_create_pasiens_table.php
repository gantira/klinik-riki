<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_pasien');
            $table->string('nama');
            $table->string('umur');
            $table->string('jk');
            $table->string('phone');
            $table->string('kelurahan');
            $table->string('kota');
            $table->string('kode_pos');
            $table->date('tgl_lahir');
            $table->string('peng_jawab');
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
        Schema::dropIfExists('pasiens');
    }
}

