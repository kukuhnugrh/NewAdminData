@extends('layout.app')

@section('content')
	{!! Form::open(['url' => 'tambah-acara/submit']) !!}

	    <div class="form-group">
	    	{{Form::label('acara_nama', 'Nama Acara')}}
	    	{{Form::text('acara_nama', '', ['class' => 'form-control','placeholder' => ' Masukan Acara'])}}

	    	{{Form::label('acara_deskripsi', 'Deskripsi')}}
	    	{{Form::textarea('acara_deskripsi', '', ['class' => 'form-control','placeholder' => 'Masukan Deskripsi'])}}
	    </div>
    	<div>	
    		{{Form::submit('Add', ['class' => 'btn btn-primary'])}}
    	</div>
    	{!! Form::close() !!}
@endsection