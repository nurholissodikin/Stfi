<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenyesuaianStok extends Model
{
    //
    protected $fillable = ['tanggal','penempatanbarang_id','stok_penggunaan'];

    public function penempatanbarang()
    {
    	return $this->belongsTo('App\PenempatanBarang');
    }
}
