<?php

namespace Tests\Unit\Models;

use CartGateway\Exceptions\ApiException;
use CartGateway\Models\ValidateHostedCheckout;
use PHPUnit\Framework\TestCase;

class ValidateHostedCheckoutTest extends TestCase
{
    /** @test */
    public function can_set_payment_id()
    {
        $config = new ValidateHostedCheckout([
            'payment_id' => '123456789',
        ]);

        $this->assertEquals('123456789', $config->toArray()['payment_id']);
    }

    /** @test */
    public function validate_payment_id()
    {
        try {
            $model = new ValidateHostedCheckout([]);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }
}
