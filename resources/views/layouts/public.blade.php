<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Arifa Medikal Klinik — Specialist Corporate Medical Check-Up')</title>
    <meta name="description" content="Sistem medical check-up terintegrasi untuk klinik dan perusahaan. Laporan PDF resmi, rekam medis digital, dan paket korporasi.">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <style>
        [x-cloak] { display: none !important; }
        html { scroll-behavior: smooth; }

        #preloader { position: fixed; inset: 0; background: #fff; z-index: 100; display: flex; align-items: center; justify-content: center; transition: opacity .5s ease; }
        #preloader.hide { opacity: 0; pointer-events: none; }
        .pulse-logo { animation: pulse 1.2s ease-in-out infinite; }
        @keyframes pulse { 0%,100% { transform: scale(1); } 50% { transform: scale(1.08); opacity: .75; } }

        #navbar { transition: box-shadow .3s ease; }
        #navbar.scrolled { box-shadow: 0 12px 32px -14px rgb(2 132 199 / .28); }

        .med-pattern { background-image: url("data:image/svg+xml,%3Csvg width='28' height='28' viewBox='0 0 28 28' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M12 4h4v8h8v4h-8v8h-4v-8H4v-4h8z' fill='%230ea5e9' fill-opacity='0.06'/%3E%3C/svg%3E"); }

        #toTop { position: fixed; right: 1.25rem; bottom: 1.25rem; z-index: 60; opacity: 0; pointer-events: none; transform: translateY(8px); transition: all .3s ease; }
        #toTop.show { opacity: 1; pointer-events: auto; transform: translateY(0); }

        .swiper-pagination-bullet-active { background: #0284c7; }
        .swiper-button-next, .swiper-button-prev { color: #0284c7; }
        .swiper-button-next:after, .swiper-button-prev:after { font-size: 18px; font-weight: 700; }
        .typed-cursor { color: #dc2626; }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-slate-700 antialiased">

    <div id="preloader">
        <img src="{{ asset('images/logo.png') }}" alt="Arifa Medikal Klinik" class="h-16 w-auto pulse-logo">
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-5" x-data="{ open: false }">
        <header id="navbar" class="bg-white rounded-2xl border border-slate-100 px-5 py-3.5 flex items-center justify-between">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Arifa Medikal Klinik" class="h-10 w-auto">
            </a>
            <nav class="hidden lg:flex items-center gap-7 text-sm font-semibold text-slate-600">
                <a href="{{ route('home') }}" class="{{ request()->is('/') ? 'text-sky-600' : 'hover:text-sky-600' }}">Beranda</a>
                <a href="{{ route('page.layanan') }}" class="{{ request()->is('layanan') ? 'text-sky-600' : 'hover:text-sky-600' }}">Layanan</a>
                <a href="{{ route('page.keunggulan') }}" class="{{ request()->is('keunggulan') ? 'text-sky-600' : 'hover:text-sky-600' }}">Keunggulan</a>
                <a href="{{ route('page.alur') }}" class="{{ request()->is('alur') ? 'text-sky-600' : 'hover:text-sky-600' }}">Alur Kerja</a>
                <a href="{{ route('page.kontak') }}" class="{{ request()->is('kontak') ? 'text-sky-600' : 'hover:text-sky-600' }}">Kontak</a>
            </nav>
            <div class="hidden lg:flex items-center gap-3">
                <a href="{{ route('page.kontak') }}" class="bg-red-600 hover:bg-red-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow">
                    <i class="fa-solid fa-headset mr-1"></i> Hubungi Kami
                </a>
            </div>
            <button @click="open = !open" class="lg:hidden w-10 h-10 rounded-xl border border-slate-200 text-slate-600">
                <i class="fa-solid fa-bars"></i>
            </button>
        </header>

        <div x-show="open" x-cloak @click.away="open = false" class="lg:hidden mt-2 rounded-2xl bg-white border border-slate-100 shadow-xl p-4 space-y-1 text-sm font-semibold">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg hover:bg-sky-50 hover:text-sky-600">Beranda</a>
            <a href="{{ route('page.layanan') }}" class="block px-3 py-2 rounded-lg hover:bg-sky-50 hover:text-sky-600">Layanan</a>
            <a href="{{ route('page.keunggulan') }}" class="block px-3 py-2 rounded-lg hover:bg-sky-50 hover:text-sky-600">Keunggulan</a>
            <a href="{{ route('page.alur') }}" class="block px-3 py-2 rounded-lg hover:bg-sky-50 hover:text-sky-600">Alur Kerja</a>
            <a href="{{ route('page.kontak') }}" class="block px-3 py-2 rounded-lg hover:bg-sky-50 hover:text-sky-600">Kontak</a>
            <div class="pt-2">
                <a href="{{ route('page.kontak') }}" class="block text-center bg-red-600 text-white rounded-xl py-2.5">Hubungi Kami</a>
            </div>
        </div>
    </div>

    @yield('content')

    <footer class="bg-slate-900 text-slate-300 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 grid grid-cols-1 md:grid-cols-3 gap-10 text-sm">
            <div>
                <p class="font-extrabold text-lg text-white">Arifa <span class="text-red-500">Medikal Klinik</span></p>
                <p class="mt-3 leading-relaxed text-slate-400">
                    Specialist corporate medical check-up dengan sistem digital terintegrasi
                    untuk klinik dan perusahaan mitra.
                </p>
            </div>
            <div>
                <p class="font-bold text-white">Hubungi Kami</p>
                <p class="mt-3"><i class="fa-solid fa-location-dot text-sky-400 mr-2"></i>Jln. Banda Aceh–Medan No. 22, Desa Blang Pulo, Kec. Muara Satu, Kota Lhokseumawe</p>
                <p class="mt-1"><i class="fa-solid fa-phone text-sky-400 mr-2"></i>0645-8451168 • 0852-6060-1909</p>
                <p class="mt-1"><i class="fa-solid fa-envelope text-sky-400 mr-2"></i>klinik_arifamedikal@yahoo.com</p>
                <p class="mt-1"><i class="fa-solid fa-globe text-sky-400 mr-2"></i>www.arifamedikalklinik.com</p>
            </div>
            <div>
                <p class="font-bold text-white">Jam Operasional</p>
                <p class="mt-3"><i class="fa-solid fa-clock text-sky-400 mr-2"></i>Senin – Jumat: 07.00 – 17.00</p>
                <p class="mt-1"><i class="fa-solid fa-clock text-sky-400 mr-2"></i>Sabtu: 07.00 – 12.00</p>
                <p class="mt-1"><i class="fa-solid fa-clock text-sky-400 mr-2"></i>Minggu & Libur: Tutup</p>
            </div>
        </div>
        <div class="border-t border-slate-800 py-4 text-center text-xs text-slate-500">
            © 2026 Arifa Medikal Klinik. Seluruh hak cipta dilindungi.
        </div>
    </footer>

    <button id="toTop" onclick="window.scrollTo({top:0,behavior:'smooth'})"
        class="bg-sky-600 hover:bg-sky-700 text-white w-11 h-11 rounded-xl shadow-lg">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script>
        window.addEventListener('load', () => document.getElementById('preloader').classList.add('hide'));

        AOS.init({ duration: 700, easing: 'ease-out-cubic', once: true, offset: 60 });

        const navbar = document.getElementById('navbar');
        const toTop = document.getElementById('toTop');
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('scrolled', window.scrollY > 10);
            toTop.classList.toggle('show', window.scrollY > 400);
        });

        document.querySelectorAll('[data-counter]').forEach(el => {
            const target = parseFloat(el.dataset.counter);
            const suffix = el.dataset.suffix || '';
            const io = new IntersectionObserver(entries => {
                if (!entries[0].isIntersecting) return;
                io.disconnect();
                const start = performance.now(), dur = 1400;
                const step = now => {
                    const p = Math.min((now - start) / dur, 1);
                    const eased = 1 - Math.pow(1 - p, 3);
                    el.textContent = Math.round(target * eased).toLocaleString('id-ID') + suffix;
                    if (p < 1) requestAnimationFrame(step);
                };
                requestAnimationFrame(step);
            }, { threshold: .6 });
            io.observe(el);
        });

        if (document.getElementById('typed-hero')) {
            new Typed('#typed-hero', {
                strings: ['Medical Check-Up Karyawan', 'Laporan PDF Otomatis', 'Rekam Medis Digital', 'Paket Perusahaan'],
                typeSpeed: 45, backSpeed: 25, backDelay: 1600, loop: true,
            });
        }

        if (document.querySelector('.swiper-layanan')) {
            new Swiper('.swiper-layanan', {
                slidesPerView: 1, spaceBetween: 20,
                breakpoints: { 640: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } },
                pagination: { el: '.swiper-pagination', clickable: true },
                navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
            });
        }
    </script>
</body>
</html>