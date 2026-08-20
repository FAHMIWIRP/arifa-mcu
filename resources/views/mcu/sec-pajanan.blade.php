<div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
    <button type="button" @click="open = open === 3 ? 0 : 3" class="w-full flex justify-between items-center p-4 bg-slate-50 font-bold text-slate-800">
        <span>III. Riwayat Pajanan Pada Pekerjaan</span><i class="fa-solid fa-chevron-down text-sky-600"></i>
    </button>
    <div x-show="open === 3" class="p-5 space-y-6">
        @php $pj = ['fisik' => '1. Fisik', 'kimia' => '2. Kimia', 'biologi' => '3. Biologi', 'psikologis' => '4. Psikologis', 'ergonomis' => '5. Ergonomis']; @endphp
        @foreach ($pj as $pk => $pt)
            <h4 class="font-semibold text-slate-800 text-sm">{{ $pt }}</h4>
            <div class="grid md:grid-cols-2 gap-3">
                @foreach (config("mcu.pajanan.$pk") as $k => $l)
                    @php $val = old("work_exposure.$pk.$k", data_get($we, "$pk.$k", 'Tidak')); @endphp
                    <div class="flex items-center justify-between gap-3 bg-slate-50 rounded-xl px-3 py-2">
                        <span class="text-sm text-slate-700">{{ $l }}</span>
                        <select name="work_exposure[{{ $pk }}][{{ $k }}]" class="rounded-lg border-slate-300 text-sm">
                            <option value="Tidak" @selected($val === 'Tidak')>Tidak</option>
                            <option value="Ya" @selected($val === 'Ya')>Ya</option>
                        </select>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>