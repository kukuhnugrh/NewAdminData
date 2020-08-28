@extends('layout.app')

@section('content')
	<div>
		<ol class="form-controll">
			
			<h1>{{$dataKelas->kelas_nama}}</h1>
				<a href="{{action('PresensiController@downloadPDF', $dataKelas->kelas_acara_id)}}">Download Presensi.pdf</a>
		
				
			@foreach($presensis as $presensi)
				<li>NIK:<strong> {{$presensi->umats->umat_ktp}} </strong></li>
					<ul>
						<li><strong>Nama:        </strong> {{$presensi->umats->umat_nama}}</li>
						<li><strong>Waktu Datang:</strong> {{$presensi->scan_datang}}     </li>
						<li><strong>Waktu Datang:</strong> {{$presensi->scan_pulang}}     </li>
					</ul>
				<br>
			@endforeach
		</ol>
	</div>
@endsection
	