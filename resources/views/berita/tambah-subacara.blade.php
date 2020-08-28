@extends('layout.app')

@section('content')
	{!! Form::open(['url' => '/tambah-subacara/submit']) !!}
		<div>
			<p>Pilih Acara</p>
			<select name="namaAcara" class="form-control">
				
				@foreach($acaras as $acara)
					<option value="{{$acara->acara_id}}">
						{{$acara->acara_nama}}
					</option>
				@endforeach
				
			</select>
		</div>
	    <div class="form-group">
	    	{{Form::label('kelas_nama', 'Nama Kelas')}}
	    	{{Form::text('kelas_nama', '', ['class' => 'form-control','placeholder' => ' Masukan Kelas'])}}
	    </div>
    	<div>
    		{{Form::submit('Add', ['class' => 'btn btn-primary'])}}
    	</div>

	{!! Form::close() !!}

@endsection