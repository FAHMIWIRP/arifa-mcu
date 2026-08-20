<x-app-layout>
@php
    $an = $session->anamnesis ?? [];
    $pe = $session->physical_exam ?? [];
    $we = $session->work_exposure ?? [];
    $lb = $session->lab_results ?? [];
    $rd = $session->radiology_results ?? [];
    $ek = $session->ekg_results ?? [];
    $cn = $session->conclusions ?? [];
@endphp

<div class="space-y-5" x-data="{ open: 1 }">

    <div class="bg-white rounded-2xl border border-slate-200 p-5 flex flex-wrap items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-slate-900">Form Medical Check-Up</h2>
            <p class="text-sm text-slate-500 mt-1">{{ $patient->name }} • No MCU {{ $patient->mcu_number }}</p>
        </div>
        <a href="{{ route('mcu.index', $patient) }}" class="text-sm font-semibold text-sky-700 hover:underline">Lihat riwayat</a>
    </div>

    <form method="POST"
        action="{{ $session->exists ? route('mcu.update', $session) : route('mcu.store', $patient) }}"
        class="space-y-5"
        x-data="{
            tb: {{ (float) old('physical_exam.umum.tb', data_get($pe, 'umum.tb', 0)) }},
            bb: {{ (float) old('physical_exam.umum.bb', data_get($pe, 'umum.bb', 0)) }},
            get bbIdeal() { return this.tb > 110 ? (this.tb - 110).toFixed(1) : ''; },
            get imt() { const h = this.tb / 100; return (h > 0 && this.bb > 0) ? (this.bb / (h * h)).toFixed(2) : ''; }
        }">
        @csrf
        @if ($session->exists) @method('PUT') @endif

        <div class="bg-white rounded-2xl border border-slate-200 p-5">
            <div class="grid md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Tanggal Pemeriksaan</label>
                    <input type="date" name="examination_date" value="{{ old('examination_date', optional($session->examination_date)->format('Y-m-d')) }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Dokter Penanggung Jawab</label>
                    <select name="doctor_id" class="mt-1 w-full rounded-xl border-slate-300 text-sm">
                        <option value="">— pilih dokter —</option>
                        @foreach ($doctors as $d)
                            <option value="{{ $d->id }}" @selected(old('doctor_id', $session->doctor_id) == $d->id)>{{ $d->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Status</label>
                    <select name="status" class="mt-1 w-full rounded-xl border-slate-300 text-sm">
                        <option value="draft" @selected(old('status', $session->status) === 'draft')>Draft</option>
                        <option value="completed" @selected(old('status', $session->status) === 'completed')>Selesai</option>
                    </select>
                </div>
            </div>
        </div>

        @include('mcu.sec-anamnesa')
        @include('mcu.sec-fisik')
        @include('mcu.sec-pajanan')
        @include('mcu.sec-lab')
        @include('mcu.sec-penunjang')
        @include('mcu.sec-kesimpulan')

        <div class="flex items-center justify-between bg-white p-5 rounded-2xl border border-slate-200">
            <a href="{{ route('patients.index') }}" class="text-sm text-slate-500 hover:underline">Kembali</a>
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-xl font-semibold">
                <i class="fa-solid fa-floppy-disk mr-2"></i>Simpan Hasil MCU
            </button>
        </div>
    </form>
</div>
</x-app-layout>