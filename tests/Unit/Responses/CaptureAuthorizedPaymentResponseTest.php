<?php

namespace Tests\Unit\Responses;

use CartGateway\Responses\CaptureAuthorizedPaymentResponse;
use PHPUnit\Framework\TestCase;

class CaptureAuthorizedPaymentResponseTest extends TestCase
{
    /** @test */
    public function can_set_id()
    {
        $class = (object) ['id' => 'abcd1234'];
        $response = new CaptureAuthorizedPaymentResponse($class);

        $this->assertEquals('abcd1234', $response->id);
    }

    /** @test */
    public function can_set_authorized_payment_id()
    {
        $class = (object) ['authorized_payment_id' => 'efgh5678'];
        $response = new CaptureAuthorizedPaymentResponse($class);

        $this->assertEquals('efgh5678', $response->authorized_payment_id);
    }
}
