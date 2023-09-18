<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sekolah;

class AdminController extends Controller
{

    public function view(Request $request)
    {
        $search = $request->query('search');

        if(empty($cari)) {
            $Sekolah = sekolah::sortable()
            ->where('sekolahs.nama_sekolah', 'LIKE', '%' . $search . '%')
            ->orWhere('sekolahs.alamat', 'LIKE', '%' . $search . '%')
            ->orWhere('sekolahs.jurusan', 'LIKE', '%' . $search . '%')
            ->orWhere('sekolahs.jumlah_guru', 'LIKE', '%' . $search . '%')
            ->paginate(5)->oneachSide(2)->fragment('sekolah');
        } else {
            $Sekolah = sekolah::sortable()->paginate(5)->oneachSide(2)->fragment('sekolah');
        }

        return view('admin.view',)->with([
            'sekolahs' => $Sekolah,
            'search' => $search,
        ]);

    }
    public function create() {
        return view('admin.create');
    }
    public function index() {
        return view('admin.index');
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

        return redirect()->route('admin.index');

        
    }   
    public function edit($id) {
        $sekolahs = sekolah::find($id);

        return view('admin.edit', [
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

        return redirect()->route('admin.index');
        
        session()->flash('info', 'Data berhasil diperbarui.');

    }

    function destroy($id) {
        $sekolah = sekolah::find($id);

        $sekolah->delete();
        return redirect()->route('admin.index');

        session()->flash('danger', 'Data berhasil dihapus.');
       
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('/');

    }
}