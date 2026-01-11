<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-extrabold text-gray-900">
            Panel <span class="text-blue-600">Admin</span>
        </h2>
        <p class="text-sm text-gray-600 mt-2">Silakan masuk untuk mengelola artikel komponen komputer</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
            <x-text-input id="email" class="block mt-1 w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
            <x-text-input id="password" class="block mt-1 w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">Ingat saya</span>
            </label>
        </div>

        <div class="flex flex-col space-y-4 mt-6">
            <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                Masuk ke Dashboard
            </button>

            <div class="flex items-center justify-between text-sm">
                @if (Route::has('password.request'))
                    <a class="text-gray-600 hover:text-blue-600 underline" href="{{ route('password.request') }}">
                        Lupa sandi?
                    </a>
                @endif
                
                <a class="font-semibold text-blue-600 hover:text-blue-800" href="{{ route('register') }}">
                    Daftar Akun Baru
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>