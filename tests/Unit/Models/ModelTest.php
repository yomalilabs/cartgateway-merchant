<?php

namespace Tests\Unit\Models;

use CartGateway\Exceptions\ApiException;
use CartGateway\Models\Model;
use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase
{
    /** @test */
    public function validate_exists()
    {
        try {
            $model = new Model();
            $model->validateExists([
                'foo' => 'bar',
            ], ['foo']);
        } catch (ApiException $e) {
            var_dump($e->message);
            $this->assertTrue(false);
        }
        $this->assertTrue(true);
    }

    /** @test */
    public function validate_exists_missing()
    {
        try {
            $model = new Model();
            $model->validateExists([
                'foo' => 'bar',
            ], ['baz']);
        } catch (ApiException $e) {
            $this->assertTrue(true);
        }
    }
}
