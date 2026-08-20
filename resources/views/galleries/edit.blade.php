<x-app-layout>
    <div class="space-y-5">

        <div class="flex flex-wrap items-end justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Ubah Galeri</h2>
                <p class="text-sm text-slate-500 mt-1">Perbarui judul, deskripsi, atau foto galeri.</p>
            </div>
            <a href="{{ route('galleries.index') }}" class="border border-slate-200 bg-white rounded-xl px-4 py-2 text-sm font-semibold text-slate-700 hover:border-sky-500">
                <i class="fa-solid fa-arrow-left mr-1"></i> Kembali
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 p-6">
                <form method="POST" action="{{ route('galleries.update', $gallery) }}" enctype="multipart/form-data" class="space-y-4"
                    data-confirm="Simpan perubahan galeri?"
                    data-confirm-icon="question"
                    data-confirm-color="#0284c7"
                    data-confirm-button="Ya, Simpan">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Judul <span class="text-red-600">*</span></label>
                        <input type="text" name="title" value="{{ old('title', $gallery->title) }}" class="mt-1 w-full rounded-xl border-slate-300 text-sm" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Deskripsi</label>
                        <textarea name="description" rows="2" class="mt-1 w-full rounded-xl border-slate-300 text-sm">{{ old('description', $gallery->description) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Ganti Foto</label>
                        <p class="text-xs text-slate-400 mt-0.5">Kosongkan bila foto tidak diganti.</p>
                        <input type="file" name="photo" accept="image/*" class="mt-2 w-full text-sm text-slate-500 file:mr-3 file:rounded-xl file:border-0 file:bg-sky-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-sky-700 hover:file:bg-sky-100">
                    </div>
                    <button class="bg-sky-600 hover:bg-sky-700 text-white rounded-xl px-6 py-2.5 text-sm font-semibold">
                        <i class="fa-solid fa-floppy-disk mr-1"></i> Simpan Perubahan
                    </button>
                </form>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 p-6">
                <h3 class="font-bold text-slate-900">Foto Saat Ini</h3>
                @if ($gallery->photo)
                    <img src="{{ asset('uploads/galeri/' . $gallery->photo) }}" alt="{{ $gallery->title }}"
                        class="mt-3 w-full h-40 object-cover rounded-xl border border-slate-100">
                @else
                    <div class="mt-3 w-full h-40 rounded-xl bg-slate-50 text-slate-300 flex items-center justify-center"><i class="fa-solid fa-image text-4xl"></i></div>
                @endif
            </div>
        </div>

    </div>
</x-app-layout>