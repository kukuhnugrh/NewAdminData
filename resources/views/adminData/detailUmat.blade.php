@extends('layouts/master')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script src="../assets/js/page/bootstrap-modal.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

@section('content')
<section class="section">
    <div class="section-header">
        <div class="col-6">
            <h1 class="mt-2">Detail Umat</h1>
        </div>
        <div class="col-6">
            <button type="button" class="btn btn-primary trigger--fire-modal float-right" data-toggle="modal" data-target="#exampleModalCenter">Edit</button>
            
        </div>
    </div>
    <div class="section-body">
        <div class="top-body">
            <div class="row">
                <div class="col-6">
                    <div class="card border-danger">
                        <div class="card-body">
                            <h5 class="card-title">Informasi Pribadi</h5>
                            @foreach( $umat_nama as $dup )                                    <div class="row">
                                <div class="col-4 w-25">Nama Lengkap </div>
                                    <li class="list-group col-4">: {{ $dup->umat_nama}}</li>
                                </div>
                                <div class="row">
                                    <div class="col-4 w-25">NIK </div>
                                    <li class="list-group">: {{ $dup->umat_ktp}}</li>
                                </div>
                                <div class="row">
                                    <div class="col-4 w-25">Nomor KK </div>
                                    <li class="list-group">: {{ $dup->umat_kk}}</li>
                                </div>
                                <div class="row">
                                    <div class="col-4 w-25">Tempat Tanggal Lahir </div>
                                    <li class="list-group">: {{ $dup->umat_tempat_lahir}}, {{ $dup->umat_tanggal_lahir}}</li>
                                </div>
                                <div class="row">
                                    <div class="col-4 w-25">Status Nikah </div>
                                    <li class="list-group">: {{ $dup->status_nikah_nama}}</li>
                                </div>
                                <div class="row">
                                    <div class="col-4 w-25">Hubungan Keluarga </div>
                                    <li class="list-group">: {{ $dup->hubungan_keluarga_nama}}</li>
                                </div>
                                <div class="row">
                                    <div class="col-4 w-25">Status Rumah</div>
                                    <li class="list-group">: {{ $dup->status_rumah_nama}}</li>
                                </div>
                                <div class="row">
                                    <div class="col-4 w-25">Pendidikan</div>
                                    <li class="list-group">: {{ $dup->pendidikan_nama}}</li>
                                </div>
                                <div class="row">
                                    <div class="col-4 w-25">Golongan Darah </div>
                                    <li class="list-group">: {{ $dup->golongan_darah_nama}}</li>
                                </div> 
                                @if($dup->umat_jenis_kelamin === 1)
                                    <div class="row">
                                        <div class="col-4 w-25">Jenis Kelamin </div>
                                        <li class="list-group">: Perempuan</li>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-4 w-25">Jenis Kelamin </div>
                                        <li class="list-group">: Laki-laki</li>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-4 w-25">Alamat</div>
                                    <li class="list-group">: {{ $dup->umat_alamat}}</li>
                                </div>
                                <div class="row">
                                    <div class="col-4 w-25">Kabupaten/Kota</div>
                                    <li class="list-group">: {{ $dup->umat_kota_kab}}</li>
                                </div>
                                <div class="row">
                                    <div class="col-4 w-25">Kecamatan</div>
                                    <li class="list-group">: {{ $dup->umat_kecamatan}}</li>
                                </div>
                                <div class="row">
                                    <div class="col-4 w-25">Kelurahan</div>
                                    <li class="list-group">: {{ $dup->umat_kelurahan}}</li>
                                </div>
                                <div class="row">
                                    <div class="col-4 w-25">Nomor Telepon</div>
                                    <li class="list-group">: {{ $dup->umat_handphone}}</li>
                                </div>
                                <div class="row">
                                    <div class="col-4 w-25">Email</div>
                                    <li class="list-group">: {{ $dup->umat_email}}</li>
                                </div>
                                <div class="row">
                                    <div class="col-4 w-25">Jurusan</div>
                                    <li class="list-group">: {{ $dup->umat_jurusan}}</li>
                                </div>
                                <div class="row">
                                    <div class="col-4 w-25">Profesi</div>
                                    <li class="list-group">: {{ $dup->profesi_nama}}</li>
                                </div>
                                <div class="row">
                                    <div class="col-4 w-25">Pekerjaan</div>
                                    <li class="list-group">: {{ $dup->pekerjaan_nama}}</li>
                                </div>
                                <div class="row">
                                    <div class="col-4 w-25">Keterampilan</div>
                                    <li class="list-group">: {{ $dup->umat_keterampilan}}</li>
                                </div>
                                <div class="row">
                                    <div class="col-4 w-25">Status Aktivitas Sosial</div>
                                    <li class="list-group">: {{ $dup->status_aktivitas_sosial_nama}}</li>
                                </div>
                                <div class="row">
                                    <div class="col-4 w-25">Disabilitas</div>
                                    <li class="list-group">: {{ $dup->tuna_nama}}</li>
                                </div>
                                <div class="row">
                                    <div class="col-4 w-25">Penghasilan</div>
                                    <li class="list-group">: {{ $dup->penghasilan}}</li>
                                </div>
                                <div class="row">
                                    <div class="col-4 w-25">Narasi</div>
                                    <li class="list-group">: {{ $dup->narasi}}</li>       
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card border-danger">
                        <div class="card-body">
                            <h5 class="card-title">Informasi Gerejawi</h5>
                                @foreach( $umat_nama as $dup )
                                    <div class="row">
                                        <div class="col-4 w-25">Nama Baptis</div>
                                        <li class="list-group">: {{ $dup->umat_nama_baptis}}</li>
                                        </div>
                                        <div class="row">
                                        <div class="col-4 w-25">Nomor Buku Baptis</div>
                                        <li class="list-group">: {{ $dup->umat_buku_baptis}}</li>
                                        </div>
                                        <div class="row">
                                        <div class="col-4 w-25">Nomor Baptis</div>
                                        <li class="list-group">: {{ $dup->umat_nomer_baptis}}</li>
                                        </div>
                                        <div class="row">
                                        <div class="col-4 w-25">Keuskupan Baptis</div>
                                        <li class="list-group">: {{ $dup->keuskupan_nama}}</li>
                                        </div>
                                        <div class="row">
                                        <div class="col-4 w-25">Paroki Baptis</div>
                                        <li class="list-group">: {{ $dup->paroki_nama}}</li>
                                        </div>
                                        <div class="row">
                                        <div class="col-4 w-25">Suku</div>
                                        <li class="list-group">: {{ $dup->suku_nama}}</li>
                                        </div>
                                        <div class="row">
                                        <div class="col-4 w-25">Status Ekonomi</div>
                                        <li class="list-group">: {{ $dup->status_ekonomi_nama}}</li>
                                        </div>
                                        <div class="row">
                                        <div class="col-4 w-25">Agama</div>
                                        <li class="list-group">: {{ $dup->agama_nama}}</li>
                                        </div>
                                        <div class="row">
                                        <div class="col-4 w-25">Kevikepan</div>
                                        <li class="list-group">: {{ $dup->kevikepan_nama}}</li>
                                        </div>
                                        <div class="row">
                                        <div class="col-4 w-25">Paroki</div>
                                        <li class="list-group">: {{ $dup->paroki_nama}}</li>
                                        </div>
                                        <div class="row">
                                        <div class="col-4 w-25">Wilayah</div>
                                        <li class="list-group">: {{ $dup->wilayah_nama}}</li>
                                        </div>
                                        <div class="row">
                                        <div class="col-4 w-25">Lingkungan</div>
                                        <li class="list-group">: {{ $dup->lingkungan_nama}}</li>
                                        </div>
                                        @if($dup->umat_meninggal === 1)
                                        <div class="row">
                                            <div class="col-4 w-25">Status Meninggal</div>
                                            <li class="list-group">: Meninggal</li>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-4 w-25">Status Meninggal</div>
                                            <li class="list-group">: Meninggal</li>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                    <div class="card border-light"></div>
                    <div class="card border-light"></div>
                    <div class="card border-light"></div>
                    <div class="card border-light"></div>
                    <div class="card border-light"></div>
                    <div class="card border-light"></div>
                    <div class="card border-danger">
                    <div class="card-body">
                        <h5 class="card-title">Berkas Bukti</h5>
                            <div class="row">
                                <div class="col-4 w-25">Tanggal Update</div>
                                <li class="list-group">: {{ $dup->tgl_update}}</li>
                            </div>
                        <!-- <a href=""  name="Upload" id=""><button type="button" class="btn btn-danger">Upload</button></a>
                        <a href=""  name="Upload" id=""><button type="button" class="btn btn-danger">Upload</button></a>
                        <a href=""  name="Upload" id=""><button  type="button" class="btn btn-danger">Upload</button></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-2">
        
    </div>
</section>
@endsection
<form>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Umat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Informasi Pribadi</h5>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">NIK</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nomor KK</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tempat Tanggal Lahir</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Status Menikah</label>
                    <select class="form-control">
                        @foreach( $umat_nama as $dup )
                            <option value="{{ $dup->status_nikah_nama }}">{{ $dup->status_nikah_nama }}</option>
                        @endforeach
                        @foreach( $semua_umat as $sul )
                            <option value="{{ $sul->status_nikah_nama }}">{{ $sul->status_nikah_nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Hubungan Keluarga</label>
                    <select class="form-control">
                        @foreach( $umat_nama as $dup )
                            <option value="{{ $dup->hubungan_keluarga_nama }}">{{ $dup->hubungan_keluarga_nama }}</option>
                        @endforeach
                        @foreach( $semua_umat as $sul )
                            <option value="{{ $sul->hubungan_keluarga_nama }}">{{ $sul->hubungan_keluarga_nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</form>
<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>