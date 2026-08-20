@extends('layouts.public')
@section('title', 'Arifa Medikal Klinik — Specialist Corporate Medical Check-Up')
@section('content')

<style>
    .marquee { overflow: hidden; }
    .marquee-track { display: flex; width: max-content; animation: marquee 35s linear infinite; }
    .marquee:hover .marquee-track { animation-play-state: paused; }
    @keyframes marquee {
        from { transform: translateX(0); }
        to   { transform: translateX(-50%); }
    }
</style>

{{-- HERO --}}
<section class="med-pattern">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 grid lg:grid-cols-5 gap-10 items-center">
        <div class="lg:col-span-3" data-aos="fade-right">
            <span class="inline-flex items-center gap-2 bg-sky-50 border border-sky-100 text-sky-700 text-xs font-bold px-3 py-1.5 rounded-full">
                <i class="fa-solid fa-hospital"></i> Specialist Corporate Medical Check-Up
            </span>
            <h1 class="mt-6 text-4xl md:text-5xl font-extrabold text-slate-900 leading-tight">
                Pemeriksaan Kesehatan Karyawan yang
                <span class="text-sky-600">Cepat</span>,
                <span class="text-red-600">Akurat</span>, & Terdigitalisasi
            </h1>
            <p class="mt-4 text-lg font-semibold text-slate-800">
                <span id="typed-hero"></span>
            </p>
            <p class="mt-3 text-slate-500 leading-relaxed max-w-xl">
                Arifa Medikal Klinik mengelola seluruh alur medical check-up — pendaftaran,
                pemeriksaan fisik dan laboratorium, kesimpulan dokter, hingga laporan PDF
                berkop resmi — dalam satu sistem yang rapi dan aman.
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="{{ route('page.kontak') }}" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-7 py-3 rounded-xl shadow">
                    Jadwalkan MCU <i class="fa-solid fa-calendar-check ml-1"></i>
                </a>
                <a href="{{ route('page.layanan') }}" class="border border-slate-300 text-slate-700 font-semibold px-7 py-3 rounded-xl hover:border-sky-500 hover:text-sky-600">
                    Lihat Layanan
                </a>
            </div>
            <div class="mt-8 flex flex-wrap gap-6 text-xs font-semibold text-slate-500">
                <span><i class="fa-solid fa-shield-halved text-sky-600 mr-1.5"></i>Data pasien terlindungi</span>
                <span><i class="fa-solid fa-hand-holding-medical text-green-600 mr-1.5"></i>Menerima BPJS Kesehatan</span>
                <span><i class="fa-solid fa-bolt text-red-600 mr-1.5"></i>Laporan siap dalam hitungan menit</span>
                <span><i class="fa-solid fa-user-doctor text-sky-600 mr-1.5"></i>Dokter bersertifikat</span>
            </div>
        </div>

        <div class="lg:col-span-2 relative" data-aos="fade-left">
            <div class="bg-slate-900 rounded-3xl shadow-2xl p-8 text-white">
                <h2 class="text-xl font-extrabold">Pemeriksaan Andalan</h2>
                <p class="text-slate-400 text-sm mt-2">Layanan utama kami untuk kebutuhan personal maupun korporasi.</p>
                <div class="mt-6 space-y-4">
                    <div class="bg-slate-800 rounded-2xl p-4 flex items-center gap-4">
                        <div class="w-11 h-11 rounded-full bg-sky-500 flex items-center justify-center"><i class="fa-solid fa-stethoscope"></i></div>
                        <div>
                            <p class="text-xs text-slate-400">Layanan Utama</p>
                            <p class="font-bold">Medical Check-Up</p>
                        </div>
                    </div>
                    <div class="bg-slate-800 rounded-2xl p-4 flex items-center gap-4">
                        <div class="w-11 h-11 rounded-full bg-green-500 flex items-center justify-center"><i class="fa-solid fa-hand-holding-medical"></i></div>
                        <div>
                            <p class="text-xs text-slate-400">Kerja Sama Resmi</p>
                            <p class="font-bold">BPJS Kesehatan</p>
                        </div>
                    </div>
                    <div class="bg-slate-800 rounded-2xl p-4 flex items-center gap-4">
                        <div class="w-11 h-11 rounded-full bg-red-500 flex items-center justify-center"><i class="fa-solid fa-file-pdf"></i></div>
                        <div>
                            <p class="text-xs text-slate-400">Dokumen Otomatis</p>
                            <p class="font-bold">Laporan PDF Resmi</p>
                        </div>
                    </div>
                </div>
                <a href="{{ route('page.layanan') }}" class="mt-8 block text-center bg-red-600 hover:bg-red-700 rounded-xl py-3.5 font-semibold">
                    Lihat Layanan <i class="fa-solid fa-arrow-right ml-1"></i>
                </a>
            </div>
            <div class="absolute -bottom-5 -left-4 bg-white rounded-2xl shadow-xl border border-slate-100 px-5 py-3 flex items-center gap-3" data-aos="zoom-in" data-aos-delay="250">
                <i class="fa-solid fa-circle-check text-green-600 text-xl"></i>
                <div>
                    <p class="text-xs text-slate-500">Kesimpulan MCU</p>
                    <p class="text-sm font-extrabold text-slate-900">LAIK BEKERJA</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- BANNER BPJS --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-10">
    <div class="rounded-2xl border border-green-200 bg-green-50 px-6 py-4 flex flex-wrap items-center gap-4" data-aos="fade-up">
        <div class="w-11 h-11 rounded-xl bg-green-600 text-white flex items-center justify-center text-xl">
            <i class="fa-solid fa-hand-holding-medical"></i>
        </div>
        <div class="flex-1 min-w-[220px]">
            <p class="font-bold text-green-800">Menerima Layanan BPJS Kesehatan</p>
            <p class="text-sm text-green-700">Arifa Medikal Klinik melayani pemeriksaan bagi peserta BPJS Kesehatan sesuai ketentuan yang berlaku.</p>
        </div>
        <a href="{{ route('page.kontak') }}" class="text-sm font-semibold text-green-700 hover:underline">
            Info selengkapnya <i class="fa-solid fa-arrow-right ml-1"></i>
        </a>
    </div>
