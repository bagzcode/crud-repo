@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">    
        <div class="col-12">
        <h1>Perbahurui Data Siswa</h1>
        <form action="/siswa/{{$siswa->id}}/update" method="POST">
            {{ csrf_field()}}
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama_depan">Nama Depan</label>
                    <input name="nama_depan" type="text" class="form-control" id="inputNamaDepan" placeholder="Nama Depan" value="{{$siswa->nama_depan}}">
                </div>
                <div class="form-group">
                    <label for="nama_depan">Nama Belakang</label>
                    <input name="nama_belakang" type="text" class="form-control" id="inputNamaBelakang" placeholder="Nama Belakang" value="{{$siswa->nama_belakang}}">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" id="inputJenisKelamin">
                    <option value="L" @if($siswa->jenis_kelamin == "L") selected @endif>Laki-laki</option>
                    <option value="P" @if($siswa->jenis_kelamin == "P") selected @endif>Perempuan</option>
                    </select>
                    <div class="invalid-feedback">Example invalid custom select feedback</div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control" id="inputAlamat" rows="3">{{$siswa->alamat}}</textarea>
                    </div>      
                </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning">Perbaharui</button>
            </div>
        </form>
        </div>    
    </div>
</div>    
@endsection
