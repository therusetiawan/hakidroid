<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatenSubtantifDeskripsi extends Model
{
    public $table = 'paten_dokumen_subtantif_deskripsi';
    
    public function paten(){
    	return $this->belongsTo('App\Paten');
    }
}
