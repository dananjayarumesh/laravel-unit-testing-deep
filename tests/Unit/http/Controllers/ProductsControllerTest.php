<?php

namespace Tests\Unit\http\Controllers;

use App\Services\ProductsService;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class ProductsControllerTest extends TestCase
{
    public function testGetAllProductsByCat()
    {
        $products = [
            [
                "id"       => 3,
                "name"     => "pro_3",
                "category" => "test_cat_1",
            ],
            [
                "id"       => 4,
                "name"     => "pro_4",
                "category" => "test_cat_2",
            ]
        ];

        // TODO: find a way to check constructor parameter received
        $ps = \Mockery::mock(ProductsService::class);
        $ps->shouldReceive('getAll')
            ->andReturn($products);

        App::bind(ProductsService::class, function () use ($ps) {
            return $ps;
        });

        $headers = ['Accept' => 'application/json'];
        $response = $this->get('/api/products?category=cat_1', $headers);

        $response->assertStatus(200);

        $this->assertArrayHasKey('products', $response);
        $response->assertExactJson(['products' => $products]);
    }
}
