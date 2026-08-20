<x-app-layout>

<style>
    @media print {
        aside, .sticky, .no-print { display: none !important; }
        .lg\:pl-64 { padding-left: 0 !important; }
        body { background: #fff !important; }
        main { padding: 0 !important; }
        .print-sheet { border: none !important; box-shadow: none !important; border-radius: 0 !important; }
    }
    @page { size: A4; margin: 12mm; }
</style>

@php
    $p  = $mcu->patient;
    $a  = $mcu->anamnesis ?? [];
    $pe = $mcu->physical_exam ?? [];
    $we = $mcu->work_exposure ?? [];
    $lb = $mcu->lab_results ?? [];
    $rd = $mcu->radiology_results ?? [];
    $ek = $mcu->ekg_results ?? [];
    $cn = $mcu->conclusions ?? [];

    $flag = function ($val, $meta) {
        if ($val === null || $val === '' || !is_numeric($val) || ($meta['min'] ?? null) === null) return '';
        $v = (float) $val;
        return ($v < $meta['min'] || $v > $meta['max']) ? 'text-red-600 font-bold' : '';
    };

    $anjuranList = array_values(array_filter(array_map('trim', explode("\n", $cn['anjuran'] ?? ''))));
@endphp

<div class="space-y-5">

    <div class="no-print flex flex-wrap items-center justify-between gap-3">
        <div class="flex gap-2">
            <a href="{{ route('mcu.index', $p) }}" class="border border-slate-200 bg-white rounded-xl px-4 py-2 text-sm font-semibold text-slate-700 hover:border-sky-500">Kembali</a>
            <a href="{{ route('mcu.edit', $mcu) }}" class="border border-slate-200 bg-white rounded-xl px-4 py-2 text-sm font-semibold text-slate-700 hover:border-sky-500">Ubah</a>
        </div>
        <button onclick="window.print()" class="bg-red-600 hover:bg-red-700 text-white rounded-xl px-5 py-2 text-sm font-semibold">
            <i class="fa-solid fa-print mr-1"></i> Cetak / Simpan PDF
        </button>
    </div>

    <div class="print-sheet bg-white border border-slate-200 rounded-2xl p-8 text-[13px] leading-relaxed text-slate-900">

        {{-- KOP SURAT DENGAN LOGO --}}
        <div class="flex items-center gap-4 border-b-4 border-double border-slate-800 pb-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Arifa Medikal Klinik" class="h-16 w-auto shrink-0">
            <div class="flex-1 text-center">
                <h1 class="text-xl font-extrabold tracking-wide">ARIFA MEDIKAL KLINIK</h1>
                <p class="text-[11px] mt-0.5">Jln. Banda Aceh–Medan No.22 Desa Blang Pulo, Kecamatan Muara Satu, Kota Lhokseumawe</p>
                <p class="text-[11px]">Email: klinik_arifamedikal@yahoo.com | Website: www.arifamedikalklinik.com | Telp: 0645-8451168, HP: 0852-6060-1909</p>
            </div>
            <div class="w-10 shrink-0"></div>
        </div>

        <h2 class="text-center font-bold underline mt-4 mb-3 text-sm">ANAMNESA DAN PEMERIKSAAN FISIK</h2>

        {{-- IDENTITAS --}}
        <table class="w-full">
            <tr>
                <td class="w-32 py-0.5">Nama</td><td class="w-3">:</td><td class="font-bold">{{ $p->name }}</td>
                <td class="w-32 py-0.5">Tgl. Pemeriksaan</td><td class="w-3">:</td><td>{{ $mcu->examination_date->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td class="py-0.5">Jenis Kelamin</td><td>:</td><td>{{ $p->gender }}</td>
                <td class="py-0.5">TTL/Umur</td><td>:</td><td>{{ optional($p->birth_date)->format('d-m-Y') }}/{{ $p->ageAt($mcu->examination_date) }}</td>
            </tr>
            <tr>
                <td class="py-0.5">NIK</td><td>:</td><td>{{ $p->nik ?? '-' }}</td>
                <td class="py-0.5">Perusahaan</td><td>:</td><td>{{ $p->company_name ?? '-' }}</td>
            </tr>
            <tr>
                <td class="py-0.5 align-top">Alamat</td><td class="align-top">:</td><td colspan="4" class="py-0.5">{{ $p->address ?? '-' }}</td>
            </tr>
            <tr>
                <td class="py-0.5">No HP</td><td>:</td><td>{{ $p->phone ?? '-' }}</td>
                <td class="py-0.5">Bagian/ Seksi</td><td>:</td><td>{{ $p->department ?? '-' }}</td>
            </tr>
            <tr>
                <td class="py-0.5">No MCU</td><td>:</td><td>{{ $p->mcu_number }}</td>
                <td></td><td></td><td></td>
            </tr>
        </table>

        {{-- I. RIWAYAT TERDAHULU --}}
        <h3 class="font-bold mt-4">I. Riwayat Penyakit Terdahulu</h3>
        <div class="grid grid-cols-2 gap-x-8">
            @foreach (config('mcu.riwayat_terdahulu') as $k => $l)
                <p>{{ $loop->iteration }}. {{ $l }} : {{ $a['riwayat_terdahulu'][$k] ?? 'Tidak Ada' }}</p>
            @endforeach
        </div>

        {{-- II. RIWAYAT KELUARGA --}}
        <h3 class="font-bold mt-4">II. Riwayat Penyakit Keluarga (Orang Tua)</h3>
        <div class="grid grid-cols-2 gap-x-8">
            @foreach (config('mcu.riwayat_keluarga') as $k => $l)
                <p>{{ $loop->iteration }}. {{ $l }} : {{ $a['riwayat_keluarga'][$k] ?? 'Tidak Ada' }}</p>
            @endforeach
        </div>

        {{-- III. KEBIASAAN --}}
        <h3 class="font-bold mt-4">III. Riwayat Kebiasaan</h3>
        <p>a. Merokok : {{ $a['kebiasaan']['merokok'] ?? 'Tidak' }} — Lama: {{ $a['kebiasaan']['merokok_lama'] ?: '-' }} ; Banyak: {{ $a['kebiasaan']['merokok_banyak'] ?: '-' }}</p>
        <p>b. Minum Miras : {{ $a['kebiasaan']['miras'] ?? 'Tidak' }} — Lama: {{ $a['kebiasaan']['miras_lama'] ?: '-' }} ; Banyak: {{ $a['kebiasaan']['miras_banyak'] ?: '-' }}</p>
        <p>c. Olahraga : {{ $a['kebiasaan']['olahraga'] ?? 'Tidak' }}</p>

        {{-- IV. KELUHAN --}}
        <h3 class="font-bold mt-4">IV. Keluhan Sekarang</h3>
        <p>{{ $a['keluhan'] ?: 'Tidak ada keluhan' }}</p>

        {{-- A. KEADAAN UMUM --}}
        <h3 class="font-bold mt-5">A. KEADAAN UMUM</h3>

        <h4 class="font-bold mt-2">1. Pemeriksaan Umum</h4>
        <div class="grid grid-cols-2 gap-x-8">
            <p>a. Tinggi Badan : {{ $pe['umum']['tb'] ?? '-' }} cm</p>
            <p>b. Berat Badan : {{ $pe['umum']['bb'] ?? '-' }} kg</p>
            <p>c. Berat Badan Ideal : {{ $pe['umum']['bb_ideal'] ?? '-' }} kg</p>
            <p>d. IMT : {{ $pe['umum']['imt'] ?? '-' }}</p>
            <p>e. Lingkaran Perut : {{ $pe['umum']['lingkar_perut'] ?? '-' }} cm</p>
            <p>f. Tekanan Darah : {{ $pe['umum']['td_sistol'] ?? '-' }}/{{ $pe['umum']['td_diastol'] ?? '-' }} mmHg</p>
            <p>g. Denyut Nadi : {{ $pe['umum']['nadi'] ?? '-' }} x/menit</p>
            <p>h. Frek. Pernafasan : {{ $pe['umum']['nafas'] ?? '-' }} x/menit</p>
            <p>i. Suhu : {{ $pe['umum']['suhu'] ?? '-' }} °C</p>
        </div>

        @php
            $fisikSections = [
                'mata' => '2. Pemeriksaan Mata',
                'tht' => '3. Pemeriksaan Telinga, Hidung dan Tenggorokan',
                'dada' => '4. Pemeriksaan Rongga Dada',
                'perut' => '5. Pemeriksaan Rongga Perut',
                'genitalia' => '6. Pemeriksaan Genitalia dan Anorektal',
                'gerak' => '7. Pemeriksaan Anggota Gerak',
                'refleks' => '8. Pemeriksaan Refleks',
                'kelenjar' => '9. Pemeriksaan Kelenjar Getah Bening',
            ];
        @endphp
        @foreach ($fisikSections as $gk => $gt)
            <h4 class="font-bold mt-2">{{ $gt }}</h4>
            <div class="grid grid-cols-2 gap-x-8">
                @foreach (config("mcu.fisik.{$gk}") as $k => $l)
                    <p>{{ $l }} : {{ $pe[$gk][$k] ?? 'Normal' }}</p>
                @endforeach
            </div>
        @endforeach

        {{-- PAJANAN --}}
        <h3 class="font-bold mt-5">B. Riwayat Pajanan Pada Pekerjaan</h3>
        @php $pj = ['fisik' => '1. Fisik', 'kimia' => '2. Kimia', 'biologi' => '3. Biologi', 'psikologis' => '4. Psikologis', 'ergonomis' => '5. Ergonomis']; @endphp
        @foreach ($pj as $pk => $pt)
            <h4 class="font-bold mt-2">{{ $pt }}</h4>
            <div class="grid grid-cols-2 gap-x-8">
                @foreach (config("mcu.pajanan.{$pk}") as $k => $l)
                    <p>{{ $l }} : {{ $we[$pk][$k] ?? 'Tidak' }}</p>
                @endforeach
            </div>
        @endforeach

        {{-- RINGKASAN --}}
        <div class="mt-5 space-y-1 font-semibold">
            <p>PEMERIKSAAN FISIK : {{ $cn['ringkasan_fisik'] ?? '-' }}</p>
            <p>PEMERIKSAAN MATA : {{ $cn['ringkasan_mata'] ?? '-' }}</p>
            <p>PEMERIKSAAN TREADMILL/EKG : {{ $cn['ringkasan_ekg'] ?? '-' }}</p>
            <p>PEMERIKSAAN LABORATORIUM : {{ $cn['ringkasan_lab'] ?? '-' }}</p>
            <p>PEMERIKSAAN X RAY — 1. JANTUNG / 2. PARU : {{ $cn['ringkasan_xray'] ?? '-' }}</p>
        </div>

        {{-- ANJURAN --}}
        <h3 class="font-bold mt-4">ANJURAN-ANJURAN :</h3>
        @forelse ($anjuranList as $i => $anj)
            <p>{{ $i + 1 }}. {{ $anj }}</p>
        @empty
            <p>-</p>
        @endforelse

        {{-- KESIMPULAN KELAYAKAN --}}
        <h3 class="font-bold mt-4 underline">KESIMPULAN KELAYAKAN KERJA</h3>
        @foreach (config('mcu.work_fitness_options') as $opt)
            <p>({{ ($cn['work_fitness'] ?? '') === $opt ? 'v' : ' ' }}) : {{ $opt }}</p>
        @endforeach
        <p class="mt-1 font-semibold">Resiko Cardiovaskuler : {{ $cn['resiko_cardio'] ?? '-' }}</p>

        {{-- DERAJAT --}}
        <h3 class="font-bold mt-4 underline">KESIMPULAN DERAJAT KESEHATAN:</h3>
        @foreach (config('mcu.health_degrees') as $k => $l)
            <p>({{ ($cn['health_degree'] ?? '') === $k ? 'v' : ' ' }}) : {{ $l }}</p>
        @endforeach

        {{-- TANDA TANGAN --}}
        <div class="flex justify-end mt-8">
            <div class="text-center">
                <p>Lhokseumawe, {{ $mcu->examination_date->format('d-m-Y') }}</p>
                <p>Dokter Penanggung Jawab MCU</p>
                <div class="h-20"></div>
                <p class="font-bold underline">{{ $mcu->doctor->name ?? '( ................................ )' }}</p>
                <p>{{ $mcu->doctor->sip ?? '' }}</p>
                <p>{{ $mcu->doctor->sk_kemenaker ?? '' }}</p>
            </div>
        </div>

        {{-- LAMPIRAN LAB --}}
        <div class="mt-10 border-t-2 border-slate-300 pt-4">
            <h2 class="text-center font-bold underline text-sm">Hasil Pemeriksaan Laboratorium</h2>
            <table class="w-full mt-2">
                <tr><td class="w-40">Nama Pasien</td><td class="w-3">:</td><td class="font-bold">{{ $p->name }}</td></tr>
                <tr><td>Umur</td><td>:</td><td>{{ $p->ageAt($mcu->examination_date) }}</td></tr>
                <tr><td>J. Kelamin</td><td>:</td><td>{{ $p->gender }}</td></tr>
                <tr><td>Dokter Penanggung Jawab Analis</td><td>:</td><td>{{ $lb['dokter'] ?? '-' }}</td></tr>
                <tr><td>Analis</td><td>:</td><td>{{ $lb['analis'] ?? '-' }}</td></tr>
            </table>

            @foreach (config('mcu.lab_groups') as $gk => $items)
                <h4 class="font-bold mt-3 uppercase">{{ str_replace('_', ' ', $gk) }}</h4>
                <table class="w-full border border-slate-400 text-[12px]">
                    <thead>
                        <tr class="bg-slate-100">
                            <th class="border border-slate-400 px-2 py-1 text-left">Analisis</th>
                            <th class="border border-slate-400 px-2 py-1 text-left">Hasil</th>
                            <th class="border border-slate-400 px-2 py-1 text-left">Nilai Rujukan</th>
                            <th class="border border-slate-400 px-2 py-1 text-left">Satuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $k => $meta)
                            <tr>
                                <td class="border border-slate-400 px-2 py-1">{{ $meta['label'] }}</td>
                                <td class="border border-slate-400 px-2 py-1 {{ $flag($lb[$gk][$k] ?? null, $meta) }}">{{ $lb[$gk][$k] ?? '-' }}</td>
                                <td class="border border-slate-400 px-2 py-1">{{ $meta['ref'] }}</td>
                                <td class="border border-slate-400 px-2 py-1">{{ $meta['unit'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach

            <p class="mt-2 font-semibold">Golongan Darah : {{ $lb['golongan_darah'] ?? '-' }}</p>
        </div>

        {{-- RADIOLOGI --}}
        <div class="mt-8 border-t-2 border-slate-300 pt-4">
            <h2 class="text-center font-bold underline text-sm">RADIOLOGI (TORAKS PA)</h2>
            <table class="w-full mt-2">
                <tr><td class="w-40">Nama Pasien</td><td class="w-3">:</td><td class="font-bold">{{ $p->name }}</td></tr>
                <tr><td>Dokter</td><td>:</td><td>{{ $rd['dokter'] ?? '-' }}</td></tr>
                <tr><td>Tanggal Pemeriksaan</td><td>:</td><td>{{ $mcu->examination_date->format('d-m-Y') }}</td></tr>
                <tr><td>KLINIS</td><td>:</td><td>{{ $rd['klinis'] ?? 'MEDICAL CHECK UP' }}</td></tr>
                <tr><td class="align-top">COR</td><td class="align-top">:</td><td>{{ $rd['cor'] ?? '-' }}</td></tr>
                <tr><td class="align-top">PULMO</td><td class="align-top">:</td><td>{{ $rd['pulmo'] ?? '-' }}</td></tr>
                <tr><td class="align-top font-bold">KESAN</td><td class="align-top">:</td><td>{{ $rd['kesan'] ?? '-' }}</td></tr>
            </table>
        </div>

        {{-- EKG --}}
        <div class="mt-8 border-t-2 border-slate-300 pt-4">
            <h2 class="text-center font-bold underline text-sm">Hasil Pemeriksaan Treadmill / EKG</h2>
            <table class="w-full mt-2">
                <tr><td class="w-40">Nama Pasien</td><td class="w-3">:</td><td class="font-bold">{{ $p->name }}</td></tr>
                <tr><td>Dokter</td><td>:</td><td>{{ $ek['dokter'] ?? '-' }}</td></tr>
                <tr><td>Tanggal Pemeriksaan</td><td>:</td><td>{{ $mcu->examination_date->format('d-m-Y') }}</td></tr>
                <tr><td class="align-top">Hasil</td><td class="align-top">:</td><td>{{ $ek['hasil'] ?? '-' }}</td></tr>
            </table>
        </div>

    </div>
</div>
</x-app-layout>