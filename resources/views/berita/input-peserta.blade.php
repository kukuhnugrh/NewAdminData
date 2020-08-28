@extends('layout.app')

@section('content')
	{!! Form::open(['url' => 'input-peserta/submit']) !!}
		<div>
			<p>Pilih Kelas Acara</p>
				<select name="subAcaraId" class="form-control">
					
					@foreach($fromKelasAcara as $acara)
						<option value="{{$acara->kelas_acara_id}}">
							{{$acara->kelas_nama}}
						</option>
					@endforeach
					
				</select>
		</div>
	    <div class="form-group">
<!-- 	    	<label>NIK Peserta</label>
	    	<textarea name="nikPeserta" placeholder="Masukan NIK" class="form-control"></textarea> -->

	    	{{Form::label('nikPeserta', 'NIK')}}
	    	{{Form::textarea('nikPeserta', '', ['class' => 'form-control','placeholder' => ' Masukan NIK']) }}

	    </div>
    	<div>
    		{{Form::submit('Add', ['class' => 'btn btn-primary'])}}
    	</div>
    	{!! Form::close() !!}
@endsection