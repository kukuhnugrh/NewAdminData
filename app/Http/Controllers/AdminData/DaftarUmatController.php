<?php

namespace App\Http\Controllers\AdminData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class DaftarUmatCOntroller extends Controller
{
    public function index()
    {   
        $dataUmat = DB::table('umat')
        ->join('hubungan_keluarga', 'umat.umat_hubungan_keluarga', '=', 'hubungan_keluarga.hubungan_keluarga_id')
        ->join('agama', 'umat.umat_agama', '=', 'agama.agama_id')
        ->orderBy('umat_kk', 'ASC')->orderBy('hubungan_keluarga_id', 'DESC')->paginate(15);
        $dataLingkungan = DB::table('lingkungan')->get();
        return view('adminData\daftarUmat', ['dataUmat' => $dataUmat], ['dataLingkungan' => $dataLingkungan]);
    }

    public function show($id)
    {
        if($id == "0"){
            $dataUmat = DB::table('umat')
                        ->join('hubungan_keluarga', 'umat.umat_hubungan_keluarga', '=', 'hubungan_keluarga.hubungan_keluarga_id')
                        ->join('agama', 'umat.umat_agama', '=', 'agama.agama_id')
                        ->orderBy('umat_kk', 'ASC')->orderBy('hubungan_keluarga_id', 'DESC')->get();
        }else{
            $dataUmat = DB::table('umat')
                        ->join('hubungan_keluarga', 'umat.umat_hubungan_keluarga', '=', 'hubungan_keluarga.hubungan_keluarga_id')
                        ->join('agama', 'umat.umat_agama', '=', 'agama.agama_id')
                        ->where('umat_lingkungan_id', $id)
                        ->orderBy('umat_kk', 'ASC')->orderBy('hubungan_keluarga_id', 'DESC')->get();
        }
        return $dataUmat;
    }

    public function cetak_pdf($id)
    {   
        if($id == 0 || $id == "0"){
            $dataUmat = DB::table('umat')
                        ->join('hubungan_keluarga', 'umat.umat_hubungan_keluarga', '=', 'hubungan_keluarga.hubungan_keluarga_id')
                        ->join('agama', 'umat.umat_agama', '=', 'agama.agama_id')
                        ->orderBy('umat_lingkungan_id', 'ASC')
                        ->orderBy('umat_kk', 'ASC')
                        ->orderBy('hubungan_keluarga_id', 'DESC')->get();
            $dataLingkungan = "SEMUA LINGKUNGAN";
            $pdf = PDF::loadview('exportPDF', ['dataUmat' => $dataUmat], ['dataLingkungan' => $dataLingkungan])->setPaper('a4', 'landscape');
        }else{
            $dataUmat = DB::table('umat')
                        ->join('hubungan_keluarga', 'umat.umat_hubungan_keluarga', '=', 'hubungan_keluarga.hubungan_keluarga_id')
                        ->join('agama', 'umat.umat_agama', '=', 'agama.agama_id')
                        ->where('umat_lingkungan_id', $id)
                        ->orderBy('umat_lingkungan_id', 'ASC')
                        ->orderBy('umat_kk', 'ASC')
                        ->orderBy('hubungan_keluarga_id', 'DESC')->get();
            $dataLingkungan = DB::table('lingkungan')
                                ->where('lingkungan_id', $id)
                                ->get();
            $pdf = PDF::loadview('adminData\exportPDF', ['dataUmat' => $dataUmat], ['dataLingkungan' => $dataLingkungan])->setPaper('a4', 'landscape')->set_option('isFontSubsettingEnabled', true);
        }
    	return $pdf->download('DATAUMAT');
    }
}
