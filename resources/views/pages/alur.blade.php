@extends('layouts.public')
@section('title', 'Alur Kerja — Arifa Medikal Klinik')
@section('content')

<section class="med-pattern border-b border-slate-100 py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" data-aos="fade-up">
        <p class="text-xs font-bold text-sky-600 uppercase tracking-widest">Beranda / Alur Kerja</p>
        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-2">Alur Kerja Sederhana</h1>
        <p class="text-slate-500 mt-3 max-w-2xl">
            Tiga langkah dari pendaftaran hingga laporan tercetak — mudah dipelajari oleh seluruh staf.
        </p>
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white rounded-2xl border border-slate-100 p-8 shadow-sm text-center hover:shadow-lg transition" data-aos="fade-up">
            <div class="w-14 h-14 mx-auto rounded-2xl bg-sky-600 text-white text-xl font-extrabold flex items-center justify-center">1</div>
            <h3 class="font-bold mt-4 text-slate-900">Daftarkan Pasien</h3>
            <p class="text-sm text-slate-500 mt-2">Input identitas, NIK, perusahaan, dan bagian/seksi dalam satu formulir singkat.</p>
        </div>
        <div class="bg-white rounded-2xl border border-slate-100 p-8 shadow-sm text-center hover:shadow-lg transition" data-aos="fade-up" data-aos-delay="150">
            <div class="w-14 h-14 mx-auto rounded-2xl bg-red-600 text-white text-xl font-extrabold flex items-center justify-center">2</div>
            <h3 class="font-bold mt-4 text-slate-900">Input Pemeriksaan</h3>
            <p class="text-sm text-slate-500 mt-2">Anamnesa, fisik lengkap, pajanan pekerjaan, lab, radiologi, dan EKG per seksi.</p>
        </div>
        <div class="bg-white rounded-2xl border border-slate-100 p-8 shadow-sm text-center hover:shadow-lg transition" data-aos="fade-up" data-aos-delay="300">
            <div class="w-14 h-14 mx-auto rounded-2xl bg-slate-900 text-white text-xl font-extrabold flex items-center justify-center">3</div>
            <h3 class="font-bold mt-4 text-slate-900">Cetak Hasil PDF</h3>
            <p class="text-sm text-slate-500 mt-2">Dokter mengisi kesimpulan; sistem menyusun laporan resmi siap cetak.</p>
        </div>
    </div>

    <h2 class="text-2xl font-extrabold text-center text-slate-900 mt-16" data-aos="fade-up">Dirancang untuk Setiap Peran</h2>
    <div class="w-16 h-1 bg-red-600 mx-auto mt-3 rounded-full"></div>
    <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-slate-50 rounded-2xl border border-slate-100 p-7 text-center" data-aos="fade-up">
            <i class="fa-solid fa-user-gear text-3xl text-sky-600"></i>
            <h3 class="font-bold mt-3 text-slate-900">Admin Klinik</h3>
            <p class="text-sm text-slate-500 mt-2">Mengelola pendaftaran pasien, arsip hasil, dan pencetakan laporan.</p>
        </div>
        <div class="bg-slate-50 rounded-2xl border border-slate-100 p-7 text-center" data-aos="fade-up" data-aos-delay="150">
            <i class="fa-solid fa-user-nurse text-3xl text-red-600"></i>
            <h3 class="font-bold mt-3 text-slate-900">Petugas Pemeriksa</h3>
            <p class="text-sm text-slate-500 mt-2">Menginput anamnesa, tanda vital, pemeriksaan fisik, dan laboratorium.</p>
        </div>
        <div class="bg-slate-50 rounded-2xl border border-slate-100 p-7 text-center" data-aos="fade-up" data-aos-delay="300">
            <i class="fa-solid fa-user-doctor text-3xl text-sky-600"></i>
            <h3 class="font-bold mt-3 text-slate-900">Dokter</h3>
            <p class="text-sm text-slate-500 mt-2">Meninjau hasil, mengisi anjuran, dan menetapkan kesimpulan kelayakan.</p>
        </div>
    </div>
</section>

@endsection