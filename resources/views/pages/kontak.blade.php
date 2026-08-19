@extends('layouts.public')
@section('title', 'Kontak — Arifa Medikal Klinik')
@section('content')

<section class="med-pattern border-b border-slate-100 py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" data-aos="fade-up">
        <p class="text-xs font-bold text-sky-600 uppercase tracking-widest">Beranda / Kontak</p>
        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-2">Hubungi Kami</h1>
        <p class="text-slate-500 mt-3 max-w-2xl">
            Tim kami siap membantu kebutuhan medical check-up klinik dan perusahaan Anda.
        </p>
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-2xl border border-slate-100 p-7 text-center hover:shadow-lg transition" data-aos="fade-up">
            <i class="fa-solid fa-location-dot text-3xl text-sky-600"></i>
            <h3 class="font-bold mt-3 text-slate-900">Alamat</h3>
            <p class="text-sm text-slate-500 mt-2">Jln. Banda Aceh–Medan No. 22, Desa Blang Pulo, Kec. Muara Satu, Kota Lhokseumawe</p>
        </div>
        <div class="bg-white rounded-2xl border border-slate-100 p-7 text-center hover:shadow-lg transition" data-aos="fade-up" data-aos-delay="100">
            <i class="fa-solid fa-phone text-3xl text-red-600"></i>
            <h3 class="font-bold mt-3 text-slate-900">Telepon</h3>
            <p class="text-sm text-slate-500 mt-2">0645-8451168<br>0852-6060-1909</p>
        </div>
        <div class="bg-white rounded-2xl border border-slate-100 p-7 text-center hover:shadow-lg transition" data-aos="fade-up" data-aos-delay="200">
            <i class="fa-solid fa-envelope text-3xl text-sky-600"></i>
            <h3 class="font-bold mt-3 text-slate-900">Email & Website</h3>
            <p class="text-sm text-slate-500 mt-2">klinik_arifamedikal@yahoo.com<br>www.arifamedikalklinik.com</p>
        </div>
        <div class="bg-white rounded-2xl border border-slate-100 p-7 text-center hover:shadow-lg transition" data-aos="fade-up" data-aos-delay="300">
            <i class="fa-solid fa-clock text-3xl text-red-600"></i>
            <h3 class="font-bold mt-3 text-slate-900">Jam Operasional</h3>
            <p class="text-sm text-slate-500 mt-2">Senin–Jumat 07.00–17.00<br>Sabtu 07.00–12.00</p>
        </div>
    </div>

    <div class="mt-12 bg-slate-100 rounded-3xl h-72 flex flex-col items-center justify-center text-slate-500 border border-slate-200" data-aos="zoom-in">
        <i class="fa-solid fa-map-location-dot text-5xl text-sky-600"></i>
        <p class="mt-3 text-sm font-semibold">Peta lokasi klinik — dapat diisi Google Maps pada tahap berikutnya</p>
    </div>
</section>

@endsection