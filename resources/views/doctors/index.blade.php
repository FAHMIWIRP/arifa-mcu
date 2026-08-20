<x-app-layout>
    <div class="space-y-5">

        <div>
            <h2 class="text-2xl font-bold text-slate-900">Dokter Penanggung Jawab</h2>
            <p class="text-sm text-slate-500 mt-1">Data dokter yang tampil pada blok tanda tangan laporan MCU.</p>
        </div>

        @if (session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-800 px-4 py-3 rounded-xl text-sm shadow-sm">{{ session('success') }}</div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <div class="bg-white rounded-2xl border border-slate-200 p-6">
                <h3 class="font-bold text-slate-900">Tambah Dokter</h3>
                <form method="POST" action="{{ route('doctors.store') }}" class="mt-4 space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Nama Dokter <span class="text-red-600">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm" placeholder="cth: dr. Rajab Saputra" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">No. SIP</label>
                        <input type="text" name="sip" value="{{ old('sip') }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm" placeholder="cth: NO. SIP. 503/055/2021">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">SK Kemenaker</label>
                        <input type="text" name="sk_kemenaker" value="{{ old('sk_kemenaker') }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm" placeholder="cth: SK KEMENAKER: 5/7118/...">
                    </div>
                    <button class="w-full bg-sky-600 hover:bg-sky-700 text-white rounded-xl py-2.5 text-sm font-semibold">
                        <i class="fa-solid fa-user-doctor mr-1"></i> Simpan Dokter
                    </button>
                </form>
            </div>

            <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50 text-slate-700 text-left">
                        <tr>
                            <th class="px-5 py-3 font-semibold">Nama</th>
                            <th class="px-5 py-3 font-semibold">No. SIP</th>
                            <th class="px-5 py-3 font-semibold">SK Kemenaker</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($doctors as $d)
                            <tr class="hover:bg-slate-50">
                                <td class="px-5 py-3 font-semibold text-slate-800">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-full bg-red-100 text-red-600 flex items-center justify-center text-xs font-bold"><i class="fa-solid fa-user-doctor"></i></div>
                                        {{ $d->name }}
                                    </div>
                                </td>
                                <td class="px-5 py-3">{{ $d->sip ?? '-' }}</td>
                                <td class="px-5 py-3">{{ $d->sk_kemenaker ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="3" class="px-5 py-8 text-center text-slate-500">Belum ada dokter.</td></tr>
                        @endforelse-+
                    </
                    tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>