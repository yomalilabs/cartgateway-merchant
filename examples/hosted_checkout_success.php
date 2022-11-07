<?php

use CartGateway\Config;
use CartGateway\Exceptions\ApiException;
use CartGateway\CartGateway;
use CartGateway\Models\ValidateHostedCheckout;

require '../vendor/autoload.php';

echo "<pre>" . "\r\n";

$paymentId = isset($_GET['payment_id']) ? $_GET['payment_id'] : null;
if (!$paymentId) {
    die('not valid');
    // header("Location: http://merchant.cartgateway.test");
}

print_r($_GET);

try {
    $client = new CartGateway([
        'environment' => 'sandbox',
        'account_id' => Config::TEST_ACCOUNT_ID,
        'access_token' => Config::TEST_ACCESS_TOKEN,
    ]);

    $validatePayment = new ValidateHostedCheckout([
        'payment_id' => $paymentId,
    ]);
    $response = $client->validateHostedCheckout($validatePayment);
} catch (ApiException $e) {
    var_dump('----');
    var_dump($e->message);
    var_dump('----');
    exit;
}

var_dump($response);
