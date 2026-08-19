<?php

use App\Http\Controllers\McuSessionController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Models\McuSession;
use App\Models\Patient;
use Illuminate\Support\Facades\Route;

// Halaman publik
Route::view('/', 'pages.beranda')->name('home');
Route::view('/layanan', 'pages.layanan')->name('page.layanan');
Route::view('/keunggulan', 'pages.keunggulan')->name('page.keunggulan');
Route::view('/alur', 'pages.alur')->name('page.alur');
Route::view('/kontak', 'pages.kontak')->name('page.kontak');

Route::get('/dashboard', function () {
    $totalPatients = Patient::count();
    $totalMcu      = McuSession::count();
    $fitCount      = McuSession::all()->filter(
        fn ($m) => str_contains($m->conclusions['work_fitness'] ?? '', 'Laik')
    )->count();

    return view('dashboard', compact('totalPatients', 'totalMcu', 'fitCount'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('patients', PatientController::class);

    Route::get('/patients/{patient}/mcu/create', [McuSessionController::class, 'create'])->name('mcu.create');
    Route::post('/patients/{patient}/mcu', [McuSessionController::class, 'store'])->name('mcu.store');
    Route::get('/patients/{patient}/mcu', [McuSessionController::class, 'index'])->name('mcu.index');
    Route::get('/mcu/{mcuSession}/edit', [McuSessionController::class, 'edit'])->name('mcu.edit');
    Route::get('/mcu/{mcuSession}', [McuSessionController::class, 'show'])->name('mcu.show');
    Route::put('/mcu/{mcuSession}', [McuSessionController::class, 'update'])->name('mcu.update');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';