<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //
    protected $fillable = ['nama'];

    public function barangmasuk()
    {
    	return $this->hasMany('App\BarangMasuk');
    }

    public function penempatanbarang()
    {
        return $this->hasMany('App\PenempatanBarang');
    }
}
