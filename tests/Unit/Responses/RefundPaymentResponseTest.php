<?php

namespace Tests\Unit\Responses;

use CartGateway\Responses\RefundPaymentResponse;
use PHPUnit\Framework\TestCase;
use stdClass;

class RefundPaymentResponseTest extends TestCase
{
    /** @test */
    public function can_set_id()
    {
        $class = (object) ['id' => 'abcd1234'];
        $response = new RefundPaymentResponse($class);

        $this->assertEquals('abcd1234', $response->id);
    }
}
