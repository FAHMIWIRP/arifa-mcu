<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <style>[x-cloak] { display: none !important; }</style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-slate-100" x-data="{ sidebarOpen: false }">

        {{-- Bar atas (khusus mobile) --}}
        <div class="lg:hidden sticky top-0 z-40 bg-white border-b border-slate-200 flex items-center justify-between px-4 h-14">
            <button @click="sidebarOpen = true" class="w-10 h-10 rounded-lg border border-slate-200 text-slate-600">
                <i class="fa-solid fa-bars"></i>
            </button>
            <img src="{{ asset('images/logo.png') }}" alt="Arifa Medikal Klinik" class="h-8 w-auto">
            <a href="{{ route('profile.edit') }}" class="w-10 h-10 rounded-lg border border-slate-200 text-slate-600 flex items-center justify-center">
                <i class="fa-solid fa-user"></i>
            </a>
        </div>

        {{-- Lapisan gelap saat sidebar mobile terbuka --}}
        <div x-show="sidebarOpen" x-cloak @click="sidebarOpen = false"
            class="lg:hidden fixed inset-0 z-40 bg-slate-900/50"></div>

        {{-- SIDEBAR --}}
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-slate-200 flex flex-col transition-transform duration-200 lg:translate-x-0">

            <div class="h-16 flex items-center px-5 border-b border-slate-100">
                <img src="{{ asset('images/logo.png') }}" alt="Arifa Medikal Klinik" class="h-9 w-auto">
                <button @click="sidebarOpen = false" class="lg:hidden ml-auto w-9 h-9 rounded-lg text-slate-500 hover:bg-slate-100">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <nav class="flex-1 overflow-y-auto p-4 space-y-1">
                <p class="px-3 mb-2 text-xs font-bold uppercase tracking-wider text-slate-400">Menu Utama</p>

                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm {{ request()->routeIs('dashboard') ? 'bg-sky-50 text-sky-700 font-semibold' : 'text-slate-600 font-medium hover:bg-slate-50 hover:text-slate-900' }}">
                    <i class="fa-solid fa-gauge-high w-5 text-center"></i> Dashboard
                </a>

                <a href="{{ route('patients.index') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm {{ request()->routeIs('patients.*') || request()->routeIs('mcu.*') ? 'bg-sky-50 text-sky-700 font-semibold' : 'text-slate-600 font-medium hover:bg-slate-50 hover:text-slate-900' }}">
                    <i class="fa-solid fa-users w-5 text-center"></i> Data Pasien
                </a>

                <p class="px-3 mt-6 mb-2 text-xs font-bold uppercase tracking-wider text-slate-400">Lainnya</p>

                <a href="{{ route('profile.edit') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm {{ request()->routeIs('profile.*') ? 'bg-sky-50 text-sky-700 font-semibold' : 'text-slate-600 font-medium hover:bg-slate-50 hover:text-slate-900' }}">
                    <i class="fa-solid fa-id-card w-5 text-center"></i> Profil Saya
                </a>

                <a href="{{ route('home') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm text-slate-600 font-medium hover:bg-slate-50 hover:text-slate-900">
                    <i class="fa-solid fa-globe w-5 text-center"></i> Situs Publik
                </a>
            </nav>

            <div class="p-4 border-t border-slate-100">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-sky-100 text-sky-700 flex items-center justify-center font-bold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-slate-800 truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-slate-400 truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf
                    <button class="w-full bg-red-50 text-red-600 hover:bg-red-100 rounded-xl py-2 text-sm font-semibold">
                        <i class="fa-solid fa-right-from-bracket mr-1"></i> Keluar
                    </button>
                </form>
            </div>
        </aside>

        {{-- KONTEN --}}
        <div class="lg:pl-64">
            <main class="p-4 sm:p-6 lg:p-8">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>