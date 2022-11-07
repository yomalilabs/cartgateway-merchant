<?php

namespace Tests\Unit\Models;

use CartGateway\Exceptions\ApiException;
use CartGateway\Models\VoidPayment;
use PHPUnit\Framework\TestCase;

class VoidPaymentTest extends TestCase
{
    private function validParams($overrides = [])
    {
        return array_merge([
            'payment_id' => 'abcd1234',
        ], $overrides);
    }

    /** @test */
    public function initialize_model()
    {
        $model = new VoidPayment($this->validParams());

        $productArray = $model->toArray();
        $this->assertEquals('abcd1234', $productArray['payment_id']);
    }

    /** @test */
    public function validate_authorized_payment_id()
    {
        try {
            $params = $this->validParams();
            unset($params['payment_id']);
            $model = new VoidPayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }
}
