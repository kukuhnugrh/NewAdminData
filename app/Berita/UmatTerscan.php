<?php

namespace App\Berita;

use Illuminate\Database\Eloquent\Model;

class UmatTerscan extends Model
{
    protected $primaryKey = 'umat_terscan_id';
    protected $table = 'umat_terscan';
	protected $keyType = 'bigint';

    public function kelas(){
    	return $this->belongsTo('App\Berita\KelasAcara', 'kelas_acara_id', 'kelas_acara_id');
    }
    public function umats(){
    	return $this->belongsTo('App\Berita\Umat', 'nik', 'umat_ktp' );
    }
}
