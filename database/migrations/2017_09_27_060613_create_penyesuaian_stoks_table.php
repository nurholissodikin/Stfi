<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenyesuaianStoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyesuaian_stoks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tanggal');
            $table->integer('penempatanbarang_id')->unsigned();
            $table->integer('stok_penggunaan')->unsigned();
            $table->timestamps();
        });

        Schema::table('penyesuaian_stoks', function($table) {

            $table->foreign('penempatanbarang_id')->references('id')->on('penempatan_barangs')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penyesuaian_stoks');
    }
}
