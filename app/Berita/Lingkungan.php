<?php

namespace App\Berita;

use Illuminate\Database\Eloquent\Model;

class Lingkungan extends Model
{
    protected $table ='lingkungan';

    public function umats(){
    	$this->hasMany('App\Berita\Umat', 'lingkungan_id','umat_lingkungan_id');
    }
}
