<x-app-layout>
    <x-slot name="header">
                <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            Editar producto
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 bg-white p-6 shadow-sm sm:rounded-lg">

            <form action="{{ route('productos.update', $producto) }}" method="POST">
                @csrf
                @method('PUT')

                @include('producto.form')

                <button class="bg-blue-600 text-white px-4 py-2 rounded mt-4">
                    Actualizar
                </button>
            </form>

        </div>
    </div>
</x-app-layout>
