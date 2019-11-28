<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('kode_bidan');
            $table->date('join_date');
            $table->string('ud_um');
            $table->date('birthdate');
            $table->string('phone');
            $table->string('alamat');
            $table->string('spesialisasi');
            $table->string('kecamatan');
            $table->string('kota');
            $table->string('kode_pos');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bidans');
    }
}
