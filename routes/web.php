<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/absen', [AbsenController::class, 'index'])->name("absen");
    Route::get('/absen/{id}', [AbsenController::class, 'update'])->name("absen.update");
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get("/sulog", function () {
        $user = Auth::user();
        echo "Wah anda sudah login dan terverifikasi, Halo " . $user->name;
    });

    Route::get("/manage/dokter", [AdminController::class, 'indexDokter'])->name('user.dokter');
    Route::get("/manage/dokter/create", [AdminController::class, 'createDokter'])->name('tambah.dokter');
    Route::post("/manage/dokter", [AdminController::class, 'storeDokter']);
    Route::get("/manage/dokter/{id}", [AdminController::class, 'editDokter'])->name('edit.dokter');
    Route::put("/manage/dokter/{id}", [AdminController::class, 'updateDokter'])->name('update.dokter');
    Route::delete("/manage/dokter/{id}", [AdminController::class, 'destroyDokter'])->name('destroy.dokter');

    Route::get("/manage/pasien", [AdminController::class, 'manageUserPasien'])->name('user.pasien');
});


require __DIR__ . '/auth.php';
