<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    protected $table = 'merek';

    protected $fillable = ['tgl_masuk', 'no_agenda', 'untuk_permohonan_merek', 'tgl_penerimaan_permohonan', 'biodata_id', 'kuasa_nama', 'kuasa_alamat', 'kuasa_telpon', 'kuasa_no_hp', 'kuasa_email', 'kuasa_alamat_indonesia', 'kuasa_nama_negara', 'tgl_permohonan', 'warna_warna_etiket', 'arti_etiket_merek', 'etiket_merek', 'kelas_barang_jasa_id', 'jenis', 'status', 'reviewer_id'];

    public function biodata(){
    	return $this->belongsTo('App\Biodata');
    }

    public function kelas_barang_jasa(){
		return $this->belongsTo('App\KelasBarangJasa');
	}
}
