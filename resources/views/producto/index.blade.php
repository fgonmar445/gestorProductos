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
               class="bg-green-600 text-white px-5 py-2.5 rounded-lg shadow hover:bg-green-700 transition mb-6 inline-block">
                ➕ Crear producto
            </a>

            {{-- Grid de productos --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                @foreach ($productos as $producto)
                    <div class="bg-white shadow-md rounded-xl border border-gray-100 p-5 hover:shadow-lg transition">

                        {{-- Icono o placeholder --}}
                        

                        {{-- Nombre --}}
                        <h3 class="text-lg font-semibold text-gray-900 text-center">
                            {{ $producto->nombre }}
                        </h3>

                        {{-- Categoría --}}
                        <p class="text-center mt-1">
                            <span class="px-3 py-1 text-xs bg-blue-100 text-blue-700 rounded-full">
                                {{ $producto->categoria }}
                            </span>
                        </p>

                        {{-- Precio --}}
                        <p class="text-center mt-3 text-xl font-bold text-green-600">
                            {{ number_format($producto->precio, 2) }} €
                        </p>

                        {{-- Stock --}}
                        <p class="text-center text-sm mt-1 text-gray-600">
                            Stock: 
                            <span class="font-semibold {{ $producto->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $producto->stock }}
                            </span>
                        </p>

                        {{-- Disponible --}}
                        <p class="text-center mt-1">
                            @if($producto->disponible)
                                <span class="text-green-600 font-semibold">Disponible</span>
                            @else
                                <span class="text-red-600 font-semibold">No disponible</span>
                            @endif
                        </p>

                        {{-- Acciones --}}
                        <div class="mt-4 flex justify-center gap-3">

                            {{-- Editar --}}
                            <a href="{{ route('productos.edit', $producto) }}"
                               class="px-3 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition text-sm">
                                ✏️ Editar
                            </a>

                            {{-- Eliminar --}}
                            <form action="{{ route('productos.destroy', $producto) }}"
                                  method="POST"
                                  onsubmit="return confirm('¿Eliminar producto?')">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition text-sm">
                                    🗑️ Eliminar
                                </button>
                            </form>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>
    </div>
</x-app-layout>
