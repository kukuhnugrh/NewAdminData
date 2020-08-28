<?php

namespace App\Http\Controllers\AdminBerita;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Berita\KelasAcara;
use App\Berita\UmatTerscan;
use App\Berita\DataPeserta;
use PDF;
class PresensiController extends Controller
{


    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function submit(Request $request){
        // $idAcara = $request->namaAcara;
        dd('helo');
        // return view('pilih-presensi-kelas')->with('fromAcaraPresensi', $idAcara);
        // return redirect('/')->with('SUCCESS', 'asd');
    }

    public function terimaIdKelas(Request $request){
        $idKelas = $request->idKelasAcara;
        // $ids
        $terscan  = \App\Berita\UmatTerscan::find($idKelas);
        $dataPresensiTerscan = \App\Berita\UmatTerscan::where('kelas_acara_id',$idKelas)->get();
        $kelas = \App\Berita\KelasAcara::where('kelas_acara_id', $idKelas)->first();
        return view('adminBerita/daftar-presensi', [
            'presensis' => $dataPresensiTerscan,
            'dataKelas' => $kelas
        ]);
    }
    public function downloadPDF($id) {
        $dataPresensiTerscan = \App\Berita\UmatTerscan::where('kelas_acara_id',$id)->get();
        $totalPesertaTerpresensi = $dataPresensiTerscan->count();
        $namaKelas = \App\Berita\KelasAcara::where('kelas_acara_id', $id)->first();

        $dataKelas = \App\Berita\DataPeserta::where('kelas_acara_id', $id)->get();
        $totalPesertaKelas = $dataKelas->count();
        $totalAbsen = $totalPesertaKelas - $totalPesertaTerpresensi;

        $pdf = PDF::loadView('adminBerita/pdf', [
            'datas' => $dataKelas,
            'datasTerscan' => $dataPresensiTerscan,
            'totalTerscan' => $totalPesertaTerpresensi,
            'totalPeserta' => $totalPesertaKelas,
            'namaKelas' => $namaKelas,
            'totalAbsen' => $totalAbsen
        ]);


        return $pdf->download('presensi.pdf');
        
    }


}
