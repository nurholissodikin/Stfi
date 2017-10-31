<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVbarangmasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::statement( 'CREATE VIEW vbarangmasuks AS SELECT a.id as id_barangmasuk, b.id as id_barang, a.jumlah, a.harga, a.merk, a.kondisi,a.suppliyer,a.tanggal,DATE_FORMAT(a.tanggal, "%d %M %Y")as tanggalbarangmasukfmt, b.nama as namabarang,
c.nama as namastaff,ifnull(d.total_keluar,0) as total_keluar, (a.jumlah - ifnull(d.total_keluar,0)) as saldo from barang_masuks a
left join barangs b on a.barang_id = b.id
left join staff c on a.staff_id = c.id
left join (
select barangmasuk_id,SUM(jumlah) as total_keluar from penempatan_barangs group by barangmasuk_id
) d on a.id = d.barangmasuk_id
 

order by a.tanggal asc ' );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         DB::statement( 'DROP VIEW vbarangmasuks' );
    }
}
