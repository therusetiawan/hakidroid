<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paten extends Model
{
    protected $table = 'paten';

    public function biodata(){
    	return $this->belongsTo('App\Biodata');
    }

    public function konsultan_hki(){
    	return $this->belongsTo('App\KonsultanHki');
    }

    public function dokumen_lain(){
    	return $this->hasMany('App\PatenDokumenLain');
    }

    public function inventor(){
    	return $this->hasMany('App\PatenInventor');
    }

    public function detail_hak_prioritas(){
        return $this->hasOne('App\PatenHakPrioritas');
    }
}
