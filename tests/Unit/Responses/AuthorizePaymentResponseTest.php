<?php

namespace Tests\Unit\Responses;

use CartGateway\Responses\AuthorizePaymentResponse;
use PHPUnit\Framework\TestCase;
use stdClass;

class AuthorizePaymentResponseTest extends TestCase
{
    /** @test */
    public function can_set_id()
    {
        $class = (object) ['id' => 'abcd1234'];
        $response = new AuthorizePaymentResponse($class);

        $this->assertEquals('abcd1234', $response->id);
    }

    /** @test */
    public function can_set_cvv_code()
    {
        $class = (object) ['cvv_code' => 'cvv1234'];
        $response = new AuthorizePaymentResponse($class);

        $this->assertEquals('cvv1234', $response->cvv_code);
    }

    /** @test */
    public function can_set_cvv_message()
    {
        $class = (object) ['cvv_message' => 'CVV Message'];
        $response = new AuthorizePaymentResponse($class);

        $this->assertEquals('CVV Message', $response->cvv_message);
    }

    /** @test */
    public function can_set_avs_code()
    {
        $class = (object) ['avs_code' => 'avs1234'];
        $response = new AuthorizePaymentResponse($class);

        $this->assertEquals('avs1234', $response->avs_code);
    }

    /** @test */
    public function can_set_avs_message()
    {
        $class = (object) ['avs_message' => 'AVS Message'];
        $response = new AuthorizePaymentResponse($class);

        $this->assertEquals('AVS Message', $response->avs_message);
    }
}
