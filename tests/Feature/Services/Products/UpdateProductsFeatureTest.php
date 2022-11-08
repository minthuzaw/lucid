<?php

namespace Tests\Feature\Services\Products;

use Tests\TestCase;

class UpdateProductsFeatureTest extends TestCase
{
    public function test_update_products_feature()
    {
        $data = ['name' => 'product name test update'];
        $header = [
            'Accept' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ];
        //$response = $this->json('POST', 'api/products', $data);

        $this->json('PUT', 'api/products/1', $data, $header)
            ->assertStatus(200);
    }
}
