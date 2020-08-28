@extends('layout.app')

@section('content')
{!! Form::open(['url' => 'daftar-subacara/delete']) !!}
	<h1>Sub-Acara</h1>
	@if(count($fromAcara) > 0)
		@foreach($fromAcara as $acara)
			@foreach($subacaras as $class)
				@if($acara->acara_id == $class->acara_id)
					<ul>
						<li class="list-group-item">Nama Acara: {{$acara->acara_nama}}</li>
						<li class="list-group-item">Nama Kelas:<a href="{{ route('peserta.kelas',['kelas_acara_id' => $class->kelas_acara_id]) }}">{{$class->kelas_nama}}</a> </li>

						<li class="list-group-item">
							<a href="/acaras/subacaras/delete"><button name="dataId" value="{{$class->kelas_acara_id}}" class="btn btn-secondary">Hapus</button></a>

							
						</li>

						
					</ul>
				@endif
			@endforeach
		@endforeach	
	@endif
{!! Form::close() !!}
@endsection