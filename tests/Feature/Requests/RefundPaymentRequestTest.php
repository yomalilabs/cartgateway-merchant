<?php

namespace Tests\Feature\Requests;

use CartGateway\Exceptions\ApiException;
use CartGateway\CartGateway;
use CartGateway\Models\AuthorizeAndCapturePayment;
use CartGateway\Models\AuthorizePayment;
use CartGateway\Models\ChargePayment;
use CartGateway\Models\RefundPayment;
use Tests\TestCase;

class RefundPaymentRequestTest extends TestCase
{
    /** @test */
    public function do_refund_request()
    {
        $client = $this->validCartGatewayClient();

        try {
            $model = new ChargePayment($this->validParamsForAuthOrChargeModel());
            $response = $client->chargePayment($model);

            $checkout = new RefundPayment([
                'amount' => 1025,
                'payment_id' => $response->id,
            ]);
            $response = $client->refundPayment($checkout);
        } catch (ApiException $e) {
            // var_dump($e->message);
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
            $checkout = new RefundPayment(
                [
                    'amount' => 1025,
                    'payment_id' => 'faulty',
                ]
            );
            $response = $client->refundPayment($checkout);
        } catch (ApiException $e) {
            $this->assertNotNull($e->message);
        }
    }
}
