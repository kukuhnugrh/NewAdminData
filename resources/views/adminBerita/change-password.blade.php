@extends('layout.app')

@section('content')
{!! Form:: open(['url' => '/change-password/submit']) !!}

	{{Form::label('oldPassword', 'Old Password')}}
   	{{Form::password('oldPassword', ['class' => 'form-control','placeholder' => 'Masukan Password Lama']) }}

	{{Form::label('newPassword', 'New Password')}}
   	{{Form::password('newPassword', ['class' => 'form-control','placeholder' => 'Masukan Password Baru']) }}  
   	{{Form::submit('Submit', ['class' => 'btn btn-primary'])}} 	





{!! Form::close() !!}
@endsection