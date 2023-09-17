@extends('home')
@section('student')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@php
  $title= "Masukan data sekolah";
  $preTitle= "Admin Page";
@endphp

@push('page-action')
    <a href="{{ route('admin.index') }}" class="btn btn-primary">Kembali</a>
@endpush

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.store') }}" method="post">
            @csrf
        <div class="mb-3">
            <label class="form-label">Nama Sekolah</label>
            <input type="text" name="nama_sekolah" class="form-control" placeholder="Masukkan Nama">
          </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat">
          </div>
        <div class="mb-3">
            <label class="form-label">Jurusan</label>
            <input type="text" name="jurusan" class="form-control" placeholder="Masukan Jurusan">
          </div>
        <div class="mb-3">
            <label class="form-label">Jumlah Guru</label>
            <input type="text" name="jumlah_guru" class="form-control" placeholder="Masukan Jumlah Guru">
          </div>
        <div class="mb-3">
            <input type="submit" value="Simpan" class="btn btn-primary">
        </div>
    </form>
    </div>
</div>

@endsection
