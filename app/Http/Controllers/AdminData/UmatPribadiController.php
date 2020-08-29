<?php

namespace App\Http\Controllers\AdminData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UmatPribadiController extends Controller
{
    public function index()
    {
        $dataUmatPribadi = DB::table('umat')
                            ->orderBy('umat_kk', 'ASC')
                            ->paginate(15);
        $dataWilayah = DB::table('wilayah')->get();
        return view('adminData\umatPribadi', ['dataUmatPribadi' => $dataUmatPribadi], ['dataWilayah' => $dataWilayah]);
    }

    public function show($id)
    {
        if($id == "0"){
            $dataUmatPribadi = DB::table('umat')
                                ->orderBy('umat_kk', 'ASC')
                                ->get();
        }else{
            $dataUmatPribadi = DB::table('umat')
                                ->join('wilayah', 'umat.umat_wilayah_id', '=', 'wilayah.wilayah_id')
                                ->where('umat_wilayah_id', $id)
                                ->orderBy('umat_kk', 'ASC')
                                ->get();
        }
        return $dataUmatPribadi;
    }

    public function liveSearch($keyword){
            $dataUmatPribadi = DB::table('umat')
                                ->where('umat_nama', 'like', '%'.$keyword.'%')
                                ->get();
        return $dataUmatPribadi;
    }

    public function editDetailUmat($keyword){
        $dataUmatPribadi = DB::table('umat')
                                ->get();
        return $dataUmatPribadi;
    }

    public function detail($umat_nama){
            $dataUmatPribadi = DB::table('umat')
                                ->join('agama','umat.umat_agama', '=', 'agama.agama_id')
                                ->join('suku','umat.umat_suku', '=', 'suku.suku_id')
                                ->join('status_aktivitas_sosial','umat.umat_status_aktivitas_sosial', '=', 'status_aktivitas_sosial.status_aktivitas_sosial_id')
                                ->join('hubungan_keluarga','umat.umat_hubungan_keluarga', '=', 'hubungan_keluarga.hubungan_keluarga_id')
                                ->join('status_nikah','umat.umat_status_nikah', '=', 'status_nikah.status_nikah_id')
                                ->join('golongan_darah','umat.umat_golongan_darah', '=', 'golongan_darah.golongan_darah_id')
                                ->join('pendidikan','umat.umat_pendidikan', '=', 'pendidikan.pendidikan_id')
                                ->join('tuna','umat.umat_cacat_tubuh', '=', 'tuna.tuna_id')
                                ->join('kevikepan','umat.umat_kevikepan_id', '=', 'kevikepan.kevikepan_id')
                                ->join(DB::raw('paroki l'), DB::raw('l.paroki_id'), '=', 'umat.umat_paroki_id')
                                ->join('wilayah','umat.umat_wilayah_id', '=', 'wilayah.wilayah_id')
                                ->join('lingkungan','umat.umat_lingkungan_id', '=', 'lingkungan.lingkungan_id')
                                ->join('pekerjaan','umat.umat_pekerjaan', '=', 'pekerjaan.pekerjaan_id')
                                ->join('profesi','umat.umat_profesi', '=', 'profesi.profesi_id')
                                ->join('keuskupan','umat.umat_keuskupan_baptis', '=', 'keuskupan.keuskupan_id')
                                ->join(DB::raw('paroki t'), DB::raw('t.paroki_id'), '=', 'umat.umat_paroki_baptis')
                                ->join('status_rumah','umat.umat_status_rumah', '=', 'status_rumah.status_rumah_id')
                                ->join('status_ekonomi','umat.umat_status_ekonomi', '=', 'status_ekonomi.status_ekonomi_id')
                                ->where('umat_nama', $umat_nama)
                                ->get();
            $dataUmatPribadiAll = DB::table('umat')
                                ->join('agama','umat.umat_agama', '=', 'agama.agama_id')
                                ->join('suku','umat.umat_suku', '=', 'suku.suku_id')
                                ->join('status_aktivitas_sosial','umat.umat_status_aktivitas_sosial', '=', 'status_aktivitas_sosial.status_aktivitas_sosial_id')
                                ->join('hubungan_keluarga','umat.umat_hubungan_keluarga', '=', 'hubungan_keluarga.hubungan_keluarga_id')
                                ->join('status_nikah','umat.umat_status_nikah', '=', 'status_nikah.status_nikah_id')
                                ->join('golongan_darah','umat.umat_golongan_darah', '=', 'golongan_darah.golongan_darah_id')
                                ->join('pendidikan','umat.umat_pendidikan', '=', 'pendidikan.pendidikan_id')
                                ->join('tuna','umat.umat_cacat_tubuh', '=', 'tuna.tuna_id')
                                ->join('kevikepan','umat.umat_kevikepan_id', '=', 'kevikepan.kevikepan_id')
                                ->join(DB::raw('paroki l'), DB::raw('l.paroki_id'), '=', 'umat.umat_paroki_id')
                                ->join('wilayah','umat.umat_wilayah_id', '=', 'wilayah.wilayah_id')
                                ->join('lingkungan','umat.umat_lingkungan_id', '=', 'lingkungan.lingkungan_id')
                                ->join('pekerjaan','umat.umat_pekerjaan', '=', 'pekerjaan.pekerjaan_id')
                                ->join('profesi','umat.umat_profesi', '=', 'profesi.profesi_id')
                                ->join('keuskupan','umat.umat_keuskupan_baptis', '=', 'keuskupan.keuskupan_id')
                                ->join(DB::raw('paroki t'), DB::raw('t.paroki_id'), '=', 'umat.umat_paroki_baptis')
                                ->join('status_rumah','umat.umat_status_rumah', '=', 'status_rumah.status_rumah_id')
                                ->join('status_ekonomi','umat.umat_status_ekonomi', '=', 'status_ekonomi.status_ekonomi_id')
                                ->get();
        return view('adminData\detailUmat',['umat_nama'=>$dataUmatPribadi],['semua_umat'=>$dataUmatPribadiAll]);
    }
}
