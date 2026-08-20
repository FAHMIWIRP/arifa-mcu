<x-app-layout>
@php
    $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    $n = now();
    $tanggal = $hari[$n->dayOfWeek] . ', ' . $n->day . ' ' . $bulan[$n->month - 1] . ' ' . $n->year;
    $colors = ['bg-green-500', 'bg-sky-500', 'bg-amber-500', 'bg-red-500'];
@endphp

<div class="space-y-6">

    {{-- Sambutan --}}
    <div class="flex flex-wrap items-end justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-900">Selamat datang, {{ Auth::user()->name }}</h2>
            <p class="text-sm text-slate-500 mt-1">{{ $tanggal }} — ringkasan aktivitas Medical Check-Up klinik.</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('reports.index') }}" class="border border-slate-200 bg-white rounded-xl px-4 py-2.5 text-sm font-semibold text-slate-700 hover:border-sky-500 hover:text-sky-700">
                <i class="fa-solid fa-folder-open mr-1"></i> Arsip Laporan
            </a>
            <a href="{{ route('patients.create') }}" class="bg-sky-600 hover:bg-sky-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl">
                <i class="fa-solid fa-user-plus mr-1"></i> Daftarkan Pasien Baru
            </a>
        </div>
    </div>

    {{-- Kartu statistik --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
        <div class="bg-white rounded-2xl border border-slate-200 border-l-4 border-l-sky-500 p-5 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center text-xl"><i class="fa-solid fa-user-group"></i></div>
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase">Total Pasien</p>
                <p class="text-2xl font-extrabold text-slate-900">{{ $totalPatients }}</p>
            </div>
        </div>
        <div class="bg-white rounded-2xl border border-slate-200 border-l-4 border-l-red-500 p-5 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-red-100 text-red-600 flex items-center justify-center text-xl"><i class="fa-solid fa-stethoscope"></i></div>
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase">Total MCU</p>
                <p class="text-2xl font-extrabold text-slate-900">{{ $totalMcu }}</p>
            </div>
        </div>
        <div class="bg-white rounded-2xl border border-slate-200 border-l-4 border-l-green-500 p-5 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-green-100 text-green-600 flex items-center justify-center text-xl"><i class="fa-solid fa-circle-check"></i></div>
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase">Kesimpulan Laik</p>
                <p class="text-2xl font-extrabold text-slate-900">{{ $fitCount }}</p>
            </div>
        </div>
        <div class="bg-white rounded-2xl border border-slate-200 border-l-4 border-l-amber-500 p-5 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center text-xl"><i class="fa-solid fa-file-pen"></i></div>
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase">Draft Berjalan</p>
                <p class="text-2xl font-extrabold text-slate-900">{{ $draftCount }}</p>
            </div>
        </div>
    </div>

    {{-- Grafik + distribusi + aksi cepat --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <div class="bg-white rounded-2xl border border-slate-200 p-6">
            <h3 class="font-bold text-slate-900">Volume MCU — 6 Bulan Terakhir</h3>
            <div class="mt-6 grid grid-cols-6 gap-3 items-end h-40">
                @foreach ($months as $m)
                    <div class="h-full flex flex-col items-center justify-end gap-1">
                        <span class="text-xs font-bold text-sky-700">{{ $m['count'] }}</span>
                        <div class="w-full max-w-[36px] rounded-t-md bg-sky-500" style="height: {{ max(4, round($m['count'] / $maxMonth * 100)) }}%"></div>
                        <span class="text-[11px] text-slate-500">{{ $m['label'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 p-6 space-y-4">
            <h3 class="font-bold text-slate-900">Distribusi Kesimpulan Kelayakan</h3>
            @foreach ($dist as $i => $d)
                <div>
                    <div class="flex justify-between text-xs font-semibold text-slate-600 mb-1">
                        <span>{{ \Illuminate\Support\Str::limit($d['label'], 42) }}</span>
                        <span>{{ $d['count'] }}</span>
                    </div>
                    <div class="h-2.5 rounded-full bg-slate-100">
                        <div class="h-2.5 rounded-full {{ $colors[$i] }}" style="width: {{ $totalMcu ? round($d['count'] / $totalMcu * 100) : 0 }}%"></div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 p-6">
            <h3 class="font-bold text-slate-900">Aksi Cepat</h3>
            <div class="mt-4 grid grid-cols-2 gap-3">
                <a href="{{ route('patients.create') }}" class="rounded-xl bg-sky-600 hover:bg-sky-700 text-white p-4 text-sm font-semibold text-center">
                    <i class="fa-solid fa-user-plus block text-xl mb-2"></i> Tambah Pasien
                </a>
                <a href="{{ route('patients.index') }}" class="rounded-xl bg-green-50 hover:bg-green-100 text-green-700 p-4 text-sm font-semibold text-center">
                    <i class="fa-solid fa-stethoscope block text-xl mb-2"></i> Input MCU
                </a>
                <a href="{{ route('reports.index') }}" class="rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 p-4 text-sm font-semibold text-center">
                    <i class="fa-solid fa-folder-open block text-xl mb-2"></i> Arsip Laporan
                </a>
                <a href="{{ route('doctors.index') }}" class="rounded-xl bg-red-50 hover:bg-red-100 text-red-700 p-4 text-sm font-semibold text-center">
                    <i class="fa-solid fa-user-doctor block text-xl mb-2"></i> Kelola Dokter
                </a>
            </div>
        </div>
    </div>

    {{-- Terbaru + perlu perhatian --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 overflow-hidden">
            <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                <h3 class="font-bold text-slate-900">Pemeriksaan Terbaru</h3>
                <a href="{{ route('reports.index') }}" class="text-xs font-semibold text-sky-700 hover:underline">Lihat semua</a>
            </div>
            <table class="w-full text-sm">
                <thead class="bg-slate-50 text-slate-700 text-left">
                    <tr>
                        <th class="px-5 py-3 font-semibold">Tanggal</th>
                        <th class="px-5 py-3 font-semibold">Pasien</th>
                        <th class="px-5 py-3 font-semibold hidden md:table-cell">Kesimpulan</th>
                        <th class="px-5 py-3 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($recent as $s)
                        <tr class="hover:bg-slate-50">
                            <td class="px-5 py-3 whitespace-nowrap">{{ $s->examination_date->format('d M Y') }}</td>
                            <td class="px-5 py-3">
                                <p class="font-semibold text-slate-800">{{ $s->patient->name }}</p>
                                <p class="text-xs text-slate-400">{{ $s->patient->company_name ?? '-' }}</p>
                            </td>
                            <td class="px-5 py-3 hidden md:table-cell">{{ \Illuminate\Support\Str::limit($s->conclusions['work_fitness'] ?? 'Belum ada', 38) }}</td>
                            <td class="px-5 py-3 text-right">
                                <a href="{{ route('mcu.show', $s) }}" class="inline-flex items-center gap-1.5 h-8 px-3 rounded-lg bg-sky-50 text-sky-700 hover:bg-sky-100 text-xs font-semibold">
                                    <i class="fa-solid fa-file-medical"></i> Lihat
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-5 py-8 text-center text-slate-500">Belum ada pemeriksaan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 p-6">
            <h3 class="font-bold text-slate-900">Perlu Perhatian</h3>
            @forelse ($drafts as $d)
                <a href="{{ route('mcu.edit', $d) }}" class="mt-3 flex items-center gap-3 rounded-xl border border-amber-200 bg-amber-50 p-3 hover:bg-amber-100">
                    <i class="fa-solid fa-triangle-exclamation text-amber-600"></i>
                    <div>
                        <p class="text-sm font-semibold text-slate-800">{{ $d->patient->name }}</p>
                        <p class="text-xs text-slate-500">Draft belum selesai — lanjutkan pengisian</p>
                    </div>
                </a>
            @empty
                <div class="mt-4 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-700 font-semibold">
                    <i class="fa-solid fa-circle-check mr-1"></i> Tidak ada draft tertunda. Semua pemeriksaan selesai.
                </div>
            @endforelse

            <h3 class="font-bold text-slate-900 mt-6">Pasien Terbaru</h3>
            <div class="mt-3 space-y-3">
                @foreach (\App\Models\Patient::latest()->take(3)->get() as $pt)
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-sky-100 text-sky-700 flex items-center justify-center text-xs font-bold">{{ strtoupper(substr($pt->name, 0, 1)) }}</div>
                        <div class="min-w-0">
                            <p class="text-sm font-semibold text-slate-800 truncate">{{ $pt->name }}</p>
                            <p class="text-xs text-slate-400">No MCU {{ $pt->mcu_number }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
</x-app-layout>