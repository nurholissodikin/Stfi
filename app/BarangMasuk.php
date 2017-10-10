<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    //
    protected $fillable = ['jumlah','harga','merk','kondisi','suppliyer','tanggal','barang_id','staff_id'];

    public function barang()
    {
    	return $this->belongsTo('App\Barang');
    }
    public function staff()
    {
    	return $this->belongsTo('App\Staff');
    }

    public function penempatanbarang()
    {
        return $this->hasMany('App\PenempatanBarang');
    }
}
