<?php

namespace Tests\Feature\Products;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Обнуление и заполнение таблицы
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }
    /** @test */

    /**
     * Просмотр данных таблицы
     */
    public function test_products_can_be_indexed(): void
    {
        $response = $this->get('/api/products');
        $response->assertStatus(200);
    }

    /**
     * Просмотр одной записи таблицы
     */
    public function test_products_can_be_shown(): void
    {
        $product = Product::factory()->create();
        $response = $this->get('/api/products/' . $product->getKey());
        $response->assertStatus(200);
    }

    /**
     * Создание записи
     */
    public function test_products_can_be_stored(): void
    {
        $attributes = [
            "sku" => "ZZ",
            "name" => "zzzz",
            "price" => 9999.99,
        ];
        $response = $this->post('/api/products', $attributes);
        $response->assertStatus(201);
        $this->assertDatabaseHas('products', $attributes);
    }

    /**
     * Изменение записи
     */
    public function test_products_can_be_updated(): void
    {
        $product = Product::factory()->create();
        $attributes = [
            "sku" => "ZZ",
            "name" => "zzzz",
            "price" => 9999.99,
        ];
        $response = $this->patch(
            '/api/products/' . $product->getKey(),
            $attributes
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas(
            'products',
            array_merge(["id" => $product->getKey()], $attributes)
        );
    }

    /**
     * Удаление записи
     */
    public function test_products_can_be_destroyed(): void
    {
        $product = Product::factory()->create();
        $response = $this->delete('/api/products/' . $product->getKey());
        $response->assertStatus(204);
        $this->assertDatabaseMissing('products', ['id' => $product->getKey()]);
    }
}
