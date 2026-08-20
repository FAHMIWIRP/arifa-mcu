<x-app-layout>
    <div class="space-y-5">

        <div class="flex flex-wrap items-end justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Arsip Laporan</h2>
                <p class="text-sm text-slate-500 mt-1">Seluruh laporan MCU dari semua pasien, siap ditelusuri dan dicetak.</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
            <div class="p-4 border-b border-slate-100">
                <form method="GET" action="{{ route('reports.index') }}" class="flex gap-2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama / No MCU / perusahaan..."
                        class="rounded-xl border-slate-300 text-sm px-4 py-2.5 w-full sm:w-80">
                    <button class="bg-slate-700 hover:bg-slate-800 text-white text-sm px-5 py-2.5 rounded-xl shrink-0">
                        <i class="fa-solid fa-magnifying-glass"></i><span class="hidden sm:inline ml-1"> Cari</span>
                    </button>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm min-w-[720px]">
                    <thead class="bg-slate-50 text-slate-700 text-left">
                        <tr>
                            <th class="px-5 py-3 font-semibold">Tanggal</th>
                            <th class="px-5 py-3 font-semibold">No MCU</th>
                            <th class="px-5 py-3 font-semibold">Nama</th>
                            <th class="px-5 py-3 font-semibold">Perusahaan</th>
                            <th class="px-5 py-3 font-semibold">Kesimpulan</th>
                            <th class="px-5 py-3 font-semibold">Status</th>
                            <th class="px-5 py-3 font-semibold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($sessions as $s)
                            <tr class="hover:bg-slate-50">
                                <td class="px-5 py-3 whitespace-nowrap">{{ $s->examination_date->format('d M Y') }}</td>
                                <td class="px-5 py-3">{{ $s->patient->mcu_number }}</td>
                                <td class="px-5 py-3 font-semibold text-slate-800">{{ $s->patient->name }}</td>
                                <td class="px-5 py-3">{{ $s->patient->company_name ?? '-' }}</td>
                                <td class="px-5 py-3">{{ \Illuminate\Support\Str::limit($s->conclusions['work_fitness'] ?? 'Belum ada', 30) }}</td>
                                <td class="px-5 py-3">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $s->status === 'completed' ? 'bg-green-50 text-green-700' : 'bg-amber-50 text-amber-700' }}">
                                        {{ $s->status === 'completed' ? 'Selesai' : 'Draft' }}
                                    </span>
                                </td>
                                <td class="px-5 py-3 text-right">
                                    <a href="{{ route('mcu.show', $s) }}" class="inline-flex items-center gap-1.5 h-8 px-3 rounded-lg bg-sky-50 text-sky-700 hover:bg-sky-100 text-xs font-semibold whitespace-nowrap">
                                        <i class="fa-solid fa-file-medical"></i> Lihat & Cetak
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="7" class="px-5 py-8 text-center text-slate-500">Belum ada laporan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-4 border-t border-slate-100">{{ $sessions->links() }}</div>
        </div>

    </div>
</x-app-layout>