<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesainIndustriUraian extends Model
{
    protected $table = 'desain_industri_uraian';

    public function desain_industri(){
    	return $this->belongsTo('App\DesainIndustri');
    }
}
