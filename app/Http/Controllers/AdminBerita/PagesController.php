<?php

namespace App\Http\Controllers\AdminBerita;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function getHome(){
    	return view('home');
    }
        public function getWelcome(){
        return view('welcome');
    }
        public function getAbout(){
    	return view('about');
    }
        public function getContact(){
    	return view('contact');
    }
        public function getTembahAcara(){
        return view('adminBerita/acara');
    }
        public function getSubacara(){
        return view('adminBerita/tambah-subacara');
    }
        public function getInputPeserta(){
        return view('adminBerita/input-peserta');
    }
        public function getDaftarPeserta(){
        return view('adminBerita/daftar-peserta');
    }
        public function getPilihPresensiAcara(){
        return view('adminBerita/pilih-presensi-acara');
    }
        public function getLogin(){
        return view('auth.login');
    }
        public function getChangePass(){
        return view('change-password');
    }


}
