@props(['name', 'dot', 'data', 'items'])

<div class="grid md:grid-cols-2 gap-3">
    @foreach ($items as $key => $label)
        @php
            $isText = in_array($key, config('mcu.fisik_text', []));
            $isYn   = in_array($key, config('mcu.fisik_yn', []));
            $val    = old("{$dot}.{$key}", $data[$key] ?? ($isYn ? 'Tidak' : 'Normal'));
        @endphp
        <div>
            <label class="block text-sm font-medium text-slate-700">{{ $label }}</label>
            @if ($isText)
                <input type="text" name="{{ $name }}[{{ $key }}]" value="{{ $val }}"
                    class="mt-1 w-full rounded-xl border-slate-300 text-sm">
            @else
                <select name="{{ $name }}[{{ $key }}]" class="mt-1 w-full rounded-xl border-slate-300 text-sm">
                    @foreach ($isYn ? ['Tidak', 'Ya'] : ['Normal', 'Tidak Normal'] as $opt)
                        <option value="{{ $opt }}" @selected($val === $opt)>{{ $opt }}</option>
                    @endforeach
                </select>
            @endif
        </div>
    @endforeach
</div>