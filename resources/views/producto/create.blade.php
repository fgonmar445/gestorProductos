<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            Crear producto
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 bg-white p-6 shadow-sm sm:rounded-lg">

            <form action="{{ route('productos.store') }}" method="POST">
                @csrf

                @include('producto.form')

                <button class="bg-blue-600 text-white px-4 py-2 rounded mt-4">
                    Guardar
                </button>
            </form>

        </div>
    </div>
</x-app-layout>
