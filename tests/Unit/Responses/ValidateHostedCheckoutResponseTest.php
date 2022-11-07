<?php

namespace Tests\Unit\Responses;

use CartGateway\Responses\ValidateHostedCheckoutResponse;
use PHPUnit\Framework\TestCase;
use stdClass;

class ValidateHostedCheckoutResponseTest extends TestCase
{
    /** @test */
    public function can_set_amount()
    {
        $class = new stdClass;
        $class->amount = 1000;
        $response = new ValidateHostedCheckoutResponse($class);

        $this->assertEquals(1000, $response->amount);
    }

    /** @test */
    public function can_set_status()
    {
        $class = new stdClass;
        $class->status = 'valid';
        $response = new ValidateHostedCheckoutResponse($class);

        $this->assertEquals('valid', $response->status);
    }

    /** @test */
    public function can_set_reference()
    {
        $class = new stdClass;
        $class->reference = 'merchant-reference-123';
        $response = new ValidateHostedCheckoutResponse($class);

        $this->assertEquals('merchant-reference-123', $response->reference);
    }
}
