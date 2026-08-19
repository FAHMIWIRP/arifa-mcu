@props(['name', 'dot', 'data', 'default' => 'Tidak'])

<div class="grid md:grid-cols-2 gap-3">
    @foreach ($items as $key => $label)
        @php $val = old("{$dot}.{$key}", $data[$key] ?? $default); @endphp
        <div class="flex items-center justify-between gap-3 bg-slate-50 rounded-xl px-3 py-2">
            <span class="text-sm text-slate-700">{{ $label }}</span>
            <select name="{{ $name }}[{{ $key }}]" class="rounded-lg border-slate-300 text-sm">
                @foreach (['Tidak', 'Ya'] as $opt)
                    <option value="{{ $opt }}" @selected($val === $opt)>{{ $opt }}</option>
                @endforeach
            </select>
        </div>
    @endforeach
</div>