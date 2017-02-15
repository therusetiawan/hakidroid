<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HakCipta extends Model
{
	protected $table = 'hak_cipta';

	protected $fillable = ['biodata_id', 'nama_ciptaan', 'pencipta_nama', 'pencipta_kewarganegaraan', 'pencipta_alamat', 'pemegang_hak_cipta_nama', 'pemegang_hak_cipta_kewarganegaraan', 'pemegang_hak_cipta_alamat', 'kuasa_nama', 'kuasa_kewarganegaraan', 'kuasa_alamat', 'jenis_hak_cipta_id', 'tanggal_diumumkan', 'tempat_diumumkan', 'uraian_ciptaan', 'status', 'reviewer_id'];
	
	public function jenis_hak_cipta(){
		return $this->belongsTo('App\JenisHakCipta');
	}

    public function biodata(){
    	return $this->belongsTo('App\Biodata');
    }
}
