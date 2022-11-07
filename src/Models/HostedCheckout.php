<?php

namespace CartGateway\Models;

use CartGateway\Exceptions\ApiException;

class HostedCheckout extends Model
{
    // required fields
    private $reference;
    private $cancel_url;
    private $success_url;

    // optional
    private $products = [];
    private $tax_amount;
    private $shipping_amount;

    public function __construct(array $attributes = null)
    {
        $this->validateExists($attributes, [
            'reference',
            'success_url',
            'cancel_url',
            'products',
        ]);

        // required
        $this->reference = $attributes['reference'];
        $this->success_url = $attributes['success_url'];
        $this->cancel_url = $attributes['cancel_url'];

        if (isset($attributes['shipping_amount'])) {
            $this->shipping_amount = $attributes['shipping_amount'];
        }
        if (isset($attributes['tax_amount'])) {
            $this->tax_amount = $attributes['tax_amount'];
        }
        if (isset($attributes['products'])) {
            // validate if its an array
            if (!is_array($attributes['products'])) {
                throw new ApiException("The products must be an array.");
            }
            // validate the array item if its instance of Product
            foreach ($attributes['products'] as $product) {
                if (!($product instanceof Product)) {
                    throw new ApiException("The product must be an instance of " . Product::class);
                }
            }
            $this->products = $attributes['products'];
        }
    }

    public function toArray(): array
    {
        $products = [];
        foreach ($this->products as $product) {
            $products[] = $product->toArray();
        }
        return [
            'reference' => $this->reference,
            'success_url' => $this->success_url,
            'cancel_url' => $this->cancel_url,
            'products' => $products,
            'tax_amount' => $this->tax_amount,
            'shipping_amount' => $this->shipping_amount,
        ];
    }
}
