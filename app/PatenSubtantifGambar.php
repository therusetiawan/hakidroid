<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatenSubtantifGambar extends Model
{
    public $table = 'paten_dokumen_subtantif_gambar';
    
    public function paten(){
    	return $this->belongsTo('App\Paten');
    }
}
