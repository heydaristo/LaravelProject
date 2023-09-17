@extends('home')
@section('student')

@php
  $title= "Selamat Datang";
  $preTitle= "Admin Page";
@endphp


<center>
  <h1>Sekolah</h1>
  <p>Selamat Datang {{ Auth::user()->name }}, anda login sebagai {{ Auth::user()->role }}</p>
<div class="container">
    <a href="{{ route('admin.create') }}" class="btn btn-primary">Kirim Data</a>
    <a href="{{ route('admin.view') }}" class="btn btn-primary">Lihat Data</a>
  </div>
</center>

@endsection