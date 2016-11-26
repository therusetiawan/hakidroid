<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesainIndustri extends Model
{
    protected $table = 'desain_industri';

    protected $dates = array('tanggal_permohonan', 'tanggal_penerimaan',
        'tanggal_penerimaan_permohonan_pertama_kali');

    public function biodata(){
    	return $this->belongsTo('Biodata');
    }

    public function konsultan_hki(){
    	return $this->belongsTo('KonsultanHki');
    }

    public function dokumen_lain(){
    	return $this->belongsTo('DesainIndustriDokumenLain');
    }

    public function gambar_foto(){
    	return $this->belongsTo('DesainIndustriGambarFoto');
    }

    public function pendesain(){
    	return $this->belongsTo('DesainIndustriPendesain');
    }

}

