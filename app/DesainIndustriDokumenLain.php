<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesainIndustriDokumenLain extends Model
{
    protected $table = 'desain_industri_dokumen_lain';

    public function desain_industri(){
    	return $this->belongsTo('App\DesainIndustri');
    }
}
