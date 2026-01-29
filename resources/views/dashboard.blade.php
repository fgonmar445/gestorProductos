<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Panel de control
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Tarjetas de estadísticas --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

                <div class="bg-white p-6 shadow rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-700">Productos totales</h3>
                    <p class="text-3xl font-bold mt-2 text-blue-600">
                        {{ \App\Models\Producto::count() }}
                    </p>
                </div>

                <div class="bg-white p-6 shadow rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-700">Productos disponibles</h3>
                    <p class="text-3xl font-bold mt-2 text-green-600">
                        {{ \App\Models\Producto::where('disponible', 1)->count() }}
                    </p>
                </div>

                <div class="bg-white p-6 shadow rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-700">Sin stock</h3>
                    <p class="text-3xl font-bold mt-2 text-red-600">
                        {{ \App\Models\Producto::where('stock', 0)->count() }}
                    </p>
                </div>

            </div>

            {{-- Accesos rápidos --}}
            <div class="bg-white p-6 shadow rounded-lg">
                <h3 class="text-xl font-semibold mb-4">Acciones rápidas</h3>

                <div class="flex gap-4">

                    <a href="{{ route('productos.index') }}"
                       class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
                        Ver productos
                    </a>

                    <a href="{{ route('productos.create') }}"
                       class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700">
                        Crear producto
                    </a>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
