<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesainIndustri extends Model
{
    protected $table = 'desain_industri';

    protected $dates = array('tanggal_permohonan', 'tanggal_penerimaan');

    public function biodata(){
    	return $this->belongsTo('App\Biodata');
    }

    public function dokumen_lain(){
    	return $this->hasMany('App\DesainIndustriDokumenLain');
    }

    public function gambar_foto(){
    	return $this->hasMany('App\DesainIndustriGambarFoto');
    }

    public function pendesain(){
    	return $this->hasMany('App\DesainIndustriPendesain');
    }

}

