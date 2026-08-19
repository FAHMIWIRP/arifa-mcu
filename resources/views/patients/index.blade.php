<x-app-layout>
    <div class="space-y-5">

        <div class="flex flex-wrap items-end justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Data Pasien</h2>
                <p class="text-sm text-slate-500 mt-1">Kelola data pasien Medical Check-Up klinik.</p>
            </div>
            <a href="{{ route('patients.create') }}" class="bg-sky-600 hover:bg-sky-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl">
                <i class="fa-solid fa-user-plus mr-1"></i> Tambah Pasien
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-800 px-4 py-3 rounded-xl text-sm shadow-sm">{{ session('success') }}</div>
        @endif

        <div class="bg-white rounded-2xl border border-slate-200">

            <div class="p-4 border-b border-slate-100">
                <form method="GET" action="{{ route('patients.index') }}" class="flex gap-2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama / No MCU / perusahaan..."
                        class="rounded-xl border-slate-300 text-sm px-4 py-2.5 w-full sm:w-80">
                    <button class="bg-slate-700 hover:bg-slate-800 text-white text-sm px-5 py-2.5 rounded-xl shrink-0">
                        <i class="fa-solid fa-magnifying-glass"></i><span class="hidden sm:inline ml-1"> Cari</span>
                    </button>
                </form>
            </div>

            <table class="w-full text-sm">
                <thead class="bg-slate-50 text-slate-700 text-left">
                    <tr>
                        <th class="px-5 py-3 font-semibold">No MCU</th>
                        <th class="px-5 py-3 font-semibold">Nama</th>
                        <th class="px-5 py-3 font-semibold hidden sm:table-cell">L/P</th>
                        <th class="px-5 py-3 font-semibold hidden md:table-cell">Usia</th>
                        <th class="px-5 py-3 font-semibold hidden lg:table-cell">Perusahaan / Bagian</th>
                        <th class="px-5 py-3 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($patients as $patient)
                        <tr class="hover:bg-slate-50">
                            <td class="px-5 py-3 whitespace-nowrap">{{ $patient->mcu_number }}</td>
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full bg-sky-100 text-sky-700 flex items-center justify-center text-xs font-bold shrink-0">
                                        {{ strtoupper(substr($patient->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="font-semibold text-slate-800">{{ $patient->name }}</p>
                                        <p class="text-xs text-slate-400 lg:hidden">{{ $patient->company_name ?? '-' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-3 hidden sm:table-cell">{{ $patient->gender }}</td>
                            <td class="px-5 py-3 hidden md:table-cell whitespace-nowrap">
                                {{ $patient->birth_date ? $patient->birth_date->diff(now())->y . ' thn' : '-' }}
                            </td>
                            <td class="px-5 py-3 hidden lg:table-cell">
                                {{ $patient->company_name ?? '-' }} <span class="text-slate-400">/ {{ $patient->department ?? '-' }}</span>
                            </td>
                            <td class="px-5 py-3 text-right">
                                <div class="relative inline-block text-left" x-data="{ open: false }">
                                    <button @click="open = !open" type="button"
                                        class="inline-flex items-center gap-1.5 h-8 px-3.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold">
                                        Aksi <i class="fa-solid fa-chevron-down text-[10px]"></i>
                                    </button>

                                    <div x-show="open" @click.away="open = false" x-cloak
                                        x-transition:enter="transition ease-out duration-100"
                                        x-transition:enter-start="transform opacity-0 scale-95"
                                        x-transition:enter-end="transform opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75"
                                        x-transition:leave-start="transform opacity-100 scale-100"
                                        x-transition:leave-end="transform opacity-0 scale-95"
                                        class="absolute right-0 z-30 mt-2 w-52 rounded-xl border border-slate-200 bg-white shadow-xl py-1.5 text-left">
                                        <a href="{{ route('mcu.create', $patient) }}"
                                            class="flex items-center gap-3 px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-green-50 hover:text-green-700">
                                            <i class="fa-solid fa-stethoscope w-4 text-green-600"></i> Input MCU
                                        </a>
                                        <a href="{{ route('mcu.index', $patient) }}"
                                            class="flex items-center gap-3 px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-sky-50 hover:text-sky-700">
                                            <i class="fa-solid fa-file-medical w-4 text-sky-600"></i> Hasil & Riwayat
                                        </a>
                                        <a href="{{ route('patients.edit', $patient) }}"
                                            class="flex items-center gap-3 px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50">
                                            <i class="fa-solid fa-pen w-4 text-slate-500"></i> Ubah Data
                                        </a>
                                        <div class="my-1 border-t border-slate-100"></div>
                                        <form method="POST" action="{{ route('patients.destroy', $patient) }}"
                                            onsubmit="return confirm('Hapus data pasien ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="w-full flex items-center gap-3 px-4 py-2 text-xs font-semibold text-red-600 hover:bg-red-50">
                                                <i class="fa-solid fa-trash w-4"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="px-5 py-8 text-center text-slate-500">Belum ada data pasien.</td></tr>
                    @endforelse
                </tbody>
            </table>

            <div class="p-4 border-t border-slate-100 rounded-b-2xl">{{ $patients->links() }}</div>
        </div>

    </div>
</x-app-layout>