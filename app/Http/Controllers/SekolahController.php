<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sekolah;

class SekolahController extends Controller
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

        return view('user.index',)->with([
            'sekolahs' => $Sekolah,
            'search' => $search,
        ]);
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
