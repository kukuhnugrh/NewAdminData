<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table, th, td{
			border: 1px solid black;
			margin-left: auto;
			margin-right: auto;
			
		}

		h2, h3{
			text-align: center !important;
		}
		p{
			size:12px;
			color:black;
		}
		h1{
			text-align: center;
		}
		#container {
			width: 100px;
			height: 50px;

		}
		#container img{
			width: 100%;
			height: auto;
		}
		#border{
			height: auto;
			width: auto;
			
		}
		#latar{
			background: grey;
		}
		#isi{
			color:white;
		}
		#tengah{
			background: #87EEB4;
		}
		#center{
			text-align: center;
		}
	</style>
</head>
<div id="latar">
<body>
		<div id="container">
			<img src="/storage/logo2.png">
		</div>
		
		<h1 id="isi">PRESENSI</h1>
		<h2 id="isi">{{$namaKelas->kelas_nama}}</h2>
<div id="tengah">
	<table>
		<tr>
			<th>NIK</th>
			<th>Nama</th>
			<th>Lingkungan</th>
			<th>Waktu Datang</th>
			<th>Waktu Pulang</th>
		</tr>
		@foreach($datas as $pesertaAcara)
		<tr>

			<td><strong>{{$pesertaAcara->nik}}</strong></td>
			<td> {{$pesertaAcara->umats->umat_nama}}</td>
			<td>{{$pesertaAcara->umats->lingkungan->lingkungan_nama}}</td>
			@foreach($datasTerscan as $terscan)
				@if($pesertaAcara->nik == $terscan->nik)
					<td>{{$terscan->scan_datang}}</td>
					<td>{{$terscan->scan_pulang}}</td>
				@endif
			@endforeach
		</tr>
		@endforeach
	</table>
</div>
	<div id="border">
		<p id="isi center">Total Peserta Terpresensi: {{$totalTerscan}} dari {{$totalPeserta}}</p>		
		<p id="isi center" >Total Peserta Tidak Hadir: {{$totalAbsen}}</p>
	
		


	

		
		


</body>
</div>
</div>	
</html>
	

<!-- 				@foreach($datasTerscan as $terscan)
				@if($terscan->nik == $pesertaAcara->nik)
					<td>{{$pesertaAcara->kelasacara->umatterscan->scan_datang}}</td>
					<td>{{$pesertaAcara->kelasacara->umatterscan->scan_pulang}}</td>
				@endif
			@endforeach -->