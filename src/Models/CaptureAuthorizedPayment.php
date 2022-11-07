<?php

namespace CartGateway\Models;

use CartGateway\Exceptions\ApiException;

class CaptureAuthorizedPayment extends Model
{
    private $amount;
    private $authorized_payment_id;

    public function __construct(array $attributes = null)
    {
        // amount must be in cents and bigger than 100
        if (!isset($attributes['amount']) || (!is_integer($attributes['amount']) || $attributes['amount'] < 100)) {
            throw new ApiException("The minimum amount is 100 cents.");
        }

        $this->validateExists($attributes, [
            'authorized_payment_id',
        ]);

        $this->amount = $attributes['amount'];
        $this->authorized_payment_id = $attributes['authorized_payment_id'];
    }

    public function toArray(): array
    {
        return [
            'amount' => $this->amount,
            'authorized_payment_id' => $this->authorized_payment_id,
        ];
    }
}
