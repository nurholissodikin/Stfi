<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenempatanBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penempatan_barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jumlah');
            $table->string('tanggal');
            $table->integer('barangmasuk_id')->unsigned();
            $table->integer('tempat_id')->unsigned();
            $table->integer('staff_id')->unsigned();
            $table->timestamps();

            
        });

        Schema::table('penempatan_barangs', function($table) {

            $table->foreign('barangmasuk_id')->references('id')->on('barang_masuks')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('tempat_id')->references('id')->on('tempats')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('penempatan_barangs');
    }
}
