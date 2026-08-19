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

<div class="py-10" x-data="{ open: 1 }">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-5">

        <div class="rounded-2xl bg-gradient-to-r from-sky-600 to-sky-400 p-6 text-white shadow-lg flex flex-wrap items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold">Form Medical Check-Up</h2>
                <p class="text-sm text-sky-50 mt-1">{{ $patient->name }} • No MCU {{ $patient->mcu_number }}</p>
            </div>
            <a href="{{ route('mcu.index', $patient) }}" class="text-sm text-sky-50 hover:underline">Lihat riwayat</a>
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
            @if($session->exists) @method('PUT') @endif

            {{-- 0. INFO PEMERIKSAAN --}}
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                <div class="grid md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Tanggal Pemeriksaan</label>
                        <input type="date" name="examination_date" value="{{ old('examination_date', optional($session->examination_date)->format('Y-m-d')) }}"
                            class="mt-1 w-full rounded-xl border-slate-300 text-sm">
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

            {{-- 1. ANAMNESA --}}
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                <button type="button" @click="open = open === 1 ? 0 : 1" class="w-full flex justify-between items-center p-4 bg-sky-50/70 font-bold text-slate-800">
                    <span>I. Anamnesa</span><i class="fa-solid fa-chevron-down text-sky-600"></i>
                </button>
                <div x-show="open === 1" x-cloak class="p-5 space-y-6">
                    <h4 class="font-semibold text-slate-800 text-sm">1. Riwayat Penyakit Terdahulu</h4>
                    <x-mcu.yesno-group name="anamnesis[riwayat_terdahulu]" dot="anamnesis.riwayat_terdahulu" :data="$an['riwayat_terdahulu'] ?? []" :items="config('mcu.riwayat_terdahulu')" />

                    <h4 class="font-semibold text-slate-800 text-sm">2. Riwayat Penyakit Keluarga (Orang Tua)</h4>
                    <div class="grid md:grid-cols-2 gap-3">
                        @foreach (config('mcu.riwayat_keluarga') as $key => $label)
                            @php $val = old("anamnesis.riwayat_keluarga.$key", $an['riwayat_keluarga'][$key] ?? 'Tidak Ada'); @endphp
                            <div class="flex items-center justify-between gap-3 bg-slate-50 rounded-xl px-3 py-2">
                                <span class="text-sm text-slate-700">{{ $label }}</span>
                                <input type="text" name="anamnesis[riwayat_keluarga][{{ $key }}]" value="{{ $val }}"
                                    class="w-32 rounded-lg border-slate-300 text-sm text-center">
                            </div>
                        @endforeach
                    </div>

                    <h4 class="font-semibold text-slate-800 text-sm">3. Riwayat Kebiasaan</h4>
                    <div class="grid md:grid-cols-3 gap-4">
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-slate-700">Merokok</label>
                            <select name="anamnesis[kebiasaan][merokok]" class="w-full rounded-xl border-slate-300 text-sm">
                                @foreach (['Tidak', 'Ya'] as $opt)<option value="{{ $opt }}" @selected(old('anamnesis.kebiasaan.merokok', $an['kebiasaan']['merokok'] ?? 'Tidak') === $opt)>{{ $opt }}</option>@endforeach
                            </select>
                            <input type="text" name="anamnesis[kebiasaan][merokok_lama]" value="{{ old('anamnesis.kebiasaan.merokok_lama', $an['kebiasaan']['merokok_lama'] ?? '') }}" placeholder="Lama (tahun)" class="w-full rounded-xl border-slate-300 text-sm">
                            <input type="text" name="anamnesis[kebiasaan][merokok_banyak]" value="{{ old('anamnesis.kebiasaan.merokok_banyak', $an['kebiasaan']['merokok_banyak'] ?? '') }}" placeholder="Banyak (batang/hari)" class="w-full rounded-xl border-slate-300 text-sm">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-slate-700">Minum Miras</label>
                            <select name="anamnesis[kebiasaan][miras]" class="w-full rounded-xl border-slate-300 text-sm">
                                @foreach (['Tidak', 'Ya'] as $opt)<option value="{{ $opt }}" @selected(old('anamnesis.kebiasaan.miras', $an['kebiasaan']['miras'] ?? 'Tidak') === $opt)>{{ $opt }}</option>@endforeach
                            </select>
                            <input type="text" name="anamnesis[kebiasaan][miras_lama]" value="{{ old('anamnesis.kebiasaan.miras_lama', $an['kebiasaan']['miras_lama'] ?? '') }}" placeholder="Lama" class="w-full rounded-xl border-slate-300 text-sm">
                            <input type="text" name="anamnesis[kebiasaan][miras_banyak]" value="{{ old('anamnesis.kebiasaan.miras_banyak', $an['kebiasaan']['miras_banyak'] ?? '') }}" placeholder="Banyak" class="w-full rounded-xl border-slate-300 text-sm">
                        </div>
                        <div>
                            <label class="text-sm font-medium text-slate-700">Olahraga</label>
                            <select name="anamnesis[kebiasaan][olahraga]" class="mt-2 w-full rounded-xl border-slate-300 text-sm">
                                @foreach (['Tidak', 'Ya'] as $opt)<option value="{{ $opt }}" @selected(old('anamnesis.kebiasaan.olahraga', $an['kebiasaan']['olahraga'] ?? 'Tidak') === $opt)>{{ $opt }}</option>@endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700">IV. Keluhan Sekarang</label>
                        <textarea name="anamnesis[keluhan]" rows="2" class="mt-1 w-full rounded-xl border-slate-300 text-sm">{{ old('anamnesis.keluhan', $an['keluhan'] ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            {{-- 2. KEADAAN UMUM / FISIK --}}
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                <button type="button" @click="open = open === 2 ? 0 : 2" class="w-full flex justify-between items-center p-4 bg-sky-50/70 font-bold text-slate-800">
                    <span>II. Keadaan Umum & Pemeriksaan Fisik</span><i class="fa-solid fa-chevron-down text-sky-600"></i>
                </button>
                <div x-show="open === 2" x-cloak class="p-5 space-y-6">

                    <h4 class="font-semibold text-slate-800 text-sm">1. Pemeriksaan Umum</h4>
                    <div class="grid md:grid-cols-3 gap-4">
                        <div><label class="text-sm font-medium text-slate-700">Tinggi Badan (cm)</label><input type="number" x-model.number="tb" name="physical_exam[umum][tb]" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
                        <div><label class="text-sm font-medium text-slate-700">Berat Badan (kg)</label><input type="number" x-model.number="bb" name="physical_exam[umum][bb]" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
                        <div><label class="text-sm font-medium text-slate-700">Berat Badan Ideal (otomatis)</label><input type="text" x-bind:value="bbIdeal" name="physical_exam[umum][bb_ideal]" readonly class="mt-1 w-full rounded-xl border-slate-300 bg-slate-100 text-sm font-bold text-sky-700"></div>
                        <div><label class="text-sm font-medium text-slate-700">IMT (otomatis)</label><input type="text" x-bind:value="imt" name="physical_exam[umum][imt]" readonly class="mt-1 w-full rounded-xl border-slate-300 bg-slate-100 text-sm font-bold text-sky-700"></div>
                        <div><label class="text-sm font-medium text-slate-700">Lingkar Perut (cm)</label><input type="text" name="physical_exam[umum][lingkar_perut]" value="{{ old('physical_exam.umum.lingkar_perut', data_get($pe, 'umum.lingkar_perut')) }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
                        <div><label class="text-sm font-medium text-slate-700">Tekanan Darah (mmHg)</label>
                            <div class="flex gap-2 mt-1">
                                <input type="number" name="physical_exam[umum][td_sistol]" value="{{ old('physical_exam.umum.td_sistol', data_get($pe, 'umum.td_sistol')) }}" placeholder="Sistol" class="w-full rounded-xl border-slate-300 text-sm">
                                <span class="self-center text-slate-400">/</span>
                                <input type="number" name="physical_exam[umum][td_diastol]" value="{{ old('physical_exam.umum.td_diastol', data_get($pe, 'umum.td_diastol')) }}" placeholder="Diastol" class="w-full rounded-xl border-slate-300 text-sm">
                            </div>
                        </div>
                        <div><label class="text-sm font-medium text-slate-700">Denyut Nadi (x/menit)</label><input type="number" name="physical_exam[umum][nadi]" value="{{ old('physical_exam.umum.nadi', data_get($pe, 'umum.nadi')) }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
                        <div><label class="text-sm font-medium text-slate-700">Frek. Pernafasan (x/menit)</label><input type="number" name="physical_exam[umum][nafas]" value="{{ old('physical_exam.umum.nafas', data_get($pe, 'umum.nafas')) }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
                        <div><label class="text-sm font-medium text-slate-700">Suhu (°C)</label><input type="number" step="0.1" name="physical_exam[umum][suhu]" value="{{ old('physical_exam.umum.suhu', data_get($pe, 'umum.suhu')) }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
                    </div>

                    <h4 class="font-semibold text-slate-800 text-sm">2. Pemeriksaan Mata</h4>
                    <x-mcu.exam-group name="physical_exam[mata]" dot="physical_exam.mata" :data="$pe['mata'] ?? []" :items="config('mcu.fisik.mata')" />

                    <h4 class="font-semibold text-slate-800 text-sm">3. Telinga, Hidung & Tenggorokan</h4>
                    <x-mcu.exam-group name="physical_exam[tht]" dot="physical_exam.tht" :data="$pe['tht'] ?? []" :items="config('mcu.fisik.tht')" />

                    <h4 class="font-semibold text-slate-800 text-sm">4. Rongga Dada (Jantung & Paru)</h4>
                    <x-mcu.exam-group name="physical_exam[dada]" dot="physical_exam.dada" :data="$pe['dada'] ?? []" :items="config('mcu.fisik.dada')" />

                    <h4 class="font-semibold text-slate-800 text-sm">5. Rongga Perut</h4>
                    <x-mcu.exam-group name="physical_exam[perut]" dot="physical_exam.perut" :data="$pe['perut'] ?? []" :items="config('mcu.fisik.perut')" />

                    <h4 class="font-semibold text-slate-800 text-sm">6. Genitalia & Anorektal</h4>
                    <x-mcu.exam-group name="physical_exam[genitalia]" dot="physical_exam.genitalia" :data="$pe['genitalia'] ?? []" :items="config('mcu.fisik.genitalia')" />

                    <h4 class="font-semibold text-slate-800 text-sm">7. Anggota Gerak</h4>
                    <x-mcu.exam-group name="physical_exam[gerak]" dot="physical_exam.gerak" :data="$pe['gerak'] ?? []" :items="config('mcu.fisik.gerak')" />

                    <h4 class="font-semibold text-slate-800 text-sm">8. Refleks</h4>
                    <x-mcu.exam-group name="physical_exam[refleks]" dot="physical_exam.refleks" :data="$pe['refleks'] ?? []" :items="config('mcu.fisik.refleks')" />

                    <h4 class="font-semibold text-slate-800 text-sm">9. Kelenjar Getah Bening</h4>
                    <x-mcu.exam-group name="physical_exam[kelenjar]" dot="physical_exam.kelenjar" :data="$pe['kelenjar'] ?? []" :items="config('mcu.fisik.kelenjar')" />
                </div>
            </div>

            {{-- 3. PAJANAN PEKERJAAN --}}
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                <button type="button" @click="open = open === 3 ? 0 : 3" class="w-full flex justify-between items-center p-4 bg-sky-50/70 font-bold text-slate-800">
                    <span>III. Riwayat Pajanan Pada Pekerjaan</span><i class="fa-solid fa-chevron-down text-sky-600"></i>
                </button>
                <div x-show="open === 3" x-cloak class="p-5 space-y-6">
                    <h4 class="font-semibold text-slate-800 text-sm">1. Fisik</h4>
                    <x-mcu.yesno-group name="work_exposure[fisik]" dot="work_exposure.fisik" :data="$we['fisik'] ?? []" :items="config('mcu.pajanan.fisik')" />
                    <h4 class="font-semibold text-slate-800 text-sm">2. Kimia</h4>
                    <x-mcu.yesno-group name="work_exposure[kimia]" dot="work_exposure.kimia" :data="$we['kimia'] ?? []" :items="config('mcu.pajanan.kimia')" />
                    <h4 class="font-semibold text-slate-800 text-sm">3. Biologi</h4>
                    <x-mcu.yesno-group name="work_exposure[biologi]" dot="work_exposure.biologi" :data="$we['biologi'] ?? []" :items="config('mcu.pajanan.biologi')" />
                    <h4 class="font-semibold text-slate-800 text-sm">4. Psikologis</h4>
                    <x-mcu.yesno-group name="work_exposure[psikologis]" dot="work_exposure.psikologis" :data="$we['psikologis'] ?? []" :items="config('mcu.pajanan.psikologis')" />
                    <h4 class="font-semibold text-slate-800 text-sm">5. Ergonomis</h4>
                    <x-mcu.yesno-group name="work_exposure[ergonomis]" dot="work_exposure.ergonomis" :data="$we['ergonomis'] ?? []" :items="config('mcu.pajanan.ergonomis')" />
                </div>
            </div>

            {{-- 4. LABORATORIUM --}}
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                <button type="button" @click="open = open === 4 ? 0 : 4" class="w-full flex justify-between items-center p-4 bg-sky-50/70 font-bold text-slate-800">
                    <span>IV. Hasil Laboratorium</span><i class="fa-solid fa-chevron-down text-sky-600"></i>
                </button>
                <div x-show="open === 4" x-cloak class="p-5 space-y-6">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div><label class="text-sm font-semibold text-slate-700">Dokter Penanggung Jawab Analis</label><input type="text" name="lab_results[dokter]" value="{{ old('lab_results.dokter', $lb['dokter'] ?? '') }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
                        <div><label class="text-sm font-semibold text-slate-700">Analis</label><input type="text" name="lab_results[analis]" value="{{ old('lab_results.analis', $lb['analis'] ?? '') }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
                        <div><label class="text-sm font-semibold text-slate-700">Golongan Darah</label><input type="text" name="lab_results[golongan_darah]" value="{{ old('lab_results.golongan_darah', $lb['golongan_darah'] ?? '') }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
                    </div>

                    @foreach (config('mcu.lab_groups') as $groupKey => $items)
                        <h4 class="font-semibold text-slate-800 text-sm uppercase">{{ str_replace('_', ' ', $groupKey) }}</h4>
                        <x-mcu.lab-group name="lab_results[{{ $groupKey }}]" dot="lab_results.{{ $groupKey }}" :data="$lb[$groupKey] ?? []" :items="$items" />
                    @endforeach
                </div>
            </div>

            {{-- 5. RADIOLOGI & EKG --}}
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                <button type="button" @click="open = open === 5 ? 0 : 5" class="w-full flex justify-between items-center p-4 bg-sky-50/70 font-bold text-slate-800">
                    <span>V. Radiologi & Treadmill / EKG</span><i class="fa-solid fa-chevron-down text-sky-600"></i>
                </button>
                <div x-show="open === 5" x-cloak class="p-5 space-y-5">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div><label class="text-sm font-semibold text-slate-700">Dokter Radiologi</label><input type="text" name="radiology_results[dokter]" value="{{ old('radiology_results.dokter', $rd['dokter'] ?? '') }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
                        <div><label class="text-sm font-semibold text-slate-700">Dokter EKG / Treadmill</label><input type="text" name="ekg_results[dokter]" value="{{ old('ekg_results.dokter', $ek['dokter'] ?? '') }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
                    </div>
                    <div><label class="text-sm font-semibold text-slate-700">KLINIS</label><input type="text" name="radiology_results[klinis]" value="{{ old('radiology_results.klinis', $rd['klinis'] ?? '') }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
                    <div><label class="text-sm font-semibold text-slate-700">COR</label><textarea name="radiology_results[cor]" rows="2" class="mt-1 w-full rounded-xl border-slate-300 text-sm">{{ old('radiology_results.cor', $rd['cor'] ?? '') }}</textarea></div>
                    <div><label class="text-sm font-semibold text-slate-700">PULMO</label><textarea name="radiology_results[pulmo]" rows="3" class="mt-1 w-full rounded-xl border-slate-300 text-sm">{{ old('radiology_results.pulmo', $rd['pulmo'] ?? '') }}</textarea></div>
                    <div><label class="text-sm font-semibold text-slate-700">KESAN</label><textarea name="radiology_results[kesan]" rows="2" class="mt-1 w-full rounded-xl border-slate-300 text-sm">{{ old('radiology_results.kesan', $rd['kesan'] ?? '') }}</textarea></div>
                    <div><label class="text-sm font-semibold text-slate-700">Hasil Treadmill / EKG</label><textarea name="ekg_results[hasil]" rows="2" class="mt-1 w-full rounded-xl border-slate-300 text-sm">{{ old('ekg_results.hasil', $ek['hasil'] ?? '') }}</textarea></div>
                </div>
            </div>

            {{-- 6. KESIMPULAN --}}
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                <button type="button" @click="open = open === 6 ? 0 : 6" class="w-full flex justify-between items-center p-4 bg-sky-50/70 font-bold text-slate-800">
                    <span>VI. Ringkasan, Anjuran & Kesimpulan</span><i class="fa-solid fa-chevron-down text-sky-600"></i>
                </button>
                <div x-show="open === 6" x-cloak class="p-5 space-y-5">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div><label class="text-sm font-semibold text-slate-700">Pemeriksaan Fisik</label><input type="text" name="conclusions[ringkasan_fisik]" value="{{ old('conclusions.ringkasan_fisik', $cn['ringkasan_fisik'] ?? '') }}" placeholder="cth: Hipertensi" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
                        <div><label class="text-sm font-semibold text-slate-700">Pemeriksaan Mata</label><input type="text" name="conclusions[ringkasan_mata]" value="{{ old('conclusions.ringkasan_mata', $cn['ringkasan_mata'] ?? '') }}" placeholder="cth: Dalam Batas Normal" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
                        <div><label class="text-sm font-semibold text-slate-700">Treadmill / EKG</label><input type="text" name="conclusions[ringkasan_ekg]" value="{{ old('conclusions.ringkasan_ekg', $cn['ringkasan_ekg'] ?? '') }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
                        <div><label class="text-sm font-semibold text-slate-700">Laboratorium</label><input type="text" name="conclusions[ringkasan_lab]" value="{{ old('conclusions.ringkasan_lab', $cn['ringkasan_lab'] ?? '') }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
                        <div class="md:col-span-2"><label class="text-sm font-semibold text-slate-700">X-Ray (1. Jantung 2. Paru)</label><textarea name="conclusions[ringkasan_xray]" rows="2" class="mt-1 w-full rounded-xl border-slate-300 text-sm">{{ old('conclusions.ringkasan_xray', $cn['ringkasan_xray'] ?? '') }}</textarea></div>
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-slate-700">Anjuran-Anjuran (satu anjuran per baris)</label>
                        <textarea name="conclusions[anjuran]" rows="3" class="mt-1 w-full rounded-xl border-slate-300 text-sm">{{ old('conclusions.anjuran', $cn['anjuran'] ?? '') }}</textarea>
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-slate-700">Kesimpulan Kelayakan Kerja</label>
                        <div class="mt-2 space-y-2">
                            @foreach (config('mcu.work_fitness_options') as $opt)
                                <label class="flex items-start gap-2 text-sm bg-slate-50 rounded-xl px-3 py-2">
                                    <input type="radio" name="conclusions[work_fitness]" value="{{ $opt }}" @checked(old('conclusions.work_fitness', $cn['work_fitness'] ?? '') === $opt) class="mt-0.5 text-sky-600">
                                    {{ $opt }}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        <div><label class="text-sm font-semibold text-slate-700">Resiko Cardiovaskuler</label><input type="text" name="conclusions[resiko_cardio]" value="{{ old('conclusions.resiko_cardio', $cn['resiko_cardio'] ?? '') }}" placeholder="cth: Resiko Sedang (Skor 3)" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-slate-700">Kesimpulan Derajat Kesehatan</label>
                        <div class="mt-2 space-y-2">
                            @foreach (config('mcu.health_degrees') as $key => $label)
                                <label class="flex items-start gap-2 text-sm bg-slate-50 rounded-xl px-3 py-2">
                                    <input type="radio" name="conclusions[health_degree]" value="{{ $key }}" @checked(old('conclusions.health_degree', $cn['health_degree'] ?? '') === $key) class="mt-0.5 text-sky-600">
                                    {{ $label }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
                <a href="{{ route('patients.index') }}" class="text-sm text-slate-500 hover:underline">Kembali</a>
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-xl font-semibold shadow">
                    <i class="fa-solid fa-floppy-disk mr-2"></i>Simpan Hasil MCU
                </button>
            </div>
        </form>
    </div>
</div>
</x-app-layout>