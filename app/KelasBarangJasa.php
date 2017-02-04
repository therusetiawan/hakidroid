<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelasBarangJasa extends Model
{
    protected $table = 'kelas_barang_jasa';

    public function merek(){
    	return $this->hasMany('App\Merek');
    }
}
