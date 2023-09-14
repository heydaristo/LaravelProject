<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SekolahController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

// Route::get('/sekolahs', function () {
//     return view('sekolahs.index', [
//         'sekolahs' => sekolah::get()
//     ]);
// });

Route::get('/siswa/view', [SekolahController::class, 'view'])->name('sekolahs.view');
Route::get('/siswa', [SekolahController::class, 'index'])->name('sekolahs.index');
Route::get('/siswa/create', [SekolahController::class, 'create'])->name('sekolahs.create');
Route::post('/siswa', [SekolahController::class, 'store'])->name('sekolahs.store');
Route::get('/siswa/{id}/edit', [SekolahController::class, 'edit'])->name('sekolahs.edit');
Route::put('/siswa/{id}', [SekolahController::class, 'update'])->name('sekolahs.update');
Route::delete('/siswa/{id}', [SekolahController::class, 'destroy'])->name('sekolahs.destroy');

Route::prefix('author')->name('author.')->group(function(){
    Route::middleware(['guest:web'])->group(function(){
        Route::view('/login', 'back.pages.auth.login')->name('login');
        Route::view('/forgot-password', 'back.pages.auth.forgot')->name('forgot-password');
    });
});
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/home', [ProfileController::class, 'edit'])->name('home');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
?>