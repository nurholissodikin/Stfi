<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_masuks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->string('merk');
            $table->string('kondisi');
            $table->string('suppliyer');
            $table->string('tanggal');
            $table->integer('barang_id')->unsigned();
            $table->integer('staff_id')->unsigned();
            $table->timestamps();

            
        });

        Schema::table('barang_masuks', function($table) {

            $table->foreign('barang_id')->references('id')->on('barangs')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('staff_id')->references('id')->on('staff')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_masuks');
    }
}