</section>

{{-- STATISTIK --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 text-center" data-aos="fade-up">
            <i class="fa-solid fa-user-group text-2xl text-sky-600"></i>
            <p class="text-2xl font-extrabold text-slate-900 mt-2" data-counter="10000" data-suffix="+">0</p>
            <p class="text-xs text-slate-500 mt-1">Pemeriksaan Tercatat</p>
        </div>
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 text-center" data-aos="fade-up" data-aos-delay="100">
            <i class="fa-solid fa-building text-2xl text-red-600"></i>
            <p class="text-2xl font-extrabold text-slate-900 mt-2" data-counter="30" data-suffix="+">0</p>
            <p class="text-xs text-slate-500 mt-1">Mitra Klinik & Perusahaan</p>
        </div>
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 text-center" data-aos="fade-up" data-aos-delay="200">
            <i class="fa-solid fa-bolt text-2xl text-sky-600"></i>
            <p class="text-2xl font-extrabold text-slate-900 mt-2" data-counter="200" data-suffix="+">0</p>
            <p class="text-xs text-slate-500 mt-1">Kapasitas Pemeriksaan / Hari</p>
        </div>
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 text-center" data-aos="fade-up" data-aos-delay="300">
            <i class="fa-solid fa-shield-halved text-2xl text-red-600"></i>
            <p class="text-2xl font-extrabold text-slate-900 mt-2" data-counter="100" data-suffix="%">0</p>
            <p class="text-xs text-slate-500 mt-1">Data Digital & Aman</p>
        </div>
    </div>
</section>

{{-- DIPERCAYA OLEH (DARI DATABASE) --}}
<section class="py-14 bg-white border-t border-slate-100 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <p class="text-xs font-bold uppercase tracking-widest text-slate-400">Dipercaya Oleh</p>
        <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 mt-2">Perusahaan & Mitra Kerja Sama</h2>
    </div>

    @php $mitras = \App\Models\Mitra::latest()->get(); @endphp

    <div class="marquee mt-8" data-aos="fade-up" data-aos-delay="100">
        <div class="marquee-track items-stretch">
            @for ($round = 0; $round < 2; $round++)
                @forelse ($mitras as $m)
                    <div class="shrink-0 mr-4 w-72 bg-white border border-slate-100 rounded-2xl shadow-sm overflow-hidden">
                        <div class="h-32 bg-sky-50 flex items-center justify-center overflow-hidden">
                            @if ($m->photo)
                                <img src="{{ asset('uploads/mitra/' . $m->photo) }}" alt="{{ $m->name }}" loading="lazy" class="h-full w-full object-cover">
                            @else
                                <i class="fa-solid fa-building text-4xl text-sky-300"></i>
                            @endif
                        </div>
                        <div class="p-4">
                            <p class="font-bold text-slate-800 text-sm">{{ $m->name }}</p>
                            <p class="text-xs text-slate-500 mt-1">{{ $m->description ?? 'Mitra kerja sama Arifa Medikal Klinik.' }}</p>
                        </div>
                    </div>
                @empty
                    <div class="shrink-0 mr-4 w-72 bg-white border border-slate-100 rounded-2xl shadow-sm p-6 text-center text-slate-400 text-sm">
                        <i class="fa-solid fa-handshake text-3xl text-sky-300 block mb-2"></i>
                        Mitra belum ditambahkan — kelola via menu Mitra Perusahaan di dashboard.
                    </div>
                @endforelse
            @endfor
        </div>
    </div>
</section>

{{-- LAYANAN (SWIPER) --}}
<section class="bg-slate-50 py-16 border-y border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-end justify-between gap-4" data-aos="fade-up">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-900">Layanan Unggulan</h2>
                <div class="w-16 h-1 bg-red-600 mt-3 rounded-full"></div>
            </div>
            <a href="{{ route('page.layanan') }}" class="text-sm font-semibold text-sky-600 hover:text-sky-700">
                Lihat semua <i class="fa-solid fa-arrow-right ml-1"></i>
            </a>
        </div>

        <div class="swiper swiper-layanan mt-10 pb-12" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><div class="bg-white rounded-2xl border border-slate-100 p-7 h-full hover:shadow-lg transition"><div class="w-12 h-12 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center text-xl"><i class="fa-solid fa-stethoscope"></i></div><h3 class="font-bold mt-4 text-slate-900">MCU Karyawan</h3><p class="text-sm text-slate-500 mt-2">Pemeriksaan pra-kerja dan berkala sesuai kebutuhan korporasi.</p></div></div>
                <div class="swiper-slide"><div class="bg-white rounded-2xl border border-slate-100 p-7 h-full hover:shadow-lg transition"><div class="w-12 h-12 rounded-xl bg-green-100 text-green-600 flex items-center justify-center text-xl"><i class="fa-solid fa-hand-holding-medical"></i></div><h3 class="font-bold mt-4 text-slate-900">Layanan BPJS Kesehatan</h3><p class="text-sm text-slate-500 mt-2">Pemeriksaan bagi peserta BPJS sesuai ketentuan yang berlaku.</p></div></div>
                <div class="swiper-slide"><div class="bg-white rounded-2xl border border-slate-100 p-7 h-full hover:shadow-lg transition"><div class="w-12 h-12 rounded-xl bg-red-100 text-red-600 flex items-center justify-center text-xl"><i class="fa-solid fa-file-pdf"></i></div><h3 class="font-bold mt-4 text-slate-900">Laporan PDF Otomatis</h3><p class="text-sm text-slate-500 mt-2">Dokumen berkop resmi klinik, siap cetak ukuran A4.</p></div></div>
                <div class="swiper-slide"><div class="bg-white rounded-2xl border border-slate-100 p-7 h-full hover:shadow-lg transition"><div class="w-12 h-12 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center text-xl"><i class="fa-solid fa-box-archive"></i></div><h3 class="font-bold mt-4 text-slate-900">Rekam Medis Digital</h3><p class="text-sm text-slate-500 mt-2">Riwayat pemeriksaan tersimpan aman dan mudah ditelusuri.</p></div></div>
                <div class="swiper-slide"><div class="bg-white rounded-2xl border border-slate-100 p-7 h-full hover:shadow-lg transition"><div class="w-12 h-12 rounded-xl bg-red-100 text-red-600 flex items-center justify-center text-xl"><i class="fa-solid fa-flask"></i></div><h3 class="font-bold mt-4 text-slate-900">Interpretasi Lab Otomatis</h3><p class="text-sm text-slate-500 mt-2">Penandaan nilai abnormal sesuai rujukan secara otomatis.</p></div></div>
                <div class="swiper-slide"><div class="bg-white rounded-2xl border border-slate-100 p-7 h-full hover:shadow-lg transition"><div class="w-12 h-12 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center text-xl"><i class="fa-solid fa-chart-line"></i></div><h3 class="font-bold mt-4 text-slate-900">Dashboard Statistik</h3><p class="text-sm text-slate-500 mt-2">Pantau volume pemeriksaan dan kesimpulan kelayakan.</p></div></div>
                <div class="swiper-slide"><div class="bg-white rounded-2xl border border-slate-100 p-7 h-full hover:shadow-lg transition"><div class="w-12 h-12 rounded-xl bg-red-100 text-red-600 flex items-center justify-center text-xl"><i class="fa-solid fa-handshake"></i></div><h3 class="font-bold mt-4 text-slate-900">Paket Perusahaan</h3><p class="text-sm text-slate-500 mt-2">Skema langganan bulanan yang fleksibel bagi mitra.</p></div></div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</section>

{{-- GALERI (DARI DATABASE: FOTO + JUDUL + DESKRIPSI) --}}
<section class="py-16 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" data-aos="fade-up">
        <div class="flex flex-wrap items-end justify-between gap-4">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-900">Galeri Klinik</h2>
                <div class="w-16 h-1 bg-red-600 mt-3 rounded-full"></div>
            </div>
            <p class="text-sm text-slate-500 max-w-md">
                Dokumentasi nyata pelayanan kami — konsultasi dokter, treadmill/EKG, USG,
                audiometri, dokter gigi, hingga laboratorium lengkap.
            </p>
        </div>
    </div>

    @php $galleries = \App\Models\Gallery::latest()->get(); @endphp

    <div class="marquee mt-10" data-aos="fade-up" data-aos-delay="100">
        <div class="marquee-track items-stretch">
            @for ($round = 0; $round < 2; $round++)
                @forelse ($galleries as $g)
                    <div class="shrink-0 mr-4 w-80 bg-white border border-slate-100 rounded-2xl shadow-md overflow-hidden">
                        <div class="h-56 bg-slate-50 overflow-hidden">
                            @if ($g->photo)
                                <img src="{{ asset('uploads/galeri/' . $g->photo) }}" alt="{{ $g->title }}" loading="lazy" class="h-full w-full object-cover">
                            @else
                                <div class="h-full flex items-center justify-center text-slate-300"><i class="fa-solid fa-image text-4xl"></i></div>
                            @endif
                        </div>
                        <div class="p-4">
                            <p class="font-bold text-slate-800 text-sm">{{ $g->title }}</p>
                            <p class="text-xs text-slate-500 mt-1">{{ $g->description ?? '' }}</p>
                        </div>
                    </div>
                @empty
                    @foreach ([
                        ['fa-solid fa-stethoscope', 'Konsultasi Dokter'],
                        ['fa-solid fa-heart-pulse', 'Treadmill / EKG'],
                        ['fa-solid fa-wave-square', 'Audiometri'],
                        ['fa-solid fa-tooth', 'Dokter Gigi'],
                        ['fa-solid fa-flask', 'Laboratorium'],
                        ['fa-solid fa-bed-pulse', 'UGD'],
                    ] as $ph)
                        <div class="h-56 w-80 shrink-0 mr-4 rounded-2xl border border-slate-100 bg-slate-50 flex flex-col items-center justify-center gap-3">
                            <i class="{{ $ph[0] }} text-4xl text-sky-500"></i>
                            <span class="text-sm font-semibold text-slate-500">{{ $ph[1] }}</span>
                        </div>
                    @endforeach
                @endforelse
            @endfor
        </div>
    </div>
    <p class="text-center text-xs text-slate-400 mt-4">Kelola foto mitra & galeri melalui dashboard admin — tampil otomatis di halaman ini.</p>
</section>

{{-- KEUNGGULAN SINGKAT --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 grid lg:grid-cols-2 gap-10 items-center">
    <div data-aos="fade-right">
        <h2 class="text-3xl font-extrabold text-slate-900">Dirancang untuk Kerja Nyata di Klinik</h2>
        <div class="w-16 h-1 bg-red-600 mt-3 rounded-full"></div>
        <p class="mt-5 text-slate-500 leading-relaxed">
            Setiap halaman operasional disusun agar petugas dapat bekerja cepat tanpa
            kelelahan visual, sementara laporan yang dihasilkan tetap formal dan sesuai
            standar dokumen medis klinik.
        </p>
        <ul class="mt-6 space-y-3 text-sm font-semibold text-slate-700">
            <li class="flex gap-3"><i class="fa-solid fa-circle-check text-sky-600 mt-0.5"></i> Form pemeriksaan tersusun per seksi seperti berkas resmi.</li>
            <li class="flex gap-3"><i class="fa-solid fa-circle-check text-sky-600 mt-0.5"></i> Kesimpulan kelayakan kerja dan derajat kesehatan P1–P7.</li>
            <li class="flex gap-3"><i class="fa-solid fa-circle-check text-green-600 mt-0.5"></i> Menerima layanan BPJS Kesehatan bagi peserta.</li>
        </ul>
    </div>
    <div class="grid grid-cols-2 gap-5">
        <div class="bg-sky-50 rounded-2xl p-6 border border-sky-100" data-aos="zoom-in"><i class="fa-solid fa-bolt text-2xl text-sky-600"></i><h3 class="font-bold mt-3 text-slate-900">Cepat</h3><p class="text-xs text-slate-500 mt-1">Laporan tercetak dalam hitungan menit.</p></div>
        <div class="bg-red-50 rounded-2xl p-6 border border-red-100" data-aos="zoom-in" data-aos-delay="100"><i class="fa-solid fa-clipboard-check text-2xl text-red-600"></i><h3 class="font-bold mt-3 text-slate-900">Akurat</h3><p class="text-xs text-slate-500 mt-1">Interpretasi lab sesuai nilai rujukan.</p></div>
        <div class="bg-green-50 rounded-2xl p-6 border border-green-100" data-aos="zoom-in" data-aos-delay="200"><i class="fa-solid fa-hand-holding-medical text-2xl text-green-600"></i><h3 class="font-bold mt-3 text-slate-900">BPJS</h3><p class="text-xs text-slate-500 mt-1">Melayani peserta BPJS Kesehatan.</p></div>
        <div class="bg-sky-50 rounded-2xl p-6 border border-sky-100" data-aos="zoom-in" data-aos-delay="300"><i class="fa-solid fa-leaf text-2xl text-sky-600"></i><h3 class="font-bold mt-3 text-slate-900">Paperless</h3><p class="text-xs text-slate-500 mt-1">Tanpa tumpukan berkas kertas.</p></div>
    </div>
</section>

{{-- CTA --}}
<section class="bg-sky-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 flex flex-wrap items-center justify-between gap-6" data-aos="fade-up">
        <div>
            <h2 class="text-2xl md:text-3xl font-extrabold text-white">Siap menjadwalkan MCU karyawan Anda?</h2>
            <p class="text-sky-100 mt-2 text-sm">Hubungi tim kami untuk penjadwalan pemeriksaan, kerja sama korporasi, maupun layanan BPJS.</p>
        </div>
        <a href="{{ route('page.kontak') }}" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-8 py-3.5 rounded-xl shadow">
            Hubungi Kami <i class="fa-solid fa-arrow-right ml-1"></i>
        </a>
    </div>
</section>

@endsection