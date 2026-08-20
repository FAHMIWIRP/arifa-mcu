<div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
    <button type="button" @click="open = open === 1 ? 0 : 1" class="w-full flex justify-between items-center p-4 bg-slate-50 font-bold text-slate-800">
        <span>I. Anamnesa</span><i class="fa-solid fa-chevron-down text-sky-600"></i>
    </button>
    <div x-show="open === 1" class="p-5 space-y-6">

        <h4 class="font-semibold text-slate-800 text-sm">1. Riwayat Penyakit Terdahulu</h4>
        <div class="grid md:grid-cols-2 gap-3">
            @foreach (config('mcu.riwayat_terdahulu') as $k => $l)
                @php $val = old("anamnesis.riwayat_terdahulu.$k", data_get($an, "riwayat_terdahulu.$k", 'Tidak Ada')); @endphp
                <div class="flex items-center justify-between gap-3 bg-slate-50 rounded-xl px-3 py-2">
                    <span class="text-sm text-slate-700">{{ $l }}</span>
                    <select name="anamnesis[riwayat_terdahulu][{{ $k }}]" class="rounded-lg border-slate-300 text-sm">
                        <option value="Tidak Ada" @selected($val === 'Tidak Ada')>Tidak Ada</option>
                        <option value="Ya" @selected($val === 'Ya')>Ya</option>
                    </select>
                </div>
            @endforeach
        </div>

        <h4 class="font-semibold text-slate-800 text-sm">2. Riwayat Penyakit Keluarga (Orang Tua)</h4>
        <div class="grid md:grid-cols-2 gap-3">
            @foreach (config('mcu.riwayat_keluarga') as $k => $l)
                @php $val = old("anamnesis.riwayat_keluarga.$k", data_get($an, "riwayat_keluarga.$k", 'Tidak Ada')); @endphp
                <div class="flex items-center justify-between gap-3 bg-slate-50 rounded-xl px-3 py-2">
                    <span class="text-sm text-slate-700">{{ $l }}</span>
                    <select name="anamnesis[riwayat_keluarga][{{ $k }}]" class="rounded-lg border-slate-300 text-sm">
                        @foreach (['Tidak Ada', 'Ayah', 'Ibu', 'Ayah & Ibu'] as $opt)
                            <option value="{{ $opt }}" @selected($val === $opt)>{{ $opt }}</option>
                        @endforeach
                    </select>
                </div>
            @endforeach
        </div>

        <h4 class="font-semibold text-slate-800 text-sm">3. Riwayat Kebiasaan</h4>
        <div class="grid md:grid-cols-3 gap-4">
            <div class="space-y-2">
                <label class="text-sm font-medium text-slate-700">Merokok</label>
                <select name="anamnesis[kebiasaan][merokok]" class="w-full rounded-xl border-slate-300 text-sm">
                    <option value="Tidak" @selected(old('anamnesis.kebiasaan.merokok', data_get($an, 'kebiasaan.merokok', 'Tidak')) === 'Tidak')>Tidak</option>
                    <option value="Ya" @selected(old('anamnesis.kebiasaan.merokok', data_get($an, 'kebiasaan.merokok', 'Tidak')) === 'Ya')>Ya</option>
                </select>
                <input type="text" name="anamnesis[kebiasaan][merokok_lama]" value="{{ old('anamnesis.kebiasaan.merokok_lama', data_get($an, 'kebiasaan.merokok_lama')) }}" placeholder="Lama (tahun)" class="w-full rounded-xl border-slate-300 text-sm">
                <input type="text" name="anamnesis[kebiasaan][merokok_banyak]" value="{{ old('anamnesis.kebiasaan.merokok_banyak', data_get($an, 'kebiasaan.merokok_banyak')) }}" placeholder="Banyak (batang/hari)" class="w-full rounded-xl border-slate-300 text-sm">
            </div>
            <div class="space-y-2">
                <label class="text-sm font-medium text-slate-700">Minum Miras</label>
                <select name="anamnesis[kebiasaan][miras]" class="w-full rounded-xl border-slate-300 text-sm">
                    <option value="Tidak" @selected(old('anamnesis.kebiasaan.miras', data_get($an, 'kebiasaan.miras', 'Tidak')) === 'Tidak')>Tidak</option>
                    <option value="Ya" @selected(old('anamnesis.kebiasaan.miras', data_get($an, 'kebiasaan.miras', 'Tidak')) === 'Ya')>Ya</option>
                </select>
                <input type="text" name="anamnesis[kebiasaan][miras_lama]" value="{{ old('anamnesis.kebiasaan.miras_lama', data_get($an, 'kebiasaan.miras_lama')) }}" placeholder="Lama" class="w-full rounded-xl border-slate-300 text-sm">
                <input type="text" name="anamnesis[kebiasaan][miras_banyak]" value="{{ old('anamnesis.kebiasaan.miras_banyak', data_get($an, 'kebiasaan.miras_banyak')) }}" placeholder="Banyak" class="w-full rounded-xl border-slate-300 text-sm">
            </div>
            <div>
                <label class="text-sm font-medium text-slate-700">Olahraga</label>
                <select name="anamnesis[kebiasaan][olahraga]" class="mt-2 w-full rounded-xl border-slate-300 text-sm">
                    <option value="Tidak" @selected(old('anamnesis.kebiasaan.olahraga', data_get($an, 'kebiasaan.olahraga', 'Tidak')) === 'Tidak')>Tidak</option>
                    <option value="Ya" @selected(old('anamnesis.kebiasaan.olahraga', data_get($an, 'kebiasaan.olahraga', 'Tidak')) === 'Ya')>Ya</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700">IV. Keluhan Sekarang</label>
            <textarea name="anamnesis[keluhan]" rows="2" class="mt-1 w-full rounded-xl border-slate-300 text-sm">{{ old('anamnesis.keluhan', data_get($an, 'keluhan')) }}</textarea>
        </div>
    </div>
</div>