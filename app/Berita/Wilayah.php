<?php

namespace App\Berita;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $table ='wilayah';
    protected $primaryKey = 'wilayah_id';
    
    public function umats(){
    	$this->hasMany('App\Berita\Umat', 'umat_wilayah_id', 'wilayah_id');
    }
}
