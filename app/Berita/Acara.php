<?php

namespace App\Berita;

use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    protected $table = 'acara';
    protected $primaryKey = 'acara_id';
    public function kelas(){
    	return $this->hasMany('App\Berita\KelasAcara', 'acara_id');
    }
}
