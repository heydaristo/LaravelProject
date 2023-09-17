@extends('home')
@section('student')

@php
  $title= "Edit Data Sekolah";
  $preTitle= "Admin Page";
@endphp

@push('page-action')
    <a href="{{ route('admin.view') }}" class="btn btn-primary">Kembali</a>
@endpush


<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.update', $sekolahs->id) }}" method="post">
            @csrf
            @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama Sekolah</label>
            <input type="text" name="nama_sekolah" class="form-control" placeholder="Masukkan Nama" value="{{ $sekolahs->nama_sekolah }}" >
          </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" value="{{ $sekolahs->alamat }}">
          </div>
        <div class="mb-3">
            <label class="form-label">Jurusan</label>
            <input type="text" name="jurusan" class="form-control" placeholder="Masukan Jurusan" value="{{ $sekolahs->jurusan }}">
          </div>
        <div class="mb-3">
            <label class="form-label">Jumlah Guru</label>
            <input type="text" name="jumlah_guru" class="form-control" placeholder="Masukan Jumlah Guru" value="{{ $sekolahs->jumlah_guru }}">
          </div>
        <div class="mb-3">
            <input type="submit" value="Simpan" class="btn btn-primary">
        </div>
    </form>
    </div>
</div>

@endsection
