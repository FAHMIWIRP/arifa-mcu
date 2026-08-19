<x-guest-layout>

    {{-- Logo untuk layar kecil --}}
    <div class="float-in lg:hidden mb-8 text-center">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Arifa Medikal Klinik" class="h-12 w-auto mx-auto">
        </a>
    </div>

    <div class="float-in bg-white rounded-3xl shadow-xl border border-slate-100 p-8 sm:p-10">
        <div class="text-center">
            <div class="w-14 h-14 mx-auto rounded-2xl bg-sky-100 text-sky-600 flex items-center justify-center text-2xl">
                <i class="fa-solid fa-user-nurse"></i>
            </div>
            <h2 class="mt-4 text-2xl font-extrabold text-slate-900">Portal Staf</h2>
            <p class="mt-1 text-sm text-slate-500">Masuk menggunakan akun yang terdaftar.</p>
        </div>

        <x-auth-session-status class="mt-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-slate-700" for="email">Email</label>
                <div class="relative mt-1.5">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                        <i class="fa-solid fa-envelope"></i>
                    </span>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                        class="w-full rounded-xl border-slate-300 pl-11 pr-4 py-3 text-sm focus:border-sky-500 focus:ring-sky-500"
                        placeholder="nama@arifamedikal.id">
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700" for="password">Kata Sandi</label>
                <div class="relative mt-1.5">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="w-full rounded-xl border-slate-300 pl-11 pr-4 py-3 text-sm focus:border-sky-500 focus:ring-sky-500"
                        placeholder="••••••••">
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between">
                <label for="remember_me" class="inline-flex items-center gap-2 text-sm text-slate-600">
                    <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-sky-600 focus:ring-sky-500" name="remember">
                    Ingat saya
                </label>
                @if (Route::has('password.request'))
                    <a class="text-sm font-semibold text-sky-600 hover:text-sky-700" href="{{ route('password.request') }}">
                        Lupa kata sandi?
                    </a>
                @endif
            </div>

            <button type="submit"
                class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-3 rounded-xl shadow transition">
                <i class="fa-solid fa-right-to-bracket mr-2"></i>Masuk ke Sistem
            </button>
        </form>

        <p class="mt-6 text-center text-xs text-slate-400">
            Halaman ini khusus staf Arifa Medikal Klinik.<br>
            <a href="{{ route('home') }}" class="text-sky-600 font-semibold hover:underline">Kembali ke beranda</a>
        </p>
    </div>

</x-guest-layout>