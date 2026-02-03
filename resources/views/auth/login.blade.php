<x-guest-layout>

    <div
        class="min-h-screen flex items-center justify-center px-4 bg-gradient-to-br from-indigo-100 via-white to-indigo-200">

        <div
            class="w-full max-w-md p-8 rounded-2xl shadow-2xl border border-white/30 backdrop-blur-xl bg-white/40 animate-fadeIn">

            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 tracking-tight">
                    Iniciar sesión
                </h2>
                <p class="text-gray-600 mt-1">
                    Accede a tu espacio de gestión
                </p>
            </div>






            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-1">Email</label>

                    <div class="relative">

                        <x-text-input id="email"
                            class="block mt-1 w-full rounded-lg border-gray-300 pr-10 focus:border-indigo-500 focus:ring-indigo-500"
                            type="email" name="email" :value="old('email')" required autofocus />
                    </div>

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




                <!-- Remember -->
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <label for="remember_me" class="ml-2 text-sm text-gray-700">Recuérdame</label>
                </div>

                <!-- Botón -->
                <button type="submit"
                    class="w-full py-3 rounded-xl text-white font-semibold text-lg shadow-lg bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 transition-all duration-300">
                    Iniciar sesión
                </button>

                <!-- Enlace recuperar -->
                <div class="text-center mt-4">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-indigo-700 hover:text-indigo-900 font-medium"
                            href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif
                </div>

            </form>
        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>


</x-guest-layout>
