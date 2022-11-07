<?php

namespace Tests\Unit\Responses;

use CartGateway\Responses\VoidPaymentResponse;
use PHPUnit\Framework\TestCase;

class VoidPaymentResponseTest extends TestCase
{
    /** @test */
    public function can_set_id()
    {
        $class = (object) ['id' => 'abcd1234'];
        $response = new VoidPaymentResponse($class);

        $this->assertEquals('abcd1234', $response->id);
    }
}
