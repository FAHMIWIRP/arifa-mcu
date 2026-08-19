@extends('layouts.public')
@section('title', 'Layanan — Arifa Medikal Klinik')
@section('content')

<section class="med-pattern border-b border-slate-100 py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" data-aos="fade-up">
        <p class="text-xs font-bold text-sky-600 uppercase tracking-widest">Beranda / Layanan</p>
        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-2">Layanan Kami</h1>
        <p class="text-slate-500 mt-3 max-w-2xl">
            Solusi lengkap pengelolaan medical check-up untuk klinik, laboratorium, dan perusahaan mitra.
        </p>
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white rounded-2xl border border-slate-100 p-7 hover:shadow-lg hover:-translate-y-1 transition" data-aos="fade-up">
            <div class="w-12 h-12 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center text-xl"><i class="fa-solid fa-stethoscope"></i></div>
            <h3 class="font-bold mt-4 text-slate-900">Medical Check-Up Karyawan</h3>
            <p class="text-sm text-slate-500 mt-2">Pemeriksaan pra-kerja maupun berkala sesuai kebutuhan personal dan korporasi.</p>
            <ul class="mt-4 space-y-1.5 text-xs text-slate-600">
                <li><i class="fa-solid fa-check text-sky-600 mr-1.5"></i>Anamnesa & pemeriksaan fisik lengkap</li>
                <li><i class="fa-solid fa-check text-sky-600 mr-1.5"></i>Riwayat pajanan pekerjaan</li>
                <li><i class="fa-solid fa-check text-sky-600 mr-1.5"></i>Kesimpulan kelayakan kerja</li>
            </ul>
        </div>
        <div class="bg-white rounded-2xl border border-slate-100 p-7 hover:shadow-lg hover:-translate-y-1 transition" data-aos="fade-up" data-aos-delay="100">
            <div class="w-12 h-12 rounded-xl bg-red-100 text-red-600 flex items-center justify-center text-xl"><i class="fa-solid fa-file-pdf"></i></div>
            <h3 class="font-bold mt-4 text-slate-900">Laporan PDF Otomatis</h3>
            <p class="text-sm text-slate-500 mt-2">Hasil MCU tersusun menjadi dokumen resmi berkop surat, siap cetak A4.</p>
            <ul class="mt-4 space-y-1.5 text-xs text-slate-600">
                <li><i class="fa-solid fa-check text-red-600 mr-1.5"></i>Format sesuai laporan resmi klinik</li>
                <li><i class="fa-solid fa-check text-red-600 mr-1.5"></i>Blok tanda tangan dokter & SIP</li>
                <li><i class="fa-solid fa-check text-red-600 mr-1.5"></i>Lampiran lab, radiologi, EKG</li>
            </ul>
        </div>
        <div class="bg-white rounded-2xl border border-slate-100 p-7 hover:shadow-lg hover:-translate-y-1 transition" data-aos="fade-up" data-aos-delay="200">
            <div class="w-12 h-12 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center text-xl"><i class="fa-solid fa-box-archive"></i></div>
            <h3 class="font-bold mt-4 text-slate-900">Rekam Medis Digital</h3>
            <p class="text-sm text-slate-500 mt-2">Riwayat pemeriksaan tersimpan aman dan dapat ditelusuri kapan pun.</p>
            <ul class="mt-4 space-y-1.5 text-xs text-slate-600">
                <li><i class="fa-solid fa-check text-sky-600 mr-1.5"></i>Pencarian berdasarkan nama / No MCU</li>
                <li><i class="fa-solid fa-check text-sky-600 mr-1.5"></i>Riwayat berulang per karyawan</li>
                <li><i class="fa-solid fa-check text-sky-600 mr-1.5"></i>Data terlindungi hak akses</li>
            </ul>
        </div>
        <div class="bg-white rounded-2xl border border-slate-100 p-7 hover:shadow-lg hover:-translate-y-1 transition" data-aos="fade-up">
            <div class="w-12 h-12 rounded-xl bg-red-100 text-red-600 flex items-center justify-center text-xl"><i class="fa-solid fa-flask"></i></div>
            <h3 class="font-bold mt-4 text-slate-900">Interpretasi Lab Otomatis</h3>
            <p class="text-sm text-slate-500 mt-2">Hematologi, kimia darah, dan urinalisis dengan nilai rujukan otomatis.</p>
            <ul class="mt-4 space-y-1.5 text-xs text-slate-600">
                <li><i class="fa-solid fa-check text-red-600 mr-1.5"></i>Penandaan Tinggi / Rendah</li>
                <li><i class="fa-solid fa-check text-red-600 mr-1.5"></i>Nilai rujukan sesuai standar</li>
                <li><i class="fa-solid fa-check text-red-600 mr-1.5"></i>Analisis & dokter penanggung jawab</li>
            </ul>
        </div>
        <div class="bg-white rounded-2xl border border-slate-100 p-7 hover:shadow-lg hover:-translate-y-1 transition" data-aos="fade-up" data-aos-delay="100">
            <div class="w-12 h-12 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center text-xl"><i class="fa-solid fa-chart-line"></i></div>
            <h3 class="font-bold mt-4 text-slate-900">Dashboard Statistik</h3>
            <p class="text-sm text-slate-500 mt-2">Pantau jumlah pemeriksaan dan kesimpulan kelayakan secara real-time.</p>
            <ul class="mt-4 space-y-1.5 text-xs text-slate-600">
                <li><i class="fa-solid fa-check text-sky-600 mr-1.5"></i>Total pasien & MCU</li>
                <li><i class="fa-solid fa-check text-sky-600 mr-1.5"></i>Rekap kesimpulan kelayakan</li>
                <li><i class="fa-solid fa-check text-sky-600 mr-1.5"></i>Ringkasan harian</li>
            </ul>
        </div>
        <div class="bg-white rounded-2xl border border-slate-100 p-7 hover:shadow-lg hover:-translate-y-1 transition" data-aos="fade-up" data-aos-delay="200">
            <div class="w-12 h-12 rounded-xl bg-red-100 text-red-600 flex items-center justify-center text-xl"><i class="fa-solid fa-handshake"></i></div>
            <h3 class="font-bold mt-4 text-slate-900">Paket Perusahaan</h3>
            <p class="text-sm text-slate-500 mt-2">Skema langganan bulanan yang fleksibel bagi klinik dan mitra korporasi.</p>
            <ul class="mt-4 space-y-1.5 text-xs text-slate-600">
                <li><i class="fa-solid fa-check text-red-600 mr-1.5"></i>MCU berkala karyawan</li>
                <li><i class="fa-solid fa-check text-red-600 mr-1.5"></i>Laporan rekap per perusahaan</li>
                <li><i class="fa-solid fa-check text-red-600 mr-1.5"></i>Dukungan implementasi</li>
            </ul>
        </div>
    </div>
</section>

@endsection