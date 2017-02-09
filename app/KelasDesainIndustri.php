<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelasDesainIndustri extends Model
{
    protected $table = 'kelas_desain_industri';

    public function desain_industri(){
    	return $this->hasMany('App\DesainIndustri');
    }
}
