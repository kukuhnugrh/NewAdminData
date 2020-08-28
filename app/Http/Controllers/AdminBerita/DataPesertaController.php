<?php

namespace App\Http\Controllers\AdminBerita;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Berita\DataPeserta;
use App\Berita\KelasAcara;
use App\Berita\Umat;
use DB;
class DataPesertaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function submit(Request $request){
        $this->validate($request,[
        'nikPeserta' => 'required',
        'subAcaraId' => 'required'
        ]);

        

        $id = $request->subAcaraId;
        $member = \App\Berita\KelasAcara::find($id);
        $nik= $request->nikPeserta;
        $niks;
        $explodedNik = ( explode( ',', $nik ) );
        
        $noSame = collect($explodedNik)->unique()->toArray();

        foreach($noSame as $data){
            //jika nik yang didaftarkan sudah ada di list peserta
            if(DataPeserta::where('nik', $data)->exists()){

                // return redirect('/input-peserta')->with('FAIL', $data);
                return redirect('adminBerita/input-peserta')->with('FAIL', "Ada NIK yang sudah terdaftar. Mohon dipastikan tidak ada nik yang sudah terdaftar pada Daftar Kelas(Peserta)");

            }
            //jika nik yang ingin didaftarkan merupakan anggota umat
            else if(Umat::where('umat_ktp',$data)->exists()){
                $niks[] = [
                    'nik' => $data
                ];
            }
            //jika nik tidak ada di table umat
            else{
                return redirect('adminBerita/input-peserta')->with('FAIL', "NIK tidak terdaftar");
            }

            

        }
        // dd($niks);

        $member->peserta()->createMany($niks);


        return redirect('adminBerita/daftar-subacara')->with('SUCCESS', 'Peserta Telah Ditambahkan');
    }





    public function delete(Request $deleteButton){
        $id = $deleteButton->dataId;
        // $idDeleted = $request->input('dataId');
        //menyertakan %id kedalam transaction callback

        // DB::transaction(function() use ($id){
        //     //peserta = nama fungsi relasi dari kelas > peserta
        //     $acara = Acara::find($id);
        //     foreach($acara->kelas as $kelas){
        //         $kelas->peserta()->delete();
        //     }

        //     $acara->kelas()->delete();
        //     $acara->delete();
        // });
        DB::table('list_peserta')->where('list_peserta_id',$id)->delete();

        // dd($delete);
        return redirect('adminBerita/daftar-subacara')->with('SUCCESS', ' Peserta Berhasil Di Hapus ');
    }


    public function getDaftarPesertaKelas(Request $request){
        $idPilihKelas = $request->kelas_acara_id;
        $kelas = \App\Berita\KelasAcara::where('kelas_acara_id' , $idPilihKelas)->first();
        return view('adminBerita/daftar-peserta', [
            'kelas' => $kelas
        ]);
    }

    //Untuk Daftar Peserta
    public function getForDaftarPeserta(){
        $daftar = \App\Berita\KelasAcara::all();

    return view('adminBerita/daftar-peserta')->with('fromDaftarPeserta', $daftar);
    }

    //Untuk Data Peserta Kelas
    // public function getForDataPesertaKelas(Request $request){
    //     $nikDipilih = $request->nik;

        

    //     return view('data-peserta')->with('fromDataPesertaKelas', $nikDipilih);
    // }
}
