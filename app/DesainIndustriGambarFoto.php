<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesainIndustriGambarFoto extends Model
{
    protected $table = 'desain_industri_gambar_foto';

    public function desain_industri(){
    	return $this->belongsTo('App\DesainIndustri');
    }
}
