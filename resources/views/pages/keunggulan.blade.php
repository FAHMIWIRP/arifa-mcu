@extends('layouts.public')
@section('title', 'Keunggulan — Arifa Medikal Klinik')
@section('content')

<section class="med-pattern border-b border-slate-100 py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" data-aos="fade-up">
        <p class="text-xs font-bold text-sky-600 uppercase tracking-widest">Beranda / Keunggulan</p>
        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-2">Mengapa Arifa Medikal Klinik?</h1>
        <p class="text-slate-500 mt-3 max-w-2xl">
            Teknologi modern yang dipadukan dengan standar pelayanan medis profesional.
        </p>
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-2xl border border-slate-100 p-7 text-center hover:shadow-lg transition" data-aos="fade-up">
            <div class="w-14 h-14 mx-auto rounded-2xl bg-sky-100 text-sky-600 flex items-center justify-center text-2xl"><i class="fa-solid fa-bolt"></i></div>
            <h3 class="font-bold mt-4 text-slate-900">Cepat</h3>
            <p class="text-sm text-slate-500 mt-2">Laporan resmi tersusun otomatis dan siap cetak setelah kesimpulan dokter diisi.</p>
        </div>
        <div class="bg-white rounded-2xl border border-slate-100 p-7 text-center hover:shadow-lg transition" data-aos="fade-up" data-aos-delay="100">
            <div class="w-14 h-14 mx-auto rounded-2xl bg-red-100 text-red-600 flex items-center justify-center text-2xl"><i class="fa-solid fa-clipboard-check"></i></div>
            <h3 class="font-bold mt-4 text-slate-900">Akurat</h3>
            <p class="text-sm text-slate-500 mt-2">Interpretasi laboratorium otomatis sesuai nilai rujukan medis.</p>
        </div>
        <div class="bg-white rounded-2xl border border-slate-100 p-7 text-center hover:shadow-lg transition" data-aos="fade-up" data-aos-delay="200">
            <div class="w-14 h-14 mx-auto rounded-2xl bg-sky-100 text-sky-600 flex items-center justify-center text-2xl"><i class="fa-solid fa-shield-halved"></i></div>
            <h3 class="font-bold mt-4 text-slate-900">Aman</h3>
            <p class="text-sm text-slate-500 mt-2">Data pasien terlindungi sistem akun, hak akses, dan kata sandi.</p>
        </div>
        <div class="bg-white rounded-2xl border border-slate-100 p-7 text-center hover:shadow-lg transition" data-aos="fade-up" data-aos-delay="300">
            <div class="w-14 h-14 mx-auto rounded-2xl bg-red-100 text-red-600 flex items-center justify-center text-2xl"><i class="fa-solid fa-leaf"></i></div>
            <h3 class="font-bold mt-4 text-slate-900">Paperless</h3>
            <p class="text-sm text-slate-500 mt-2">Seluruh proses tercatat digital tanpa tumpukan berkas.</p>
        </div>
    </div>

    <div class="mt-14 bg-sky-600 rounded-3xl p-10 text-white grid md:grid-cols-2 gap-10 items-center" data-aos="fade-up">
        <div>
            <h2 class="text-2xl md:text-3xl font-extrabold">Standar Pelayanan yang Kami Jaga</h2>
            <p class="mt-4 text-sky-100 leading-relaxed">
                Setiap pemeriksaan mengikuti prosedur yang terdokumentasi, sehingga klinik dan
                perusahaan mitra memperoleh hasil yang dapat dipertanggungjawabkan.
            </p>
        </div>
        <ul class="space-y-3 text-sm font-semibold">
            <li class="flex gap-3 bg-sky-500/40 rounded-xl p-4"><i class="fa-solid fa-circle-check mt-0.5"></i> Prosedur pemeriksaan terstandar dan terdokumentasi.</li>
            <li class="flex gap-3 bg-sky-500/40 rounded-xl p-4"><i class="fa-solid fa-circle-check mt-0.5"></i> Kesimpulan ditandatangani dokter penanggung jawab MCU.</li>
            <li class="flex gap-3 bg-sky-500/40 rounded-xl p-4"><i class="fa-solid fa-circle-check mt-0.5"></i> Arsip hasil dapat ditelusuri kembali kapan pun.</li>
            <li class="flex gap-3 bg-sky-500/40 rounded-xl p-4"><i class="fa-solid fa-circle-check mt-0.5"></i> Multi-pengguna: admin, petugas, dan dokter.</li>
        </ul>
    </div>
</section>

@endsection