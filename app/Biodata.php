<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'biodata';

    public function desain_industri(){
    	return $this->hasMany('desain_industri');
    }
}
