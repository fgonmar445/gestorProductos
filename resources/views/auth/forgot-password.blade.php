<x-guest-layout>

    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 via-indigo-50 to-gray-100 px-4">

        <div class="w-full max-w-md bg-white/80 backdrop-blur-sm shadow-xl rounded-2xl p-8 border border-gray-200">

            <h2 class="text-2xl font-bold text-gray-900 text-center mb-4">
                Recuperar contraseña
            </h2>

            <p class="mb-6 text-sm text-gray-600 text-center leading-relaxed">
                ¿Has olvidado tu contraseña?
                No te preocupes. Introduce tu correo electrónico y te enviaremos un enlace para restablecerla.
            </p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-medium" />

                    <x-text-input id="email"
                        class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                        type="email" name="email" :value="old('email')" required autofocus />

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-6">
                    <button type="submit"
                        class="px-6 py-2 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition">
                        Enviar enlace
                    </button>

                </div>
            </form>

        </div>

    </div>

</x-guest-layout>
