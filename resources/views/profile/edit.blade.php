<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            Perfil
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- Información del perfil --}}
            <div class="p-6 sm:p-8 bg-white shadow-md border border-gray-100 sm:rounded-xl">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Actualizar contraseña --}}
            <div class="p-6 sm:p-8 bg-white shadow-md border border-gray-100 sm:rounded-xl">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Eliminar cuenta --}}
            <div class="p-6 sm:p-8 bg-white shadow-md border border-gray-100 sm:rounded-xl">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
