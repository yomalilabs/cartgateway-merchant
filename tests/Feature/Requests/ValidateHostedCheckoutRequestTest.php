<?php

namespace Tests\Feature\Requests;

use CartGateway\Exceptions\ApiException;
use CartGateway\CartGateway;
use CartGateway\Models\ValidateHostedCheckout;
use Tests\TestCase;

class ValidateHostedCheckoutRequestTest extends TestCase
{
    /** @test */
    // public function validate_payment_id_error()
    // {
    //     $client = $this->validCartGatewayClient();

    //     try {
    //         $checkout = new ValidateHostedCheckout(['payment_id' => 'faulty-payment']);
    //         $response = $client->validateHostedCheckout($checkout);
    //     } catch (ApiException $e) {
    //         $this->assertNotNull($e->error);
    //     }
    // }

    /** @test */
    /*public function validate_payment_id_success()
    {
        $client = $this->validCartGatewayClient();

        try {

            // create hosted
            // charge payment
            // validate

            $checkout = new ValidateHostedCheckout(['payment_id' => 'faulty-payment']);
            $response = $client->validateHostedCheckout($checkout);
        } catch (ApiException $e) {
            $this->assertNotNull($e->error);
        }
    }*/
}
