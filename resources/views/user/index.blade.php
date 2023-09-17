@extends('home')
@section('student')

@php
  $title= "User Page";
  $preTitle= "Semua Data Sekolah";
@endphp


<h1 class="text-center">User</h1>
<p class="text-center">Selamat Datang {{ Auth::user()->name }}, anda login sebagai {{ Auth::user()->role }}</p>

<form action="{{ route('admin.view') }}">
  <div class="input-group mt-3">
    <input type="text" class="form-control" placeholder="Cari..." name="search">
    <div class="input-group-prepend ms-2">
      <button class="btn btn-primary" type="submit">Search</button> <!-- Ganti dengan ikon yang sesuai -->
      </button>
    </div>
  </div>
</form>   
<div class="card mt-3">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th>Nama Sekolah</th>
            <th>Alamat</th>
            <th>Jurusan</th>
            <th>Jumlah Guru</th>
            <th class="w-1"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach ($sekolahs as $sekolah)
            
            <td>{{ $sekolah -> nama_sekolah }}</td>
            <td>{{ $sekolah -> alamat }}</td>
            <td>{{ $sekolah -> jurusan }}</td>
            <td>{{ $sekolah -> jumlah_guru }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-end mt-2">
        {{-- {{ $sekolahs->links('pagination::bootstrap-5') }} --}}
        {{-- {{ $sekolahs->appends(['query' => $query])->links('pagination::bootstrap-5') }} --}}
        {!! $sekolahs->appends(Request::except('page'))->links('pagination::bootstrap-5') !!}
    </div>
    </div>
  </div>

@endsection