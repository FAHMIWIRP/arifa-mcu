@props(['name', 'dot', 'data', 'items'])

<div class="grid md:grid-cols-2 gap-3">
    @foreach ($items as $key => $meta)
        @php $val = old("{$dot}.{$key}", $data[$key] ?? ''); @endphp
        <div>
            <label class="block text-sm font-medium text-slate-700">
                {{ $meta['label'] }}
                <span class="text-slate-400 text-xs">({{ $meta['unit'] }}) — rujukan {{ $meta['ref'] }}</span>
            </label>
            <input type="text" name="{{ $name }}[{{ $key }}]" value="{{ $val }}"
                class="mt-1 w-full rounded-xl border-slate-300 text-sm">
        </div>
    @endforeach
</div>