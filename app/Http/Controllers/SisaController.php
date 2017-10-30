<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SisaController extends Controller
{
 public function index(){
 	$a = DB::select('SELECT  a.id, a.tanggal as tanggalpenempatan,DATE_FORMAT(a.tanggal, "%d %M %Y")as tanggalpenempatanfmt, a.jumlah as jumlahpenempatan, d.nama as namatempat, e.nama as namastaff,
c.nama as namabarang, c.kode as kodebarang, f.nama as namakategori
FROM penempatan_barangs a
left join barang_masuks b on a.barangmasuk_id = b.id 
left join barangs c on b.barang_id = c.id
left join tempats d on a.tempat_id = d.id
left join staff e on a.staff_id = e.id 
left join kategoris f on c.kategori_id = f.id
order by a.tanggal desc ', [1]); return view('a.index', ['a' => $a]);
 }
}

