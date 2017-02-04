<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    protected $table = 'merek';

    public function biodata(){
    	return $this->belongsTo('App\Biodata');
    }

    public function kelas_barang_jasa(){
		return $this->belongsTo('App\KelasBarangJasa');
	}
}
