@extends('layout.app')

@section('content')
{!! Form::open(['url' => '/delete']) !!}

	<h1>Acara</h1>
	@if(count($acaras) > 0)
		@foreach($acaras as $acara)
			<ul>
				<li class="list-group-item">Nama Acara       : {{$acara->acara_nama}}</li>
				<li class="list-group-item">Deskripsi Acara  : {{$acara->acara_deskripsi}}</li>
				<li class="list-group-item"><a href="/acaras/delete"><button name="dataId" value="{{$acara->acara_id}}" class="btn btn-secondary">Hapus</button></a></li>
				<!-- {{Form::submit('Delete', ['class' => 'btn btn-secondary'])}} -->
			</ul>
		@endforeach
	@endif

	@if(count($acaras) == 0)
	<p>Tidak ada acara</p>
	@endif


{!! Form::close() !!}
@endsection