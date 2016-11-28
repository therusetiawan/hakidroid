<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatenInventor extends Model
{
    public $table = 'paten_inventor';
    
    public function paten(){
    	return $this->belongsTo('App\Paten');
    }
}
