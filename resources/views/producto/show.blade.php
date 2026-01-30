<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            Detalle del producto
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 bg-white p-6 shadow-sm sm:rounded-lg">

            <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
            <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
            <p><strong>Precio:</strong> {{ $producto->precio }}</p>
            <p><strong>Stock:</strong> {{ $producto->stock }}</p>
            <p><strong>Categoría:</strong> {{ $producto->categoria }}</p>
            <p><strong>Activo:</strong> {{ $producto->activo ? 'Sí' : 'No' }}</p>

            <a href="{{ route('productos.index') }}" class="text-blue-600 mt-4 inline-block">
                Volver
            </a>

        </div>
    </div>
</x-app-layout>
