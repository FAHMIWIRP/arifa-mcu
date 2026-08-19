<x-app-layout>
    <div class="space-y-5">
        <h2 class="text-2xl font-bold text-slate-900">Tambah Pasien</h2>
        <form method="POST" action="{{ route('patients.store') }}" class="bg-white border border-slate-200 rounded-2xl p-6 space-y-5">
            @csrf
            @include('patients.form')
            <div class="flex items-center gap-3">
                <button class="bg-sky-600 hover:bg-sky-700 text-white px-6 py-2.5 rounded-xl text-sm font-semibold">Simpan</button>
                <a href="{{ route('patients.index') }}" class="text-sm text-slate-500">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>