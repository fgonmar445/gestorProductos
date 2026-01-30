<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            Productos
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Botón crear producto --}}
            <a href="{{ route('productos.create') }}"
               class="bg-green-600 text-white px-5 py-2.5 rounded-lg shadow hover:bg-green-700 transition mb-5 inline-block">
                ➕ Crear producto
            </a>

            {{-- Tabla --}}
            <div class="bg-white shadow-md rounded-xl border border-gray-100 p-6">

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b bg-gray-50 text-gray-700">
                            <th class="py-3 px-2 font-semibold">Nombre</th>
                            <th class="py-3 px-2 font-semibold">Precio</th>
                            <th class="py-3 px-2 font-semibold">Stock</th>
                            <th class="py-3 px-2 font-semibold">Categoría</th>
                            <th class="py-3 px-2 font-semibold">Disponible</th>
                            <th class="py-3 px-2 font-semibold">Acciones</th>
                        </tr>
                    </thead>

                    <tbody class="text-gray-800">
                        @foreach ($productos as $producto)
                            <tr class="border-b hover:bg-gray-50 transition">
                                <td class="py-3 px-2">{{ $producto->nombre }}</td>
                                <td class="px-2">{{ $producto->precio }} €</td>
                                <td class="px-2">{{ $producto->stock }}</td>
                                <td class="px-2">{{ $producto->categoria }}</td>
                                <td class="px-2">
                                    @if($producto->disponible)
                                        <span class="text-green-600 font-semibold">Sí</span>
                                    @else
                                        <span class="text-red-600 font-semibold">No</span>
                                    @endif
                                </td>

                                <td class="py-3 px-2 flex gap-3">

                                    {{-- Botón editar --}}
                                    <a href="{{ route('productos.edit', $producto) }}"
                                       class="text-indigo-600 font-medium hover:text-indigo-800 transition">
                                        ✏️ Editar
                                    </a>

                                    {{-- Botón eliminar --}}
                                    <form action="{{ route('productos.destroy', $producto) }}"
                                          method="POST"
                                          onsubmit="return confirm('¿Eliminar producto?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 font-medium hover:text-red-800 transition">
                                            🗑️ Eliminar
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</x-app-layout>
