<?php

namespace Tests\Unit\Responses;

use CartGateway\Responses\LookupPaymentResponse;
use PHPUnit\Framework\TestCase;

class LookupPaymentResponseTest extends TestCase
{
    /** @test */
    public function can_set_id()
    {
        $class = (object) ['id' => 'abcd1234'];
        $response = new LookupPaymentResponse($class);

        $this->assertEquals('abcd1234', $response->id);
    }
}
