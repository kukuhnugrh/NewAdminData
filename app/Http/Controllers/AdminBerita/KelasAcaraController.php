<?php

namespace App\Http\Controllers\AdminBerita;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Berita\KelasAcara;
use DB;
class KelasAcaraController extends Controller
{

	public function __construct(){
        $this->middleware('auth');
    }
    public function submit(Request $request){
		$this->validate($request,[
			'kelas_nama' => 'required',
			'namaAcara' => 'required'
	]);

	//Create New Event
	$subclass = new \App\Berita\KelasAcara;
	$subclass->kelas_nama = $request->input('kelas_nama');
	$subclass->acara_id = $request->input('namaAcara');
	//Save Events
	$subclass->save();

	//redirect
	return redirect('adminBerita/daftar-subacara')->with('SUCCESS', 'Kelas Acara Telah Ditambahkan');
	}



    public function delete(Request $button){
        $id = $button->dataId;
        // $idDeleted = $request->input('dataId');
        
        DB::transaction(function() use ($id){
            //peserta = nama fungsi relasi dari kelas > peserta
            $kelasacara = \App\Berita\KelasAcara::find($id);
            
            $kelasacara->peserta()->delete();
            $kelasacara->umatTerscan()->delete();
            $kelasacara->delete();
        });


        // DB::table('kelas_acara')->where('kelas_acara_id',$delete)->delete();
        return redirect('adminBerita/daftar-subacara')->with('SUCCESS', 'Kelas Berhasil Dihapus');
    }

	//Untuk 
	// public function getKelasAcara(){
	// 	$subclasses = KelasAcara::all();

	// 	return view('subacara')->with('subacara', $subclasses);
	// }

	public function getForSubAcara(){
		$subclasses = \App\Berita\KelasAcara::all();

		return view('adminBerita/daftar-subacara')->with('subacaras', $subclasses);
	}

	//Untuk Input Peserta
	// public function getForPeserta(){
	// 	$subclasses = KelasAcara::all();

	// return view('input-peserta')->with('subacaras', $subclasses);
	// }
	//Untuk ke Daftar Peserta
	public function getForDaftarPeserta(){
		$subclasses = \App\Berita\KelasAcara::all();

	return view('adminBerita/daftar-peserta')->with('fromKelasAcara', $subclasses);
	}

}
