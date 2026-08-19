<x-app-layout>
    <div class="space-y-5">

        <div class="flex flex-wrap items-end justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Riwayat MCU: {{ $patient->name }}</h2>
                <p class="text-sm text-slate-500 mt-1">No MCU {{ $patient->mcu_number }} • {{ $patient->company_name ?? '-' }} / {{ $patient->department ?? '-' }}</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('patients.index') }}" class="border border-slate-200 bg-white rounded-xl px-4 py-2 text-sm font-semibold text-slate-700 hover:border-sky-500">Kembali</a>
                <a href="{{ route('mcu.create', $patient) }}" class="bg-sky-600 hover:bg-sky-700 text-white rounded-xl px-4 py-2 text-sm font-semibold">
                    <i class="fa-solid fa-stethoscope mr-1"></i> Input MCU Baru
                </a>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 text-slate-700 text-left">
                    <tr>
                        <th class="px-5 py-3 font-semibold">Tanggal Pemeriksaan</th>
                        <th class="px-5 py-3 font-semibold">Kelayakan Kerja</th>
                        <th class="px-5 py-3 font-semibold">Status</th>
                        <th class="px-5 py-3 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($sessions as $s)
                        <tr class="hover:bg-slate-50">
                            <td class="px-5 py-3">{{ $s->examination_date->format('d M Y') }}</td>
                            <td class="px-5 py-3">{{ $s->conclusions['work_fitness'] ?? 'Belum ada kesimpulan' }}</td>
                            <td class="px-5 py-3">
                                <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $s->status === 'completed' ? 'bg-green-50 text-green-700' : 'bg-amber-50 text-amber-700' }}">
                                    {{ $s->status === 'completed' ? 'Selesai' : 'Draft' }}
                                </span>
                            </td>
                            <td class="px-5 py-3 text-right space-x-2">
                                <a href="{{ route('mcu.show', $s) }}" class="inline-block bg-sky-50 text-sky-700 hover:bg-sky-100 px-3 py-1.5 rounded-lg text-xs font-semibold">Lihat & Cetak</a>
                                <a href="{{ route('mcu.edit', $s) }}" class="inline-block bg-slate-100 text-slate-700 hover:bg-slate-200 px-3 py-1.5 rounded-lg text-xs font-semibold">Ubah</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-5 py-8 text-center text-slate-500">Belum ada data MCU.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>