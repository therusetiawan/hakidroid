<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatenHakPrioritas extends Model
{
    public $table = 'paten_hak_prioritas';
    
    public function paten(){
    	return $this->belongsTo('App\Paten');
    }
}
