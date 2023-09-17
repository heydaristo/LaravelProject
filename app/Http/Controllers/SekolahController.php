<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sekolah;

class SekolahController extends Controller
{
    public function view(Request $request)
    {
        $query = sekolah::query();
        // $sekolahs = sekolah::latest()->sortable()->paginate(3)->onEachSide(2)->fragment('sekolahs');

        if(request('search')) {
            $sekolahs = Sekolah::where('nama_sekolah', 'LIKE', '%' . request('search') . '%')
            ->orWhere('alamat', 'LIKE', '%' . request('search') . '%')
            ->orWhere('jurusan', 'LIKE', '%' . request('search') . '%')
            ->orWhere('jumlah_guru', 'LIKE', '%' . request('search') . '%');
        } else if ($request->has('sort')) {
            $sortField = $request->input('sort');
            $sortDirection = $request->input('direction', 'asc');
            $query->orderBy($sortField, $sortDirection);
        }
        $sekolahs = $query->paginate(5)->oneachSide(2)->fragment('sekolah');

        return view('user.index', ['sekolahs' => $sekolahs]);

        // return view('user.index', [
        // 'sekolahs' => Sekolah::get()
        // ]);
    }
    public function create() {
        return view('user.create');
    }
    public function index() {
        return view('user.index');
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('/');

    }
}
