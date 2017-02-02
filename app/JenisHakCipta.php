<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisHakCipta extends Model
{
    protected $table = 'jenis_hak_cipta';

    public function hak_cipta(){
    	return $this->hasMany('App\HakCipta');
    }
}
