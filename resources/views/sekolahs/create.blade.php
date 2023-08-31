@extends('home')
@section('student')

<div class="card">
    <div class="card-body">
        <form action="/sekolahs" method="post">
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
