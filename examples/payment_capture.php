<?php

use CartGateway\Config;
use CartGateway\Exceptions\ApiException;
use CartGateway\CartGateway;
use CartGateway\Models\CaptureAuthorizedPayment;

require '../vendor/autoload.php';
echo "<pre>" . "\r\n";

try {
    $client = new CartGateway([
        'environment' => 'sandbox',
        'account_id' => Config::TEST_ACCOUNT_ID,
        'access_token' => Config::TEST_ACCESS_TOKEN,
    ]);

    $model = new CaptureAuthorizedPayment([
        'amount' => 1500,
        'authorized_payment_id' => $_GET['id'],
    ]);
    $response = $client->captureAuthorizedPayment($model);
} catch (ApiException $e) {
    echo "\nError:\n";
    echo "StatusCode: {$e->statusCode}\n";
    echo $e->message;
    exit;
}

var_dump($response);
