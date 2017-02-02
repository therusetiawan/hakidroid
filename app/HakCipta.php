<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HakCipta extends Model
{
	protected $table = 'hak_cipta';
	
	public function jenis_hak_cipta(){
		return $this->belongsTo('App\JenisHakCipta');
	}

    public function biodata(){
    	return $this->belongsTo('App\Biodata');
    }
}
