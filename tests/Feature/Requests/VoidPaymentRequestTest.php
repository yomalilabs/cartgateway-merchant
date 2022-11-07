<?php

namespace Tests\Feature\Requests;

use CartGateway\Exceptions\ApiException;
use CartGateway\CartGateway;
use CartGateway\Models\AuthorizeAndCapturePayment;
use CartGateway\Models\ChargePayment;
use CartGateway\Models\VoidPayment;
use Tests\TestCase;

class VoidPaymentRequestTest extends TestCase
{
    /** @test */
    public function do_void_request()
    {
        $client = $this->validCartGatewayClient();

        try {
            $response = $client->chargePayment($this->validChargePaymentModel());

            $checkout = new VoidPayment([
                'payment_id' => $response->id,
            ]);
            $response = $client->voidPayment($checkout);
        } catch (ApiException $e) {
        }

        $this->assertEquals(1, $response->success);
        $this->assertNull($response->error);
        $this->assertNotNull($response->id);
        $this->assertNotNull($response->message);
        $this->assertEquals('Approved and Completed', $response->message);
    }

    /** @test */
    public function validate_card_number()
    {
        $client = $this->validCartGatewayClient();

        try {
            $checkout = new VoidPayment(
                [
                    'payment_id' => 'faulty',
                ]
            );
            $response = $client->voidPayment($checkout);
        } catch (ApiException $e) {
            $this->assertNotNull($e->message);
        }
    }
}
