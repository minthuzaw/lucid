<?php

namespace Tests\Feature\Services\Products;

use Tests\TestCase;

class IndexProductsFeatureTest extends TestCase
{
    public function test_index_products_feature()
    {
        $header = [
            'Accept' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
        ];

        $this->withHeaders($header)->json('GET', 'api/products')
            ->assertStatus(200);
    }
}
