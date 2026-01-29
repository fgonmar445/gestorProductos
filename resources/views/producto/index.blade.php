<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            Productos
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('productos.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
                Crear producto
            </a>

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2">Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Categoría</th>
                            <th>Disponible</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                            <tr class="border-b">
                                <td class="py-2">{{ $producto->nombre }}</td>
                                <td>{{ $producto->precio }}</td>
                                <td>{{ $producto->stock }}</td>
                                <td>{{ $producto->categoria }}</td>
                                <td>{{ $producto->disponible ? 'Sí' : 'No' }}</td>
                                <td class="flex gap-2 py-2">
                                    <a href="{{ route('productos.edit', $producto) }}"
                                       class="text-blue-600">Editar</a>

                                    <form action="{{ route('productos.destroy', $producto) }}"
                                          method="POST"
                                          onsubmit="return confirm('¿Eliminar producto?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600">Eliminar</button>
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
