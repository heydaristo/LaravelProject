@extends('home')
@section('student')

@php
  $title= "Semua data sekolah";
  $preTitle= "Admin Page";
@endphp

@push('page-action')
<div class="btn-list">
  <a href="{{ route('admin.create') }}" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
    Tambah Baru
  </a>
  </div>

@endpush

<h1 class="text-center">Sekolah</h1>

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
            <th>No</th>
            {{-- <th>Nama Sekolah</th> --}}
            {{-- <td>{{ $sekolahs->firstItem() + $sekolahs }}</td> --}}
            <th>@sortablelink('nama_sekolah', 'Nama Sekolah')</th>
            <th>@sortablelink('alamat', 'Alamat')</th>
            <th>@sortablelink('jurusan', 'Jurusan')</th>
            <th>@sortablelink('jumlah_guru', 'Jumlah Guru')</th>
            <th class="w-1"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach ($sekolahs as $sekolah )
            @php
              $i = 1 + (($sekolahs->currentPage()-1) * $sekolahs->perPage());
            @endphp
            {{-- <th>{{ $sekolahs->firstItem() + $key }}</th> --}}
            <th>{{ $loop->iteration }}</th>
            <td>{{ $sekolah -> nama_sekolah }}</td>
            <td>{{ $sekolah -> alamat }}</td>
            <td>{{ $sekolah -> jurusan }}</td>
            <td>{{ $sekolah -> jumlah_guru }}</td>
            <td>
                <a href="{{ route('admin.edit', $sekolah->id) }}">Edit</a>
                <form action="{{ route('admin.destroy', $sekolah->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
                </form>
            </td>
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