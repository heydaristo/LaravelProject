<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sekolah;

class SekolahController extends Controller
{
    public function view()
    {
        return view('sekolahs.view', [
        'sekolahs' => sekolah::get()
        ]);
    }
    public function create() {
        return view('sekolahs.create');
    }
    public function index() {
        return view('sekolahs.index');
    }
    public function store(Request $request) {

        $request->validate([
            'nama_sekolah' => 'required',
            'alamat' => 'required',
            'jurusan' => 'required',
            'jumlah_guru' => 'required|numeric',
        ], [
            'nama_sekolah.required' => 'Nama sekolah wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'jurusan.required' => 'Jurusan wajib diisi.',
            'jumlah_guru.required' => 'Jumlah guru wajib diisi.',
            'jumlah_guru.numeric' => 'Jumlah guru harus berupa angka.'
        ]);
        $sekolah = new Sekolah();

        $sekolah->nama_sekolah = $request->nama_sekolah;
        $sekolah->alamat = $request->alamat;
        $sekolah->jurusan = $request->jurusan;
        $sekolah->jumlah_guru = $request->jumlah_guru;

        $sekolah->save();

        return redirect()->route('sekolahs.index');

        
    }   
    public function edit($id) {
        $sekolahs = sekolah::find($id);

        return view('sekolahs.edit', [
            'sekolahs' => $sekolahs, 
        ]);
    }
    public function update(Request $request, $id ) {
        $request->validate([
            'nama_sekolah' => 'required',
            'alamat' => 'required',
            'jurusan' => 'required',
            'jumlah_guru' => 'required|numeric',
        ], [
            'nama_sekolah.required' => 'Nama sekolah wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'jurusan.required' => 'Jurusan wajib diisi.',
            'jumlah_guru.required' => 'Jumlah guru wajib diisi.',
            'jumlah_guru.numeric' => 'Jumlah guru harus berupa angka.'
        ]);
        $sekolah = sekolah::find($id);  

        $sekolah->nama_sekolah = $request->nama_sekolah;
        $sekolah->alamat = $request->alamat;
        $sekolah->jurusan = $request->jurusan;
        $sekolah->jumlah_guru = $request->jumlah_guru;

        $sekolah->save();

        return redirect()->route('sekolahs.index');
        
        session()->flash('info', 'Data berhasil diperbarui.');

    }

    function destroy($id) {
        $sekolah = sekolah::find($id);

        $sekolah->delete();
        return redirect()->route('sekolahs.index');

        session()->flash('danger', 'Data berhasil dihapus.');
       


    }
}
