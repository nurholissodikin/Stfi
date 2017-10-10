<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenempatanBarang extends Model
{
    //
    protected $fillable = ['jumlah','tanggal','barangmasuk_id','tempat_id','staff_id'];

    public function barangmasuk()
    {
    	return $this->belongsTo('App\BarangMasuk');
    }

    public function tempat()
    {
    	return $this->belongsTo('App\Tempat');
    }

    public function staff()
    {
    	return $this->belongsTo('App\Staff');
    }

    public function penyesuaianstok()
    {
        return $this->hasMany('App\PenyesuaianStok');
    }
}
