<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatenDokumenLain extends Model
{
    protected $table = 'paten_dokumen_lain';

    public function paten(){
    	return $this->belongsTo('App\Paten');
    }
}
