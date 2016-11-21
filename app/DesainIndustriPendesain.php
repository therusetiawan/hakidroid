<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesainIndustriPendesain extends Model
{
    protected $table = 'desain_industri_pendesain';

    public function desain_industri(){
    	return $this->hasMany('desain_industri');
    }
}
