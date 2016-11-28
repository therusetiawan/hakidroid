<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KonsultanHki extends Model
{
    protected $table = 'konsultan_hki';

    public function desain_industri(){
    	return $this->hasMany('App\DesainIndustri');
    }

    public function paten(){
    	return $this->hasMany('App\Paten');
    }
}
