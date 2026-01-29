<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProductoController
 */
final class ProductoControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $productos = Producto::factory()->count(3)->create();

        $response = $this->get(route('productos.index'));

        $response->assertOk();
        $response->assertViewIs('producto.index');
        $response->assertViewHas('productos', $productos);
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('productos.create'));

        $response->assertOk();
        $response->assertViewIs('producto.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductoController::class,
            'store',
            \App\Http\Requests\ProductoStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $nombre = fake()->word();
        $descripcion = fake()->text();
        $precio = fake()->randomFloat(/** decimal_attributes **/);
        $stock = fake()->numberBetween(-10000, 10000);
        $categoria = fake()->word();
        $activo = fake()->boolean();

        $response = $this->post(route('productos.store'), [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'stock' => $stock,
            'categoria' => $categoria,
            'activo' => $activo,
        ]);

        $productos = Producto::query()
            ->where('nombre', $nombre)
            ->where('descripcion', $descripcion)
            ->where('precio', $precio)
            ->where('stock', $stock)
            ->where('categoria', $categoria)
            ->where('activo', $activo)
            ->get();
        $this->assertCount(1, $productos);
        $producto = $productos->first();

        $response->assertRedirect(route('productos.index'));
        $response->assertSessionHas('producto.id', $producto->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $producto = Producto::factory()->create();

        $response = $this->get(route('productos.show', $producto));

        $response->assertOk();
        $response->assertViewIs('producto.show');
        $response->assertViewHas('producto', $producto);
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $producto = Producto::factory()->create();

        $response = $this->get(route('productos.edit', $producto));

        $response->assertOk();
        $response->assertViewIs('producto.edit');
        $response->assertViewHas('producto', $producto);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductoController::class,
            'update',
            \App\Http\Requests\ProductoUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $producto = Producto::factory()->create();
        $nombre = fake()->word();
        $descripcion = fake()->text();
        $precio = fake()->randomFloat(/** decimal_attributes **/);
        $stock = fake()->numberBetween(-10000, 10000);
        $categoria = fake()->word();
        $activo = fake()->boolean();

        $response = $this->put(route('productos.update', $producto), [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'stock' => $stock,
            'categoria' => $categoria,
            'activo' => $activo,
        ]);

        $producto->refresh();

        $response->assertRedirect(route('productos.index'));
        $response->assertSessionHas('producto.id', $producto->id);

        $this->assertEquals($nombre, $producto->nombre);
        $this->assertEquals($descripcion, $producto->descripcion);
        $this->assertEquals($precio, $producto->precio);
        $this->assertEquals($stock, $producto->stock);
        $this->assertEquals($categoria, $producto->categoria);
        $this->assertEquals($activo, $producto->activo);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $producto = Producto::factory()->create();

        $response = $this->delete(route('productos.destroy', $producto));

        $response->assertRedirect(route('productos.index'));

        $this->assertModelMissing($producto);
    }
}
