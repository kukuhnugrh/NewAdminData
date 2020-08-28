<?php

namespace App\Berita;

use Illuminate\Database\Eloquent\Model;

class DataPeserta extends Model
{
    protected $primaryKey = 'list_peserta_id';
    protected $table = 'list_peserta';
    protected $fillable = ['list_peserta_id','kelas_acara_id','nik'];
    // protected $guarded =[];
    public function kelasacara()
    {
       return $this->belongsTo('App\Berita\KelasAcara', 'kelas_acara_id','kelas_acara_id');
    }

    public function umats(){
    	return $this->belongsTo('App\Berita\Umat','nik','umat_ktp');
    }
}
