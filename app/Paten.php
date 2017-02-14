<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paten extends Model
{
    protected $table = 'paten';

    protected $fillable = ['tanggal_permohonan', 'tanggal_penerimaan', 'biodata_id', 'jenis_paten', 'permohonan_paten_nomor', 'konsultan', 'judul_invensi', 'hak_prioritas_id', 'paten_pecahan_nomor', 'surat_kuasa', 'surat_pengalihan_hak_atas_penemuan', 'surat_kepemilikan_invensi_oleh_inventor', 'surat_pernyataan_invensi_oleh_lembaga', 'dokumen_prioritas_terjemahan', 'reviewer_id', 'status'];

    public function biodata(){
    	return $this->belongsTo('App\Biodata');
    }

    public function inventor(){
    	return $this->hasMany('App\PatenInventor');
    }

    public function hak_prioritas(){
        return $this->hasOne('App\PatenHakPrioritas');
    }

    public function reviewer(){
        return $this->belongsTo('App\Reviewer');
    }

    public function dokumen_subtantif_deskripsi(){
        return $this->hasMany('App\PatenSubtantifDeskripsi')->orderBy('created_at', 'desc');
    }

    public function dokumen_subtantif_gambar(){
        return $this->hasMany('App\PatenSubtantifGambar')->orderBy('created_at', 'desc');
    }
}
