<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductControllerTest extends TestCase
{
    private $products;
    public function setUp(): void
    {
        parent::setUp();
        $this->products = Product::factory()->create()->toArray();
    }

    public function testAllProducts()
    {
        $response = $this->get('/api/products', $this->products);
        $response->assertStatus(200);
    }

    public function testFilterByCategory()
    {
        $response = $this->get('/api/products?category=insurance', $this->products);
        $response->assertStatus(200);
    }

    public function testFilterByPrice()
    {
        $response = $this->get('/api/products?price=insurance', $this->products);
        $response->assertStatus(200);
    }

    public function testFilterByCategoryAndPrice()
    {
        $response = $this->get('/api/products?category=insurance&price=89000', $this->products);
        $response->assertStatus(200);
    }
}
