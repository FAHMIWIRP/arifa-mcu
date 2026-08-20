<x-app-layout>
    <div class="space-y-5">

        <div>
            <h2 class="text-2xl font-bold text-slate-900">Mitra Perusahaan</h2>
            <p class="text-sm text-slate-500 mt-1">Data mitra yang tampil pada marquee "Dipercaya Oleh" di landing page.</p>
        </div>

        @if (session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-800 px-4 py-3 rounded-xl text-sm shadow-sm">{{ session('success') }}</div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <div class="bg-white rounded-2xl border border-slate-200 p-6">
                <h3 class="font-bold text-slate-900">Tambah Mitra</h3>
                <form method="POST" action="{{ route('mitras.store') }}" enctype="multipart/form-data" class="mt-4 space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Nama Perusahaan <span class="text-red-600">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm" placeholder="cth: PT Potensi Karya Mandiri" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Deskripsi</label>
                        <textarea name="description" rows="2" class="mt-1 w-full rounded-xl border-slate-300 text-sm" placeholder="cth: MCU berkala karyawan operasional.">{{ old('description') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Foto / Logo</label>
                        <input type="file" name="photo" accept="image/*" class="mt-1 w-full text-sm text-slate-500 file:mr-3 file:rounded-xl file:border-0 file:bg-sky-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-sky-700 hover:file:bg-sky-100">
                    </div>
                    <button class="w-full bg-sky-600 hover:bg-sky-700 text-white rounded-xl py-2.5 text-sm font-semibold">
                        <i class="fa-solid fa-handshake mr-1"></i> Simpan Mitra
                    </button>
                </form>
            </div>

            <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50 text-slate-700 text-left">
                        <tr>
                            <th class="px-5 py-3 font-semibold">Foto</th>
                            <th class="px-5 py-3 font-semibold">Nama</th>
                            <th class="px-5 py-3 font-semibold">Deskripsi</th>
                            <th class="px-5 py-3 font-semibold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($mitras as $m)
                            <tr class="hover:bg-slate-50">
                                <td class="px-5 py-3">
                                    @if ($m->photo)
                                        <img src="{{ asset('uploads/mitra/' . $m->photo) }}" alt="{{ $m->name }}" class="w-16 h-12 rounded-lg object-cover border border-slate-100">
                                    @else
                                        <div class="w-16 h-12 rounded-lg bg-sky-50 text-sky-400 flex items-center justify-center"><i class="fa-solid fa-building"></i></div>
                                    @endif
                                </td>
                                <td class="px-5 py-3 font-semibold text-slate-800">{{ $m->name }}</td>
                                <td class="px-5 py-3 text-slate-500">{{ $m->description ?? '-' }}</td>
                                <td class="px-5 py-3 text-right">
                                    <form method="POST" action="{{ route('mitras.destroy', $m) }}" class="inline" onsubmit="return confirm('Hapus mitra ini?')">
                                        @csrf @method('DELETE')
                                        <button class="h-8 px-3 rounded-lg bg-red-50 text-red-700 hover:bg-red-100 text-xs font-semibold">
                                            <i class="fa-solid fa-trash mr-1"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="px-5 py-8 text-center text-slate-500">Belum ada mitra. Tambahkan melalui formulir di samping.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout> 