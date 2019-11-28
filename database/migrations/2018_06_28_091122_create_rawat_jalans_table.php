<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRawatJalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rawat_jalans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_rawatjalan');
            $table->unsignedInteger('pasien_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('diagnosa_id');
            $table->enum('status', ['paid', 'unpaid']);    
            $table->timestamps();

            $table->foreign('pasien_id')->references('id')->on('pasiens')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('diagnosa_id')->references('id')->on('diagnosas')->onDelete('cascade');
        });

        Schema::create('rawat_jalan_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rawat_jalan_id');
            $table->unsignedInteger('obat_id');
            $table->integer('jml_obat');
            $table->integer('harga_jual');
            $table->integer('total');
            $table->timestamps();

            $table->foreign('obat_id')->references('id')->on('obats')->onDelete('cascade');
            $table->foreign('rawat_jalan_id')->references('id')->on('rawat_jalans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rawat_jalans');
        Schema::dropIfExists('rawat_jalan_details');
    }
}

        