<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 via-indigo-50 to-gray-100 px-4">

        <div class="w-full max-w-md bg-white/80 backdrop-blur-sm shadow-xl rounded-2xl p-8 border border-gray-200">

            <h2 class="text-2xl font-bold text-gray-900 text-center mb-4">
                Confirmar contraseña
            </h2>

            <p class="mb-6 text-sm text-gray-600 text-center leading-relaxed">
                Esta es un área segura de la aplicación.  
                Por favor, confirma tu contraseña antes de continuar.
            </p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-medium" />

                    <x-text-input id="password"
                        class="block mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex justify-end mt-6">
                    <x-primary-button class="px-6 py-2">
                        {{ __('Confirm') }}
                    </x-primary-button>
                </div>
            </form>

        </div>

    </div>

</x-guest-layout>
