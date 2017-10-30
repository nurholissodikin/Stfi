<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVpenempatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::statement( 'CREATE VIEW vpenempatans AS SELECT  a.id, a.tanggal as tanggalpenempatan,DATE_FORMAT(a.tanggal, "%d %M %Y")as tanggalpenempatanfmt, a.jumlah as jumlahpenempatan, d.nama as namatempat, e.nama as namastaff,
c.nama as namabarang, c.kode as kodebarang, f.nama as namakategori
FROM penempatan_barangs a
left join barang_masuks b on a.barangmasuk_id = b.id 
left join barangs c on b.barang_id = c.id
left join tempats d on a.tempat_id = d.id
left join staff e on a.staff_id = e.id 
left join kategoris f on c.kategori_id = f.id
order by a.tanggal desc' );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      DB::statement( 'DROP VIEW vpenempatans' );
    }
}
