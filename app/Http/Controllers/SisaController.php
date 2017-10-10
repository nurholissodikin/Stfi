<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SisaController extends Controller
{
 public function index(){
 	$a = DB::select('select barangmasuk_id,SUM(jumlah) as total_keluar from penempatan_barangs group by barangmasuk_id
', [1]); return view('a.index', ['a' => $a]);
 }
}

