@extends('layouts.public')
@section('title', 'Arifa Medikal Klinik — Specialist Corporate Medical Check-Up')
@section('content')

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
                <span><i class="fa-solid fa-bolt text-red-600 mr-1.5"></i>Laporan siap dalam hitungan menit</span>
                <span><i class="fa-solid fa-user-doctor text-sky-600 mr-1.5"></i>Dokter penanggung jawab bersertifikat</span>
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
            <li class="flex gap-3"><i class="fa-solid fa-circle-check text-sky-600 mt-0.5"></i> Blok tanda tangan dokter lengkap dengan SIP & SK Kemenaker.</li>
        </ul>
    </div>
    <div class="grid grid-cols-2 gap-5">
        <div class="bg-sky-50 rounded-2xl p-6 border border-sky-100" data-aos="zoom-in"><i class="fa-solid fa-bolt text-2xl text-sky-600"></i><h3 class="font-bold mt-3 text-slate-900">Cepat</h3><p class="text-xs text-slate-500 mt-1">Laporan tercetak dalam hitungan menit.</p></div>
        <div class="bg-red-50 rounded-2xl p-6 border border-red-100" data-aos="zoom-in" data-aos-delay="100"><i class="fa-solid fa-clipboard-check text-2xl text-red-600"></i><h3 class="font-bold mt-3 text-slate-900">Akurat</h3><p class="text-xs text-slate-500 mt-1">Interpretasi lab sesuai nilai rujukan.</p></div>
        <div class="bg-red-50 rounded-2xl p-6 border border-red-100" data-aos="zoom-in" data-aos-delay="200"><i class="fa-solid fa-shield-halved text-2xl text-red-600"></i><h3 class="font-bold mt-3 text-slate-900">Aman</h3><p class="text-xs text-slate-500 mt-1">Akun & hak akses berlapis.</p></div>
        <div class="bg-sky-50 rounded-2xl p-6 border border-sky-100" data-aos="zoom-in" data-aos-delay="300"><i class="fa-solid fa-leaf text-2xl text-sky-600"></i><h3 class="font-bold mt-3 text-slate-900">Paperless</h3><p class="text-xs text-slate-500 mt-1">Tanpa tumpukan berkas kertas.</p></div>
    </div>
</section>

<section class="bg-sky-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 flex flex-wrap items-center justify-between gap-6" data-aos="fade-up">
        <div>
            <h2 class="text-2xl md:text-3xl font-extrabold text-white">Siap menjadwalkan MCU karyawan Anda?</h2>
            <p class="text-sky-100 mt-2 text-sm">Hubungi tim kami untuk penjadwalan pemeriksaan maupun kerja sama korporasi.</p>
        </div>
        <a href="{{ route('page.kontak') }}" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-8 py-3.5 rounded-xl shadow">
            Hubungi Kami <i class="fa-solid fa-arrow-right ml-1"></i>
        </a>
    </div>
</section>

@endsection