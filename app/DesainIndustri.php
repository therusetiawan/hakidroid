<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesainIndustri extends Model
{
    protected $table = 'desain_industri';

    protected $fillable = ['tanggal_permohonan', 'tanggal_penerimaan', 'nomor_permohonan', 'biodata_id', 'konsultan', 'judul_desain_industri', 'hak_prioritas', 'negara', 'tanggal_penerimaan_permohonan_pertama_kali', 'nomor_prioritas', 'kelas_desain_industri_id', 'lampiran_surat_kuasa', 'lampiran_surat_pernyataan_pengalihan_hak', 'lampiran_bukti_pemilikan_hak', 'lampiran_bukti_prioritas_dan_terjemahan', 'lampiran_dokumen_desain_industri', 'status', 'reviewer_id'];

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

