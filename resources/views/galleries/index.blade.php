<x-app-layout>
    <div class="space-y-5">

        <div>
            <h2 class="text-2xl font-bold text-slate-900">Galeri Klinik</h2>
            <p class="text-sm text-slate-500 mt-1">Foto kegiatan yang tampil pada marquee "Galeri Klinik" di landing page.</p>
        </div>

        @if (session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-800 px-4 py-3 rounded-xl text-sm shadow-sm">{{ session('success') }}</div>
        @endif

        <div class="bg-white rounded-2xl border border-slate-200 p-6">
            <h3 class="font-bold text-slate-900">Tambah Galeri</h3>
            <form method="POST" action="{{ route('galleries.store') }}" enctype="multipart/form-data" class="mt-4 grid grid-cols-1 md:grid-cols-4 gap-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Judul <span class="text-red-600">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm" placeholder="cth: Pemeriksaan Treadmill / EKG" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Deskripsi</label>
                    <input type="text" name="description" value="{{ old('description') }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm" placeholder="cth: Uji jantung karyawan dengan pengawasan dokter.">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Foto</label>
                    <input type="file" name="photo" accept="image/*" class="mt-1 w-full text-sm text-slate-500 file:mr-3 file:rounded-xl file:border-0 file:bg-sky-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-sky-700 hover:file:bg-sky-100">
                </div>
                <div class="flex items-end">
                    <button class="w-full bg-sky-600 hover:bg-sky-700 text-white rounded-xl py-2.5 text-sm font-semibold">
                        <i class="fa-solid fa-images mr-1"></i> Simpan Galeri
                    </button>
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @forelse ($galleries as $g)
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
                    @if ($g->photo)
                        <img src="{{ asset('uploads/galeri/' . $g->photo) }}" alt="{{ $g->title }}" class="h-40 w-full object-cover">
                    @else
                        <div class="h-40 w-full bg-slate-50 text-slate-300 flex items-center justify-center"><i class="fa-solid fa-image text-4xl"></i></div>
                    @endif
                    <div class="p-4">
                        <p class="font-bold text-slate-800 text-sm">{{ $g->title }}</p>
                        <p class="text-xs text-slate-500 mt-1">{{ $g->description ?? '-' }}</p>
                        <form method="POST" action="{{ route('galleries.destroy', $g) }}" class="mt-3" onsubmit="return confirm('Hapus galeri ini?')">
                            @csrf @method('DELETE')
                            <button class="h-8 px-3 rounded-lg bg-red-50 text-red-700 hover:bg-red-100 text-xs font-semibold">
                                <i class="fa-solid fa-trash mr-1"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-white rounded-2xl border border-slate-200 p-8 text-center text-slate-500 text-sm">
                    Belum ada galeri. Tambahkan foto kegiatan melalui formulir di atas.
                </div>
            @endforelse
        </div>

    </div>
</x-app-layout>