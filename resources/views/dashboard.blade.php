<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            Panel de control
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- ALERTA DE STOCK BAJO --}}
            @if (\App\Models\Producto::where('stock', '<=', 2)->count() > 0)
                <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-8 border border-red-300">
                    ⚠️ Hay productos con stock muy bajo. Revisa el inventario.
                </div>
            @endif

            {{-- TARJETAS DE ESTADÍSTICAS --}}
            {{-- ESTADÍSTICAS REALISTAS --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

                {{-- Valor total del inventario --}}
                <div class="bg-white p-6 shadow-md rounded-xl border border-gray-100 flex items-center gap-4">
                    <div class="text-yellow-500 text-4xl">💰</div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700">Valor total del inventario</h3>
                        <p class="text-2xl font-bold mt-1">
                            {{ number_format(\App\Models\Producto::all()->sum(fn($p) => $p->precio * $p->stock), 2) }}
                            €
                        </p>
                    </div>
                </div>

                {{-- Stock total --}}
                <div class="bg-white p-6 shadow-md rounded-xl border border-gray-100 flex items-center gap-4">
                    <div class="text-green-600 text-4xl">📦</div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700">Stock total</h3>
                        <p class="text-2xl font-bold mt-1">
                            {{ \App\Models\Producto::sum('stock') }}
                        </p>
                    </div>
                </div>

                {{-- Precio medio ponderado --}}
                @php
                    $productos = \App\Models\Producto::all();
                    $totalValor = $productos->sum(fn($p) => $p->precio * $p->stock);
                    $totalUnidades = $productos->sum('stock');
                    $precioPonderado = $totalUnidades > 0 ? $totalValor / $totalUnidades : 0;
                @endphp

                <div class="bg-white p-6 shadow-md rounded-xl border border-gray-100 flex items-center gap-4">
                    <div class="text-indigo-600 text-4xl">📊</div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700">Precio medio ponderado</h3>
                        <p class="text-2xl font-bold mt-1">
                            {{ number_format($precioPonderado, 2) }} €
                        </p>
                    </div>
                </div>

            </div>


            {{-- ESTADÍSTICAS POR CATEGORÍA --}}
            @php
                $categoriaMasProductos = \App\Models\Producto::select('categoria')
                    ->groupBy('categoria')
                    ->orderByRaw('COUNT(*) DESC')
                    ->first();

                $categoriaMasStock = \App\Models\Producto::select('categoria')
                    ->groupBy('categoria')
                    ->orderByRaw('SUM(stock) DESC')
                    ->first();
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">

                {{-- Categoría con más productos --}}
                <div class="bg-white p-6 shadow-md rounded-xl border border-gray-100 flex items-center gap-4">
                    <div class="text-blue-500 text-4xl">📚</div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700">Categoría con más productos</h3>
                        <p class="text-xl font-bold mt-1">
                            {{ $categoriaMasProductos->categoria ?? 'Sin datos' }}
                        </p>
                    </div>
                </div>

                {{-- Categoría con más stock --}}
                <div class="bg-white p-6 shadow-md rounded-xl border border-gray-100 flex items-center gap-4">
                    <div class="text-purple-500 text-4xl">📦</div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700">Categoría con más stock</h3>
                        <p class="text-xl font-bold mt-1">
                            {{ $categoriaMasStock->categoria ?? 'Sin datos' }}
                        </p>
                    </div>
                </div>

            </div>


            {{-- PRODUCTOS CON STOCK CRÍTICO --}}
            <div class="bg-white p-6 shadow-md rounded-xl border border-gray-100 mb-10">
                <h3 class="text-xl font-semibold mb-4">Productos con stock crítico (≤ 3)</h3>

                @php
                    $criticos = \App\Models\Producto::where('stock', '<=', 3)->get();
                @endphp

                @if ($criticos->count() == 0)
                    <p class="text-gray-600">No hay productos con stock crítico.</p>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($criticos as $p)
                            <div
                                class="p-4 border border-red-200 bg-red-50 rounded-lg shadow-sm flex items-center gap-3">
                                <div class="text-red-600 text-2xl">⚠️</div>
                                <div>
                                    <p class="font-semibold text-gray-800">{{ $p->nombre }}</p>
                                    <p class="text-sm text-gray-600">Stock:
                                        <span class="font-bold text-red-600">{{ $p->stock }}</span>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>






            {{-- ACCIONES RÁPIDAS --}}
            <div class="bg-white p-6 shadow-md rounded-xl border border-gray-100 mb-10">
                <h3 class="text-xl font-semibold mb-5 text-gray-800">Acciones rápidas</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-3xl mx-auto">

                    <a href="{{ route('productos.index') }}"
                        class="bg-indigo-600 text-white p-5 rounded-xl shadow hover:bg-indigo-700 transition flex items-center gap-3 justify-center">
                        📄 <span>Ver productos</span>
                    </a>

                    <a href="{{ route('productos.create') }}"
                        class="bg-green-600 text-white p-5 rounded-xl shadow hover:bg-green-700 transition flex items-center gap-3 justify-center">
                        ➕ <span>Crear producto</span>
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
                        @foreach (\App\Models\Producto::latest()->take(5)->get() as $producto)
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

</x-app-layout>
