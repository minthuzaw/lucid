<?php

namespace Tests\Feature\Services\Products;

use Tests\TestCase;

class StoreProductsFeatureTest extends TestCase
{
    public function test_store_products_feature()
    {
        $data = ['name' => 'product name test'];
        $header = [
            'Accept' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ];
        //$response = $this->json('POST', 'api/products', $data);

        $this->json('POST', 'api/products', $data, $header)
            ->assertStatus(200);
    }
}
