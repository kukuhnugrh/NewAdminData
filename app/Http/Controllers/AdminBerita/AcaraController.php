<?php

namespace App\Http\Controllers\AdminBerita;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Berita\Acara;
use DB;
class AcaraController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

     public function submit(Request $request){
    	$this->validate($request,[
    		'acara_nama' => 'required',
    		'acara_deskripsi' => 'required'
    	]);

    	//Create New Event
    	$acara = new Acara;
    	$acara->acara_nama = $request->input('acara_nama');
    	$acara->acara_deskripsi = $request->input('acara_deskripsi');
    	//Save Events
    	$acara->save();


    	//redirect
    	// return redirect('/daftar-acara')->with('SUCCESS', 'Acara Telah Ditambahkan');
        return redirect('adminBerita/daftar-acara')->with('SUCCESS', 'Acara Telah Ditambahkan');
    }

    public function delete(Request $button){


        $id = $button->dataId;
        // $idDeleted = $request->input('dataId');
        //menyertakan %id kedalam transaction callback
        DB::transaction(function() use ($id){
            //peserta = nama fungsi relasi dari kelas > peserta
            $acara = \App\Berita\Acara::find($id);
            foreach($acara->kelas as $kelas){
                $kelas->peserta()->delete();
                $kelas->umatTerscan()->delete();

            }




            $acara->kelas()->delete();
            $acara->delete();
        });


        // dd($delete);
        // return redirect('/daftar-acara')->with('SUCCESS', ' Acara Berhasil Di Hapus ');
        return redirect('adminBerita/daftar-acara')->with('SUCCESS', 'Acara Telah Ditambahkan');
    }
    



    //Untuk Menampilkan Acara yang ada
    public function getDaftarAcara(){
    	$acaras = \App\Berita\Acara::all();

    	return view('adminBerita/daftar-acara')->with('acaras', $acaras);
    }
    //Untuk Menampilkan Acara(dropdown menu) yang ada ketika ingin menambahkan Sub-Acara
    public function getForSubAcaras(){
        $acaras = \App\Berita\Acara::all();

        return view('adminBerita/tambah-subacara')->with('acaras',$acaras);
    }

    //Untuk Menampilkan Sub-Acara berdasarkan Acara 
    public function getForDisplaySubAcaras(){
        $acaras = \App\Berita\Acara::all();

        return view('adminBerita/daftar-subacara')->with('acaras', $acaras);
    }



}
