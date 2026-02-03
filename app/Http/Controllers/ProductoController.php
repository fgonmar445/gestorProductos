<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoStoreRequest;
use App\Http\Requests\ProductoUpdateRequest;
use App\Models\Producto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductoController extends Controller
{
    public function index(Request $request): View
    {
        $productos = Producto::paginate(12);

        return view('producto.index', [
            'productos' => $productos,
        ]);
    }

    public function create(Request $request): View
    {
        return view('producto.create');
    }

    public function store(ProductoStoreRequest $request)
    {
        $data = $request->validated();
        $data['disponible'] = $request->has('disponible') ? 1 : 0;

        Producto::create($data);

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado correctamente');
    }

    public function show(Request $request, Producto $producto): View
    {
        return view('producto.show', [
            'producto' => $producto,
        ]);
    }

    public function edit(Request $request, Producto $producto): View
    {
        return view('producto.edit', [
            'producto' => $producto,
        ]);
    }

    public function update(ProductoUpdateRequest $request, Producto $producto)
    {
        $data = $request->validated();
        $data['disponible'] = $request->has('disponible') ? 1 : 0;

        $producto->update($data);

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado correctamente');
    }

    public function destroy(Request $request, Producto $producto): RedirectResponse
    {
        $producto->delete();

        return redirect()->route('productos.index');
    }
}
