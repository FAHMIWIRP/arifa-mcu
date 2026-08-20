<div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
    <button type="button" @click="open = open === 5 ? 0 : 5" class="w-full flex justify-between items-center p-4 bg-slate-50 font-bold text-slate-800">
        <span>V. Radiologi & Treadmill / EKG</span><i class="fa-solid fa-chevron-down text-sky-600"></i>
    </button>
    <div x-show="open === 5" class="p-5 space-y-5">
        <div class="grid md:grid-cols-2 gap-4">
            <div><label class="text-sm font-semibold text-slate-700">Dokter Radiologi</label><input type="text" name="radiology_results[dokter]" value="{{ old('radiology_results.dokter', data_get($rd, 'dokter')) }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
            <div><label class="text-sm font-semibold text-slate-700">Dokter EKG / Treadmill</label><input type="text" name="ekg_results[dokter]" value="{{ old('ekg_results.dokter', data_get($ek, 'dokter')) }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
        </div>
        <div><label class="text-sm font-semibold text-slate-700">KLINIS</label><input type="text" name="radiology_results[klinis]" value="{{ old('radiology_results.klinis', data_get($rd, 'klinis')) }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
        <div><label class="text-sm font-semibold text-slate-700">COR</label><textarea name="radiology_results[cor]" rows="2" class="mt-1 w-full rounded-xl border-slate-300 text-sm">{{ old('radiology_results.cor', data_get($rd, 'cor')) }}</textarea></div>
        <div><label class="text-sm font-semibold text-slate-700">PULMO</label><textarea name="radiology_results[pulmo]" rows="3" class="mt-1 w-full rounded-xl border-slate-300 text-sm">{{ old('radiology_results.pulmo', data_get($rd, 'pulmo')) }}</textarea></div>
        <div><label class="text-sm font-semibold text-slate-700">KESAN</label><textarea name="radiology_results[kesan]" rows="2" class="mt-1 w-full rounded-xl border-slate-300 text-sm">{{ old('radiology_results.kesan', data_get($rd, 'kesan')) }}</textarea></div>
        <div><label class="text-sm font-semibold text-slate-700">Hasil Treadmill / EKG</label><textarea name="ekg_results[hasil]" rows="2" class="mt-1 w-full rounded-xl border-slate-300 text-sm">{{ old('ekg_results.hasil', data_get($ek, 'hasil')) }}</textarea></div>
    </div>
</div>