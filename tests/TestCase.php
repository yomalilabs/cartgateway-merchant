<?php

namespace Tests;

use CartGateway\Config;
use CartGateway\CartGateway;
use CartGateway\Models\ChargePayment;
use PHPUnit\Framework\TestCase as PHPTestCase;

class TestCase extends PHPTestCase
{
    protected function validCartGatewayClient()
    {
        return new CartGateway($this->validCartGatewayClientParams());
    }

    protected function validCartGatewayClientParams(array $overrides = [])
    {
        return array_merge([
            'environment' => 'sandbox',
            'account_id' => Config::TEST_ACCOUNT_ID,
            'access_token' => Config::TEST_ACCESS_TOKEN,
        ], $overrides);
    }

    protected function validParamsForAuthOrChargeModel(array $overrides = [])
    {
        return array_merge([
            'firstname' => 'Test',
            'lastname' => 'User',
            'email' => 'user3@example.com',
            'address' => '6 Pheasant Run',
            'zip' => '07733',
    
            'amount' => 2000,
            'card_number' => 6011111111111117,
            'card_cvv' => 123,
            'card_expiry_month' => 10,
            'card_expiry_year' => 2025,
    
            'order_id' => random_int(1, 99999),
    
            // optional
            'phone' => 123456789,
            'city' => 'Holmdel',
            'state' => 'NJ',
            'country' => 'United States',
    
            'source' => 'PHP SDK Test'
        ], $overrides);
    }

    protected function validChargePaymentModel()
    {
        $model = new ChargePayment($this->validParamsForAuthOrChargeModel());

        return $model;
    }
}
