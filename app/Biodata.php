<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Biodata extends Authenticatable
{
    protected $table = 'biodata';

    protected $hidden = array('password', 'api_token');

    public function desain_industri(){
    	return $this->hasMany('desain_industri');
    }
}
