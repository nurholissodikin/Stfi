<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tempat extends Model
{
    //
    protected $fillable = ['nama','kode'];

    public function penempatanbarang()
    {
        return $this->hasMany('App\PenempatanBarang');
    }
}
