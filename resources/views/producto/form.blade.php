@if ($errors->any())
    <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



<div class="mb-4">
    <label class="block">Nombre</label>
    <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre ?? '') }}"
           class="w-full border rounded px-2 py-1">
</div>

<div class="mb-4">
    <label class="block">Descripción</label>
    <textarea name="descripcion" class="w-full border rounded px-2 py-1">{{ old('descripcion', $producto->descripcion ?? '') }}</textarea>
</div>

<div class="mb-4">
    <label class="block">Precio</label>
    <input type="number" step="0.01" name="precio" value="{{ old('precio', $producto->precio ?? '') }}"
           class="w-full border rounded px-2 py-1">
</div>

<div class="mb-4">
    <label class="block">Stock</label>
    <input type="number" name="stock" value="{{ old('stock', $producto->stock ?? '') }}"
           class="w-full border rounded px-2 py-1">
</div>

@php
    $categorias = ['Electrónica', 'Ropa', 'Hogar', 'Juguetes', 'Deportes'];
@endphp

<div class="mb-4">
    <label class="block">Categoría</label>
    <select name="categoria" class="w-full border rounded px-2 py-1">
        <option value="">Selecciona una categoría</option>

        @foreach ($categorias as $cat)
            <option value="{{ $cat }}"
                {{ old('categoria', $producto->categoria ?? '') == $cat ? 'selected' : '' }}>
                {{ $cat }}
            </option>
        @endforeach
    </select>
</div>


<div class="mb-4">
    <label class="block">Disponible</label>
<input type="checkbox" name="disponible" value="1"
       {{ old('disponible', $producto->disponible ?? false) ? 'checked' : '' }}>

</div>
