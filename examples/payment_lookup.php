<?php

use CartGateway\Config;
use CartGateway\Exceptions\ApiException;
use CartGateway\CartGateway;
use CartGateway\Models\LookupPayment;
use CartGateway\Models\RefundPayment;
use CartGateway\Models\VoidPayment;

echo "<pre>" . "\r\n";
require '../vendor/autoload.php';

try {
    $client = new CartGateway([
        'environment' => 'sandbox',
        'account_id' => Config::TEST_ACCOUNT_ID,
        'access_token' => Config::TEST_ACCESS_TOKEN,
    ]);

    $model = new LookupPayment([
        'payment_id' => $_GET['id'],
    ]);
    $response = $client->lookupPayment($model);
} catch (ApiException $e) {
    echo "\nError:\n";
    echo "StatusCode: {$e->statusCode}\n";
    echo $e->message;
    exit;
}

var_dump($response);
