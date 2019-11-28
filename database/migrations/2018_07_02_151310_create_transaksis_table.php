<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_transaksi');
            $table->string('jenis');
            $table->unsignedInteger('pasien_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('diagnosa_id');
            $table->enum('status', ['paid', 'unpaid'])->default('unpaid');    
            $table->string('tambahan_diagnosa');
            $table->integer('dp');
            $table->timestamps();

            $table->foreign('pasien_id')->references('id')->on('pasiens')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('diagnosa_id')->references('id')->on('diagnosas')->onDelete('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
