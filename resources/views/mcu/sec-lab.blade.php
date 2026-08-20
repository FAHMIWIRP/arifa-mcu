<div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
    <button type="button" @click="open = open === 4 ? 0 : 4" class="w-full flex justify-between items-center p-4 bg-slate-50 font-bold text-slate-800">
        <span>IV. Hasil Laboratorium</span><i class="fa-solid fa-chevron-down text-sky-600"></i>
    </button>
    <div x-show="open === 4" class="p-5 space-y-6">
        <div class="grid md:grid-cols-3 gap-4">
            <div><label class="text-sm font-semibold text-slate-700">Dokter Penanggung Jawab Analis</label><input type="text" name="lab_results[dokter]" value="{{ old('lab_results.dokter', data_get($lb, 'dokter')) }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
            <div><label class="text-sm font-semibold text-slate-700">Analis</label><input type="text" name="lab_results[analis]" value="{{ old('lab_results.analis', data_get($lb, 'analis')) }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
            <div><label class="text-sm font-semibold text-slate-700">Golongan Darah</label><input type="text" name="lab_results[golongan_darah]" value="{{ old('lab_results.golongan_darah', data_get($lb, 'golongan_darah')) }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
        </div>

        @foreach (config('mcu.lab_groups') as $gk => $items)
            <h4 class="font-semibold text-slate-800 text-sm uppercase">{{ str_replace('_', ' ', $gk) }}</h4>
            <div class="grid md:grid-cols-2 gap-3">
                @foreach ($items as $k => $meta)
                    <div>
                        <label class="block text-sm font-medium text-slate-700">
                            {{ $meta['label'] }} <span class="text-slate-400 text-xs">({{ $meta['unit'] }}) — rujukan {{ $meta['ref'] }}</span>
                        </label>
                        <input type="text" name="lab_results[{{ $gk }}][{{ $k }}]" value="{{ old("lab_results.$gk.$k", data_get($lb, "$gk.$k")) }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm">
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>