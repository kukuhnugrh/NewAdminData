<?php

namespace App\Berita;

use Illuminate\Database\Eloquent\Model;

class Umat extends Model
{
    protected $table ='umat';
    protected $primaryKey ='umat_ktp';
    protected $keyType = 'bigint';
    public function getUmatUmurAttribute(){
    	return Carbon::parse($this->umat_tanggal_lahir)->age;
    }

    public function wilayah(){
    	return $this->belongsTo('App\Berita\Wilayah','umat_wilayah_id','wilayah_id');
    }

    public function lingkungan(){
    	return $this->belongsTo('App\Berita\lingkungan','umat_lingkungan_id','lingkungan_id');
    }
}
