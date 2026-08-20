<div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
    <button type="button" @click="open = open === 2 ? 0 : 2" class="w-full flex justify-between items-center p-4 bg-slate-50 font-bold text-slate-800">
        <span>II. Keadaan Umum & Pemeriksaan Fisik</span><i class="fa-solid fa-chevron-down text-sky-600"></i>
    </button>
    <div x-show="open === 2" class="p-5 space-y-6">

        <h4 class="font-semibold text-slate-800 text-sm">1. Pemeriksaan Umum</h4>
        <div class="grid md:grid-cols-3 gap-4">
            <div><label class="text-sm font-medium text-slate-700">Tinggi Badan (cm)</label><input type="number" x-model.number="tb" name="physical_exam[umum][tb]" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
            <div><label class="text-sm font-medium text-slate-700">Berat Badan (kg)</label><input type="number" x-model.number="bb" name="physical_exam[umum][bb]" class="mt-1 w-full rounded-xl border-slate-300 text-sm"></div>
            <div><label class="text-sm font-medium text-slate-700">BB Ideal (otomatis)</label><input type="text" x-bind:value="bbIdeal" name="physical_exam[umum][bb_ideal]" readonly class="mt-1 w-full rounded-xl border-slate-300 bg-slate-100 text-sm font-bold text-sky-700"></div>
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

        @php
            $judul = ['mata' => '2. Pemeriksaan Mata', 'tht' => '3. Telinga, Hidung & Tenggorokan', 'dada' => '4. Rongga Dada', 'perut' => '5. Rongga Perut', 'genitalia' => '6. Genitalia & Anorektal', 'gerak' => '7. Anggota Gerak', 'refleks' => '8. Refleks', 'kelenjar' => '9. Kelenjar Getah Bening'];
        @endphp
        @foreach (config('mcu.fisik') as $gk => $items)
            <h4 class="font-semibold text-slate-800 text-sm">{{ $judul[$gk] ?? $gk }}</h4>
            <div class="grid md:grid-cols-2 gap-3">
                @foreach ($items as $k => $l)
                    @php
                        $isText = in_array($k, config('mcu.fisik_text'));
                        $isYn   = in_array($k, config('mcu.fisik_yn'));
                        $val    = old("physical_exam.$gk.$k", data_get($pe, "$gk.$k", $isYn ? 'Tidak' : 'Normal'));
                    @endphp
                    <div>
                        <label class="block text-sm font-medium text-slate-700">{{ $l }}</label>
                        @if ($isText)
                            <input type="text" name="physical_exam[{{ $gk }}][{{ $k }}]" value="{{ $val }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm">
                        @else
                            <select name="physical_exam[{{ $gk }}][{{ $k }}]" class="mt-1 w-full rounded-xl border-slate-300 text-sm">
                                @foreach ($isYn ? ['Tidak', 'Ya'] : ['Normal', 'Tidak Normal'] as $opt)
                                    <option value="{{ $opt }}" @selected($val === $opt)>{{ $opt }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>