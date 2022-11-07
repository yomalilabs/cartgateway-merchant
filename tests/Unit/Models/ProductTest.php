<?php

namespace Tests\Unit\Models;

use CartGateway\Config;
use CartGateway\Exceptions\ApiException;
use CartGateway\Models\ApiConfig;
use CartGateway\Models\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /** @test */
    public function initialize_product()
    {
        $model = new Product([
            'name' => 'Product',
            'image_url' => 'https://google.com/image.png',
            'amount' => 1000,
        ]);

        $productArray = $model->toArray();
        $this->assertEquals('Product', $productArray['name']);
        $this->assertEquals('https://google.com/image.png', $productArray['image_url']);
        $this->assertEquals(1000, $productArray['amount']);
    }

    /** @test */
    public function initialize_product_with_codename()
    {
        $model = new Product([
            'codename' => 'product',
        ]);

        $productArray = $model->toArray();
        $this->assertEquals('product', $productArray['codename']);
    }

    /** @test */
    public function can_set_the_quantity()
    {
        $model = new Product(['amount' => 1000]);
        $this->assertEquals(1, $model->toArray()['quantity']);

        $model = new Product(['quantity' => 2, 'amount' => 1000]);
        $this->assertEquals(2, $model->toArray()['quantity']);
    }

    /** @test */
    public function validate_product_amount()
    {
        try {
            $model = new Product([
                'amount' => 'string',
            ]);
        } catch (ApiException $error) {
            $this->assertNotNull($error->error);
        }
        $this->assertFalse(isset($model));

        try {
            $model = new Product([
                'amount' => 50,
            ]);
        } catch (ApiException $error) {
            $this->assertNotNull($error->error);
        }
        $this->assertFalse(isset($model));
    }

    /** @test */
    public function validate_product_codename()
    {
        try {
            $model = new Product([
                'codename' => 'product-1',
            ]);
        } catch (ApiException $error) {
            $this->assertNotNull($error->error);
        }
        $this->assertFalse(isset($model));

        try {
            $model = new Product([
                'codename' => '-product1',
            ]);
        } catch (ApiException $error) {
            $this->assertNotNull($error->error);
        }
        $this->assertFalse(isset($model));

        try {
            $model = new Product([
                'codename' => 'product1-',
            ]);
        } catch (ApiException $error) {
            $this->assertNotNull($error->error);
        }
        $this->assertFalse(isset($model));
    }
}
