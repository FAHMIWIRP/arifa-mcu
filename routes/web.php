<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\McuSessionController;
use App\Http\Controllers\MitraController;
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
    $sessions = McuSession::with('patient')->get();

    $totalPatients = Patient::count();
    $totalMcu      = $sessions->count();
    $fitCount      = $sessions->filter(fn ($m) => str_contains($m->conclusions['work_fitness'] ?? '', 'Laik'))->count();
    $draftCount    = $sessions->where('status', 'draft')->count();

    $bulanId = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
    $months = [];
    foreach (range(5, 0) as $i) {
        $d = now()->subMonths($i);
        $months[] = [
            'label' => $bulanId[$d->month - 1],
            'count' => $sessions->filter(fn ($m) => $m->examination_date->format('Y-m') === $d->format('Y-m'))->count(),
        ];
    }
    $maxMonth = max(1, max(array_column($months, 'count')));

    $dist = collect(config('mcu.work_fitness_options'))->map(fn ($opt) => [
        'label' => $opt,
        'count' => $sessions->filter(fn ($m) => ($m->conclusions['work_fitness'] ?? '') === $opt)->count(),
    ])->values()->toArray();

    $recent = $sessions->sortByDesc('examination_date')->take(5)->values();
    $drafts = $sessions->where('status', 'draft')->values();

    return view('dashboard', compact(
        'totalPatients', 'totalMcu', 'fitCount', 'draftCount',
        'months', 'maxMonth', 'dist', 'recent', 'drafts'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('patients', PatientController::class);
    Route::resource('doctors', DoctorController::class)->only(['index', 'store']);
    Route::resource('mitras', MitraController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);
    Route::resource('galleries', GalleryController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);

    Route::get('/reports', [McuSessionController::class, 'reports'])->name('reports.index');

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