<?php

use CartGateway\Config;
use CartGateway\Exceptions\ApiException;
use CartGateway\CartGateway;
use CartGateway\Models\ChargePayment;

echo "<pre>" . "\r\n";
require '../vendor/autoload.php';

try {
    $client = new CartGateway([
        'environment' => 'sandbox',
        'account_id' => Config::TEST_ACCOUNT_ID,
        'access_token' => Config::TEST_ACCESS_TOKEN,
    ]);

    $model = new ChargePayment([
        'firstname' => 'Test',
        'lastname' => 'User',
        'email' => 'user3@example.com',
        'address' => '6 Pheasant Run',
        'zip' => '07733',

        'amount' => 1025,
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
    ]);
    $response = $client->chargePayment($model);
} catch (ApiException $e) {
    echo "\nError:\n";
    echo $e->message;
    exit;
}

echo "<pre>" . "\r\n";
var_dump($response);
