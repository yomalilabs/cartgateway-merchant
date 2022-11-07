<?php

use CartGateway\Config;
use CartGateway\CartGateway;
use CartGateway\Models\HostedCheckout;
use CartGateway\Models\Product;

echo "<pre>" . "\r\n";
require '../vendor/autoload.php';

try {
    $client = new CartGateway([
        'environment' => 'sandbox',
        'account_id' => Config::TEST_ACCOUNT_ID,
        'access_token' => Config::TEST_ACCESS_TOKEN,
    ]);

    $checkout = new HostedCheckout([
        'reference' => '123456789',
        'shipping_amount' => 59, // optional
        'tax_amount' => 250, // optional
        'products' => [
            new Product([
                'quantity' => 1,
                'amount' => 1000,
                'name' => 'My Product',
                // 'image_url' => 'http://google.com',
            ]),
            new Product([
                'quantity' => 2,
                'amount' => 1000,
                'name' => 'My Product',
                // 'image_url' => 'http://google.com',
            ]),
        ],
        'cancel_url' => 'http://merchant.cartgateway.test/hosted_checkout.php',
        'success_url' => 'http://merchant.cartgateway.test/hosted_checkout_success.php'
    ]);
    $response = $client->createHostedCheckout($checkout);
} catch (Error $e) {
    var_dump('----');
    var_dump($e->message);
    var_dump('----');
    exit;
}

// uncomment for production
// header("Location: {$response->url}");

// for testing purpose only

var_dump($response);
echo '<a target="_blank" href="' . $response->url . '">LINK TO THE CHECKOUT</a>';
