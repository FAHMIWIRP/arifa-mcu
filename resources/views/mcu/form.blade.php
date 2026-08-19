<div class="bg-white rounded-2xl border border-slate-200 p-5 flex flex-wrap items-center justify-between gap-4">
    <div>
        <h2 class="text-xl font-bold text-slate-900">Form Medical Check-Up</h2>
        <p class="text-sm text-slate-500 mt-1">{{ $patient->name }} • No MCU {{ $patient->mcu_number }}</p>
    </div>
    <a href="{{ route('mcu.index', $patient) }}" class="text-sm font-semibold text-sky-700 hover:underline">Lihat riwayat</a>
</div>