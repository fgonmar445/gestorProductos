<x-guest-layout>

    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 via-indigo-50 to-gray-100 px-4">

        <div class="w-full max-w-md bg-white/80 backdrop-blur-sm shadow-xl rounded-2xl p-8 border border-gray-200">

            <h2 class="text-3xl font-bold text-gray-900 text-center mb-6">
                Iniciar sesión
            </h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-medium" />
                    <x-text-input id="email"
                        class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                        type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-medium" />

                    <div class="relative">
                        <x-text-input id="password"
                            class="block mt-1 w-full rounded-lg border-gray-300 pr-10 focus:border-indigo-500 focus:ring-indigo-500"
                            type="password" name="password" required autocomplete="current-password" />

                        <!-- Botón mostrar/ocultar -->
                        <button type="button" onclick="togglePassword()"
                            class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500 hover:text-gray-700">

                            <!-- Icono ojo -->
                            <svg id="icon-show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>

                            <!-- Icono ojo tachado -->
                            <svg id="icon-hide" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.97 9.97 0 012.223-3.592M6.18 6.18A9.956 9.956 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.97 9.97 0 01-1.33 2.742M15 12a3 3 0 00-3-3m0 0a3 3 0 013 3m-3-3L3 3m9 9l9 9" />
                            </svg>

                        </button>
                    </div>

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <script>
                    function togglePassword() {
                        const input = document.getElementById('password');
                        const showIcon = document.getElementById('icon-show');
                        const hideIcon = document.getElementById('icon-hide');

                        if (input.type === 'password') {
                            input.type = 'text';
                            showIcon.classList.add('hidden');
                            hideIcon.classList.remove('hidden');
                        } else {
                            input.type = 'password';
                            hideIcon.classList.add('hidden');
                            showIcon.classList.remove('hidden');
                        }
                    }
                </script>



                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Recuerdame') }}</span>
                    </label>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between mt-6">

                    @if (Route::has('password.request'))
                        <a class="text-sm text-indigo-600 hover:text-indigo-800 transition"
                            href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif

                    <button type="submit"
                        class="ms-3 px-6 py-2 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition">
                        Iniciar sesión
                    </button>

                </div>
            </form>

        </div>

    </div>

</x-guest-layout>
