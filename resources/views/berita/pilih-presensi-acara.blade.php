@extends('layout.app')


@section('content')		
{!! Form::open(['url' => '/pilih-presensi-acara/presensi']) !!}
<div>
	<h1>Daftar Acara</h1>

		@foreach($fromAcara as $acara)
			<ul>
				<li class="list-group-item">Nama Acara       : {{$acara->acara_nama}}</li>
				<li class="list-group-item">Deskripsi Acara  : {{$acara->acara_deskripsi}}</li>		
			</ul>
		@endforeach

</div>
	<div>
		<h1>Pilih Kelas Acara</h1>
		<p class="text-center">Nama Acara - Nama Kelas</p>
		<select name="idKelasAcara" class="form-control">
			@foreach($fromAcara as $acara)
				@foreach($fromKelasAcara as $kelasAcara)
					@if($acara->acara_id === $kelasAcara->acara_id)
						<option value="{{$kelasAcara->kelas_acara_id}}">
							{{$acara->acara_nama}} - {{$kelasAcara->kelas_nama}}
						</option>
					@endif
				@endforeach
			@endforeach
		</select>


			
		<br>
		{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
		<!-- <button class="btn btn-primary">Submit</button> -->
		{!! Form::close() !!}
	</div>



@endsection