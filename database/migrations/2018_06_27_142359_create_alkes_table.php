<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlkesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alkes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_alkes');
            $table->string('nama');
            $table->string('type');
            $table->string('unit');
            $table->integer('jml_unit');
            $table->integer('jml_perunit');
            $table->integer('ttl_alat');
            $table->integer('harga_perunit');
            $table->integer('harga_jual');
            $table->double('harga_modal', 8, 2);
            $table->date('order_date');
            $table->string('desc');
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
        Schema::dropIfExists('alkes');
    }
}


        