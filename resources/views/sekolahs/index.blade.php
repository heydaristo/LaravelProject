@extends('home')
@section('student')

<center>
  <h1>Sekolah</h1>
<div class="container">
    <a href="{{ route('sekolahs.create') }}" class="btn btn-primary">Kirim Data</a>
    <a href="{{ route('sekolahs.view') }}" class="btn btn-primary">Lihat Data</a>
  </div>
</center>

@endsection