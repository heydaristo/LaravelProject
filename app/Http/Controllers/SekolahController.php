<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sekolah;

class SekolahController extends Controller
{
    public function index()
    {
        return view('sekolahs.index', [
        'sekolahs' => sekolah::get()
        ]);
    }
    public function create() {
        return view('sekolahs.create');
    }
    function store(Request $request) {
        $sekolah = new Sekolah();

        $sekolah->nama_sekolah = $request->nama_sekolah;
        $sekolah->alamat = $request->alamat;
        $sekolah->jurusan = $request->jurusan;
        $sekolah->jumlah_guru = $request->jumlah_guru;

        $sekolah->save();

        return view('sekolahs.index', [
            'sekolahs' => sekolah::get()
            ]);
        // return redirect()->back();
    }
}
