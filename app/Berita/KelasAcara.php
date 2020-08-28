<?php

namespace App\Berita;

use Illuminate\Database\Eloquent\Model;

class KelasAcara extends Model
{
    protected $table ='kelas_acara';
	protected $primaryKey = 'kelas_acara_id';
	// protected $fillable = ['nik'];
	// protected $guarded = [];
	// protected $fillable = ['nik'];
    public function peserta(){
    	return $this->hasMany('App\Berita\DataPeserta','kelas_acara_id','kelas_acara_id');
    }

    public function umatterscan(){
    	return $this->belongsTo('App\Berita\umatTerscan', 'kelas_acara_id', 'kelas_acara_id');
    }
}
