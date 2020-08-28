@extends('layout.app')

@section('content')

	<h1>Data Peserta</h1>
			<strong><p>NIK: {{$detailPeserta->umat_ktp}}</p></strong>
			<!-- <strong><p>NIK: {{$cekTerdaftar->nik}}</p></strong> -->
			<ul> 
				<li>Nama    	  : {{$detailPeserta->umat_nama}}</li>
				<li>Tanggal Lahir : {{$detailPeserta->umat_tanggal_lahir}}</li>
				<li>Usia		  : {{$detailPeserta->umat_umur}}</li>
				<li>Wilayah		  : {{$detailPeserta->wilayah->wilayah_nama}}</li>
				<li>Lingkungan    : {{$detailPeserta->lingkungan->lingkungan_nama}}</li>
			</ul>
@endsection