<x-app-layout>
    <div class="space-y-6">

        <div class="flex flex-wrap items-end justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Selamat datang, {{ Auth::user()->name }}</h2>
                <p class="text-sm text-slate-500 mt-1">Ringkasan aktivitas Medical Check-Up klinik.</p>
            </div>
            <a href="{{ route('patients.create') }}" class="bg-sky-600 hover:bg-sky-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl">
                <i class="fa-solid fa-user-plus mr-1"></i> Daftarkan Pasien Baru
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="bg-white rounded-2xl border border-slate-200 p-5 flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center text-xl"><i class="fa-solid fa-user-group"></i></div>
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase">Total Pasien</p>
                    <p class="text-2xl font-extrabold text-slate-900">{{ $totalPatients }}</p>
                </div>
            </div>
            <div class="bg-white rounded-2xl border border-slate-200 p-5 flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-red-50 text-red-600 flex items-center justify-center text-xl"><i class="fa-solid fa-stethoscope"></i></div>
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase">Total MCU</p>
                    <p class="text-2xl font-extrabold text-slate-900">{{ $totalMcu }}</p>
                </div>
            </div>
            <div class="bg-white rounded-2xl border border-slate-200 p-5 flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-green-50 text-green-600 flex items-center justify-center text-xl"><i class="fa-solid fa-circle-check"></i></div>
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase">Kesimpulan Laik</p>
                    <p class="text-2xl font-extrabold text-slate-900">{{ $fitCount }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 p-6">
            <h3 class="font-bold text-slate-900">Mulai Pekerjaan</h3>
            <p class="text-sm text-slate-500 mt-1">
                Alur kerja: daftarkan pasien, isi form MCU per seksi, lalu cetak laporan PDF resmi.
            </p>
            <div class="mt-4 flex flex-wrap gap-3 text-sm">
                <a href="{{ route('patients.index') }}" class="border border-slate-200 rounded-xl px-4 py-2 font-semibold text-slate-700 hover:border-sky-500 hover:text-sky-700">
                    <i class="fa-solid fa-users mr-1"></i> Data Pasien
                </a>
                <a href="{{ route('patients.create') }}" class="border border-slate-200 rounded-xl px-4 py-2 font-semibold text-slate-700 hover:border-sky-500 hover:text-sky-700">
                    <i class="fa-solid fa-user-plus mr-1"></i> Tambah Pasien
                </a>
            </div>
        </div>

    </div>
</x-app-layout>