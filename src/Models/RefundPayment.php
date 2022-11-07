<?php

namespace CartGateway\Models;

use CartGateway\Exceptions\ApiException;

class RefundPayment extends Model
{
    private $amount;
    private $payment_id;

    public function __construct(array $attributes = null)
    {
        // amount must be in cents and bigger than 100
        if (!isset($attributes['amount']) || (!is_integer($attributes['amount']) || $attributes['amount'] < 100)) {
            throw new ApiException("The minimum amount is 100 cents.");
        }

        $this->validateExists($attributes, [
            'payment_id',
        ]);

        $this->amount = $attributes['amount'];
        $this->payment_id = $attributes['payment_id'];
    }

    public function toArray(): array
    {
        return [
            'amount' => $this->amount,
            'payment_id' => $this->payment_id,
        ];
    }
}
