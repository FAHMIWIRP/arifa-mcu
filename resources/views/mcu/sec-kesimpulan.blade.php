<div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
    <button type="button" @click="open = open === 6 ? 0 : 6" class="w-full flex justify-between items-center p-4 bg-slate-50 font-bold text-slate-800">
        <span>VI. Ringkasan, Anjuran & Kesimpulan</span><i class="fa-solid fa-chevron-down text-sky-600"></i>
    </button>
    <div x-show="open === 6" class="p-5 space-y-5">
        <div class="grid md:grid-cols-2 gap-4">
            <div><label class="text-sm font-semibold text-slate-700">Pemeriksaan Fisik</label><input type="text" name="conclusions[ringkasan_fisik]" value="{{ old('conclusions.ringkasan_fisik', data_get($cn, 'ringkasan_fisik')) }}" placeholder="cth: Hipertensi" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
            <div><label class="text-sm font-semibold text-slate-700">Pemeriksaan Mata</label><input type="text" name="conclusions[ringkasan_mata]" value="{{ old('conclusions.ringkasan_mata', data_get($cn, 'ringkasan_mata')) }}" placeholder="cth: Dalam Batas Normal" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
            <div><label class="text-sm font-semibold text-slate-700">Treadmill / EKG</label><input type="text" name="conclusions[ringkasan_ekg]" value="{{ old('conclusions.ringkasan_ekg', data_get($cn, 'ringkasan_ekg')) }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
            <div><label class="text-sm font-semibold text-slate-700">Laboratorium</label><input type="text" name="conclusions[ringkasan_lab]" value="{{ old('conclusions.ringkasan_lab', data_get($cn, 'ringkasan_lab')) }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
            <div class="md:col-span-2"><label class="text-sm font-semibold text-slate-700">X-Ray (1. Jantung 2. Paru)</label><textarea name="conclusions[ringkasan_xray]" rows="2" class="mt-1 w-full rounded-xl border-slate-300 text-sm">{{ old('conclusions.ringkasan_xray', data_get($cn, 'ringkasan_xray')) }}</textarea></div>
        </div>

        <div>
            <label class="text-sm font-semibold text-slate-700">Anjuran-Anjuran (satu anjuran per baris)</label>
            <textarea name="conclusions[anjuran]" rows="3" class="mt-1 w-full rounded-xl border-slate-300 text-sm">{{ old('conclusions.anjuran', data_get($cn, 'anjuran')) }}</textarea>
        </div>

        <div>
            <label class="text-sm font-semibold text-slate-700">Kesimpulan Kelayakan Kerja</label>
            <div class="mt-2 space-y-2">
                @foreach (config('mcu.work_fitness_options') as $opt)
                    <label class="flex items-start gap-2 text-sm bg-slate-50 rounded-xl px-3 py-2">
                        <input type="radio" name="conclusions[work_fitness]" value="{{ $opt }}" @checked(old('conclusions.work_fitness', data_get($cn, 'work_fitness')) === $opt) class="mt-0.5 text-sky-600">
                        {{ $opt }}
                    </label>
                @endforeach
            </div>
        </div>

        <div>
            <label class="text-sm font-semibold text-slate-700">Resiko Cardiovaskuler</label>
            <input type="text" name="conclusions[resiko_cardio]" value="{{ old('conclusions.resiko_cardio', data_get($cn, 'resiko_cardio')) }}" placeholder="cth: Resiko Sedang (Skor 3)" class="mt-1 w-full rounded-xl border-slate-300 text-sm">
        </div>

        <div>
            <label class="text-sm font-semibold text-slate-700">Kesimpulan Derajat Kesehatan</label>
            <div class="mt-2 space-y-2">
                @foreach (config('mcu.health_degrees') as $k => $l)
                    <label class="flex items-start gap-2 text-sm bg-slate-50 rounded-xl px-3 py-2">
                        <input type="radio" name="conclusions[health_degree]" value="{{ $k }}" @checked(old('conclusions.health_degree', data_get($cn, 'health_degree')) === $k) class="mt-0.5 text-sky-600">
                        {{ $l }}
                    </label>
                @endforeach
            </div>
        </div>
    </div>
</div>