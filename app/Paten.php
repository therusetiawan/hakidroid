<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paten extends Model
{
    protected $table = 'paten';

    public function biodata(){
    	return $this->belongsTo('App\Biodata');
    }

    public function inventor(){
    	return $this->hasMany('App\PatenInventor');
    }

    public function detail_hak_prioritas(){
        return $this->hasOne('App\PatenHakPrioritas');
    }

    public function reviewer(){
        return $this->hasOne('App\Reviwer');
    }

    public function dokumen_subtantif_deskripsi(){
        return $this->hasMany('App\PatenSubtantifDeskripsi');
    }

    public function dokumen_subtantif_gambar(){
        return $this->hasMany('App\PatenSubtantifGambar');
    }
}
