<?php

namespace Tests\Feature\Requests;

use CartGateway\Exceptions\ApiException;
use CartGateway\CartGateway;
use CartGateway\Models\AuthorizePayment;
use CartGateway\Models\HostedCheckout;
use CartGateway\Models\Product;
use Tests\TestCase;

class AuthorizePaymentRequestTest extends TestCase
{
    /** @test */
    public function do_authorize_payment_request()
    {
        $client = $this->validCartGatewayClient();
        $response = null;
        try {
            $checkout = new AuthorizePayment($this->validParamsForAuthOrChargeModel());
            $response = $client->authorizePayment($checkout);
        } catch (ApiException $e) {
            echo $e->getMessage();
        }
        $this->assertNotNull($response);
        $this->assertEquals(1, $response->success);
        $this->assertNull($response->error);
        $this->assertNotNull($response->id);
        $this->assertNotNull($response->message);
        $this->assertEquals('Approved and Completed', $response->message);
    }

    /** @test */
    public function validate_account_id()
    {
        $client = new CartGateway($this->validCartGatewayClientParams(["account_id" => 12]));
        try {
            $checkout = new AuthorizePayment(
                $this->validParamsForAuthOrChargeModel()
            );
            $response = $client->authorizePayment($checkout);
        } catch (ApiException $e) {
            $this->assertNotNull($e->message);
        }
    }

    /** @test */
    public function validate_card_number()
    {
        $client = $this->validCartGatewayClient();

        try {
            $checkout = new AuthorizePayment(
                $this->validParamsForAuthOrChargeModel([
                    'card_number' => 'faulty',
                ])
            );
            $response = $client->authorizePayment($checkout);
        } catch (ApiException $e) {
            $this->assertNotNull($e->message);
        }
    }
}
