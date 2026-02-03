<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            Detalle del producto
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg border">

                {{-- Información del producto --}}
                <div class="space-y-3">
                    <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
                    <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
                    <p><strong>Precio:</strong> {{ number_format($producto->precio, 2) }} €</p>
                    <p><strong>Stock:</strong> {{ $producto->stock }}</p>
                    <p><strong>Categoría:</strong> {{ $producto->categoria }}</p>
                    <p><strong>Disponible:</strong> {{ $producto->disponible ? 'Sí' : 'No' }}</p>
                </div>

                {{-- Acciones --}}
                <div class="mt-8 flex items-center justify-between">

                    {{-- Volver --}}
                    <a href="{{ route('productos.index') }}" class="text-blue-600 hover:underline">
                        ← Volver
                    </a>

                    <div class="flex gap-3">

                        {{-- Editar --}}
                        <a href="{{ route('productos.edit', $producto) }}"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                            ✏️ Editar
                        </a>

                        {{-- Eliminar --}}
                        <form action="{{ route('productos.destroy', $producto) }}" method="POST"
                            onsubmit="return confirm('¿Seguro que deseas eliminar este producto?')">
                            @csrf
                            @method('DELETE')
                            <button class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                                🗑️ Eliminar
                            </button>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
