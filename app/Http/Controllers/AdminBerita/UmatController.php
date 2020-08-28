<?php

namespace App\Http\Controllers\AdminBerita;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Berita\Umat;
use App\Berita\dataPeserta;

class UmatController extends Controller
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
    public function getForDataPesertaKelas(Request $request){
        $nikDipilih = $request->nik;

        $dataPeserta = \App\Berita\Umat::where('umat_ktp', $nikDipilih)->first();
        $pesertaTerdaftar = \App\Berita\dataPeserta::where('nik', $nikDipilih)->first();
        // dd($dataPeserta);
        // $namaWilayah = $umat->wilayah_nama;
        return view('adminBerita/data-peserta', [
            'detailPeserta' => $dataPeserta,
            'cekTerdaftar' => $pesertaTerdaftar
        ]);
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
}
