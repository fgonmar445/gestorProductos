<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            Panel de control
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- ALERTA DE STOCK BAJO --}}
            @if(\App\Models\Producto::where('stock', '<=', 2)->count() > 0)
                <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-8 border border-red-300">
                    ⚠️ Hay productos con stock muy bajo. Revisa el inventario.
                </div>
            @endif

            {{-- TARJETAS DE ESTADÍSTICAS --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

                <div class="bg-white p-6 shadow-md rounded-xl border border-gray-100 flex items-center gap-4">
                    <div class="text-indigo-600 text-4xl">📦</div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700">Productos totales</h3>
                        <p class="text-3xl font-bold mt-1">{{ \App\Models\Producto::count() }}</p>
                    </div>
                </div>

                <div class="bg-white p-6 shadow-md rounded-xl border border-gray-100 flex items-center gap-4">
                    <div class="text-green-600 text-4xl">✔️</div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700">Disponibles</h3>
                        <p class="text-3xl font-bold mt-1">
                            {{ \App\Models\Producto::where('disponible', 1)->count() }}
                        </p>
                    </div>
                </div>

                <div class="bg-white p-6 shadow-md rounded-xl border border-gray-100 flex items-center gap-4">
                    <div class="text-red-600 text-4xl">❌</div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700">Sin stock</h3>
                        <p class="text-3xl font-bold mt-1">
                            {{ \App\Models\Producto::where('stock', 0)->count() }}
                        </p>
                    </div>
                </div>

            </div>

            {{-- ACCIONES RÁPIDAS --}}
            <div class="bg-white p-6 shadow-md rounded-xl border border-gray-100 mb-10">
                <h3 class="text-xl font-semibold mb-5 text-gray-800">Acciones rápidas</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <a href="{{ route('productos.index') }}"
                       class="bg-indigo-600 text-white p-6 rounded-xl shadow hover:bg-indigo-700 transition flex items-center gap-3">
                        📄 <span>Ver productos</span>
                    </a>

                    <a href="{{ route('productos.create') }}"
                       class="bg-green-600 text-white p-6 rounded-xl shadow hover:bg-green-700 transition flex items-center gap-3">
                        ➕ <span>Crear producto</span>
                    </a>

                    <a href="#"
                       class="bg-yellow-500 text-white p-6 rounded-xl shadow hover:bg-yellow-600 transition flex items-center gap-3">
                        📊 <span>Reportes</span>
                    </a>

                </div>
            </div>

            {{-- ÚLTIMOS PRODUCTOS --}}
            <div class="bg-white p-6 shadow-md rounded-xl border border-gray-100 mb-10">
                <h3 class="text-xl font-semibold mb-4">Últimos productos añadidos</h3>

                <table class="w-full text-left">
                    <thead>
                        <tr class="text-gray-600 border-b">
                            <th class="py-2">Nombre</th>
                            <th class="py-2">Stock</th>
                            <th class="py-2">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\Producto::latest()->take(5)->get() as $producto)
                            <tr class="border-b">
                                <td class="py-2">{{ $producto->nombre }}</td>
                                <td class="py-2">{{ $producto->stock }}</td>
                                <td class="py-2">{{ $producto->created_at->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    {{-- SCRIPT PARA LA GRÁFICA --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('chartProductos');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json(
                    collect(range(1, 12))->map(fn($m) => \Carbon\Carbon::create()->month($m)->format('M'))
                ),
                datasets: [{
                    label: 'Productos creados',
                    data: @json(
                        collect(range(1, 12))->map(fn($m) =>
                            \App\Models\Producto::whereMonth('created_at', $m)->count()
                        )
                    ),
                    backgroundColor: '#6366F1'
                }]
            }
        });
    </script>

</x-app-layout>
