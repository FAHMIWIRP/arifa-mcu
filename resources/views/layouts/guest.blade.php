<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} — Portal Staf</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <style>
            .med-pattern-dark {
                background-image: url("data:image/svg+xml,%3Csvg width='28' height='28' viewBox='0 0 28 28' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M12 4h4v8h8v4h-8v8h-4v-8H4v-4h8z' fill='%23ffffff' fill-opacity='0.08'/%3E%3C/svg%3E");
            }
            @keyframes floatIn {
                from { opacity: 0; transform: translateY(14px); }
                to   { opacity: 1; transform: translateY(0); }
            }
            .float-in { animation: floatIn .6s ease-out both; }
        </style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-50 text-slate-700 antialiased">
        <div class="min-h-screen flex">

            {{-- Panel branding (kiri) --}}
            <div class="hidden lg:flex lg:w-1/2 bg-sky-600 med-pattern-dark flex-col justify-between p-12 text-white">
                <a href="{{ route('home') }}" class="w-fit">
                    <img src="{{ asset('images/logo.png') }}" alt="Arifa Medikal Klinik" class="h-11 w-auto bg-white rounded-xl p-1.5">
                </a>

                <div>
                    <h1 class="text-4xl font-extrabold leading-tight">Portal Staf<br>Arifa Medikal Klinik</h1>
                    <p class="mt-4 text-sky-100 max-w-md leading-relaxed">
                        Sistem internal pengelolaan medical check-up: data pasien,
                        pemeriksaan, hingga laporan PDF resmi — dalam satu tempat.
                    </p>
                    <ul class="mt-8 space-y-3 text-sm font-semibold text-sky-50">
                        <li><i class="fa-solid fa-shield-halved mr-2"></i>Akses terbatas staf berwenang</li>
                        <li><i class="fa-solid fa-file-pdf mr-2"></i>Laporan resmi berkop surat, siap cetak</li>
                        <li><i class="fa-solid fa-user-doctor mr-2"></i>Dokter penanggung jawab bersertifikat</li>
                    </ul>
                </div>

                <p class="text-xs text-sky-200">© 2026 Arifa Medikal Klinik. Seluruh hak cipta dilindungi.</p>
            </div>

            {{-- Panel form (kanan) --}}
            <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12">
                <div class="w-full max-w-md">
                    {{ $slot }}
                </div>
            </div>

        </div>
    </body>
</html>