@extends('layout.app')

@section('content')
{!! Form::open(['url' => '/daftar-peserta/delete']) !!}
		<div>
			<!-- <a href="{{action('PresensiController@downloadPDF', $kelas->kelas_acara_id)}}">Download PDF</a> -->
				<ul>
					<li class="list-group-item"><strong>{{$kelas->kelas_nama}}</strong>
						<ol> Daftar Peserta
							@foreach($kelas->peserta as $peserta)
								<a href="{{ route('datapeserta.kelas',['nik' => $peserta->nik]) }}"><li  id="nik"> {{$peserta->nik}}</a> <a href="daftar-peserta/delete"><button name="dataId" value="{{$peserta->list_peserta_id}}" class="btn btn-secondary btn-sm">Hapus</button></li></a>	
								<br>
							@endforeach
						</ol>
					</li>
				</ul>
		</div>
{!! Form::close() !!}
@endsection