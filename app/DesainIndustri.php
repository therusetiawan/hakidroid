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

    public function uraian(){
    	return $this->hasMany('App\DesainIndustriUraian')->orderBy('created_at', 'desc');
    }

    public function gambar_foto(){
    	return $this->hasMany('App\DesainIndustriGambarFoto')->orderBy('created_at', 'desc');
    }

    public function pendesain(){
    	return $this->hasMany('App\DesainIndustriPendesain');
    }

    public function kelas_desain_industri(){
        return $this->belongsTo('App\KelasDesainIndustri');
    }

}

