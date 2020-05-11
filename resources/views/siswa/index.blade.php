@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Siswa
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">
                        Tambah Data Siswa
                    </button>
                </div>
                <div class="card-body">
                    @if (session('sukses'))
                    <div class="alert alert-success" role="alert">
                        {{session('sukses')}}
                    </div>
                    @endif
                    <table class="table table-hover">
                        <tr>
                            <th>NAMA DEPAN</th>
                            <th>NAMA BELAKANG</th>
                            <th>JENIS KELAMIN</th>
                            <th>ALAMAT</th>
                            <th>AKSI</th>
                        </tr>
                        @foreach($data_siswa as $siswa)
                        <tr>
                            <td>{{$siswa->nama_depan}}</td>
                            <td>{{$siswa->nama_belakang}}</td>
                            <td>{{$siswa->jenis_kelamin}}</td>
                            <td>{{$siswa->alamat}}</td>
                            <td>
                                <a href="/siswa/{{$siswa->id}}/edit" class="btn-warning btn-sm">Perbaharui</a>
                                <a href="/siswa/{{$siswa->id}}/delete" class="btn-danger btn-sm" onclick="return confirm('Anda yakin?')">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </table> 
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Data Siswa Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="/siswa/create" method="POST">
        {{ csrf_field()}}<!-- @crsf -->
        <div class="modal-body">
            <div class="form-group">
                <label for="nama_depan">Nama Depan</label>
                <input name="nama_depan" type="text" class="form-control" id="inputNamaDepan" placeholder="Nama Depan">
            </div>
            <div class="form-group">
                <label for="nama_depan">Nama Belakang</label>
                <input name="nama_belakang" type="text" class="form-control" id="inputNamaBelakang" placeholder="Nama Belakang">
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" id="inputJenisKelamin">
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
                </select>
                <div class="invalid-feedback">Example invalid custom select feedback</div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" class="form-control" id="inputAlamat" rows="3"></textarea>
            </div>      
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
    </div>
</div>
@endsection